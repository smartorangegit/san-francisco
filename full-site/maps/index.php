<!DOCTYPE html>
<html lang="<?=$mes['fut-mes3']?>">
<? /*head*/ HeadAdd();	?>
  <body>
    <div class="main_page clearfix">
     <?  /*Menu*/ MenuAdd();  ?>
      <div class="content content_maps">
        <div class="content_wrap">

        </div>
        <div id="map" class="map"> </div>
        <div class="map_info">
          <div class="content_name"><h1><?=$mes['maps-h1']?></h1></div>
          <div class="content_text"><?=$mes['map-mes1']?></div>
            <div class="ten_box_item wow flip">
              <!--<div class="ten_round"><a href="<?UrlAdd('maps')?>"><img src="../img/pin/place.png" alt="pin"></a></div>-->
              <div class="ten_round"><span><img src="/img/pin/place.png" alt="pin"></span></div>
              <span  class="content_text"><?=$mes['map-mes2']?></span>
            </div>
            <div class="ten_box_item wow flip ten_box_item_phone">
              <!--<div class="ten_round"><a  href="<?UrlAdd('maps')?>"><img src="../img/pin/tel.png" alt="pin"></a></div>-->
              <div class="ten_round"><span><img src="/img/pin/tel.png" alt="pin"></span></div>
              <span class="content_text"> +38 (044) 498-05-00</span>
            </div>
			      <!-- <div class="content_text"><?=$mes['i-mesService-department']?></div>
			      <div class="ten_box_item wow flip">
              <div class="ten_round"><span><img src="/img/pin/tel.png" alt="pin"></span></div>
              <span class="content_text"> +38 (044) 494 04 00</span>
            </div> -->
            	<? FormInclude('form_static') ?>
				      <? FormInclude('form_rieltor') ?>
              <? FormInclude('form_service_department') ?>
            <a class="button rieltor_btn" href="http://riverside.net.ua/agent" title="<?=$mes['callback-mes9']?>"><?=$mes['callback-mes9']?></a>
            <a class="button service_dep_btn" href="http://riverside.net.ua/agent" title="<?=$mes['i-mesService-department']?>"><?=$mes['i-mesService-department']?></a>
            <style media="screen">
              .rieltor_btn, .service_dep_btn{
                display: block;
                max-width: 100%;
                text-align: center;
              }
              .ten_box_item_phone .content_text {
                font-weight: 600;
              }
            </style>
          </div>

      </div>
    </div>
<script>
  var script = '<script src="infobubble';
  if (document.location.search.indexOf('compiled') !== -1) {
    script += '-compiled';
    }
    script += '.js"><' + '/script>';
    document.write(script);
</script>
<? /*footer*/ FooterAdd();	?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_XaLtOX8vgeRAIeqgdfHh9q1lNTIS3Y0&callback=initMap"></script>
<script src="/js/infobubble.js"></script>
<link rel="stylesheet" href="/js/datapick/jquery.datetimepicker.css">
<script src="/js/datapick/jquery.datetimepicker.js"></script>
<script src="/js/datapick/php-date-formatter.min.js"></script>
<script src="/js/map.js" type="text/javascript"></script>
  </body>
</html>
