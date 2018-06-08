<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>
<link rel="stylesheet" href="/css/appart.css">
    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_social">
        <div class="content_wrap clearfix">
          <h1 class="content_name"><?=$mes['social-h1']?></h1>
          <div class="content_text"><?=$mes['soc-mes1']?></div>
          <div class="content_subname">
            <?=$mes['soc-mes2']?>
          </div>
          <div class="social__box">
            <div class="social__item">
              <p class="social__name"><?=$mes['soc-mes3']?></p>
              <div class="social__img">
                <i class="icon-soc2"></i>
              </div>
            </div>
            <div class="social__item">
              <p class="social__name"><?=$mes['soc-mes4']?></p>
              <div class="social__img">
                <i class="icon-soc3"></i>
              </div>
            </div>
            <div class="social__item">
              <p class="social__name"><?=$mes['soc-mes5']?></p>
              <div class="social__img">
                <i class="icon-soc1"></i>
              </div>
            </div>

          </div>
          <div class="content_subname">
            <?=$mes['soc-mes6']?>
          </div>


        </div>
		<div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
