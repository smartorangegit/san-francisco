<? /*head*/ HeadAdd($html=['description'=>'N','head'=>'Y']);	?>
  <style media="screen">
  .main_page{
    width: 100%;
    height: 100%;
    background:url('/img/soon_bg.jpg');
    background-size: cover;
  }
  .content.content_comingsoon{
    width: 100%;
    position: relative;
  }
  .logo-venok{
    position: absolute;
    width: 20vh;
    height: 20vh;
    top: 0; left: 0; right: 0; bottom: 0;
    margin: auto;
    background-image: url('/img/venok.png');
    background-size: 100% 100%;

  }
  .logo-lights{
    width: 100%;
    height: 100%;
    background-image: url('/img/venok-lights.png');
    background-size: 100% 100%;
    position: relative;
  }
  img{
    display: block;
    width: 12vh;
    height: auto;
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    margin: auto;

  }

  </style>
    <div class="main_page">
      <div class="content content_comingsoon">
        <div class="logo-venok">
          <div class="logo-lights">
            <img src="/img/logo_w.svg" alt="San Francisco">
          </div>
        </div>
      </div>
    </div>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
