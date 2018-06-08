<? /*head*/ HeadAdd($html=['description'=>'N','head'=>'Y', 'robots'=>'noindex, nofollow']);	?>
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

  #code:hover { text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed; }
  #code {
    font-size: 20rem;
    font-family: "AkzidenzGroteskPro-LightCn";
    text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed;
  }
  #code span{
    animation: lower 10s linear infinite;
  }
  @keyframes upper {
    0%,19.999%,22%,62.999%,64%, 64.999%,70%,100% {
      opacity:.99; text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
    }
    20%,21.999%,63%,63.999%,65%,69.999% {
      opacity:0.4; text-shadow: none;
    }
  }
  @keyframes lower {
    0%,12%,18.999%,23%,31.999%,37%,44.999%,46%,49.999%,51%,58.999%,61%,68.999%,71%,85.999%,96%,100% {
      opacity:0.99; text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
    }
    19%,22.99%,32%,36.999%,45%,45.999%,50%,50.99%,59%,60.999%,69%,70.999%,86%,95.999% {
      opacity:0.4; text-shadow: none;
    }
  }
  @media only screen and (max-width: 1300px) {
    #code {
      font-size: 15rem;
    }
  }
  @media only screen and (max-width: 1170px) {
    #code {
      font-size: 10rem;
    }
  }
  @media only screen and (max-width: 600px) {
    #code {
      font-size: 5rem;
    }
  }
  </style>
    <div class="main_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_webcam message_flex">
        <div class="content_wrap message-wrap">
          <div class="content_name"></div>
          <div class="box_404">
            <p id="code"><?=$mes['message-title'];?></p>

          </div>
          <div class="content_subname"><?=$mes['message-text'];?></div>
        </div>

      </div>
    </div>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>

