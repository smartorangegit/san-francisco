<? /*head*/ HeadAdd($html=['description'=>'N','head'=>'Y']);	?>
  <style media="screen">

  .content_wrap{
    text-align: center;
  }
  #code {
    font-size: 80px;
    margin: 20px auto;
    font-family: "AkzidenzGroteskPro-LightCn";
    text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed;
  }
  .content_subname a{
    color: white;
    text-decoration: none;
    transition: 0.35s;
    -webkit-transition: 0.35s;
    position: relative;
    display: block;
  }


  .content_subname a:hover{
    text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed;
  }
  @media only screen and (max-width: 1024px) {
    #code {
      font-size: 30px;
    }
  }
  </style>
    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_webcam">
        <div class="content_wrap">
          <div class="box_404">
            <p id="code"><?=$mes['fail-mes1'];//Ваша заявка успішно відправлена!?></p>

          </div>
          <!-- <div class="content_text">
		         <?=$mes['success-mes2'];?>
          </div> -->
          <div class="content_subname"><?=$mes['fail-mes2'];//Ваша заявка успішно відправлена!?></div>


          <div class="form" style="display: block; position: static;  margin-top: 30px;">
            <!-- <img id="formclose" src="/img/close.svg" alt="close" width="40"> -->
            <div class="content_name"><?=$mes['callback-mes1'];?></div>
            <div class="content_text"><?=$mes['callback-mes2'];?></div>
            <div class="form_wrap">
              <form class="" action="#" method="post">
                <div class="input">
                  <input type="text" name="text" value="" placeholder="<?=$mes['callback-mes3'];?>">
                </div>
                <div class="input">
                  <input type="tel" name="tel" value="" placeholder="<?=$mes['callback-mes4'];?>">
                </div>
                <div class="input">
                  <input type="email" name="email" value="" placeholder="E-MAIL">
                </div>
                <div class="input">
                  <input class="button" type="submit" name="" value="<?=$mes['callback-mes5'];?>">
                </div>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
