<?php
global $url_link_slashafter;
global $ua_link;
global $ru_link;
global $eng_link;
global $ru_swicth_link;
global $ua_swicth_link;
?>
<?include('preloader_saga.php');?>
 <!-- начало меню -->
<div class="menu">
  <div class="menu__inner">

    <div class="logo">
      <? if($_SERVER[REQUEST_URI] =='/' || $_SERVER[REQUEST_URI] =='/ru/'): ?>
        <img src="/img/SF_logo_cr.svg" <?AltImgAdd($mes['fut-logo'])?>>
      <? else: ?>
        <a href="/<?=$url_link_slashafter;?>">
          <img src="/img/SF_logo_cr.svg" <?AltImgAdd($mes['fut-logo'])?>>
        </a>
      <? endif; ?>
    <div>
    </div>
      <div class="language_select language_select_hidden">
        <ul>
          <li><?= $ru_swicth_link ?></li>
          <li><?= $ua_swicth_link ?></li>
          <!-- <li><a href="/EN">EN</a></li> -->
        </ul>
       </div>
<!-- &#10148; стрелочка -->
    </div>
      <ul class="nav">
        <li class="dropdown_link"><a href="<?UrlAdd('about')?>" title="<?=$mes['menu23']?>"><?=$mes['menu23']?> <span class="menu_arr">&#9660;</span></a>
          <ul class="dropdown">
            <li><a href="<?UrlAdd('about')?>" title="<?=$mes['menu1']?>"><?=$mes['menu1']?></a></li>
			<li><a href="<?UrlAdd('general-plan')?>" title="<?=$mes['general-plan-menu']?>"><?=$mes['general-plan-menu']?></a></li>
            <li><a href="<?UrlAdd()?>#values" title="<?=$mes['menu4']?>"><?=$mes['menu4']?></a></li>
            <li><a href="<?UrlAdd()?>#advantages" title="<?=$mes['menu3']?>"><?=$mes['menu3']?></a></li>
            <li><a href="<?UrlAdd('social')?>" title="<?=$mes['menu6']?>"><?=$mes['menu6']?></a></li>
            <li><a href="<?UrlAdd('arrangement')?>" title="<?=$mes['menu13']?>"><?=$mes['menu13']?></a></li>
            <li><a href="<?UrlAdd('atmosfera')?>" title="SFERA Living System">SFERA Living System</a></li>
			<li><a href="<?UrlAdd('day')?>" title="<?=$mes['day-menu']?>"><?=$mes['day-menu']?></a></li>
          </ul>
        </li>
        <li><a href="<?UrlAdd()?>#place" title="<?=$mes['menu2']?>"><?=$mes['menu2']?></a></li>
        <li class="dropdown_link"><a href="<?UrlAdd('plan')?>" title="<?=$mes['menu21']?>"><?=$mes['menu21']?> <span class="menu_arr">&#9660;</span></a>
          <ul class="dropdown">
            <li><a href="<?UrlAdd('plan')?>" title="<?=$mes['menu24']?>"><?=$mes['menu24']?></a></li>
            <li><a href="<?UrlAdd('plan/odnokomnatnaya')?>" title="<?=$mes['menu14']?>"><?=$mes['menu14']?></a></li>
            <li><a href="<?UrlAdd('plan/dvuhkomnatnaya')?>" title="<?=$mes['menu15']?>"><?=$mes['menu15']?></a></li>
            <li><a href="<?UrlAdd('plan/trehkomnatnaya')?>" title="<?=$mes['menu16']?>"><?=$mes['menu16']?></a></li>
            <li><a href="<?UrlAdd('plan/chetirehkomnatnaya')?>" title="<?=$mes['menu17']?>"><?=$mes['menu17']?></a></li>
			<li><a href="<?UrlAdd('service-department')?>" title="<?=$mes['service-menu']?>"><?=$mes['service-menu']?></a></li>
            <!-- <li><a href="<?UrlAdd('usloviya-priobreteniya-rassrochka')?>" title="<?=$mes['menu19']?>"><?=$mes['menu19']?></a></li> -->
          </ul>
        </li>
        <li><a href="<?UrlAdd('commercial')?>" title="<?=$mes['menu18']?>"><?=$mes['menu18']?></a></li>
        <li class="dropdown_link"><a href="<?UrlAdd('building')?>" title="<?=$mes['menu22']?>"><?=$mes['menu22']?> <span class="menu_arr">&#9660;</span></a>
          <ul class="dropdown">
            <li><a href="<?UrlAdd('building')?>" title="<?=$mes['menu8']?>"><?=$mes['menu8']?></a></li>
            <li><a href="<?UrlAdd('webcam')?>" title="<?=$mes['menu11']?>"><?=$mes['menu11']?></a></li>
            <li><a href="<?UrlAdd('ctc')?>" title="CLIENT TECHNICAL CONTROL">CLIENT TECHNICAL CONTROL</a></li>
          </ul>
        </li>
        <li><a href="<?UrlAdd('developer')?>" title="<?=$mes['menu7']?>"><?=$mes['menu7']?></a></li>
        <li><a href="<?UrlAdd('documentation')?>" title="<?=$mes['menu12']?>"><?=$mes['menu12']?></a></li>
        <li><a href="<?UrlAdd('news')?>" title="<?=$mes['menu10']?>"><?=$mes['menu10']?></a></li>
        <li><a href="<?UrlAdd('maps')?>" title="<?=$mes['menu9']?>"><?=$mes['menu9']?></a></li>
        <li class="mobile"><img id="close" src="/img/pin/close.svg" alt="close"><?=$mes['menu-mes1']?></li>

      </ul>
      <div class="line"></div>
      <div class="mobile_menu"><img src="/img/pin/menu.svg" alt="menu"><?=$mes['menu-mes2']?></div>
      <a class="wowoo-link" href="#"><div class="tel">+38 (044) 498-05-00</div></a>
      <!-- <div class="tel">+38 (044) 223-59-89</div> -->
      <a id="callform" class="button callback js-callform-both" href="#"><?=$mes['menu-mes3']?></a>
      <div class="ten_box_item">
        <a class="social_links" href="https://www.facebook.com/sanfranciscocreativehouse/" target="_blank">
          <svg enable-background="new 0 0 512 512" height="16" viewBox="0 0 512 512" width="16" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><path d="m296.296 512h-95.936v-256h-64v-88.225l64-.029-.104-51.976c0-71.976 19.517-115.77 104.3-115.77h70.588v88.242h-44.115c-33.016 0-34.604 12.328-34.604 35.342l-.131 44.162h79.346l-9.354 88.225-69.926.029z" fill="#fff"/></svg>
        </a>
        <a class="social_links" href="https://www.instagram.com/sf_kyiv/" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" height="16"  width="16" enable-background="new 0 0 512 512" fill="#ffffff" viewBox="0 0 512 512"><path d="m352 0h-192c-88.352 0-160 71.648-160 160v192c0 88.352 71.648 160 160 160h192c88.352 0 160-71.648 160-160v-192c0-88.352-71.648-160-160-160zm112 352c0 61.76-50.24 112-112 112h-192c-61.76 0-112-50.24-112-112v-192c0-61.76 50.24-112 112-112h192c61.76 0 112 50.24 112 112z"/><path d="m256 128c-70.688 0-128 57.312-128 128s57.312 128 128 128 128-57.312 128-128-57.312-128-128-128zm0 208c-44.096 0-80-35.904-80-80 0-44.128 35.904-80 80-80s80 35.872 80 80c0 44.096-35.904 80-80 80z"/><circle cx="393.6" cy="118.4" r="17.056"/></svg>
        </a>
      </div>
      <div class="menu_river">
        <a href="http://saga-development.com.ua/">
          <img src="/img/Saga_white.svg" alt="Saga">
        </a>
      </div>
    </div>
  </div>
  <!-- Плашка с акциями-->
  <div class="promotions_btn">
    <a href="<?UrlAdd('news')?>kredit-sho-nadihae/" class="promotions_btn__link"><?=$mes['menu20']?></a>
  </div>
  <style media="screen">
    .social_links{
      text-decoration: none;
      border: 1px solid white;
      border-radius: 100%;
      padding: 8px 6px 4px;
      margin: 0 4px;
      width: 20px;
      height: 20px;
      display: inline-block;
    }
  </style>

 <!-- конец меню -->
 <script src="/js/alllibrary.js"></script>
 <script type="text/javascript">
 function mob_phone_replace(){
   var winWidth = $( window ).width();
    setTimeout(function(){
       var a = $('.tel').html();
       $('.wowoo-link').attr('href', 'tel:' + a);
     },1000);
 }
  mob_phone_replace();
  $(window).on('onload resize', mob_phone_replace);


  </script>
