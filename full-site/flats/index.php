<?  /*All function*/ include_once($_SERVER['DOCUMENT_ROOT'].'/includes/function.php');  ?>
<?
//Getpar($text);
ParametrFlats();
GLOBAL $floor_new,$plan,$flat,$plan,$sleh,$floor,$floor_prev,$floor_next, $PDF;

 define('COMERC',0,TRUE);


$floo=$floor[0];
$flat=str_replace("flat", "",$flat);
$flat=str_replace("/", "",$flat);

 $flat_level=1;
 $flat_mas = explode("_", $flat);
 $flat=$flat_mas[0];

 $flat_mas = explode(".", $flat_mas[1]);
 $flat_id=$flat_mas[0];		 $flat_level_p=$flat_mas[1];

 if(empty($flat_level_p)){$flat_level_p=0;}
$poverx=$floor[0]-$flat_level_p;

$result = $db->prepare("SELECT floor, 	sec, 	visible ,	number, 	all_room ,	life_room, img, room1, 	room2, 	room3, 	room4 ,	room5,
 room6, 	room7, 	room8, 	room9 ,	room10, room11,room12,room13,room14,room15,room16,room17,room18,room19,
 level,id FROM `apartments` WHERE buld=$plan AND `floor`=$floor[0]-$flat_level_p AND `sec`=$sec AND `id`= '$flat_id'");
   $result->execute();
   $result->store_result();
   if ($result->num_rows == 0){ ErrorPage404(); }

    $result->bind_result($s['floor'],$s['sec'],$s['visible'],$s['number'],$s['all_room'],$s['life_room'],$s['img'],$s['room1'],$s['room2'],$s['room3'],$s['room4'],$s['room5'],
	$s['room6'],$s['room7'],$s['room8'],$s['room9'],$s['room10'],$s['room11'],$s['room12'],$s['room13'],$s['room14'],$s['room15'],
	$s['room16'],$s['room17'],$s['room18'],$s['room19'],$s['level'],$s['id']);
	$result->fetch();
 $result->close();
 $level=$s['level'];

 $s['img']= str_replace('.png', "",  $s['img']);
 $s['img']= str_replace('.jpg', "",  $s['img']);
$number=$s['number'];
$s['room']= mb_substr($s['number'],0,-1,'UTF-8');
$pdf['number']=$s['room'];

 $img_flat='/img/houses/house'.$plan.'_png_white/'.$s['img'].'.png';
$s['pdf']=$img_flat;


  $level_floor=$s['floor'];
	//foreach($s as $k){
		//	$rez=$rez.$k;
		//}
	//echo $con;
//$my_id=$s['id'];

	/*$mas1=['Загальна','Житлова',
		'Передпокій','Кухня','Вітальня','Спальня','Спальня 2','Спальня 3','Тераса','Санвузол','Ванна','Лоджія','Балкон','Балкон 2','Гардеробна','Гардеробна 2','Кімната','Кухня-вітальня','Комора','Гардеробна 3','Сходи',
'Рівень 2','Передпокій','Санвузол','Спальня 1','Спальня 2','Ванна','	Гардеробная','	Спальня','	Тераса','	Лоджия','	Спальня 3','	Вітальня','	Кухня','','','','','','','','',
'Рівень 3','Сходи','Тераса','Хол','','','','','','',''];*/

for($m=0; $m<53; $m++): $mas1[$m]=$mes['pl-mes'][$m];		endfor;

	$mas2=[$s['all_room'],$s['life_room'],$s['room1'],$s['room2'],$s['room3'],$s['room4'],$s['room5'],
	$s['room6'],$s['room7'],$s['room8'],$s['room9'],$s['room10'],$s['room11'],$s['room12'],$s['room13'],$s['room14'],$s['room15'],
	$s['room16'],$s['room17'],$s['room18'],$s['room19']];
$all_room=$s['all_room'];
$life_room=$s['life_room'];
	if($s['level']>1){
	 $result = $db->prepare("SELECT room1, 	room2, 	room3, 	room4 ,	room5,room6,room7,room8,room9,room10,
	 room11,room12,room13,room14,room15,room16,room17,room18,room19,room20,
	 room21,room22,room23,room24,room25,room26,room27,room28,room29,room30
	 FROM `apartments_level` WHERE `id_flat`=$s[id]");
   $result->execute();
    $result->bind_result($sl['room1'],$sl['room2'],$sl['room3'],$sl['room4'],$sl['room5'],$sl['room6'],$sl['room7'],$sl['room8'],$sl['room9'],$sl['room10'],
						$sl['room11'],$sl['room12'],$sl['room13'],$sl['room14'],$sl['room15'],$sl['room16'],$sl['room17'],$sl['room18'],$sl['room19'],$sl['room20'],
						$sl['room21'],$sl['room22'],$sl['room23'],$sl['room24'],$sl['room25'],$sl['room26'],$sl['room27'],$sl['room28'],$sl['room29'],$sl['room30']
);
	$result->fetch();
 $result->close(); 	$i=count($mas2); /*для 2-го рівня*/ $mas2[$i]='<br>';

		foreach ($sl as $key=>$k) { $i++;
		//для 3-го рівня з 21 стовпчика
	if($key=='room21' AND $s['level']>2){$mas2[$i]='<br>'; $i++;}
			$mas2[$i]=$k;
		}
	}








	$print_pdf='';  $print_pdf2=''; $i=0; $m=1;
						foreach($mas2 as $k=>$n){ $j=$k;
						if(!empty($n)){ $st='';
						if($k==0):
								if($level==1):	$st='style="padding-top:30px;"'; else: $st=''; endif;
						$print_pdf.= '<div class="table-item'.$m.'" '.$st.'><ul>';  $print_pdf2.= '<div class="table-item'.($m+1).'" '.$st.'><ul>'; endif;
						if($level>1 AND $k==0):  $print_pdf.='<li class="table-item1-li">'.$mes['pl-mes18'].'</li>'; $print_pdf2.='<li class="table-item1-li">1</li>'; $i++;
						 endif;

						$pos = strripos($mas1[$k], $mes['pl-mes18']);

if ($pos === false) {$raz=''; $zn=$mas1[$k];}else{$raz=' class="table-item1-li"'; $zn=$mes['pl-mes18']; $n=substr($mas1[$k], -1);

	}

	if (COMERC) {if ($k==21 OR $k==42) { $zn=$mes['pl-mes18'];} else { $zn=$mas1[0];}}



					if($k>1){						$print_pdf.='<li'.$raz.'>'.$zn.'</li>';   $print_pdf2.='<li'.$raz.'>'.$n.'</li>';
					}
					$kk=0;
						}
					}
					if($kk==0){  $print_pdf.= '</ul></div>'.$print_pdf2.'</ul></div>';  }
					$pdf['print']=$print_pdf;

	//echo '<pre>'; print_r($pdf['print']); echo '</pre>';


$result = $db->prepare("SELECT img, sort, compas   FROM `section` WHERE `sec`=$sec AND `build`=$plan AND  `floor`=$poverx ");
   $result->execute();     $result->bind_result($si['img'],$si['sort'],$si['compas']);	$result->fetch(); 	$result->close();

  // $SORT=explode(",", $si['sort']); //Масив сортування

        if($floor[0]>1){$pov1="OR (`floor`=($floor[0]-$flat_level_p)-1 AND `level`=2)OR (`floor`=($floor[0]-$flat_level_p)-2 AND `level`=3) OR (`floor`=($floor[0]-$flat_level_p)-1 AND `level`=3)";}else{$pov1='';}

 $rez=[]; $REZULT=[]; $n=0;


$result = $db->prepare("SELECT floor, visible,number,buld,level,all_room,life_room, id, sorts   FROM `apartments`
WHERE buld=$plan AND `sec`=$sec AND (`floor`=$floor[0]-$flat_level_p $pov1) ORDER BY sorts ASC");
   $result->execute();
    $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['level'],$s['all_room'],$s['life_room'],$s['id'],$s['sorts']); while($result->fetch()){   $i=0;
		foreach($s as $key=>$k){
			$rez[$key]=$k;
		}
		$REZULT[$n]=$rez;		$n++;
		}
 $result->close();


//Для SVG
 foreach ($REZULT as $key=>$s) {
	 if($flat_level_p>0){$t=".".$flat_level_p;}else{$t='';}
	$URLP[$key]='/'.$_POST['lang'].'plan'.$plan.'/sections'.$sec.'/floor'.($s['floor']+$flat_level_p).'/flat'.$s['number'].'_'.$s['id'].$t.$sleh;

	$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id'].'_';
		$clas[$key]=" ".$clas_js[$key];
		if($s['id']==$flat_id){$clas[$key].=' st-on';}
		//if($s['number']==$flat){$clas[$key].=' st-on';}
		$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id'];

//підказка 		//$URLP[$key].='--'.$s['sort']."-".($key+1);
	}
	$pdf['img']=$s['img'];

			//ДЛЯ PDF
ob_start();
include($_SERVER['DOCUMENT_ROOT'].'/'.svg_plan($si['img']));
$svg_min_plan= ob_get_clean();


$st_open='fill: #ef4136; opacity: 1;'; //стиль для заливки вибраної квартири
$st_close='fill: #DDDDDD; opacity: 1;'; //стиль для заливки всіх квартир

foreach ($REZULT as $key=>$s) {

	$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id'].'_';
		$clas[$key]=" ".$clas_js[$key];

		$zamena='" style="'.$st_close;
		if ($s['id']==$flat_id) {
			$clas[$key].=' st-on';  $zamena='" style="'.$st_open;
		}
$svg_min_plan = str_replace($clas[$key], $zamena, $svg_min_plan);
	}
/*
$search='class="st2"';
//$st_style=array(2=>' style="fill: #BFBFBF;" ', 3=>' style="fill: #BFBFBF;" ', 4=>' style="fill: #BFBFBF;" '); //Стиль для стін з класами st2 st3 st4
$st_style=array(2=>' style="fill: #000;" ', 3=>' style="fill: #000;" ', 4=>' style="fill: #000;" ');
foreach ($st_style as $key=>$style) {
	$search='class="st'.$key.'"';
	$svg_min_plan = str_replace($search, $style, $svg_min_plan);

		}	 //ДЛЯ PDF END
		GLOBAL $html;
	$_SESSION['svg_min_plan']=55;
			ob_start();
include($_SERVER['DOCUMENT_ROOT'].'/'.svg_plan($si['img']));
$pdf['svg_2']= ob_get_clean();


*/
ob_start();

require($DIR."pdf/html.php");
$html= ob_get_clean();

$_SESSION['svg_min_plan']=$html;


//echo '<pre>'; print_r($si); echo '</pre>';
?>
 <? /*head*/ HeadAdd($html=['head'=>'Y',
							'robots'=>'noindex, follow',
							'html'=>'
    <link rel="stylesheet" href="/css/appart.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
	']);	?>
    <div class="main_page long_page clearfix">
          <?  /*Menu*/ MenuAdd();  ?>
      <div class="content content_flats">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['fl-mes1'].' '.$number?></h1></div>
          <div class="compas"><img style='transform: rotate(<?=$si['compas']?>deg);'  src="/img/compass.svg" alt="compass"></div>

          <div class="content_flats_top clearfix">

          <div class="control_panel">
            <a class="button desc_button" id="callformPrice" href="#"><?=$mes['callback-mes7']?></a>

            <div class=" control_block">
              <a class="control_panel_item" href="<?=UrlAdd($text='plan')?>"><img class="arrow" src="/img/arr.png" alt="arrow"></a>
              <a class="control_coment" href="<?=UrlAdd($text='plan')?>" ><?=$mes['pl-mes10']?></a>
            </div>

            <div class=" control_block">
              <a class="control_panel_item" href="<?=UrlAdd($text='plan/param')?>"><img src="/img/param.png" alt="param"></a>
              <a class="control_coment" href="<?=UrlAdd($text='plan/param')?>"><?=$mes['pl-mes11']?></a>
            </div>

            <div class=" control_block">
              <a id="callform2" class="control_panel_item" href="#"><img src="/img/key.svg" <?AltImgAdd($mes['pl-mes12'])?>></a>
              <a id="callform2" class="control_coment" href=""><?=$mes['pl-mes12']?></a>
            </div>

            <div class=" control_block">
              <a class="control_panel_item" target="_blank" href="/pdf/<?//=$s['pdf']?>"><img src="/img/pdf.svg" <?AltImgAdd($mes['pl-mes13'])?>></a>
              <a class="control_coment" download href="/pdf/"><?=$mes['pl-mes13']?></a>
            </div>

           <?/*Кнопки вибору поверху*/FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev);?>
          </div>

          <div class="flats_img">
            <img src="<?=$img_flat?>"  <?AltImgAdd($mes['fl-mes1'].' '.$REZULT2['number'])?>>
          </div>



          <div class="info_panel">
			 <div class="info_house">
                <span class="number"><?=$plan?></span>
                <span class="name"><?=$mes['pl-mes1']?></span>
              </div>
              <div class="info_section">
                <span class="number"><?=$sec?></span>
                <span class="name"><?=$mes['pl-mes2']?></span>
              </div>
			   <div class="info_section">
                <span class="number"><?=$pdf['number']?></span>
                <span class="name"><?=$mes['par-mes2']?></span>
              </div>
            <div class="info_table">
              <table>
                 <!-- <caption>Таблица</caption> -->
                 <tr>
                  <th class="content_subname"><?=$mes['pl-mes8']?></th>
                  <th class="content_subname"><span>m<sup><i>2</i></sup></span></th>
                 </tr>

				 <?foreach($mas2 as $k=>$s){  if($s){ ?>
					  <tr><td><?=$mas1[$k]?></td> <td><?=$s?></td></tr>
				 <?}}?>

                </table>
            </div>
          </div>
        </div>
		<div class="bottom_form"><a id="callform1" class="button callback"  href="#"><?= $mes['callback-mes7'] ?></a></div>

		<?
		//echo '<pre>'; print_r($mas2); echo '</pre>';
		?>
          <!-- <div class="clearfix"></div> -->

        <div class="content_block" style="height: auto;">
            <div class="content_subname"><?=$mes['pl-mes15']?></div>
            <div class="plan_floor clas_svg">

			<?include($_SERVER['DOCUMENT_ROOT'].'/'.svg_plan($si['img']));



			?>





  	<script>
$(document).ready(function(){
	<?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
      $(".<?=$clas_js[$key]?>").mousemove(function(e){
    var x = e.pageX;
    var y = e.pageY;
    var leftPos = x - $('.lin_<?=$i?>').width() - 200;
    var topPos = y - $('.lin_<?=$i?>').height() - 50;
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

	<?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
<div class="lin_<?=$i?>">
<?=$mes['pl-mes16']?> <?=$s['number']?><br> <?=$s['all_room']?> <?=$mes['pl-mes20']?>  <?//=($key).'--'.$s['sorts'].'-'.$s['id']?>
</div> <?}?>

            </div>
          </div>
        </div>
       <?/*copyring*/copyringAdd();?>
      </div>
    </div>
	 <script src="/js/jquery.fancybox.js"></script>
<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>
