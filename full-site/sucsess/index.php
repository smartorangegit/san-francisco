<? /*head*/ HeadAdd($html=['description'=>'N','head'=>'Y']);	?>
  <style media="screen">

  .content_wrap{
    text-align: center;
  }
  /*#code:hover { text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed; }*/
  #code {
    font-size: 80px;
    font-family: "AkzidenzGroteskPro-LightCn";
    text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed;
  }
  /*#code span{
    animation: lower 10s linear infinite;
  }*/
  /*@keyframes upper {
    0%,19.999%,22%,62.999%,64%, 64.999%,70%,100% {
      opacity:.99; text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
    }
    20%,21.999%,63%,63.999%,65%,69.999% {
      opacity:0.4; text-shadow: none;
    }
  }*/
  /*@keyframes lower {
    0%,12%,18.999%,23%,31.999%,37%,44.999%,46%,49.999%,51%,58.999%,61%,68.999%,71%,85.999%,96%,100% {
      opacity:0.99; text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
    }
    19%,22.99%,32%,36.999%,45%,45.999%,50%,50.99%,59%,60.999%,69%,70.999%,86%,95.999% {
      opacity:0.4; text-shadow: none;
    }
  }*/
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
          <!-- <div class="content_name"> Ваша заявка успішно відправлена!</div> -->
          <div class="box_404">
            <p id="code"><?=$mes['succes-mes1'];//Ваша заявка успішно відправлена!?></p>

          </div>
          <div class="content_text">
		         <?=$mes['succes-mes2'];?>
          </div>
          <div class="content_subname"><a href="/"><?=$mes['succes-mes3'];//Ваша заявка успішно відправлена!?> </a></div>

        </div>

      </div>
    </div>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
