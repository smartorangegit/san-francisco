<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>

    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_arrangment content_g-plan">
        <div class="content_wrap clearfix">
          <h1 class="content_name g_name"><?=$mes['general-plan-h1'];?></h1>
		  <div class="content_subname"><?=$mes['general-plan-hint'];?></div>

<?php /* include_once('includes/inc/form/form_new_v2.php') */?>
<?php /* include_once('includes/inc/form/form_new_v3.php') */?>


            <div class="g-plan">
              <div class="g-plan_left">
                <img <?LazyLoad("/img/general-plan/main-general-plan.png");?>  alt="<?=$mes['general-plan-h1'];?>">
                <div data-image="ploscha_2" class="interactive_link int_link1"><?=$mes['general-plan-text-1'];?></div>
                <div data-image="galyavina-v-centri" class="interactive_link int_link2"><?=$mes['general-plan-text-2'];?></div>
                <div data-image="terasa-v-centri" class="interactive_link int_link3"><?=$mes['general-plan-text-3'];?></div>
                <div data-image="dityachij-majdanchik" class="interactive_link int_link4" alt=""><?=$mes['general-plan-text-4'];?></div>
                <div data-image="misce-vidpochinku-nyzhne" class="interactive_link int_link5"><?=$mes['general-plan-text-5'];?></div>
              </div>
              <div class="g-plan_right">
                <div class="four_interactive_select wow bounceInRight g-plan__image-wrap" data-wow-delay="0.5ms">
                  <img <?LazyLoad("/img/general-plan/slides/dityachij-majdanchik.jpg");?> alt="blag">
                </div>
              </div>
              <div class="g-arrow  shake" data-wow-duration="2s">
                <img <? LazyLoad("/img/general-plan/arrow.png"); ?> alt="arr">
              </div>
            </div>
        </div>
		<!-- <div class="bottom_form"><a id="callform1" class="button callback"  href="#">замовити дзвінок</a></div> -->
      </div>
    </div>
	<style>
  .content.content_g-plan .content_wrap {
    max-width: none;
  }
  .g_name {
    font-family: "AkzidenzGroteskPro-LightCn";
    text-transform: none;
    text-align: center;
    font-size: calc(52/16*1rem);
    margin-bottom: 27px;
    letter-spacing: 3px;
  }
  .g-plan {
    position: relative;
    display: flex;
    justify-content: space-between;
  }
  .g-plan_left {
    position: relative;
    width: calc(563/957*100%);
    overflow: hidden;
  }
  .g-plan_left img {
    width: 100%;
    height: 100%;
  }
  .g-plan_right {
    position: relative;
    width: calc(364/957*100%);
    overflow: hidden;
  }

  .g-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: calc(350/964*100%);
    width: 60px;
    height: 60px;
    z-index: 10;
  }

  .g-plan__image-wrap {
    height: 100%;
    width: 100%;
  }
  .g-plan__image-wrap img {
    width: auto;
    height: 100%;
  }

  @media screen and (max-width: 1000px) {
    .g-plan {
      flex-direction: column;
      align-items: center;
    }

    .g-plan_left {
      width: 80%;
      margin-bottom: 20px;
    }
    .g-plan_right {
      width: 80%;
    }

    .g-plan__image-wrap img {
      width: 100%;
    }
    .g-arrow {
      display: none;
    }
  }

  .interactive_link::before {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    display: block;
    top: 2px;
  }

  .int_link1::before {left: -22px;background-image: url('../../img/general-plan/img_1.png');} 
  .int_link2::before {left: -22px;background-image: url('../../img/general-plan/img_2.png');} 
  .int_link3::before {right: -22px;background-image: url('../../img/general-plan/img_3.png');} 
  .int_link4::before {left: -22px;background-image: url('../../img/general-plan/img_4.png');} 
  .int_link5::before {right: -22px;background-image: url('../../img/general-plan/img_5.png');} 


.content_arrangment {
	background: url(/img/atm1.jpg) center no-repeat;
	background-size: cover;
	padding-top: 60px;
	box-sizing: border-box;
}

