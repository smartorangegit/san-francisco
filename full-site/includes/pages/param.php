<?  /*All function*/ include_once($_SERVER['DOCUMENT_ROOT'].'/includes/function.php');

	$Rest=array('room'=>array('min'=>'', 'max'=>0));
	$Rest=array('floor'=>array('min'=>'', 'max'=>0));
	$Rest=array('area'=>array('min'=>'', 'max'=>0));
	//$Rest=array('area_life'=>array('min'=>'', 'max'=>0));
	//$Rest=array('sec'=>array('min'=>'', 'max'=>0));

	if(empty($sgl)) {$sgl='';} 
	
$result = $db->prepare("SELECT floor, visible,number,buld,sec,level,all_room,life_room, id ,img,price
						FROM `apartments`
				WHERE   visible=1 $sgl ORDER BY buld ASC");
   $result->execute(); $i=0;
   $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['sec'],$s['level'],$s['all_room'],$s['life_room'],$s['id'],$s['img'],$s['price']); while($result->fetch()){
 //  $s['img']='/img/houses/house'.$s['buld'].'_png_white/'.$s['img'].'.png';
  // $s['url']='/'.$_POST['lang'].'plan'.$s['buld'].'/sections'.$s['sec'].'/floor'.$s['floor'].'/flat'.$s['number'].'_'.$s['id'].'/';
  // $flats = explode(".", $s['number']);

	$flats=	$s['number']{0};
   $s['kim']=$flats;

   //$s['kim']=$flats[0];
   		foreach($s as $key=>$k){
			$rez[$key]=$k;
		}
		$mas_t=array('room'=>$s['kim'],'floor'=>$s['floor'],'area'=>$s['all_room'] );
		foreach($mas_t as $key=>$t){
	if(empty($Rest[$key]['min']) OR $t<$Rest[$key]['min']){$Rest[$key]['min']=floor($t);	}
	if(empty($Rest[$key]['max']) OR $t>$Rest[$key]['max']){$Rest[$key]['max']=floor($t);	}

		}
		$REZULT[$i]=$rez;
   $i++;
   }
    	 $sort=['floor','room','area'];

 ?>