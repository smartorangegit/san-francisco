 <?php  $postnumbers=4;
		$offset=0;
		$ReaNews =LoadingNews($postnumbers, $offset);



 ?>
<?php

/*
function cropStrWord($text, $max_words=15, $append = '')
{
       $max_words = $max_words+1;
       $words = explode(' ', $text, $max_words);
       array_pop($words);
       $text = implode(' ', $words) . $append;
       return $text;
}
$set_page=Getpar($_GET['page']);

$news_onpage=4;
$max_line_news=4;
$news_onpage_start=0;
$news_onpage_end=$news_onpage_start+$news_onpage-1;
if($set_page){$news_onpage_start=($set_page-1)*$news_onpage; 	$news_onpage_end=$set_page*$news_onpage-1;}else{$set_page=1;}

if($_POST['lang']==''){$lg='ua';}else{$lg=substr($_POST['lang'], 0,2);}
	$result = $db->prepare("SELECT date, news_code,name_news_$lg,description_$lg,img_name,full_text_$lg, min_text_$lg, img_path, img_name FROM news WHERE isActive=0 ORDER BY date DESC");
	$result->execute();
	$result->store_result();	$num=$result->num_rows;
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['mini_text'],$s['img-min'],$s['img']);
	$i=0; $it=0;
	 while ($result->fetch()) { $s['img_news'] = $s['img-min'].'/'.$s['img'];
								$s['img-min'].='/min_'.$s['img'];
								//if(!file_exists($s['img-min'])){$s['img-min']=$s['img_news'];}
								//$s['mini_text']	=cropStrWord($text=$s['text']);
								$s['urls']='news/'.$s['urls'];
				foreach($s as $key=>$k){			$rez[$key]=$k;	}
								if($i>=$news_onpage_start AND $i<=$news_onpage_end){	 $ReaNews[$it]=$rez; $it++;	}
	   $i++; }
	 	 if($news_onpage_start>$num){	ErrorPage404();	 }
	 if($num>$news_onpage){	 $pagin=round($num/$news_onpage, 0, PHP_ROUND_HALF_UP);	 }
	 //rel="prev" /rel="next"
	   $pre=$set_page-1; if($set_page==1){$pre='';}
		$nex=$set_page+1; if($set_page==$pagin){$nex='';}
		if ($pre) { $pre='<link rel="prev"  href="'.servername().UrlAdd($text='news/page'.$pre, $return='Y').'">'; }
		if ($nex) { $nex='<link rel="next"  href="'.servername().UrlAdd($text='news/page'.$nex, $return='Y').'">'; }
		*///
 ?>

<? /*head*/ HeadAdd($html=['head'=>'Y', 'html'=>$pre.$nex.'<link rel="stylesheet" href="/css/news.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">']); ?>

    <div class="main_page clearfix">
    <?  /*Menu*/ MenuAdd();  ?>
      <div class="content content_news long_page">
        <div class="content_wrap clearfix">
          <div class="content_name"><h1><?=$mes['news-h1']?></h1></div>
<? if (count($ReaNews['ReaNews'])) { ?>
          <div class="photo-box clearfix" id="content">

		  	<?foreach($ReaNews['ReaNews'] as $key=>$s):?>
            <figure class="effect-oscar news_image_container">
              <img  <?LazyLoad ($s['img-min']); AltImgAdd($s['name_news'])?>/>
              <figcaption>
                <div class="news_date"><?=$s['date']?></div>
                <div class="fig_wrap">
                  <h2 class="content_subname" style="color:white;"><?=$s['name_news']?></h2>
                  <p class="content_text"><?=$s['mini_text']?></p>
                </div>
                <a class="news" href="<?UrlAdd($s["urls"])?>"  > </a>

              </figcaption>
            </figure>
		<?endforeach?>




          <?/*Пагинація*/ /*
			if($pagin){?>


            <div class="news_nav">
			<?	$pre=$set_page-1; if($set_page==1){$pre=$pagin;}
				$nex=$set_page+1; if($set_page==$pagin){$nex='1';}
				if($pre!=1){$pre='page'.$pre;}else{$pre='';}
				if($nex!=1){$nex='page'.$nex;}else{$nex='';}
				//if($pre!=1){$pre='?page='.$pre;}else{$pre='';}
				//if($nex!=1){$nex='?page='.$nex;}else{$nex='';}

			?>
              <a href="<?UrlAdd('news/'.$pre)?>"><?=$mes['last-page']?></a>
              <a href="<?UrlAdd('news/'.$nex)?>"><?=$mes['next-page']?></a>
              <div class="news_nav_page">
                <ul>
				<?for($i=1; $i<$pagin+1; $i++){?>
				<? $c=''; if($set_page==$i){$c='action';}
				if($i>$max_line_news){ if($set_page==$pagin){$c='action';}  echo'<li><span>&hellip;</span></li>  <li><a class="'.$c.'" href="'.UrlAdd('news/page'.$pagin).'">'.$pagin.'</a></li>'; break;}
				if($i==1){$get_pg='';}else{$get_pg="/page$i";}
				?>
                  <li><a class='<?=$c?>' href='<?UrlAdd('news'.$get_pg)?>'><?=$i?></a></li>
				<?}?>
                </ul>
              </div>
            </div>

			<?}*//*---*/?>

			<?}?>

          </div>
        </div>
      </div>
    </div>
	<style>
	.loading-bar{
	    float: left;
    position: relative;
    width: 100%;
    padding: 20px;
    text-align: center;
	  letter-spacing: 3px;
    box-sizing: border-box;
		font-family: "AkzidenzGroteskPro-LightCn";
	}
	</style>
<? /*footer*/ FooterAdd($html=['html'=>"<script src='/js/jquery.fancybox.js'></script>
<script>
		$(document).ready(function() {
			$('#content').scrollPagination({
				nop     : {$postnumbers}, // Количество запрашиваемых из БД записей
				offset  : {$offset}, // Начальное смещение в количестве запрашиваемых данных
				count  : {$ReaNews['num']}, // Начальное смещение в количестве запрашиваемых данных
				lang  :  '{$_POST['lang']}',
				error   : '', // оповещение при отсутствии данных в БД
				add: '{$mes['n-mes1']}',
				loading: '{$mes['n-mes2']}',
				delay   : 300, // Задержка перед загрузкой данных
				scroll  : true // Если true то записи будут подгружаться при прокрутке странице, иначе только при нажатии на кнопку
			});
		});
		</script>
", 'head'=>'Y']);	?>
