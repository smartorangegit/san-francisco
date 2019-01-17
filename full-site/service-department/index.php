<!DOCTYPE html>
<html>
<? /*head*/ HeadAdd( $html=['html'=>'    <link rel="stylesheet" href="/css/building.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']);	?>
  <body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K36NJ3D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <link rel="stylesheet" href="/css/appart.css">
  <link rel="stylesheet" href="/css/service-department.css">

    <div class="main_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content-department">
        <div class="content_wrap clearfix">
          <div class="developer__top">
            <h1 class="content_name depatment_name"><?=$mes['service-h1'];?></h1>
          </div>
          <div class="department-info">
          	<p class="department-info__text">
          		<?=$mes['service-text-1'];?>
          	</p>
          	<?/* <img src="/img/service-department/service-department-1.jpg" class="department-info__image"  alt="<?=$mes['service-h1'];?>"> */?>
			<img src="/img/service-department/meeting-34.jpg" class="department-info__image"  alt="<?=$mes['service-h1'];?>">
          </div>
          <div class="services-container">
		      <h2 class="parking__sub-heading services__heading">
		        <?=$mes['service-text-2'];?> 
		      </h2>
		      <ul class="services-list">
		        <li class="services-list__item">
		          <div class="services-list__icon services-list__icon_1"></div>
		          <p class="parking__text services-list__text">
		            <?=$mes['service-text-3'];?>
		          </p>
		        </li>
		        <li class="services-list__item">
		          <div class="services-list__icon services-list__icon_2"></div>
		          <p class="parking__text services-list__text">
		            <?=$mes['service-text-4'];?>
		          </p>
		        </li>
		        <li class="services-list__item">
		          <div class="services-list__icon services-list__icon_3"></div>
		          <p class="parking__text services-list__text">
		            <?=$mes['service-text-5'];?>
		          </p>
		        </li>
		        <li class="services-list__item">
		          <div class="services-list__icon services-list__icon_4"></div>
		          <p class="parking__text services-list__text">
		            <?=$mes['service-text-6'];?>
		          </p>
		        </li>
		      </ul>
		  </div>

		  <div class="services-contact">
			<ul class="services-contact-list">
				<li class="services-contact-list__item">
				  <p class="services-contact-list__text">
				   <?=$mes['service-text-7'];?> 
				  </p>
				  <a href="tel:+380444940400" class="services-contact-list__link services-contact-list__link_phone">(044) 494-04-00</a>
				  <a href="tel:+3800671021040" class="services-contact-list__link services-contact-list__link_phone">(067) 102-10-40</a>
				</li>
				<li class="services-contact-list__item">
				  <p class="services-contact-list__text">
				    <span class="services-contact-list__text_medium"><?=$mes['service-text-8'];?>
				  </p>
				  <p class="services-contact-list__text">
				    <span class="services-contact-list__text_medium">Email:</span> <a class="services-contact-list__link" href="mailto:service@saga-development.com.ua"> service@saga-development.com.ua</a>
				  </p>
				</li>
			</ul>
		  </div>

       </div>
		<style>
		.department-info__text a {
			color: white;
		}
		</style>
        <? copyringAdd() ?>
		
      </div>
	<? /*footer*/ FooterAdd($html=['html'=>'<script src="/js/jquery.fancybox.js"></script>']);	?>
    </div>
  <script src="/js/jquery.bxslider.min.js"></script>
  </body>
</html>