.four_interactive {
  width: 1100px;
  margin: 0 auto;
}


/*.four_interactive_main {
  width: 390px;
  float: left;
  position: relative;
}

.four_interactive_main img {
  width: 100%;
}*/


.inter_arrow {
  float: left;
  text-align: center;
  margin-left: 52px;
  margin-top: 111px;
}


/*.four_interactive_select {
  width: 530px;
  float: right;
}

.four_interactive_select img {
  width: 100%;
}*/


.interactive_link {
  position: absolute;
  display: inline-block;
  padding: 6px 10px;
  background: #ef4136;
  font-size: 12px;
  /* border-radius: 12px; */
  cursor: pointer;
}


.int_link1 {
    top: 16.5%;
    left: 49.7%;
}

.int_link2 {
    top: 41.3%;
    left: 40.4%;
}


.int_link3 {
  top: 52%;
  left: 22.3%;
}

.int_link4 {
    top: 50%;
    left: 56.4%;
}


.int_link5 {
    top: 83.3%;
    left: 36.3%;
}

@media screen and (max-width: 768px) {

.int_link1 {
	top: 15.2%;
    left: 49.7%;
}

.int_link2 {
    top: 39%;
    left: 40.4%;
}


.int_link3 {
	top: 50%;
    left: 15.3%;
}

.int_link4 {
    top: 49%;
    left: 56.4%;
}


.int_link5 {
	top: 81.3%;
    left: 29.3%;
}
}

@media screen and (max-width: 388px) {

.int_link1 {
	top: 12.2%;
    left: 49.7%;
}

.int_link2 {
	top: 35%;
    left: 40.4%;
}


.int_link3 {
	top: 50%;
    left: 2.3%;
}

.int_link4 {
	top: 49%;
    left: 56.4%;
}


.int_link5 {
    top: 81.3%;
    left: 15.3%;
}
}

@media screen and (max-width: 320px) {

/* .int_link1 {
	top: 12.2%;
    left: 49.7%;
}

.int_link2 {
	top: 35%;
    left: 40.4%;
}


.int_link3 {
	top: 50%;
    left: 2.3%;
}

.int_link4 {
	top: 49%;
    left: 56.4%;
}
 */

.int_link5 {
    top: 78.3%;
    left: 5.3%;
}
}
@-webkit-keyframes shake{0%, 100%{-webkit-transform:translateX(0);transform:translateX(0);}
10%, 30%, 50%, 70%, 90%{-webkit-transform:translateX(-10px);transform:translateX(-10px);}
20%, 40%, 60%, 80%{-webkit-transform:translateX(10px);transform:translateX(10px);}
}
@keyframes shake{0%, 100%{-webkit-transform:translateX(0);-ms-transform:translateX(0);transform:translateX(0);}
10%, 30%, 50%, 70%, 90%{-webkit-transform:translateX(-10px);-ms-transform:translateX(-10px);transform:translateX(-10px);}
20%, 40%, 60%, 80%{-webkit-transform:translateX(10px);-ms-transform:translateX(10px);transform:translateX(10px);}
}
.shake{-webkit-animation-name:shake;animation-name:shake;animation-duration: 2s; animation-fill-mode: both;}
@-webkit-keyframes swing{20%{-webkit-transform:rotate(15deg);transform:rotate(15deg);}
40%{-webkit-transform:rotate(-10deg);transform:rotate(-10deg);}
60%{-webkit-transform:rotate(5deg);transform:rotate(5deg);}
80%{-webkit-transform:rotate(-5deg);transform:rotate(-5deg);}
100%{-webkit-transform:rotate(0deg);transform:rotate(0deg);}
</style>
<script>
// изменение картинки в окошке "Благоустройство"
$('.interactive_link').hover(function(){
  var image = this.dataset.image;
  $('.four_interactive_select img').attr('src','/img/general-plan/slides/'+ image + '.jpg');
});
</script>	
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
