<?/*head*/ HeadAdd();	?>

    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_about">
        <div class="content_wrap clearfix">
          <h1 class="content_name"><?H1page()?></h1>


          <div class="about__box">
            <div class="about__item">
              <div class="about__img">
                <i class="icon-location"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Розташування:</p>
                <p class="content_text">Київ, пр. Перемоги, 67 (Святошинський район).</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab2"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Кількість під’їздів:</p>
                <p class="content_text">5</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-metro_l"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Найближча станція метро:</p>
                <p class="content_text">Нивки (безпосередньо біля будинку)</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab4"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Кількість квартир:</p>
                <p class="content_text">269</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab5"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Клас житла</p>
                <p class="content_text">Комфорт</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab6"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Кількість паркомісць:</p>
                <p class="content_text">134 (підземний паркінг)</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab7"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Кількість будинків:</p>
                <p class="content_text">2</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab8"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Введення в експлуатацію:</p>
                <p class="content_text">2-й квартал 2019 року.</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab9"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Кількість поверхів:</p>
                <p class="content_text">9 та 16</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <img src="/img/Saga_white.svg" alt="Saga Development" style="width:74px;">
              </div>
              <div class="about__info">
                <p class="content_subname">Забудовник:</p>
                <p class="content_text">Компанія Saga Development</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab11"></i>
              </div>
              <div class="about__info">
                <p class="content_subname">Технологія будівництва:</p>
                <p class="content_text">Монолітно-каркасна, із цегляними міжквартирними стінами та утепленням фасаду мінеральною ватою.</p>
              </div>
            </div>

          </div>
          <a href="/plan" class="button button_red">обрати квартиру</a>

        </div>
      </div>
    </div>
    <style media="screen">
    .content_about{
      background: url('/img/about.jpg') center no-repeat;
      background-size: cover;
    }
    .content_about .content_text{
      padding: 0;
      color: white;
      line-height: 20px;
    }
    .content_about .button{
      display: block;
      margin: 40px auto;
      padding: 20px 50px;
      font-family: "AkzidenzGroteskPro-LightCn";
      text-align: center;
      font-size: 20px;
    }
    .about__box,
    .content_about h1{
      max-width: 1080px;
      width: 100%;
      margin: 40px auto;
      padding: 0 10px;
      box-sizing: border-box;
    }
    .about__box{
      display: flex;
      display: -webkit-flex;
      flex-wrap: wrap;
      -webkit-flex-wrap: wrap;
      justify-content: space-between;
      -webkit-justify-content: space-between;
    }
    .about__item{
      background: rgba(0,0,0,.7);
      width: 48%;
      margin-bottom: 6px;
      display: flex;
      display: -webkit-flex;
      align-items:center;
      -webkit-align-items: center;
      box-sizing: border-box;
      padding: 30px 0;
    }
    .about__item:last-child{
      width: 100%;
    }
    .about__img{
      width: 140px;
      min-width: 140px;
      text-align: center;
    }
    .about__info{
      padding-right: 30px;
      box-sizing: border-box;
    }
    @media only screen and (max-width:1024px) {
      .about__img {
        width: 90px;
        min-width: 90px;
        }
      .content_about .button{
        width: 100%;
        max-width: 280px;
        box-sizing: border-box;
      }

    }
    @media only screen and (max-width:768px) {
      .content_about .content_subname{
        font-size: 18px;
      }
      .content_about .content_text{
        font-size: 16px;
      }
      .about__box,
      .content_about h1 {
        padding: 0 20px;
      }
      .about__item{
        width: 100%;
        padding: 18px 0;
      }
      .about__info{
        padding-right: 18px;
      }
    }


    </style>
<? /*footer*/ FooterAdd();	?>
