<? /*head*/ HeadAdd( $html=['head'=>'Y',
							'html'=>'<link rel="stylesheet" href="/css/building.css">
									 <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']);	?>

    <div class="main_page tablet_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>

      <div class="content long_page content_building">
        <div class="content_wrap clearfix">
					<div class="status_wrap clearfix">
						<div id="buidling_status" class="content_name"><h1>Статус робіт</h1></div>
						<div class="status_content">
							<div class="content_subname">Облаштування свайного поля завершено!</div>
							<div class="content_text">Ми регулярно повідомляємо про етапи виконання робіт, публікуючи фото-звіти.</div>
							<div class="status_progress clearfix">
								<div class="status_progress_name">
									<ul>
										<li class="content_text">Будівництво</li>
										<li class="content_text">Фасад</li>
										<li class="content_text">Благоустрій</li>
										<li class="content_text">Інженерія</li>
									</ul>
								</div>
								<div class="status_timebar">
									<ul>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" id="container0"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text">Роботи до відм. 0,000 - 70%<br>Каркас -1,56%<br>Цегляна кладка - 0%<br>Внутрішнє опорядження - 0%</span></span></span></li>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" id="container1"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text">Вікна - 0%<br>Фасад - 0%</span></span></span></li>
										<li><svg class="button" id="container2"></svg></li>
										<li><span class="tooltip toolti p-effect-1"><span class="tooltip-item"><svg class="button" id="container3"></svg></span><span class="tooltip-content clearfix"><span class="tooltip-text">Внутрішня - 0%<br>Зовнішня - 0%</span></span></span></li>
									</ul>
								</div>
								<div class="status_buttons">
									<ul>
										<li><a class="button" href="#building_process">Дивитися хід будівництва</a></li>
										<li><a class="button" href="/webcam/">Веб-камера</a></li>
										<li class="content_text">Введення в експлуатацію:</li>
										<li class="content_text">4 квартал 2018 року</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="status_picture clearfix">
							<div class="status_img">
								<img  <?LazyLoad ("/img/house.png", array("class"=>"house_status"))?> alt="house">
								<img <?LazyLoad ("/img/house_full.png", array("class"=>"house_full"))?> alt="house" style="clip-path: inset(90% 0 0 0); -webkit-clip-path: inset(90% 0 0 0);">
							</div>
							<!--<div class="status_level">
								<div class="content_subname">5</div>
								<div class="content_text">поверхів <br>побудовано</div>
							</div>-->

						</div>

					</div>







          <div id="building_process" class="content_name"><h1><?=$mes['building-h1']?></h1></div>
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
              <img  <?LazyLoad ("/img/build/25_07_2017/1.jpg")?> alt="build1"/>
              <figcaption>
                <div class="build_date">25.07.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;"><?=$mes['bul-mes5']?></h2>
                  <p class="content_text"><?=$mes['bul-mes6']?></p>
                </div>
                <a class="build" href="/img/build/25_07_2017/1.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/2.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/3.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/4.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/5.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/6.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/7.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/8.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/9.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
                <a class="build" href="/img/build/25_07_2017/10.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
              </figcaption>
            </figure>

            <!--<figure class="effect-oscar">
              <img  <?LazyLoad ("/img/build/25_07_2017/2.jpg")?> alt="build2"/>
              <figcaption>
                <div class="build_date">25.07.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <a class="build" href="/img/build/25_07_2017/2.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img  <?LazyLoad ("/img/build/25_07_2017/3.jpg")?> alt="build3"/>
              <figcaption>
                <div class="build_date">25.07.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <a class="build" href="/img/build/25_07_2017/3.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img  <?LazyLoad ("/img/build/25_07_2017/4.jpg")?> alt="build4"/>
              <figcaption>
                <div class="build_date">25.07.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <a class="build" href="/img/build/25_07_2017/4.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
              </figcaption>
            </figure>

            <figure class="effect-oscar">
              <img  <?LazyLoad ("/img/build/25_07_2017/5.jpg")?> alt="build5"/>
              <figcaption>
                <div class="build_date">25.07.2017</div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;">будівельні роботи</h2>
                  <p class="content_text">Початок робіт з облаштування свайного поля та армування вертикальних конструкцій цокольного поверху</p>
                </div>
                <a class="build" href="/img/build/25_07_2017/5.jpg" data-fancybox="group" data-caption="Фотозвіт. Будівельні роботи за 25.07.2017 року"></a>
              </figcaption>
            </figure>-->
<div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div>
          </div>

        </div>
      </div>
    </div>

		<style media="screen">
		.tooltip {
			display: inline-block;
			position: relative;
			z-index: 999;
			cursor: pointer;
		}

		/* Gap filler */
		.tooltip::after {
			content: '';
			position: absolute;
			width: 100%;
			height: 20px;
			bottom: 100%;
			left: 50%;
			pointer-events: none;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
		}

		.tooltip:hover::after {
			pointer-events: auto;
		}

		/* Tooltip */

		.tooltip-content {
			position: absolute;
			z-index: 9999;
			width: 240px;
			left: 50%;
			bottom: 100%;
			font-size: 14px;
			line-height: 1.4;
			text-align: center;
			font-weight: 400;
			color: #fffaf0;
			background: #1B1717;
			opacity: 0;
			border-top: 3px solid #EF4136;
			margin: 0 0 20px -120px;
			cursor: default;
			pointer-events: none;
			/*font-family: 'Satisfy', cursive;*/
			-webkit-font-smoothing: antialiased;
			-webkit-transition: opacity 0.3s 0.3s;
			transition: opacity 0.3s 0.3s;
		}

		.tooltip:hover .tooltip-content {
			opacity: 1;
			pointer-events: auto;
			-webkit-transition-delay: 0s;
			transition-delay: 0s;
		}

		.tooltip-content span {
			display: block;
		}

		.tooltip-text {
			border-bottom: 10px solid #EF4136;
			overflow: hidden;
			-webkit-transform: scale3d(0,1,1);
			transform: scale3d(0,1,1);
			-webkit-transition: -webkit-transform 0.3s 0.3s;
			transition: transform 0.3s 0.3s;
		}

		.tooltip:hover .tooltip-text {
			-webkit-transition-delay: 0s;
			transition-delay: 0s;
			-webkit-transform: scale3d(1,1,1);
			transform: scale3d(1,1,1);
		}

		.tooltip-inner {
			background: rgba(85,61,61,0.95);
			padding: 40px;
			-webkit-transform: translate3d(0,100%,0);
			transform: translate3d(0,100%,0);
			webkit-transition: -webkit-transform 0.3s;
			transition: transform 0.3s;
		}

		.tooltip:hover .tooltip-inner {
			-webkit-transition-delay: 0.3s;
			transition-delay: 0.3s;
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
		}

		/* Arrow */
		.tooltip-content::after {
			content: '';
			bottom: -20px;
			left: 50%;
			border: solid transparent;
			height: 0;
			width: 0;
			position: absolute;
			pointer-events: none;
			border-color: transparent;
			border-top-color: #EF4136;
			border-width: 10px;
			margin-left: -10px;
			visibility: visible;
		}
		</style>
<? /*footer*/ FooterAdd($html=['head'=>'Y',
							   'html'=>'<script src="/js/jquery.fancybox.js"></script> <script src="/js/jquery.progress.js"></script> <script src="/js/status.js"></script> ']);?>
