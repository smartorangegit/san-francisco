<!-- <div class="overlay"></div> -->
<?$webAd = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>
<div class="form_new" id="form_new-container">
  <svg class="svg_close" id="formclose_new" enable-background="new 0 0 50 50" viewBox="0 0 50 50" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m37.304 11.282 1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="m12.696 11.282 26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
    <div class="content_name"><?=$mes['callback-mes1']?></div>
       <div class="grafic">
           <?=$mes['callback-mes14']?>
           <p>ПН-ПТ: 9:00 - 19:00</p>
           <p>СБ-ВС: 10:00 - 17:00</p>
       </div>
       <form id="form_new_v3" class="contact_form" action="" method="post" onsubmit="ajax_form(this)">
         <div class="input_wrapper required_input">
           <input class="js-input-name" type="text" name="name" placeholder="<?=$mes['callback-mes18']?>" data-required="true" onkeyup="javascript:countme('form_new_v3');">
           <div class="validation-error validation-error_required" style="display: none"><?=$mes['callback-mes15']?></div>
         </div>
         <div class="input_wrapper required_input">
           <input class="js-input-phone" type="tel" name="tel" placeholder="Ваш телефон:" data-required="true">
           <div class="validation-error validation-error_required" style="display: none"><?=$mes['callback-mes15']?></div>
           <div class="validation-error validation-error_phone-format" style="display: none"><?=$mes['callback-mes16']?></div>
         </div>
         <div class="content_subname">
           <?=$mes['callback-mes17']?>
         </div>
         <div class="input_wrapper">
           <input type="text" id="datetimepicker_dark" name="when"/>
         </div>
           <input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
           <input  name="metka" class="metka" type="hidden" value="San-francisco AB-test"/>
           <input  name="inn" class="userInn" type="hidden" value="San-francisco"/>
           <input  name="type" class="type" type="hidden" value="1"/>
           <input type="submit" value="Відправити" class="contacts__tab-submit-btn">
       </form>
     </div>
<style>
.form_new {display:none;}
</style>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<link rel="stylesheet" href="/js/datapick/jquery.datetimepicker.css">
<script src="/js/datapick/jquery.datetimepicker.js"></script>
<script src="/js/datapick/php-date-formatter.min.js"></script>
<script>
    function ajax_form(e) {
        event.preventDefault();
        var str = $("#"+e.id).serialize();
        $.ajax({
            method: "POST",
            url: "/includes/application.php",
            data: str
        })
            .done(function (msg) {
               
				location.replace('/message/');
                var allInputs = document.querySelectorAll('[type="text"], [type="tel"], [type="email"]');
                allInputs.forEach(function (input) {
                    input.value = '';

                });

            });
    };

    var ct = 0;
    var addCount = document.createElement('input');
    addCount.type = "hidden";
    addCount.id = "count";
    addCount.name = "count";
    addCount.value = "0";
    function countme(form_new_v3) { var form;
        document.getElementById(form_new_v3).appendChild(addCount);
        document.getElementById('count').value = ++ct;
    }

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
<style media="screen">

.form_new{
  width: 320px;
  margin: 0 auto;
  background: black;
  color: white;
  font-family: "StTransmission-300Light";
  text-align: center;
  padding: 20px 30px;
  position: fixed;
  z-index: 9999;
  top: 10%;
  left: 50%;
  margin-left: -160px;
  box-sizing: border-box;
}
.form_new *{
  box-sizing: border-box;
}
.grafic p{
  margin: 4px 0;
}
.form_new .svg_close{
  display: block;
  margin: 0 0 0 auto;
  position: absolute;
  right: 0;
  top: 0;
  cursor: pointer;
}
.form_new .flex{
  display: flex;
  display: -webkit-flex;
}
.tabs__name svg{
  width: 30px;
  height: 30px;
}
.form_new .content_name{
  font-size: 60px;
}
.form_new .content_subname{
  font-size: 14px;
  margin-bottom: 10px;
  line-height: 1.2;
}
.form_new .contact_form{
  margin-top: 20px;
}
  .form_new .contact_form input{
    width: 100%;
    height: 50px;
    background: transparent;
    border: 1px solid red;
    outline: none;
    margin-bottom: 16px;
    text-indent: 60px;
    letter-spacing: 1px;
    -webkit-appearance: none;

    }
  .form_new .contact_form input[type="submit"]{
    background: red;
    color: white;
    margin-bottom: 0;
    text-indent: 0;
    cursor: pointer;
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
  }
.form_new .form__img{
  position: absolute;
  left: 20px;
  top: 10px;;
  width: 30px;
  height: 30px;
  background: #b3b3b3;
  z-index: 1;
  border-radius: 100%;
  padding: 8px;
}
.form_new .form__img svg{
  fill: #ffffff;
  width: 100%;
  height: 100%;;
}
.form_new .input_wrapper{
  position: relative;
}
.form_new .intl-tel-input {
  width: 100%;
  margin-bottom: 20px;
}
</style>
