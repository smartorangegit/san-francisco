		<? /*head*/ HeadAdd($html=['head'=>'Y', 'html'=>'
		<link rel="stylesheet" type="text/css" href="/css/animate.css">
		<link rel="stylesheet" type="text/css" href="/css/jquery.bxslider.css">
		 ',
		 'mata_img'=>'/img/render1.jpg',
		 'description'=>$mes['home-description']
		 ]);?>

		<?  /*preloader*/ include_once('includes/preloader.php');  ?>

    <div class="main_page clearfix">
      <?  /*Menu*/ include_once('includes/menu.php');  ?>
			<div class="content">
			<div class="video_container" style="display:none;">
				<div class="video__box">
					<video  class="video_desk" src="/SAGA.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' autoplay loop muted></video>
					<video  class="is__mobile" src="/SAGA.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' playsinline loop muted autoplay controls></video>
				</div>
				<div class="sound">
					<img id="sound_on" onclick="sound_off ()" src="/img/sound_on.svg" style="display:none;">
					<img id="sound_off" onclick="sound_on ()" src="/img/sound_off.svg" style="display:block;">
				</div>
				<div class="arrow_dance">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#ffffff" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
					<g><path d="M500,755.9L14.7,270.6c-6.2-6.2-6.2-15.6,0-21.8c6.2-6.2,15.6-6.2,21.8,0L500,712.3l463.6-463.6c6.2-6.2,15.6-6.2,21.8,0c6.2,6.2,6.2,15.6,0,21.8L500,755.9z"/></g>
					</svg>

				</div>
				<style media="screen">
				.video_container{
					width: 100%;
					height: 100vh;
					position: relative;
					overflow: hidden;
				}
				.is__mobile{display: none;}
				video.video_desk{
					position: absolute;
					height: 100%;
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
					.video_container{height: auto;}
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
      <div  <?LazyLoad ("/img/render1.jpg", array("class"=>"content_0"))?>>
				<div class="bxslider">
				  <div>
						<img src="/img/render1.jpg" alt="SanFrancisco CREATIVE HOUSE">
					</div>
				  <div><img src="/img/slider1.jpg" alt="SanFrancisco CREATIVE HOUSE"></div>
				  <!-- <div><img src="/img/slider2.jpg" alt="SanFrancisco CREATIVE HOUSE"></div> -->
				</div>
        <div class="main_slogan wow fadeIn">
          <div class="center"><?=$mes['h-mes1']?></div>
          <!-- <h1><?H1page()?> </h1> -->
      	</div>
    	</div>

      <div id="place" <?LazyLoad ("/img/main_bg.jpg", array("class"=>"content_2"))?>>
        <div class="content_wrapper clearfix">
					<h2 class="content_name"><?=$mes['h-mes7']?></h2>
					<div class="place__map">
						<!-- <div id="map1" class="map1" style="height:500px"> </div> -->
						<img src="/img/bigmap_new.jpg" alt="Розташування комплексу">
					</div>
            <!-- <div class="big_text"> -->
							<h1 class="">SAN FRANCISCO Creative House</h1>
              <span class="content_subname big_text"><?=$mes['h-mes8']?></span>
              <div class="content_text">
								<p class="content_text__first">
									<?=$mes['h-mes25']?>
								</p>
								<p class="content_text__first">
									<?=$mes['h-mes26']?>
								</p>
								<p class="content_text__first">
									<?=$mes['h-mes9']?>
								</p>
								<p class="content_text__first">
									<?=$mes['h-mes18']?>
								</p>
            	</div>
						<!-- </div> -->
						<div class="clearfix"></div>

        </div>
				<div class="nearby">
					<div class="content_name"><?=$mes['h-mes30']?></div>
					<div class="nearby__box">
						<div class="nearby__item">
							<div class="nearby__img">
								<i class="icon-near1"></i>
								<!-- <img src="/img/nearby/1.png" alt=""> -->
							</div>
							<p class="content_subname"><?=$mes['h-mes10']?></p>
							<p class="content_text"><?=$mes['h-mes12']?></p>
						</div>
						<div class="nearby__item">
							<div class="nearby__img">
								<i class="icon-near2"></i>
								<!-- <img src="/img/nearby/2.png" alt=""> -->
							</div>
							<p class="content_subname"><?=$mes['h-mes15']?></p>
							<p class="content_text"><?=$mes['h-mes17']?></p>
						</div>
						<div class="nearby__item">
							<div class="nearby__img">
								<i class="icon-near3"></i>
								<!-- <img src="/img/nearby/3.png" alt=""> -->
							</div>
							<p class="content_subname"><?=$mes['h-mes10']?></p>
							<p class="content_text"><?=$mes['h-mes11']?></p>
						</div>
						<div class="nearby__item">
							<div class="nearby__img">
								<i class="icon-near4"></i>
								<!-- <img src="/img/nearby/4.png" alt=""> -->
							</div>
							<p class="content_subname"><?=$mes['h-mes13']?></p>
							<p class="content_text"><?=$mes['h-mes14']?></p>
						</div>
						<div class="nearby__item">
							<div class="nearby__img">
								<i class="icon-near5"></i>
								<!-- <img src="/img/nearby/5.png" alt=""> -->
							</div>
							<p class="content_subname"><?=$mes['h-mes15']?></p>
							<p class="content_text"><?=$mes['h-mes16']?></p>
						</div>

					</div>
					<a href="#" class="button button_red"><?=$mes['h-mes19']?></a>

				</div>
      </div>

        <div class="content_3">
          <div id="advantages"  <?LazyLoad ("/img/advantages.jpg", array("class"=>"section_two clearfix"))?>>
            <h2 class="content_name"><?=$mes['h-mes24'];//переваги?></h2>
						<div class="advantages__box">
							<div class="advantages__column">
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/1.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes38'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/3.png" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes27'];?> <?=$mes['h-mes28'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/5.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes39'];?> <?=$mes['h-mes40'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/7.png" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes43'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/9.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes37'];?></div>
								</div>
							</div>
							<div class="advantages__column">
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/Saga_white.svg" alt="" style="width:75%;">
									</div>
									<div class="advantages__text"><?=$mes['h-mes33'];?> <?=$mes['h-mes34'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/4.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes35'];?> <?=$mes['h-mes36'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/6.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes31'];?> <?=$mes['h-mes32'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/atm/atm5.png" alt="" style="max-width:50px;">
									</div>
									<div class="advantages__text"><?=$mes['h-mes41'];?></div>
								</div>
								<div class="advantages__item">
									<div class="advantages__img">
										<img src="/img/advantages/10.svg" alt="">
									</div>
									<div class="advantages__text"><?=$mes['h-mes29'];?></div>
								</div>
							</div>

						</div>
						<a class="button button_red" href="plan/" title="<?=$mes['h-mes23']?>"><?=$mes['h-mes23']?> <img <?LazyLoad ("/img/arrow.png")?> alt="arrow"></a>

        </div>
			</div>


					<div <?LazyLoad ("/img/bg1.jpg", array("class"=>"content_1"))?>>
						<div class="box_content clearfix">
							<div class="column_1">
								<img <?LazyLoad ("/img/sf1.jpg", array("class"=>"wow fadeIn"))?> alt="sf1">
								<div class="content_text">
									<?=$mes['h-mes100']?>
								</div>
							</div>
							<div class="column_2">
								<div class="big_text">
									<h2 class="content_name"><?=$mes['h-mes3'];//будинок?> </h2>
									<span class="content_subname"><?=$mes['h-mes4']?> </span>
								</div>
								<div class="content_text">
									<?=$mes['h-mes5']?>
								</div>
							</div>
							<div class="column_3">
								<img <?LazyLoad ("/img/sf3.jpg", array("class"=>"img_3 wow fadeIn" ))?> alt="sf3">
								<div class="content_text">
									<?=$mes['h-mes6']?>
								</div>
								<img  <?LazyLoad ("/img/sf2.jpg", array("class"=>"img_2 wow fadeIn"))?> alt="sf2">
							</div>
						</div>
					</div>
				<!-- </div> -->
				<div class="content_3">
					<div  <?LazyLoad ("/img/flats.jpg", array("class"=>"section_one"))?>>
						<div class="box_content clearfix">

							<div class="mainflats__top">
								<h2 class="content_name"><?=$mes['h-mes20']?></h2>
								<div class="mainflats__textbox">
									<p class="content_subname">
										<?=$mes['h-mes21']?>
									</p>
									<p class="content_text">
										<?=$mes['h-mes22']?>
									</p>
								</div>
							</div>

							<div class="mainflats__box">
								<p class="content_subname">
									<?=$mes['h-mes48']?>
								</p>
								<div class="mainflats__inner">
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/1.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes49']?>
											<!-- Новобудова дуже зручно розташована – біля метро «Нивки» -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/2.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes50']?>
											<!-- Зручна інфраструктура навколо будинку та на його перших поверхах -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/3.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes51']?>
											<!-- У центр Києва звідси ви потрапите всього за 15 хвилин -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/4.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes52']?>
											<!-- Підземний паркінг на 134 автівки -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/5.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes53']?>
											<!-- Впевнений комфорт-клас забезпечується якісним будівництвом від надійного забудовника -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/6.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes54']?>
											<!-- Багато можливостей для спорту та відпочинку – як у власному парку, так і у парку «Нивки», що розташований поряд -->
										</div>
									</div>
									<div class="mainflats__item">
										<div class="mainflats__img">
											<img src="/img/mainflats/7.png" alt="">
										</div>
										<div class="advantages__text">
											<?=$mes['h-mes55']?>
											<!-- Вільне планування квартир дозволить вам створити саме такий життєвий простір, як ви бажаєте -->
										</div>
									</div>
								</div>
							</div>
							<p class="content_subname" style="text-align:center;">
								<?=$mes['h-mes56']?>
								<!-- Яку саме квартиру ви бажаєте? -->
							</p>
							<div class="mainflats__btnbox">
								<a class="button button_red" href="plan/odnokomnatnaya/" title="<?=$mes['h-mes72']?>"><?=$mes['menu14']?></a>
								<a class="button button_red" href="plan/dvuhkomnatnaya" title="<?=$mes['h-mes72']?>"><?=$mes['menu15']?></a>
								<a class="button button_red" href="plan/trehkomnatnaya" title="<?=$mes['h-mes72']?>"><?=$mes['menu16']?></a>
								<a class="button button_red" href="plan/chetirehkomnatnaya" title="<?=$mes['h-mes72']?>"><?=$mes['menu17']?></a>
							</div>

						</div>
					</div>
				</div>

      <div id="values" <?LazyLoad ("/img/values.jpg", array("class"=>"content_4 clearfix"))?>>
        <div class="content_top clearfix">
          <h2 class="content_name"><?=$mes['h-mes45'];?></h2>
          <div class="big_text">
            <span class="content_subname"><?=$mes['h-mes46'];?></span>
						<div class="content_text"><?=$mes['h-mes47']?></div>
          </div>
        </div>
        <div class="content_bottom">
          <div class="liberty">
            <p class="content_subname">CREATIVITY</p>
            <div class="grid">
							<ul class="content_text">
								<li><?=$mes['h-mes57']?> </li>
								<li><?=$mes['h-mes58'];?> </li>
								<li><?=$mes['h-mes59'];?> </li>
								<li><?=$mes['h-mes60'];?> </li>
							</ul>
            </div>
          </div>
          <div class="tech">
            <p class="content_subname">hi&minus;tech</p>
            <div class="grid">
							<ul class="content_text">
								<li><?=$mes['h-mes61']?></li>
								<!-- <li><?=$mes['h-mes62'];?></li> -->
								<li><?=$mes['h-mes63'];?></li>
								<!-- <li><?=$mes['h-mes64'];?></li> -->
								<li><?=$mes['h-mes65'];?></li>
							</ul>
            </div>
          </div>
          <div class="estet">
            <p class="content_subname">UNIVERSALITY</p>
            <div class="grid">
							<ul class="content_text">
								<li><?=$mes['h-mes66']?></li>
								<li><?=$mes['h-mes67'];?></li>
								<li><?=$mes['h-mes68'];?></li>
							</ul>
            </div>
          </div>
        </div>

					<? /** inclides/inc/form/ */ FormInclude('form_static') ?>
					<?/*copyring*/copyringAdd();?>
      </div>

	</div>
</div>


		<!-- fade map -->
		<div class="bigmap_overlay">
			<div class="bigmap_box">
				<img src="/img/bigmap_new.jpg" alt="Розташування">
				<!-- <a class="bigmap__null" target="_blank" title="Розташування SanFrancisco CREATIVE HOUSE" href="https://www.google.ru/maps/place/%D0%9A%D0%BB%D0%BE%D0%B2%D1%81%D1%8C%D0%BA%D0%B8%D0%B9+%D1%83%D0%B7%D0%B2%D1%96%D0%B7,+19,+%D0%9A%D0%B8%D1%97%D0%B2,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0/@50.4370409,30.5400974,17.75z/data=!4m5!3m4!1s0x40d4cfa8024b4ed5:0xfe7c681a83644e2c!8m2!3d50.437021!4d30.541358"></a> -->
				<div class="bigmap__close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="40" height="40"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/></svg></div>
			</div>
		</div>
			<!-- end fade map -->



		<? /*footer*/ FooterAdd($html=['head'=>'Y',
		'html'=>'

		<script> new WOW().init();</script>
		<script type="text/javascript">
       $(function() {
        $(window).scroll(function() {
          if($(this).scrollTop() != 0) {
          $("#toTop").fadeIn();
             } else {
          $("#toTop").fadeOut();
             }
             });
      $("#toTop").click(function() {
      $("body,html").animate({scrollTop:0},800);
      });
        });

				$(function(){
				  $(".bxslider").bxSlider({
				    mode: "fade",
				    captions: false,
						auto: true,
						pager: false,
						adaptiveHeight: true

				  });
				});
            </script>
		<div id="toTop"><img src="/img/button_up.png" alt="up"></div>
		'
		]);	?>





		<!-- timer -->
		 <div class="modal_window__container" style="display:none;">
					<div class="modal_window">
					<div class="modal_window__main-content">
							<span class="modal__close">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="40" height="40">
									<path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#ef4136"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#f9322e"/>
								</svg>
							</span>
						<div id="clock" class="clearfix"><p class="text_timer"><?=$mes['text_timer']?></p>
							<div><?=$mes['day_timer']?><span class="days">00</span></div>
							<div><?=$mes['hour_timer']?><span class="hours">00</span></div>
							<div><?=$mes['minute_timer']?><span class="minutes">00</span></div>
							<div><?=$mes['second_timer']?><span class="seconds">00</span></div>
						</div>
						<!-- <div class="modal_window__link"></div> -->
					</div>
		    </div>
			<style>
		#clock {margin:0px auto;
		    width:100%;
		    position:relative;
		   	padding: 14px 14px 28px;
				font-family: "AkzidenzGroteskPro-LightCn";
				box-sizing:border-box;
				font-size: 20px;
				pointer-events: none;
				text-align: center;
			}
		#clock div {
		    margin: 5px;
		    width:20%;
			text-align:center;
			display: inline-block;
		}
		#clock div span {
		    display:block;
		    width: 100%;
		    border:#f00 1px solid;
		    text-align: center;
		    font-size: 40px;
		    line-height: 60px;
		    letter-spacing: 2pt;
			margin-top: 10px;
		}
		.modal__close {
		  position: absolute;
		  right: 0;
		  top: 0px;
		  color: #aaa;
		  font-weight: bold;
			cursor: pointer;
		}
		.modal_window {
			max-width: 432px;
		}
		.text_timer {
			text-align: center;
			font-size: 34px;
			padding: 10px 0px;
		}
			</style>

		</div>
		<script type="text/javascript">
		        var deadline = 'March 23 2018';
				var t = getTimeRemaining(deadline);
		        function getTimeRemaining(endtime){
		      var t = Date.parse(endtime) - Date.parse(new Date());
		      var seconds = Math.floor( (t/1000) % 60 );
		      var minutes = Math.floor( (t/1000/60) % 60 );
		      var hours = Math.floor( (t/(1000*60*60)) % 24 );
		      var days = Math.floor( t/(1000*60*60*24) );
		      return {
		       'total': t,
		       'days': days,
		       'hours': hours,
		       'minutes': minutes,
		       'seconds': seconds
		      };
		    }
		function initializeClock(id, endtime){
		 var clock = document.getElementById(id);
		  var daysSpan = clock.querySelector('.days');
		  var hoursSpan = clock.querySelector('.hours');
		  var minutesSpan = clock.querySelector('.minutes');
		  var secondsSpan = clock.querySelector('.seconds');
		 var timeinterval = setInterval(function(){
			 t = getTimeRemaining(deadline);
			daysSpan.innerHTML = t.days;
		  hoursSpan.innerHTML = t.hours;
		  minutesSpan.innerHTML = t.minutes;
		  secondsSpan.innerHTML = t.seconds;

		 },1000);
		 if(t.total<=0){
			  clearInterval(timeinterval);
		  }else{
			$('.modal_window__container').attr('style', 'display::block;');
		  }
		}
		initializeClock('clock', deadline);

		$('.modal__close').click(function(){
			$('.modal_window__container').fadeOut(1000);
		});
		</script>
				<!-- end timer -->
