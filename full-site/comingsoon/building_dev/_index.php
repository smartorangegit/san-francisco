<? /*head*/ HeadAdd( $html=['head'=>'Y',
							'html'=>'<link rel="stylesheet" href="/css/building.css">
									 <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']);	?>

    <div class="main_page tablet_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>

      <div class="content long_page content_building">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['building-h1']?></h1></div>
          <div class="building_text_1">
            <div class="content_subname"><?=$mes['bul-mes1']?></div>
            <div class="content_text"><?=$mes['bul-mes3']?></div>
          </div>
          <div class="building_text_2">
            <div class="content_subname"><?=$mes['bul-mes2']?></div>
            <div class="content_text"><?=$mes['bul-mes4']?></div>
          </div>

          <div class="photo-box clearfix">
            <figure class="effect-oscar">
              <img src="/img/build/1.jpg" alt="build1"/>
              <figcaption>
                <div class="build_date">20.03.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;"><?=$mes['bul-mes5']?></h2>
                  <p class="content_text"><?=$mes['bul-mes6']?></p>
                </div>
                <a class="build" href="/img/build/1.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 20.03.2017 року"></a>
                <a class="build" href="/img/build/2.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 20.03.2017 року"></a>
                <a class="build" href="/img/build/3.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 20.03.2017 року"></a>
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img src="/img/build/2.jpg" alt="build2"/>
              <figcaption>
                <div class="build_date">27.03.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <!-- <a class="build" href="#"></a> -->
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img src="/img/build/3.jpg" alt="build3"/>
              <figcaption>
                <div class="build_date">30.03.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <!-- <a class="build" href="#"></a> -->
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img src="/img/build/4.jpg" alt="build4"/>
              <figcaption>
                <div class="build_date">01.04.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <!-- <a class="build" href="#"></a> -->
              </figcaption>
            </figure>

          </div>

        </div>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['head'=>'Y',
							   'html'=>'<script src="/js/jquery.fancybox.js"></script>']);?>
