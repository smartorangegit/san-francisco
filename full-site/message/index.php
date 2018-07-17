<? /*head*/ HeadAdd($html=['description'=>'N','head'=>'Y', 'robots'=>'noindex, nofollow', 'html'=>'<link rel="stylesheet" href="/css/building.css">']);	?>
  <style media="screen">

  .content_wrap{
    text-align: center;
  }

   .content_webcam .message-wrap {
   		margin-bottom: 0;
   		display: flex;
   	justify-content: center;
   	align-items: center;
   	flex-direction: column;
   }
   .bx-wrapper {
    margin: 20px auto 0px;
    padding: 0 20px;
    }
    .content_name{
      margin-bottom: 20px;
    }


  </style>
    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_webcam message_flex">
        <div class="content_wrap message-wrap">
          <div class="content_name">
            <?=$mes['message-title'];?>
          </div>
          <div class="content_subname">
            <?=$mes['message-text'];?>
          </div>
          <p class="content_text">
            <?=$mes['message-text1'];?>
          </p>
          <div class="developer_box clearfix">


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
        </div>

      </div>
    </div>
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

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
