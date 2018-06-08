<? /*head*/ HeadAdd($html=['head'=>'Y']);	?>

    <div class="main_page long_page clearfix">
           <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_webcam">
        <div class="content_wrap">
          <h1 class="content_name"><?=$mes['webcam-h1']?></h1>
          <!-- <div class="webcam_box">
            <iframe width="100%" height="100%" src="https://macparts.kiev.ua:8409/player.html" frameborder="0" allowfullscreen></iframe>
          </div> -->
          <div class="webcam_box">
            <iframe width="100%" height="100%" src="https://macparts.kiev.ua:8409/player.html" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="webcam_box">
            <iframe width="100%" height="100%" src="https://macparts.kiev.ua:8401/player.html" frameborder="0" allowfullscreen></iframe>
          </div>
          <!-- <div class="content_subname"><?=$mes['web-mes1']?></div> -->
          <a class="button callback"  href="/building"><?=$mes['menu8']?></a>

          <a class="button callback"  href="/plan"><?=$mes['menu5']?></a>

        </div>
        <?/*copyring*/copyringAdd();?>
      </div>
    </div>
    <?  /*Menu*/ include_once('includes/callback.php');  ?>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
