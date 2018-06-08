<?  /*All function*/ include_once($_SERVER['DOCUMENT_ROOT'].'/includes/function.php');  ?>
<?
//Getpar($text);



ParametrFlats();
GLOBAL $floor_new,$plan,$flat,$plan,$sleh,$floor,$floor_prev,$floor_next, $PDF, $info;

 define('COMERC',0,TRUE);

$floo=$floor[0];
$flat=str_replace("premise", "",$_POST['premise']);
$flat=str_replace("/", "",$_POST['premise']);

 $flat_mas = explode("_", $flat);
 $flat=$flat_mas[0];
 $flat_number = $flat_mas[1];
 $flat_id=$flat_mas[0];
 $active_flat;

 //Тянем список ссылок для схемы внизу
session_start();
$info['url'] = array();

foreach($_SESSION['info'] as $key=>$value) {
	$info[$key] = $value;
}
//Подсветка для активной зоны
foreach($info['id'] as $key=>$value) {
	if($info['id'][$key] == $flat_id) {
		$active_flat = $key;
		$info['class_name'][$key] = $info['class_name'][$key] . ' st-on';
	}
}

//Тянем из базы
$result = $db->prepare("SELECT floor, sec, visible, number, floor_area,	img, id, numb_of_floors, total_area, buld
FROM `apartments_commerc` WHERE `id`= '$flat_id'");
   $result->execute();
   $result->store_result();
   if ($result->num_rows == 0){ ErrorPage404(); }

    $result->bind_result($s['floor'],$s['sec'],$s['visible'],$s['number'],$s['floor_area'],$s['img'],$s['id'], $s['numb_of_floors'], $s['total_area'], $s['buld']);
	$result->fetch();
 	$result->close();

	if($s['numb_of_floors'] == 2) {
		$result = $db->prepare("SELECT floor_area, img FROM `apartments_level_comerc` WHERE `id_flat`= '$flat_id'");
		$result->execute();
		$result->store_result();
		if ($result->num_rows == 0){ ErrorPage404(); }

		$result->bind_result($s2['floor_area'],$s2['img']);
		$result->fetch();
		$result->close();
	}

//ДЛЯ PDF
//При добавлении СВГ в ПДФ работают только илайновые стили... Поэтому мы терируем по всему изображению и заменяем классы на инлайн стили
ob_start();
include($_SERVER['DOCUMENT_ROOT'] . '/img/commercial/plan1/index.php');
$svg_min_plan= ob_get_clean();

$st_open='style="fill: #ef4136; opacity: 1;"'; //стиль для заливки вибраної квартири
$st_close='style="fill: transparent; opacity: 1;"'; //стиль для заливки всіх квартир


$classes_array = array();

foreach($info['class_name'] as $key=>$value) {
	$classes_array[] = 'class="commerc_choose_section st0 ' . $value . '"';
}

foreach($classes_array as $key=>$value) {
	if($active_flat == $key) {
		$svg_min_plan = str_replace($classes_array[$key], $st_open, $svg_min_plan);
	} else {
		$svg_min_plan = str_replace($classes_array[$key], $st_close, $svg_min_plan);
	}
	
}


ob_start();
require("pdf/html_commerc.php");
$svg_2= ob_get_clean();

$_SESSION['svg_min_plan']=$svg_2;

?>

 <? /*head*/ HeadAdd($html=['head'=>'Y',
							'robots'=>'noindex, follow',
							'html'=>'
    <link rel="stylesheet" href="/css/appart.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
	']);	?>
    <div class="main_page long_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>
      <div class="content content_flats commercial">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['com-mes1'].' '.$number?></h1></div>
          <div class="compas"><img style='transform: rotate(<?=$si['compas']?>deg);'  src="/img/compass.svg" alt="compass"></div>

          <div class="content_flats_top clearfix">

          <div class="control_panel">
            <a class="button desc_button" id="callformPrice" href="#"><?=$mes['callback-mes7']?></a>
            
            <div class=" control_block">
              <a class="control_panel_item" href="<?=UrlAdd($text='commercial')?>"><img class="arrow" src="/img/arr.png" alt="arrow"></a>
              <a class="control_coment" href="<?=UrlAdd($text='commercial')?>" ><?=$mes['pl-mes10']?></a>
            </div>

            <div class=" control_block">
              <a class="control_panel_item" target="_blank" href="/pdf/<?//=$s['pdf']?>"><img src="/img/pdf.svg" <?AltImgAdd($mes['pl-mes13'])?>></a>
              <a class="control_coment" download href="/pdf/"><?=$mes['pl-mes13']?></a>
            </div>

            <div class="content_block content_block-commercial" style="height: auto;">
              <div class="plan_floor clas_svg">
                <div class="floor-plan-svg">
                  <div class="floor-plan-svg_heading">
                    <?= $mes['com-mes10']?>
                  </div>
                  <?php include($_SERVER['DOCUMENT_ROOT'] . '/img/commercial/floor_plan2/index.php'); ?>
                </div>
                <div class="floor-plan-svg">
                  <div class="floor-plan-svg_heading">
                    <?= $mes['com-mes9']?>
                  </div>
                  <?php include($_SERVER['DOCUMENT_ROOT'] . '/img/commercial/floor_plan1/index.php'); ?>
                </div>
              </div>
            </div>

          </div>

          <div class="flats_img commercial">

		  <? if ($s['numb_of_floors'] == 2): ?>
            <div class="premise premise_floor_2">
				<img src="/img/commercial/floor_2/white/<?= $s2['img']; ?>" alt="Test">
				<div>Другий поверх</div>
			</div>
		  <? endif; ?>

			<div class="premise premise_floor_1">
				<img src="/img/commercial/floor_1/white/<?= $s['img']; ?>" alt="Test">
				<div>Перший поверх</div>
			</div>
          </div>



          <div class="info_panel">
			 <div class="info_house">
                <span class="number"><?=$s['buld']?></span>
                <span class="name"><?=$mes['pl-mes1']?></span>
              </div>
			  <? if($s['sec']!==null): ?>
				<div class="info_section">
					<span class="number"><?=$s['sec']?></span>
					<span class="name"><?=$mes['pl-mes2']?></span>
				</div>
			  <? endif; ?>
			  <div class="info_section">
                <span class="number"><?=$s['number']?></span>
                <span class="name">Приміщення</span>
              </div>
			  <div class="info_section">
                <span class="number"><?=$s['total_area']?> м2</span>
                <span class="name">Загальна площа</span>
              </div>
		  <? if ($s['numb_of_floors'] == 2): ?>
		      <div class="info_section">
                <span class="number"><?=$s['floor_area']?> м2</span>
                <span class="name">Площа 1 поверху</span>
              </div>
			  <div class="info_section">
                <span class="number"><?=$s2['floor_area']?> м2</span>
                <span class="name">Площа 2 поверху</span>
              </div>
		  <? endif; ?>
          </div>
        </div>
		<div class="bottom_form"><a id="callform1" class="button callback"  href="#">дізнатись ціну</a></div>

		<?
		//echo '<pre>'; print_r($mas2); echo '</pre>';
		?>
          <!-- <div class="clearfix"></div> -->
        </div>
       <?/*copyring*/copyringAdd();?>
      </div>
    </div>

    <script>
    $(document).ready(function(){
      <?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
          $(".<?=$clas_js[$key]?>").mousemove(function(e){
        var x = e.pageX;
        var y = e.pageY;
        var leftPos = x - $('.lin_<?=$i?>').width() - 250;
        var topPos = y - $('.lin_<?=$i?>').height() - 20;
        $(".lin_<?=$i?>").css({top:topPos, left:leftPos});
        });
      <?}?>
      });
      <?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
    $('.<?=$clas_js[$key]?>').mouseover(function() {
      $('.lin_<?=$i?>').css('display', 'block');
    }).mouseout(function()
    {
    $('.lin_<?=$i?>').css('display', 'none');
    });
    <?}?>
    </script>
	 <script src="/js/jquery.fancybox.js"></script>
	 
	<style>
		.content.content_flats .flats_img.commercial {
			height: auto;
		} 
	</style>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
