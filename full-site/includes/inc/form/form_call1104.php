<div class="overlay"></div>
<div class="form" id="form_main-container">
    <img id="formclose" src="/img/close.svg" alt="close" width="40">
    <div class="content_name"><?=$mes['callback-mes1']?></div>
    <div class="content_text"><?=$mes['callback-mes2']?></div>
    <div class="form_wrap">
      <form id="form_main" >
        <div class="input-box js-name-input">
          <input class="input-box__field" type="text" name="name" value="" placeholder="<?=$mes['callback-mes3']?>" id="callbackName">
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
          <div class="input__error empty-input empty-input_hidden"><?=$mes['Данне поле обовязкове для заповнення']?></div>
        </div>
        <div class="input-box js-phone-input">
          <input type="tel" class='inputtelmask input-box__field' onkeyup="javascript:countme('form_main');" name="tel" value="" placeholder="ТЕЛЕФОН" id="callbackTel">
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
          <!-- <div class="input__error empty-input empty-input_hidden">Данне поле обов'язкове для заповнення</div> -->
          <div class="input__error invalid-number invalid-number_hidden"><?=$mes['Невірний формат номеру']?></div>
        </div>
        <!-- <div class="input js-email-input">
          <input class="input-box__field" type="email" name="email" value="" placeholder="E-MAIL" id="callbackEmail">
          <span class="clear-input">X</span>
          <div class="input__error empty-input empty-input_hidden">Данне поле обов'язкове для заповнення</div>
          <div class="input__error invalid-email invalid-email_hidden">Невірний формат email адреси</div>
        </div> -->
        <div class="input-box js-message-input">
          <textarea class="input-box__field" type="text" name="message" value="" placeholder="Message" id="callbackMessage"></textarea>
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
        </div>
          <input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
          <input  name="metka" class="metka" type="hidden" value="San-francisco with text"/>
          <input  name="inn" class="userInn" type="hidden" value="San-francisco"/>
          <!-- <div class="not" id="reCaptcha1" ></div> -->
        <div class="input">
          <input class="button js-submit-button js-submit-button_disabled" type="submit" name="" value="<?=$mes['callback-mes5']?>">
        </div>
      </form>
    </div>
</div>

<div class="form-ok">
    <img id="formclose-ok" src="/img/close.svg" alt="close" width="40">
    <div class="content_text"><?=$mes['callback-mes8']?></div>

</div>



<style>
.news_image_container img {
    max-height: 470px;
}
</style>
