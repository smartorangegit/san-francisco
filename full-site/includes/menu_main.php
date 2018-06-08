<?php
global $url_link_slashafter;
global $ua_link;
global $ru_link;
global $eng_link;
?>

<?include('preloader_saga.php');?>


 <!-- начало меню -->
<div class="menu">
  <div class="menu__inner">
  <div class="logo">
    <a href="/<?=$url_link_slashafter;?>">
      <img src="/img/SF_logo_cr.svg" <?AltImgAdd($mes['fut-logo'])?>>
    </a>

    <div class="language_select language_select_hidden">
      <ul>
        <li><a href="<?= $ua_link ?>">UA</a></li>
        <li><a href="<?= $ru_link ?>">RU</a></li>
        <!-- <li><a href="/EN">EN</a></li> -->
      </ul>

     </div>
<!-- &#9755; стрелка вправо -->
  </div>
    <ul class="nav">
      <li class="dropdown_link"><a href="<?UrlAdd('about')?>"><?=$mes['menu1']?> <span class="menu_arr"></span></a>
        <ul class="dropdown">
          <li><a href="<?UrlAdd()?>#values"><?=$mes['menu4']?></a></li>
          <li><a href="<?UrlAdd()?>#advantages"><?=$mes['menu3']?></a></li>
          <li><a href="<?UrlAdd('social')?>"><?=$mes['menu6']?></a></li>
          <li><a href="<?UrlAdd('arrangement')?>"><?=$mes['menu13']?></a></li>
        </ul>
      </li>
      <li><a href="<?UrlAdd()?>#place"><?=$mes['menu2']?></a></li>
      <li class="dropdown_link"><a href="<?UrlAdd('plan')?>"><?=$mes['menu5']?> <span class="menu_arr"></span></a>
        <ul class="dropdown">
          <li><a href="<?UrlAdd('plan/odnokomnatnaya')?>"><?=$mes['menu14']?></a></li>
          <li><a href="<?UrlAdd('plan/dvuhkomnatnaya')?>"><?=$mes['menu15']?></a></li>
          <li><a href="<?UrlAdd('plan/trehkomnatnaya')?>"><?=$mes['menu16']?></a></li>
          <li><a href="<?UrlAdd('plan/chetirehkomnatnaya')?>"><?=$mes['menu17']?></a></li>
		  <li><a href="<?UrlAdd('usloviya-priobreteniya-rassrochka')?>" title="<?=$mes['menu19']?>"><?=$mes['menu19']?></a></li>
        </ul>
      </li>
      <li><a href="<?UrlAdd('commercial')?>"><?=$mes['menu18']?></a></li>
      <li class="dropdown_link"><a href="<?UrlAdd('building')?>" ><?=$mes['menu8']?> <span class="menu_arr"></span></a>
        <ul class="dropdown">
          <li><a href="<?UrlAdd('webcam')?>"><?=$mes['menu11']?></a></li>
        </ul>
      </li>
      <li class="dropdown_link"><a href="<?UrlAdd('developer')?>" ><?=$mes['menu7']?> <span class="menu_arr"></span></a>
        <ul class="dropdown">
          <li><a href="<?UrlAdd('documentation')?>"><?=$mes['menu12']?></a></li>
          <li><a href=""><?=$mes['menu19']?></a></li>
        </ul>
      </li>
      <li><a href="<?UrlAdd('news')?>"><?=$mes['menu10']?></a></li>
      <li><a href="<?UrlAdd('maps')?>"><?=$mes['menu9']?></a></li>
      <li class="mobile"><img id="close" src="/img/pin/close.svg" alt="close"><?=$mes['menu-mes1']?></li>

    </ul>
    <div class="line"></div>
    <div class="mobile_menu"><img src="/img/pin/menu.svg" alt="menu"><?=$mes['menu-mes2']?></div>
    <a class="wowoo-link" href="#"><div class="tel">+38 (044) 223-59-89</div></a>
    <!-- <div class="tel">+38 (044) 223-59-89</div> -->
    <a id="callform" class="button callback" href="#"><?=$mes['menu-mes3']?></a>
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
  <div class="promotions_btn">
    <a href="/news/akcijni_umovi_rozstrochki/" class="promotions_btn__link"><?=$mes['menu20']?></a>
  </div>
 <!-- конец меню -->
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
