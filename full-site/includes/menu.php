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
            <li><a href="<?UrlAdd()?>#values" title="<?=$mes['menu4']?>"><?=$mes['menu4']?></a></li>
            <li><a href="<?UrlAdd()?>#advantages" title="<?=$mes['menu3']?>"><?=$mes['menu3']?></a></li>
            <li><a href="<?UrlAdd('social')?>" title="<?=$mes['menu6']?>"><?=$mes['menu6']?></a></li>
            <li><a href="<?UrlAdd('arrangement')?>" title="<?=$mes['menu13']?>"><?=$mes['menu13']?></a></li>
            <li><a href="<?UrlAdd('atmosfera')?>" title="SFERA Living System">SFERA Living System</a></li>
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
        <div class="ten_round fb"><a href="https://www.facebook.com/sanfranciscocreativehouse/" target="_blank"><img <?LazyLoad("/img/facebook.svg")?> alt="pin" width="16"></a></div>
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
