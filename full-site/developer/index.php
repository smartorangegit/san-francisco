<!DOCTYPE html>
<html>
<? /*head*/ HeadAdd( $html=['html'=>'    <link rel="stylesheet" href="/css/building.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']);	?>
  <body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K36NJ3D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <link rel="stylesheet" href="/css/appart.css">

    <div class="main_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_developer">
        <div class="content_wrap clearfix">
          <div class="developer__top">
            <h1 class="content_name"><?=$mes['developer-h1']?></h1>

            <div class="developer_item" style="display:block; margin:0 auto;">
              <a target="_blank" href="http://saga-development.com.ua/" title="Saga" style="display:block;">
                <img src="/img/saga-logo-w.svg" alt="riverside">
              </a>
              <!-- <div class="content_text"><?=$mes['dev-mes3']?></div> -->
            </div>
          </div>

            <div class="content_text"><?=$mes['dev-mes6']?></div>




          <div class="developer_box clearfix">
            <div class="content_text"><?=$mes['dev-mes5']?></div>
            <ul class="proj_slider">
							<li class="logo_proj logo_proj_rybalsky">
								<a href="https://rybalsky.com.ua/" target="_blank">
										<img src="/img/logo/rybalsky_logo_white.svg" alt="Жилой район RYBALSKY" title="Жилой район RYBALSKY" />
								</a>
							</li>
							<li class="logo_proj logo_proj_new-york">
								<a href="http://new-york.com.ua/" target="_blank">
									<img src="/img/logo/new_york_logo_white.svg" alt="NEW YORK Concept House" title="NEW YORK Concept House" />
								</a>
							</li>
              <li class="logo_proj logo_proj_bristol">
                <a href="https://bristol.house/" target="_blank">
                  <img src="/img/logo/bristol_logo_white.svg" alt="BRISTOL Comfort House" title="BRISTOL Comfort House" />
                </a>
              </li>
							<li class="logo_proj logo_proj_chicago">
								<a href="https://chicago.kiev.ua/" target="_blank">
									<img src="/img/logo/chicago_logo_white.svg" alt="CHICAGO Central House" title="CHICAGO Central House"/>
								</a>
							</li>
              <li class="logo_proj logo_proj_einstein">
                <a href="http://einstein.house/" target="_blank">
                  <img src="/img/logo/EINSTEIN-logoW.svg" alt="EINSTEIN Concept House" title="EINSTEIN Concept House" />
                </a>
              </li>
              <li class="logo_proj logo_proj_kandinskiy">
                <a href="http://kandinsky-residence.com.ua/" target="_blank">
                  <img src="/img/logo/kandinsky_logo_white.svg" alt="KANDINSKY Odessa Residence" title="KANDINSKY Odessa Residence" />
                </a>
              </li>
              <li class="logo_proj logo_proj_resident">
                <a href="http://resident.house/" target="_blank">
                  <img src="/img/logo/resident_logo_white.svg" alt="RESIDENT Concept House" title="RESIDENT Concept House" />
                </a>
              </li>
            </ul>
            <div class="developer_box-controls developer_box-controls_prev-slide"></div>
            <div class="developer_box-controls developer_box-controls_next-slide"></div>
          </div>
		  
          <div class="content_text"><?=$mes['dev-mes2']?></div>
          <a class="button docum__link"  href="/documentation/"><?=$mes['doc-mes0']?></a>

          <div class="bottom_form"><a id="callform1" class="button callback"  href="#"><?=$mes['сallback-mes10']?></a></div>
	  		 <div class="video_container">
				<div class="video__box">
					<video  class="video_desk" src="/SAGA_FULL.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' autoplay loop muted></video>
					<video  class="is__mobile" src="/SAGA_FULL_mob.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' playsinline loop muted autoplay controls></video>
				</div>
				<div class="sound">
					<img id="sound_on" onclick="sound_off ()" src="/img/sound_on.svg" style="display:none;">
					<img id="sound_off" onclick="sound_on ()" src="/img/sound_off.svg" style="display:block;">
				</div>
			<!--	<div class="arrow_dance">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#ffffff" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
					<g><path d="M500,755.9L14.7,270.6c-6.2-6.2-6.2-15.6,0-21.8c6.2-6.2,15.6-6.2,21.8,0L500,712.3l463.6-463.6c6.2-6.2,15.6-6.2,21.8,0c6.2,6.2,6.2,15.6,0,21.8L500,755.9z"/></g>
					</svg>

				</div>-->
				<style media="screen">
				.video_container{
					width: 100%;
					height: 613px;
					position: relative;
					overflow: hidden;
					
				}
				.is__mobile{display: none;}
				video.video_desk{
					position: absolute;
					height: 613px;
					right: -50px;
				}
				.sound{
					position: absolute;
					bottom: 30px;
					left: 30px;
				}
				.sound img{width: 60px;}
				.arrow_dance{
					width: 60px;
					position: absolute;
					left: 50%;
					bottom: 20px;
					margin-left: -30px;
					-webkit-animation: bounce 2s infinite;
					animation: bounce 2s infinite;
				}
				@-webkit-keyframes bounce {
				   0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);
				     transform: translateX(0);}
				   40% {-webkit-transform: translateY(-30px);
				     transform: translateY(-30px);}
				   60% {-webkit-transform: translateY(-15px);
				     transform: translateY(-15px);}
				 }
				 @-moz-keyframes bounce {
				   0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
				   40% {transform: translateY(-30px);}
				   60% {transform: translateY(-15px);}
				 }
				 @keyframes bounce {
				   0%, 20%, 50%, 80%, 100% {-ms-transform: translateY(0);
				     transform: translateY(0);}
				   40% {-ms-transform: translateY(-30px);
				     transform: translateY(-30px);}
				   60% {-ms-transform: translateY(-15px);
				     transform: translateY(-15px);}
				 }
				@media only screen and (max-width: 768px) {
					.video_container{height: auto; margin-bottom: 25px;}
					.is__mobile{
						display: block;
						width: 100%;
						height: auto;
						position: static;
						transform: none;
					}
					.video_desk{display: none;}
					.sound{display: none;}
					.arrow_dance{display: none;}
				}
				</style>
				<script>

				function sound_on () {
					var video = document.querySelector("video");
					var sound_on = document.getElementById("sound_on");
					var sound_off = document.getElementById("sound_off");
					video.removeAttribute("muted");
					video.muted = false;
					sound_on.setAttribute("style", "display:block;");
					sound_off.setAttribute("style", "display:none;");
					}
				function sound_off () {
					var video = document.querySelector("video");
					var sound_on = document.getElementById("sound_on");
					var sound_off = document.getElementById("sound_off");
					video.muted = true;
					sound_on.setAttribute("style", "display:none;");
					sound_off.setAttribute("style", "display:block;");
					}
				</script>

	    </div>
        </div>
		
        <? copyringAdd() ?>
		
      </div>

    </div>

