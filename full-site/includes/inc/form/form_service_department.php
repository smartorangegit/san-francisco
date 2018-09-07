<div id="form_service_department-form-container" class="static_form flattype_form form" style="display: none;">
  <div class="content_name"><?=$mes['i-mesService-department']?></div>
    <div class="form_wrap">
      <form id="form_service_department" class="">
        <div class="input input-box js-name-input">
          <input class="input-box__field" type="text" name="name" value="" onkeyup="javascript:countme('form_static');" placeholder="<?=$mes['callback-mes3']?>" id="callbackName">
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
          <div class="input__error empty-input empty-input_hidden"><?=$mes['Данне поле обовязкове для заповнення']?></div>
        </div>
        <div class="input input-box js-phone-input">
          <input type="tel" class='inputtelmask input-box__field' name="tel" value="" placeholder="<?=$mes['callback-mes4']?>" id="callbackTel">
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
          <div class="input__error invalid-number invalid-number_hidden"><?=$mes['Невірний формат номеру']?></div>
        </div>
        <div class="input input-box js-email-input">
          <input class="input-box__field" type="email" name="email" value="" placeholder="E-MAIL" id="callbackEmail">
          <span class="clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16" height="16"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg>
          </span>
          <div class="input__error empty-input empty-input_hidden">Данне поле обов'язкове для заповнення</div>
          <div class="input__error invalid-email invalid-email_hidden">Невірний формат email адреси</div>
        </div>
        <div class="input input-box">
           <input type="text" class="form_service_department_datepicker" required placeholder="<? echo $mes['callback-mes20'];?>" name="when"/>
         </div>
          <input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
          <input  name="metka" class="metka" type="hidden" value="San-francisco with text"/>
          <input  name="inn" class="userInn" type="hidden" value="San-francisco"/>
        <div class="input">
          <input class="button" type="submit" name="" value="<?=$mes['callback-mes5']?>">
        </div>
      </form>
    </div>
  </div>
