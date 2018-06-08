<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>
<link rel="stylesheet" href="/css/appart.css">
    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_document">
        <div class="content_wrap clearfix">
          <div class="document__outer-container">
            <h1 class="content_name"><?=$mes['doc-mes1']?></h1>

            <div class="document__row">
            <div class="document__inner-container">
                <h2 class="document__heading">ВД:</h2>
                <ul>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/VD/vd1.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/VD/vd1_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        МУО
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="document__inner-container">
                <h2 class="document__heading"><?=$mes['doc-mes2']?></h2>
                <ul>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/Permission/perm1.JPG">
                      <div class="document__image">
                        <img src="/img/documentation/Permission/perm1.JPG" alt="">
                      </div>
                      <div class="document__text">
                        Дозвіл на вик будробіт 22.09.2017
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div> <!--document__row-->

            <div class="document__row">
              <div class="document__inner-container">
                <h2 class="document__heading"><?=$mes['doc-mes3']?></h2>
                <ul>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/earth_docs/earth1.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/earth_docs/earth1_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        Витяг з Держреєстру речових прав з-д 14.07.2017
                      </div>
                    </a>
                  </li>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/earth_docs/earth2.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/earth_docs/earth2_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        Договір тимчас.користув. зем.діл. 1999
                      </div>
                    </a>
                  </li>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/earth_docs/earth3.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/earth_docs/earth3_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        Рішення Київради про з-д 1999 рік
                      </div>
                    </a>
                  </li>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/earth_docs/earth4.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/earth_docs/earth4_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        Перевод ділянки під житл.забудову
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="document__inner-container">
                <h2  class="document__heading"><?=$mes['doc-mes4']?></h2>
                <ul>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/expertise/exp1.pdf">
                    <div class="document__image">
                      <img src="/img/documentation/expertise/exp1_thumb.jpg" alt="">
                    </div>
                    <div class="document__text">
                      Експерний звіт додаток
                    </div>
                    </a>
                  </li>
                  <li class="document__item">
                    <a target="_blank" href="/pdf_docs/expertise/exp2.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/expertise/exp2_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                      Експертний звіт за проектом
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div> <!--document__row-->
            <div class="document__row">
              <div class="document__inner-container">
                <h2 class="document__heading"><?=$mes['doc-mes5']?></h2>
                <ul>
                  <li  class="document__item">
                    <a target="_blank" href="/pdf_docs/invest_docs/invest1.pdf">
                      <div class="document__image">
                        <img src="/img/documentation/invest_docs/invest1_thumb.jpg" alt="">
                      </div>
                      <div class="document__text">
                        договір про інвест. Кармен Трейдінг + Оболоньторг 2017
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div><!--document__row-->
          </div> <!--document__outer-container-->
        </div>
		<div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div>

    <?/*copyring*/copyringAdd();?>
      </div>
    </div>
    <style>
    .document__outer-container {
      font-family: "Kazmann";
      color: #fff;
      font-size: 0px;
      margin-top: 30px;
    }
    .document__inner-container {
      display: inline-block;
      width: 50%;
      vertical-align:top;
    }
    .document__item {
      display: inline-block;
      padding: 10px;
      width: 25%;
      vertical-align:top;
    }
    .document__item a {
      color: #d4d4d4;
    }
    .document__heading {
      font-size: 30px;
    }
    .document__image img{
      max-width: 100%;
    }
    .document__text {
      font-size: 24px;
      color: #d4d4d4;
    }
    @media only screen and (max-width: 1000px) {
      .document__item {
        width: 40%;
      }
    }
    @media only screen and (max-width: 768px) {
      .document__inner-container {
        width: 100%;
      }
      .document__item {
        width: 100%;
      }
    }
    </style>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