<? /*footer*/ FooterAdd($html=['html'=>'<script src="/js/jquery.fancybox.js"></script>']);	?>
  <script src="/js/jquery.bxslider.min.js"></script>
  <script>

    var defaultSliderConfiguration = {
      slideWidth: 180,
      minSlides: 1,
      maxSlides: 5,
      moveSlides: 1,
      auto: true,
      speed: 1000,
      pause: 3000,
      slideMargin: 20,
      infiniteLoop: true,
      easing: "ease-in-out",
      responsive: true,
      touchEnabled: true,
      pager: false,
      controls: false,
      onSliderResize: function() {
        var sliderConfiguration = getScreenSize();
        bxSlider.reloadSlider(sliderConfiguration)
      }
    };

    function getScreenSize() {
      var width = window.innerWidth;
      if(width > 1260) {
        return defaultSliderConfiguration;
      } else if(width > 1060 && width < 1260) {
        return Object.assign({}, defaultSliderConfiguration, {maxSlides: 4 });
      } else if(width > 850 && width < 1060) {
        return Object.assign({}, defaultSliderConfiguration, {maxSlides: 3 });
      } else if(width > 440 && width < 850) {
        return Object.assign({}, defaultSliderConfiguration, {maxSlides: 2 });
      } else {
        return Object.assign({}, defaultSliderConfiguration, {maxSlides: 1 });
      }
    }

    var sliderConfiguration = getScreenSize();

    // главная инициализапция
    var bxSlider = $(".proj_slider").bxSlider(sliderConfiguration);
    // Кастомные клики влево\вправо
    $('.developer_box-controls_next-slide').click(function() {
      bxSlider.goToNextSlide();
    });
    // Кастомные клики влево\вправо
    $('.developer_box-controls_prev-slide').click(function() {
      bxSlider.goToPrevSlide();
    });
  </script>
  </body>
</html>
