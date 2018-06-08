<?
if (isset($_GET['URLS'])) {$id_url = $_GET['URLS'];}

$mons = array(1 => $mes['month1'], 2 => $mes['month2'], 3 => $mes['month3'], 4 => $mes['month4'], 5 => $mes['month5'], 6 => $mes['month6'], 7 => $mes['month7'], 8 => $mes['month8'], 9 => $mes['month9'], 10 => $mes['month10'], 11 => $mes['month11'], 12 => $mes['month12']);

if($_POST['lang']==''){$lg='ua';}else{$lg=substr($_POST['lang'], 0,2);}

	$result = $db->prepare("SELECT date, news_code, name_news_$lg, description_$lg,img_name,full_text_$lg
	,time,title_$lg, img_path, img_name
	FROM news WHERE news_code='$id_url'");
	$result->execute();
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['time'],$s['title'],$s['img-min'],$s['img']);

	 while ($result->fetch()) { $s['img_news'] = $s['img-min'].'/'.$s['img'];
								$ts = strtotime($s['time']);
								$ts2 = strtotime($s['date']);
								$d=[];
								$s['timeNew'] = date('H:i', $ts);
								$d['d'] = date('d', $ts2);
								$d['m'] = date('n', $ts2);
								$d['Y'] = date('Y', $ts2);
								$s['timeNewLong']= $d['d'].' '. $mons[$d['m']].' '.$d['Y'].' '.$s['timeNew'];
								$s['timeNew']= $d['d'].' '. $mons[$d['m']].' '.$d['Y'].' '.$mes['new-mes2'];
								$s['text']=str_replace("../../", "/", $s['text']);

				foreach($s as $key=>$k){			$rez[$key]=$k;	}

	$ReaNews=$rez;
	}
	 /*
	$i=0;
	$marka = $ReaNews['mark'];
	$result = $db->prepare("select mark,min_i,id_n,date,fname,filename from pic_news WHERE mark='$marka'");
	$result->execute();
	$result->bind_result($s['mark'],$s['min_i'],$s['id_n'],$s['date'],$s['fname'],$s['filename']);
	 while ($result->fetch()) {   $s['img']="/admin/pic/images/".$s['date']."/".$s['filename'];
								$s['img-min']="/admin/pic/images/".$s['date']."/min/".$s['filename'];

				foreach($s as $key=>$k){			$rez[$key]=$k;	}

		 $ReaNewsImgs[$i]=$rez;
	 $i++; }
*/
	$result = $db->prepare("SELECT name_news_ua,name_news_ru,name_news_en FROM news WHERE news_code='$id_url'");
	$result->execute();
	$result->bind_result($rez['ua'],$rez['ru'],$rez['en']);  $rel='';
	 while ($result->fetch()) {
		 if(!empty($rez['ua'])){	$t1='uk';$t2='';
			 $rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';
			}
		 if(!empty($rez['ru'])){ 	$t1=$t2='ru'; $t2.='/';
			 $rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';
			 }
		 if(!empty($rez['en'])){ 	$t1=$t2='en'; $t2.='/';
			$rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';
		 }


		}
		?>

<? /*head*/ HeadAdd($html=['title'=>$ReaNews['title'], 'description'=>$ReaNews['description'],
 'head'=>'Y',
  'mata_img'=>$ReaNews['img_news'],
 'html'=>'
    <link rel="stylesheet" href="/css/news.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
	<link rel="canonical" href="'.servername().$_SERVER['REQUEST_URI'].'"/>'.$rel]);	?>
    <div class="main_page clearfix">
       <?  /*Menu*/ MenuAdd();  ?>

      <div class="content content_news_list long_page ">
        <div class="content_wrap clearfix">
          <!-- <div class="content_name"><h1><?=$mes['news-list-h1']?></h1></div> -->

          <div class="news_det clearfix">
		  <?if(file_exists($_SERVER['DOCUMENT_ROOT'].$ReaNews['img_news'])){?>
    				<div class="news_img" >
    					<div class="news_mainimg">
                <a class="news" href="<?=$ReaNews['img_news']?>" data-fancybox="group" data-caption="<?=$ReaNews['name_news']?>">
				<img src="<?=$ReaNews['img_news']?>" <?AltImgAdd($ReaNews['name_news'])?>></a>
						</div>
						<?if(count($ReaNewsImgs)>1){?>
    					<div class="mini_img clearfix">
						<? foreach($ReaNewsImgs as $key=>$s): ?>
    			<div class="mini_item">
                  <a class="news" href="<?=$s['img']?>" data-fancybox="group" data-caption="<?=$ReaNews['name_news']?>"><img src="<?=$s['img-min']?>" <?AltImgAdd($ReaNews['name_news'])?>></a>
                </div>
					<?endforeach?>

    					</div>
						<?}?>
    				</div>
		  <?}?>
    				<div class="news_content">
    					<div class="news_date">
    						<?=$ReaNews['timeNewLong']?>
    					</div>
              <h1 class="content_subname"><?=$ReaNews['name_news']?></h1>
    					<div class="content_text">
    						<?=$ReaNews['text']?>
    					</div>
    					<a class="button"  href="<?UrlAdd('news')?>"><img src="/img/arrow_l.png" alt="arrow"><?=$mes['new-mes3']?></a>
    				</div>
    			</div>

        </div>
      </div>
    </div>
<? /*footer*/ FooterAdd($html=['html'=>'<script src="/js/jquery.fancybox.js"></script>', 'head'=>'Y']);	?>
