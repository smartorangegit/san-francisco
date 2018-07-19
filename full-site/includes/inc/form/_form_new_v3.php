<div class="overlay"></div>

<div class="form_new" id="form_new-container">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <svg class="svg_close" id="formclose_new" enable-background="new 0 0 50 50" viewBox="0 0 50 50" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m37.304 11.282 1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="m12.696 11.282 26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
    <div class="content_name"><?=$mes['callback-mes1']?></div>
       <div class="grafic">
           График работы
           <p>ПН-ПТ: 9:00 - 19:00</p>
           <p>СБ-ВС: 10:00 - 17:00</p>
       </div>
       <form id="" class="contact_form" action="" method="post">
         <div class="input_wrapper required_input">
           <input class="js-input-name" type="text" name="name" placeholder="Ваше ім'я:" data-required="true">
           <div class="validation-error validation-error_required" style="display: none">Данне поле обов'язкове для заповнення</div>
         </div>
         <div class="input_wrapper required_input">
           <input class="js-input-phone" type="tel" name="phone" placeholder="Ваш телефон:" data-required="true">
           <div class="validation-error validation-error_required" style="display: none">Данне поле обов'язкове для заповнення</div>
           <div class="validation-error validation-error_phone-format" style="display: none">Невірний формат телефону</div>
         </div>
         <div class="content_subname">
           МЫ МОЖЕМ ПЕРЕЗВОНИТЬ В УДОБНОЕ ДЛЯ ВАС ВРЕМЯ
         </div>
         <div class="input_wrapper">
           <input type="text" id="datetimepicker_dark"/>
         </div>
           <input type="submit" value="Відправити" class="contacts__tab-submit-btn">
       </form>
     </div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/js/datapick/jquery.datetimepicker.css">
<script src="/js/datapick/jquery.datetimepicker.js"></script>
<script src="/js/datapick/php-date-formatter.min.js"></script>
<script>

$.datetimepicker.setLocale('ru');

var logic1 = function( currentDateTime ){
	if ( currentDateTime.getDate() == new Date().getDate() ){
		this.setOptions({
			minTime: new Date()
		});
	} else
	{
		this.setOptions({
			minTime:'9:00'
		});
	}
};

$('#datetimepicker_dark').datetimepicker({
	theme:'dark',
  value: new Date(),
	minDate: new Date(),
	maxTime: '20:00',
  yearStart: 2018,
  yearEnd: 2018,
	dayOfWeekStart : 1,
	onSelectDate: logic1,
	onShow: logic1

});

</script>
