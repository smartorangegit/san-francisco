<?
ParametrFlats();
GLOBAL $floor_new,$plan,$flat,$plan,$sleh,$floor,$floor_prev,$floor_next;



$result = $db->prepare("SELECT img, sort, compas   FROM `section` WHERE `sec`=$sec AND `build`=$plan AND `floor`=$floor[0] ");
$result->execute();     $result->bind_result($si['img'],$si['sort'] ,$si['compas']);	$result->fetch(); 	$result->close();

  // $SORT=explode(",", $si['sort']); //Масив сортування
if($floor[0]>1){$pov1="OR (`floor`=$floor[0]-1 AND `level`=2)OR (`floor`=$floor[0]-2 AND `level`=3) OR (`floor`=$floor[0]-1 AND `level`=3)";}else{$pov1='';}

$rez=[]; $REZULT=[]; $n=0;

$result = $db->prepare("SELECT floor, visible,number,buld,level,all_room,life_room, id   FROM `apartments`
WHERE buld=$plan AND `sec`=$sec AND (`floor`=$floor[0] $pov1) ORDER BY sorts ASC");
   $result->execute();
    $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['level'],$s['all_room'],$s['life_room'],$s['id']); while($result->fetch()){   $i=0;
	
	//$flats = explode(".", $s['number']);		 
		$flats=	$s['number']{0};
   $s['kim']=$flats[0];
		foreach($s as $key=>$k){
			$rez[$key]=$k;
		}
		//$REZULT_NOT[$n]=$rez;		//$REZULT[$SORT[$n]-1]=$rez;
		$REZULT[$n]=$rez;		$n++;
		}
 $result->close();
//echo $si['img'];
//echo '<pre>'; print_r($SORT); echo '</pre>';
//echo '<pre>'; print_r($REZULT); echo '</pre>';

//Для SVG
//echo $pov1;
 foreach($REZULT as $key=>$s){
	 if($s['level']>1 AND $s['floor']!=$floor[0]){$t=".".($floor[0]-$s['floor']);}else{$t='';}
	$URLP[$key]='/'.$_POST['lang'].'plan'.$plan.'/sections'.$sec.'/floor'.($s['floor']+$floor[0]-$s['floor']).'/flat'.$s['number'].'_'.$s['id'].$t.$sleh;
	$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id'].'_';
	$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id'];
	if($s['level']==2 or $s['level']==3){$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1)."_";
										$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1);	}
		$clas[$key]=" ".$clas_js[$key];

//підказка 		//$URLP[$key].='--'.$s['sort']."-".($key+1);
	}
//echo '<pre>'; print_r($floor); echo '</pre>';

?>
   <? /*head*/ HeadAdd($html=['head'=>'Y',
                'title'=>$mes['floorplan-title'], 'description'=>$mes['floorplan-description'],
							  'robots'=>'noindex, follow',
							  'html'=>'<link rel="stylesheet" href="/css/appart.css">']);	?>  

    <div class="main_page clearfix">
     
 <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_floorplan">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['pl-mes9']?></h1></div>
          <div class="compas"><img src="/img/compass.svg" style='transform: rotate(<?=$si['compas']?>deg);' alt="compass" width="120px"></div>
          <div class="content_flats_top clearfix">
            <div class="control_panel">
              <div class=" control_block">
                <a class="control_panel_item" href="<?=UrlAdd($text='plan')?>"><img class="arrow" src="/img/arr.png" alt="arrow"></a>
                <a class="control_coment" href="<?=UrlAdd($text='plan')?>"><?=$mes['pl-mes10']?></a>
              </div>
              <div class=" control_block">
                <a class="control_panel_item" href="<?=UrlAdd($text='plan/param')?>"><img src="/img/param.png" alt="param"></a>
                <a class="control_coment" href="<?=UrlAdd($text='plan/param')?>"><?=$mes['pl-mes11']?></a>
              </div>

			  <?/*Кнопки вибору поверху*/FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev);?>
          
            </div>

            <div class="flats_img clas_svg" style=' display: block !important;'>
             <?/* <img src="/img/floorplan.png" alt="floor">*/
			 include(svg_plan($svg=$si['img']));
			 ?>
       <a class="button"  href="<?=UrlAdd($text='plan')?>"><?=$mes['floorplan-back-button']?></a>
	   <div class="bottom_form"><a id="callform1" class="button callback"  href="#">дізнатись ціну</a></div>
<script>  
<?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
$('.<?=$clas_js[$key]?>').mouseover(function(e) {
  document.getElementById("number_s").innerHTML = "<?=$s['number']?>";
  document.getElementById("kim_s").innerHTML = "<?=$s['kim']?>";
  document.getElementById("life_room_s").innerHTML = "<?=$s['life_room']?> <span><?=$mes['pl-mes7']?></span>";
  document.getElementById("all_room_s").innerHTML = "<?=$s['all_room']?> <span><?=$mes['pl-mes7']?></span>";
  document.getElementById("flats").style = "display:block";
  
      var x = e.pageX;
    var y = e.pageY;
    var leftPos = x - $('.lin_<?=$i?>').width() - 250;
    var topPos = y - $('.lin_<?=$i?>').height() - 20;

    $(".lin_<?=$i?>").css({top:topPos, left:leftPos});
}).mouseout(function()
{
document.getElementById("flats").style = "display:none";
});
 <?}?>
 
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
            <div class="info_panel">
              <div class="info_house">
                <span class="number"><?=$plan?></span>
                <span class="name"><?=$mes['pl-mes1']?></span>
              </div>
              <div class="info_section">
                <span class="number"><?=$sec?></span>
                <span class="name"><?=$mes['pl-mes2']?></span>
              </div>
		<div id="flats" style="display:none">
              <div class="info_section">
                <span class="number" id='number_s'></span>
                <span class="name"><?=$mes['pl-mes3']?></span>
              </div>

              <div class="info_section">
                <span class="number" id='kim_s'></span>
                <span class="name"><?=$mes['pl-mes4']?></span>
              </div>

              <div class="info_section">
                <span class="number"  id='all_room_s'></span>
                <span class="name"><?=$mes['pl-mes5']?></span>
              </div>

              <div class="info_section">
                <span class="number"  id='life_room_s'><span><?=$mes['pl-mes7']?></span></span>
                <span class="name"><?=$mes['pl-mes6']?></span>
              </div>
		</div>
            </div>
          </div>
		  
		  
		  
        </div>
      </div>
    </div>

<? /*footer*/ FooterAdd($html=['head'=>'Y']);	?>

