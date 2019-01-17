<?/*head*/ HeadAdd();	?>

    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_about">
        <div class="content_wrap clearfix">
          <h1 class="content_name"><?H1page()?></h1>

          <?php include_once('includes/inc/form/form_new.php')?>


          <div class="about__box">
            <div class="about__item">
              <div class="about__img">
                <i class="icon-location"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes1']?></p>
                <p class="content_text"><?=$mes['ab-mes2']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab2"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes3']?></p>
                <p class="content_text">5</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-metro_l"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes4']?></p>
                <p class="content_text"><?=$mes['ab-mes5']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab4"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes6']?></p>
                <p class="content_text">355</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab5"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes7']?></p>
                <p class="content_text"><?=$mes['ab-mes8']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab6"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes9']?></p>
                <p class="content_text"><?=$mes['ab-mes10']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab7"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes11']?></p>
                <p class="content_text">2</p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab8"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes12']?></p>
                <p class="content_text"><?=$mes['ab-mes13']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab9"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes14']?></p>
                <p class="content_text"><?=$mes['ab-mes15']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <img src="/img/Saga_white.svg" alt="Saga Development" style="width:74px;">
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes16']?></p>
                <p class="content_text"><?=$mes['ab-mes17']?></p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__img">
                <i class="icon-ab11"></i>
              </div>
              <div class="about__info">
                <p class="content_subname"><?=$mes['ab-mes18']?></p>
                <p class="content_text"><?=$mes['ab-mes19']?></p>
              </div>
            </div>

          </div>
          <a href="/plan" class="button button_red"><?=$mes['menu21']?></a>

        </div>
         <?/*copyring*/copyringAdd();?>
      </div>
    </div>
    <style media="screen">
    .content_about{
      background: url('/img/about.jpg') center no-repeat;
      background-size: cover;
    }
    .content_about .content_wrap{
      min-height: 100%;
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
