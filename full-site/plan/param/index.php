<?include_once($_SERVER['DOCUMENT_ROOT'].'/includes/pages/param.php');?>

<?

/*head*/ HeadAdd( $html=['head'=>'Y', 'robots'=>'index, follow', 'title'=>'','description'=>'','html'=>'
     <link rel="stylesheet" href="/css/appart.css">
    <link rel="stylesheet" type="text/css" href="/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/css/ion.rangeSlider.skinHTML5.css">']);	?>
	    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>
      <div class="content tablet_page content_param">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?H1page()?></h1></div>

          <?=$mes['param-text'.$sgl_room];?>


          <div class="param_container1 <?if ($sgl_room>0){ echo 'cl';}?>">
            <div class="param_container clearfix">
							<!-- <a class="close" href="javascript:history.go(-1)" mce_href="javascript:history.go(-1)"><img src="/img/close.svg" alt="close" width="40px"></a> -->
              <div class="checkbox__box">



                <div class="checkbox__item checkboxes__building">
                  <div class="chckboxes__heading"><?=$mes['pl-mes1']?></div>
                  <input id="checkbox__building1" class="checkbox__building filter__checkbox" type="checkbox" value="1"/>
                  <label for="checkbox__building1" class="checkbox__text">1</label>
                  <input id="checkbox__building2" class="checkbox__building filter__checkbox" type="checkbox" value="2"/>
                  <label for="checkbox__building2" class="checkbox__text">2</label>
                </div>

                <div class="checkbox__item checkboxes__section">
                  <div class="chckboxes__heading"><?=$mes['pl-mes2']?></div>
                  <input id="checkbox__section1" class="checkbox__section filter__checkbox" type="checkbox" value="1"/>
                  <label for="checkbox__section1" class="checkbox__text">1</label>
                  <input id="checkbox__section2" class="checkbox__section filter__checkbox" type="checkbox" value="2"/>
                  <label for="checkbox__section2" class="checkbox__text">2</label>
                  <input id="checkbox__section3" class="checkbox__section filter__checkbox" type="checkbox" value="3"/>
                  <label for="checkbox__section3" class="checkbox__text">3</label>
                </div>

                <div class="checkbox__item checkboxes__rooms">
                  <div class="chckboxes__heading"><?=$mes['pl-mes4']?></div>
                  <input id="checkbox__room1" class="checkbox__room filter__checkbox" type="checkbox" value="1"/>
                  <label for="checkbox__room1" class="checkbox__text">1</label>
                  <input id="checkbox__room2" class="checkbox__room filter__checkbox" type="checkbox" value="2"/>
                  <label for="checkbox__room2" class="checkbox__text">2</label>
                  <input id="checkbox__room3" class="checkbox__room filter__checkbox" type="checkbox" value="3"/>
                  <label for="checkbox__room3" class="checkbox__text">3</label>
                  <input id="checkbox__room4" class="checkbox__room filter__checkbox" type="checkbox" value="4"/>
                  <label for="checkbox__room4" class="checkbox__text">4</label>
                </div>

              </div>
              <div class="range_box">
              	<?	foreach($sort as $key=>$t){?>
                  <div class="range__item">
                	 <span><h2><?=$mes['par-mes-'.$t]?></h2></span>
                   <input
                     class="slider__currentMin slider__currentMin<?=$t?>"
                     type="number"
                     min="<?=$Rest[$t]['min']?>"
                     value="<?=$Rest[$t]['min']?>"
                     max="<?=$Rest[$t]['max']?>">
                   <input
                     class="slider__currentMax slider__currentMax<?=$t?>"
                     type="number"
                     min="<?=$Rest[$t]['min']?>"
                     value="<?=$Rest[$t]['max']?>"
                     max="<?=$Rest[$t]['max']?>">
                	 <input type="text" id="<?=$t?>"  value="" />
                	 <input type="hidden" id="<?=$t?>_min_max" value="<?echo $Rest[$t]['min'].'/'.$Rest[$t]['max']?>"/>
                 </div>

                <?}?>
              </div>

              <input class="button" type="submit" value="Шукати">
              <a class="reset-button js-reset-filter-button" href="#" id="reset_button"><?=$mes['par-mes9']?></a>

            </div>
          </div><!--end param container -->


        <ul class="result__list">
		      <?
            foreach($REZULT as $key=>$s){
              $s['img']= str_replace('.png', "",  $s['img']);
              $s['img']= str_replace('.jpg', "",  $s['img']);
              $url="$url_link_shlashbefore/plan{$s['buld']}/sections{$s['sec']}/floor{$s['floor']}/flat{$s['number']}_{$s['id']}/";
              $img_flat='/img/houses/house'.$s['buld'].'_png_white/'.$s['img'].'.png';
			    ?>
            <li class="sort result__item"
                data-floor='<?=$s['floor']?>'
                data-area='<?=$s['all_room']?>'
                data-room='<?=$s['kim']?>'
                data-sec='<?=$s['sec']?>'
                data-build='<?=$s['buld']?>'
                style='' >
                <div class="result__img">
                  <img src="<?=$img_flat?>" <?AltImgAdd($mes['fl-mes1'].' '.$REZULT2['number'])?>>
                </div>
                <table style="width:100%; line-height:1.5;">
                  <tr><td><?=$mes['par-mes1']?></td><td><?=$s['buld']?></td>
                  </tr>
                  <tr><td><?=$mes['pl-mes14']?></td><td><?=$s['floor']?></td>
                  </tr>
                  <tr><td><?=$mes['pl-mes3']?></td><td><?=$s['number']?></td>
                  </tr>
                  <tr><td><?=$mes['par-mes2']?></td><td><?=$s['kim']?></td>
                  </tr>
                  <tr><td><?=$mes['par-mes-area']?></td><td><?=$s['all_room']?></td>
                  </tr>
                </table>
              <a class="button" href="<?=$url;?>"><?=$mes['par-mes8']?></a>
            </li>
			 <?}?>
        </ul>

        <div class="load-more-container">
          <a class="button js-load-more-button" href="#"><?=$mes['par-mes7']?></a>
        </div>

          <!-- <div class="results_box">
            <img class="loader" src="/img/bx_loader.gif" alt="Loading...">
            <table class="table_fixed">
              <thead>
                <tr>
                  <th><?=$mes['par-mes1']?></th>
                  <th><?=$mes['par-mes-floor']?></th>
                  <th>№</th>
                  <th><?=$mes['par-mes2']?></th>
                  <th><?=$mes['par-mes-area']?></th>
                </tr>
              </thead>
            </table>
            <table class="table_scroll">

              <?
              foreach($REZULT as $key=>$s){
                $url="$url_link_shlashbefore/plan{$s['buld']}/sections{$s['sec']}/floor{$s['floor']}/flat{$s['number']}_{$s['id']}/"; ?>
                <a href="<?=$url?>">
                  <tr
                  onclick='document.location.href = "<?=$url?>";'
                  class="sort"
                  data-floor='<?=$s['floor']?>'
                  data-area='<?=$s['all_room']?>'
                  data-room='<?=$s['kim']?>'
                  style='' >
                  <td><?=$s['buld']?></td>
                  <td><?=$s['floor']?></td>
                  <td><?=$s['number']?></td>
                  <td><?=$s['kim']?></td>
                  <td><?=$s['all_room']?></td>
                </tr>
              </a>
            <? } ?>
          </table>
          <div class="js-no-results no-results no-results_hidden">
            <p><?=$mes['par-mes4']?></p>
            <a class="button js-reset-filter-button" id="reset"><?=$mes['par-mes5']?></a>
            <p><?=$mes['par-mes6']?></p>
            <a class="wowoo-link" href="#"><div class="tel">+38 (044) 223-59-89</div></a>
          </div>
        </div> -->
        <!--end result-box -->
        </div>
      </div>


      <style media="screen">

      input[type="submit"] {
        outline: none;
      }
      .load-more-container {
        text-align: center;
      }
      .content_param{
        background-attachment: fixed;
      }
      .param_container{
        font-family: "StTransmission-300Light";
        text-align: center;
        padding-bottom: 30px;
        font-size: 18px;
      }
      .param_container1{
        height: auto;
      }
        .range_box{
          width: 100%;
          margin: 0;
          padding: 20px 50px 0;
          float: none;
          display: flex;
          justify-content: space-between;
          display: -webkit-flex;
          -webkit-justify-content: space-between;
          box-sizing: border-box;
        }
        .range__item{
          width: 42%;
        }
        .checkbox__box{
          display: flex;
          justify-content: space-between;
          display: -webkit-flex;
          -webkit-justify-content: space-between;
          padding: 60px 60px 30px;
        }
        .checkbox__item{
          text-align: center;
        }
        .filter__checkbox {
          display: none;
        }
        .filter__checkbox:checked + label {
          background-color: red;
        }
        .checkbox__text{
          display: inline-block;
          border: 2px solid #666;
          padding: 8px;
          text-align: center;
          width: 16px;
          margin: 10px;
          cursor: pointer;
        }
        .checkbox__text:hover{
          border-color: #ef4136;
          box-shadow: #ef4136 0px 0px 10px -1px;
          transition: 0.4s;
          -webkit-transition: 0.4s;
        }
        .irs {
            height: 60px;
        }
        input[type="number"]{
          width: 38%;
          display: inline-block;
          margin: 10px;
          margin-bottom: 100px;
          background: rgba(0,0,0,0);
          border: 2px solid #666;
          outline: none;
          color: white;
          text-align: center;
          padding: 4px 0;
          font-size: 16px;
        }
        input[type="number"]:active,
        input[type="number"]:focus{
          border-color: #ef4136;
          box-shadow: #ef4136 0px 0px 10px -1px;
          transition: 0.4s;
          -webkit-transition: 0.4s;
        }
        input[type="submit"]{
          -webkit-appearance: none;
          background: inherit;
          width: 100%;
          max-width: 200px;
          text-align: center;
          margin-right: 40px;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
        }
        input[type="submit"]:hover{
          border-color: #ef4136;
          box-shadow: #ef4136 0px 0px 10px -1px;
          transition: 0.4s;
          -webkit-transition: 0.4s;
        }
        .reset-button{
          color: inherit;
          text-decoration: none;
          font-size: 14px;
          letter-spacing: 1px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
        }
        .result__list{
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          display: -webkit-flex;
          -webkit-flex-wrap: wrap;
          -webkit-justify-content: space-between;
          width: 90%;
          margin: 0 auto;
          /* padding: 50px; */
        }
        .result__item{
          width: 24%;
          border: 1px solid #666;
          padding: 20px;
          margin-bottom: 12px;
          box-sizing: border-box;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          display: -webkit-flex;
          -webkit-flex-direction: column;
          -webkit-justify-content: space-between;
        }
        .result__item:hover{
          box-shadow: rgba(0,0,0,0.8) 0px 0px 10px -1px;
          transition: 0.4s;
          -webkit-transition: 0.4s;
        }
        .result__item .button{
          width: 100%;
          box-sizing: border-box;
          text-align: center;
          margin-top: 20px;
        }
        .result__img{
          width: 90%;
          margin: 10px auto;
          box-sizing: border-box;
        }
        .result__img img{
          width: 100%;
          height: auto;
        }
        .range__item:nth-child(2){
          display: none;
        }
        @media only screen and (max-width: 1200px){
          .content_param .range_box {
            width: 100%;
            padding-top: 0px;
          }
        }
        @media only screen and (max-width:960px) {
          .checkbox__text {
            margin: 4px;
          }
          input[type="number"] {
            margin: 10px 4px 100px;
          }
          .result__item {
              width: 32%;
            }
        }
        @media only screen and (max-width:768px){
          .checkbox__box{
            padding: 24px;
            flex-direction: column;
            -webkit-flex-direction: column;
          }
          .checkbox__item{
            margin-bottom: 12px;
          }
          .range_box{
            flex-direction: column;
            -webkit-flex-direction: column;
          }
          .range__item{
            width: 100%;
          }
          input[type="submit"]{
            display: block;
            margin: 12px auto 30px;
          }
          .result__list{
            width: 96%;
            margin-top: 12px;
          }
          .result__item {
            width: 49%;
            padding: 20px 10px;
          }


        }
      </style>
    </div>
<? /*footer*/ FooterAdd($html=['html'=>'<script src="/js/ion.rangeSlider.js"></script><script src="/js/range.js"></script>', 'head'=>'Y']);	?>
