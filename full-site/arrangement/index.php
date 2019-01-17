<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>

    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_arrangment">
        <div class="content_wrap clearfix">
          <h1 class="content_name"><?=$mes['arrangement-h1']?></h1>

<?php /* include_once('includes/inc/form/form_new_v2.php') */?>
<?php /* include_once('includes/inc/form/form_new_v3.php') */?>



          <div class="arrinfo__box">
            <div class="content_subname"><?=$mes['arr-mes1']?></div>
            <div class="content_text"><?=$mes['arr-mes2']?></div>
          </div>
          <div class="arrange__box">
            <div class="arrange__item">
              <div class="arr__img">
                <img src="/img/arr/arr1.png" alt="<?=$mes['arr-mes3']?>">
              </div>
              <div class="arr__name"><?=$mes['arr-mes3']?></div>
            </div>
            <div class="arrange__item">
              <div class="arr__img">
                <img src="/img/arr/arr2.png" alt="<?=$mes['arr-mes4']?>">
              </div>
              <div class="arr__name"><?=$mes['arr-mes4']?></div>
            </div>
            <div class="arrange__item">
              <div class="arr__img">
                <img src="/img/arr/arr3.png" alt="<?=$mes['arr-mes5']?>">
              </div>
              <div class="arr__name"><?=$mes['arr-mes5']?></div>
            </div>
            <div class="arrange__item">
              <div class="arr__img">
                <img src="/img/arr/arr4.png" alt="<?=$mes['arr-mes6']?>">
              </div>
              <div class="arr__name"><?=$mes['arr-mes6']?></div>
            </div>

          </div>

        </div>
		<!-- <div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div> -->
       <?/*copyring*/copyringAdd();?>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
