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
          <div class="content_subname"><h1><?=$mes['maps-h1']?></h1></div>
          <div class="content_text"><?=$mes['map-mes1']?></div>
            <div class="ten_box_item wow flip">
              <!--<div class="ten_round"><a href="<?UrlAdd('maps')?>"><img src="../img/pin/place.png" alt="pin"></a></div>-->
              <div class="ten_round"><span><img src="/img/pin/place.png" alt="pin"></span></div>
              <span  class="content_text"><?=$mes['map-mes2']?></span>
            </div>
            <div class="ten_box_item wow flip">
              <!--<div class="ten_round"><a  href="<?UrlAdd('maps')?>"><img src="../img/pin/tel.png" alt="pin"></a></div>-->
              <div class="ten_round"><span><img src="/img/pin/tel.png" alt="pin"></span></div>
              <span class="content_text"> +38 (044) 223-59-89</span>
            </div>
            	<? /** inclides/inc/form/ */ FormInclude('form_static') ?>
         <?php/*   <div class="ten_box_item wow flip">
              <div class="ten_round"><a href="<?UrlAdd('maps')?>"><img src="../img/pin/lettter.png" alt="pin"></a></div>
              <span class="content_text"> San-Francisco@house.com</span>
            </div> */?>

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
<script src="/js/map.js" type="text/javascript"></script>
  </body>
</html>
