<div class="overlay"></div>

<div class="form_new" id="form_new-container">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
           <div id="picker"> </div>
           <input type="hidden" id="result" value="">
         </div>
           <input type="submit" value="Відправити" class="contacts__tab-submit-btn">
       </form>
     </div>




<style>
*{
  box-sizing: border-box;
}
.overlay{
  display: block;
}
.form_new{
  width: 320px;
  margin: 0 auto;
  background: black;
  color: white;
  font-family: "StTransmission-300Light";
  /* position: relative; */
  text-align: center;
  padding: 20px 30px;
  position: absolute;
  z-index: 9999;
  top: 10%;
  left: 50%;
  margin-left: -160px;
}
.grafic p{
  margin: 4px 0;
}
.svg_close{
  display: block;
  margin: 0 0 0 auto;
  position: absolute;
  right: 0;
  top: 0;
  cursor: pointer;
}
.flex{
  display: flex;
  display: -webkit-flex;
}
.tabs__name svg{
  width: 30px;
  height: 30px;
}
.content_name{
  font-size: 60px;
}
.content_subname{
  font-size: 14px;
  margin-bottom: 10px;
  line-height: 1.2;
}
.contact_form{
  margin-top: 20px;
}
  .contact_form input{
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
  .contact_form input[type="submit"]{
    background: red;
    color: white;
    margin-bottom: 0;
    text-indent: 0;
    cursor: pointer;
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
  }
.form__img{
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
.form__img svg{
  fill: #ffffff;
  width: 100%;
  height: 100%;;
}
.input_wrapper{
  position: relative;
}
.cursorily{ cursor: pointer;}
.hov:hover{ color: red;}
.ico-size{font-size: 16px;}
.ico-size-month{font-size: 26px!important; line-height: 26px!important;}
.ico-size-large{ font-size: 24px!important; line-height: 30px; }
.dtp_main{ border: solid 1px #eee; background-color: #000; padding: 8px 0 8px 8px; margin-bottom: 20px;}
.dtp_main span, .dtp_main i{ display: inline-block; padding-right: 8px; }
/* .dtp_modal-win{position: fixed;left: 0; top: 0; width: 100%; height: 100%;z-index: 999; background-color: #eeeeee; opacity: 0.6;} */
.dtp_modal-content{ background-color: #000;  width: 320px; color: #c6c6c6;font-family: "StTransmission-300Light";
    position: absolute; z-index: 9999; top: 100px; left: 100px; font-size: 16px;font-weight: normal;}
.dtp_modal-content-no-time{ background-color: #2c2929;  width: 312px;
    position: absolute; z-index: 1000; top: 100px; left: 100px; font-size: 16px;font-weight: normal;}
/* .dtp_modal-title{ border-bottom: solid 3px #01adff; padding: 16px 36px; margin-bottom: 16px;  font-size: 22px; } */
.dtp_modal-cell-date{ width: 100%;  margin-top: 6px;}
.dtp_modal-cell-time{width: 100%;  direction: ltr; border-right: solid 1px #000;}
.dtp_modal-months{ color: #7d7d7d; text-align: center; font-size: 20px; padding: 0 20px;}
.dtp_modal-months span{ display: inline-block; padding: 10px 20px; width: 182px;}
.dtp_modal-calendar{ width: 266px; margin-left: 22px; }
.dtp_modal-calendar-cell{ width: 38px; padding: 3px 0; display: inline-block; text-align: center;}
.dtp_modal-colored{ color: red; }
.dtp_modal-grey{ color: #7d7d7d; }
.dtp_modal-cell-selected{ background-color: red;  transition: background-color 1s ease-out;}
.dtp_modal-time-block{ height: auto; width: 100%; }
.dpt_modal-button{ background-color: red; color: #fff; padding: 8px 40px;
    text-align: center; cursor: pointer;}
.dtp_modal-time-line{ text-align: center; color: #7d7d7d; font-size: 20px; padding-top: 15px; display: none;}
.dtp_modal-time-mechanic{ padding-top: 0px;}
.dtp_modal-append{ color: #7d7d7d; text-align: center;font-weight: normal; }
.dtp_modal-midle{ display: none; width: 28px; }
.dtp_modal-midle-dig{display: inline-block; width: 16px; text-align: center; }
.dtp_modal-digits{ font-size: 34px; text-align: center;}
.dtp_modal-digit{  }
#angle-up-minute, #angle-down-minute{display: none;}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
<script src="/js/dt.js"></script>
<script type="text/javascript">

$('#picker').dateTimePicker({
  dateFormat: "YYYY-MM-DD HH:mm",
  locale: 'ru',
  title: "",
  positionShift: { top: 40, left: -30}
});
</script>
