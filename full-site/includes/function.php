<?php	include('config.php');
function LangAdd(){

			$filename='includes/language/'.(substr($_POST['lang'], 0,2)).".ini"; global 	 $mes,$len_default;

			if (file_exists($filename)) { //echo 111; echo $_POST['lang'];
			 $mes = parse_ini_file($filename);			 }
			 else{ 	 $mes = parse_ini_file('language/'.$len_default.'.ini'); ;	}
	}

//Определение языка и составление ссылок
function determmineLaguage() {
	global $url_link_slashafter, $site_url,
	$url_link_shlashbefore,
	$ua_link,
	$ru_link,
	$eng_link,
	$ua_swicth_link,
	$ru_swicth_link;

	$actual_link = "$site_url$_SERVER[REQUEST_URI]";
	$pieces = explode("/", $actual_link);
	if($pieces[3] == "ru") {
		$url_link_slashafter = 'ru/';
		$url_link_shlashbefore = '/ru';
		$ua_link = str_replace('/ru', '', "$site_url$_SERVER[REQUEST_URI]");
		$ru_link = "$site_url$_SERVER[REQUEST_URI]";
		$eng_link = "$site_url". '/en' ."$_SERVER[REQUEST_URI]";
		$ua_swicth_link = '<a href="'. $ua_link .'">UA</a>';
		$ru_swicth_link = '<span>RU</span>';
	} else if ($pieces[3] == "en") {
		$url_link_slashafter = 'en/';
		$url_link_shlashbefore = '/en';
		$ua_link = str_replace('/en', '', "$site_url$_SERVER[REQUEST_URI]");
		$ru_link = "$site_url". '/ru' ."$_SERVER[REQUEST_URI]";
		$eng_link = "$site_url$_SERVER[REQUEST_URI]";
	} else {
		$url_link_slashafter = '';
		$url_link_shlashbefore = '';
		$ua_link = "$site_url$_SERVER[REQUEST_URI]";
		$ru_link = "$site_url". '/ru' ."$_SERVER[REQUEST_URI]";
		$eng_link = "$site_url". '/en' ."$_SERVER[REQUEST_URI]";
		$ru_swicth_link = '<a href="'. $ru_link .'">RU</a>';
		$ua_swicth_link = '<span>UA</span>';
	}

}//end determmineLaguage
determmineLaguage();


function HeadAdd($html=['html'=>'']){ GLOBAL $mes,$SETPAGE, $site_url;
	if ($html['head']) { echo '<!DOCTYPE html><html lang="'.$mes['fut-mes3'].'">';}
	if(!$html['title']){$html['title']=$mes[$SETPAGE.'-title'];}
	if (!$html['robots']) {$html['robots']='index, follow';}
	if (!$html['alternate']) {$html['alternate']=alternateAdd($_SERVER["REQUEST_URI"]);}
	?>
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="<?=$html['robots']?>">
		<meta name="viewport" content="width=device-width">

		<?if(strpos($_SERVER['REQUEST_URI'], 'plan2') || strpos($_SERVER['REQUEST_URI'], 'sections')):?>
		<link rel="canonical" href="<?=$site_url.'/plan/';?>"/>
		<?else:
		$url_origin=$_SERVER['REQUEST_URI'];
		if ($url_origin=='/')
		{
			$url_origin='';
		}
		?>
		<link rel="canonical" href="<?=$site_url.$url_origin;?>"/>
		<?endif;?>

		<?if($html['description']!='N'):
		if(!$html['description']){$html['description']=$mes[$SETPAGE.'-description'];}
		?>
		<meta name="description" content="<?=$html['description']?>">
		<?endif;?>
		<title><?=$html['title']?></title>
		<?
		if($html['alternate']): echo $html['alternate'];	endif;
		if($html['html']): 	echo $html['html'];	endif;
		?>
		<?if ($html['mata_img']) {?>
		<meta property="og:title" content="<?=$html['title']?>" />
		<meta property="og:description" content="<?=$html['description']?>" />
		<meta property="og:image" content="https://<?=$_SERVER['SERVER_NAME'].$html['mata_img']?>"/>
		<?} else {?>
		<meta property="og:title" content="<?=$html['title']?>" />
		<meta property="og:description" content="<?=$html['description']?>" />
		<meta property="og:image" content="https://<?=$_SERVER['SERVER_NAME']?>/img/render1.jpg"/>
		<? } ?>
		<?/*Виводиться на всіх сторінках*/?>
		<!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
           'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-K36NJ3D');</script>
       <!-- End Google Tag Manager -->
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/intlTelInput.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/hover.css">
		<?/***End*/?>

	</head>
<?if($html['head']){ echo '<body>'.'<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K36NJ3D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
';} }

function FooterAdd($html=['html'=>'']){ GLOBAL $site_url;	?>
	<? /*Виводиться на всіх сторінках*/?>


	<? /** inclides/inc/form/ */ FormInclude('form_call') ?>
	<?php  						 FormInclude('form_new_v3') ?>

	<div itemscope itemtype="http://schema.org/LocalBusiness" style="font-size:0;">
    <span itemprop="name" content="SAN FRANCISCO Creative House"></span>
    <span itemprop="url" content="<?=$site_url?>"></span>
    <span itemprop="logo" content="<?=$site_url?>/img/logo_w.png"></span>
    <span itemprop="telephone" content="(044) 299-48-39"></span>
    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <span itemprop="streetAddress" content="проспект Перемоги, 67"></span>
        <span itemprop="addressLocality" content="Kiev"></span>
        <span itemprop="addressCountry" content="Ukraine"></span>
    </span>
    <span itemprop="priceRange" content="$$$"></span>
    <meta itemprop="image" content="<?=$site_url?>/img/logo_w.png"/>
		<time itemprop="openingHours" datetime="Mo-Fr 09:00-19:00">Пн.-Пт.: 9:00-19:00</time>
		<time itemprop="openingHours" datetime="Sa-Su 10:00-18:00">Сб.-Нд.: 10:00-18:00</time>
		</div>
			<!-- <script src="/js/jquery-1.12.0.min.js"></script>
			<script src="/js/intlTelInput.min.js"></script> -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
			<!-- <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit"></script> -->
			<script src="/js/script.js"></script>

			<?/***End*/?>
	<?	if($html['html']): echo $html['html'];		endif;
		if($html['head']){ echo  '</body></html>';}
	}

function H1page($return=false){ GLOBAL $mes,$SETPAGE;

	if ($return) 		return $mes[$SETPAGE.'-h1'];
	else 		echo $mes[$SETPAGE.'-h1'];

}

function AltImgAdd($text=''){
	$t='alt="'.$text.'"';
	echo $t;
}

function UrlAdd($text='', $return=''){

	$t='/'.$_POST['lang'].$text.'/';
	if($text==''){$t='/'.$_POST['lang'];}
	if($return) {
		return $t;
		} else {
			echo $t;
		}
}

function MenuAdd($text=''){ global $mes;
	include_once('menu.php');
}

function Getpar($text){
$text = strip_tags($text);
$text = htmlspecialchars($text);
return $text;
}

function ErrorPage404()
    { LangAdd(); global $mes;

        header($_SERVER['SERVER_PROTOCOL'].'HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        //echo "<script>document.location.replace('/404');</script>";
		 include("404.php");
		// include($_SERVER['DOCUMENT_ROOT']."index.php");
        exit();
    }

function alternateAdd($url_origin=''){ global $site_url, $len_default, $len;
	   $url_str = explode("/", $url_origin);
	if (in_array($url_str[1], $len))
	{
		$st='<link rel="alternate" hreflang="'.$len_default.'" href="'.$site_url.substr($url_origin, 3).'" />';
		foreach ($len as $t)
		{
			$st.='
			<link rel="alternate" hreflang="'.$t.'" href="'.$site_url.'/'.$t.substr($url_origin, 3).'" />';
		}


	}
	else
	{
		if ($url_origin=='/')
		{
			$url_origin='';
		}
		$st='<link rel="alternate" hreflang="'.$len_default.'" href="'.$site_url.$url_origin.'" />';
		foreach ($len as $t)
		{
			$st.='
			<link rel="alternate" hreflang="'.$t.'" href="'.$site_url.'/'.$t.$url_origin.'" />';
		}

	 }
 return $st;
}

function getdefolt($t){
	if(Getpar($t)){ $t=Getpar($t);}else{$t=1;}
	return $t;
}

//For plan		/*План SVG*/
function svg_plan($svg){ GLOBAL $floor_new,$plan;
	$files = scandir($_SERVER['DOCUMENT_ROOT']."/img/houses/doma/dom$plan/");
foreach($files  as $file){
$pos = strpos($file, "$floor_new");
if($pos===false){}else{ $img=$file; }
}

$rr='img/houses/doma/dom'.$plan.'/'.$img.'/'.$svg.'.php';
	return $rr;
}
	//For plan
function FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev){ global $mes ?>
			 <div class="control_floor">
				<? if($floor_next){?>
              <a class="control_floor_item" href="<?=UrlAdd($text='plan'.$plan.'/sections'.$sec.'/floor'.$floor_next)?>"><img src="/img/arrow-up.png" alt="arrow"></a>
				<?}?>
              <span class="number"><?=$floor[0]?></span>
              <span class="name"><?=$mes['pl-mes14']?></span>
			  <?if($floor_prev){?>
              <a class="control_floor_item" href="<?=UrlAdd($text='plan'.$plan.'/sections'.$sec.'/floor'.$floor_prev)?>"><img src="/img/arrow-down.png" alt="arrow"></a>
			  <?}?>
              </div>
			<? }
	//For plan
function ParametrFlats(){
	$OPTIONS=array('MINFLOOR'=>4,'MAXFLOOR'=>16);

GLOBAL $floor_new,$plan,$flat,$plan,$sec,$sleh,$floor,$floor_prev,$floor_next, $db;
$plan=$sec=$id=$floor;
$sleh='/';
$plan=getdefolt($_POST['plan']);
$sec=getdefolt($_POST['sections']);
$flat=getdefolt($_POST['flat']);
$floor_new=getdefolt($_POST['floor']);

$floor[0]=$floor_new;
$floor[1]=1;

$result = $db->prepare("SELECT MIN(floor),MAX(floor)  FROM `apartments` WHERE `sec`=$sec AND `buld`=$plan");
$result->execute();     $result->bind_result($si['floor_min'],$si['floor_max']);	$result->fetch(); 	$result->close();

if($floor[0]>=$OPTIONS['MINFLOOR']) {$floor[1]=$floor[0]-1;} else {$floor[0]=$OPTIONS['MINFLOOR'];}
if($floor[0]<$OPTIONS['MAXFLOOR']){$floor[2]=$floor[0]+1;}else{$floor[2]=$OPTIONS['MAXFLOOR'];}
if($floor[2]>=$OPTIONS['MAXFLOOR'] && $floor[0]==$OPTIONS['MAXFLOOR']){$floor_next=0;}else{$floor_next=$floor[2];}
if($floor[1]<=$OPTIONS['MINFLOOR']-1 && $floor[0]==$OPTIONS['MINFLOOR']){$floor_prev=0;}else{$floor_prev=$floor[1];}

if ($si['floor_max']<$floor_next) {$floor_next=0;}
if ($si['floor_min']>$floor_prev) {$floor_prev=0;}

}

function copyringAdd(){ global $SETPAGE; ?>
		<div class="footer clearfix">
		<!-- початок breadcrumbs -->
		<div class="breadcrumbs">

	<?
		$breadcrumbs = Breadcrumbs();

		if ($SETPAGE != 'home') {

			echo '<ul class="breadcrumbs__list">';

			foreach (Breadcrumbs() as $k=>$url)
			{
				 if(count(Breadcrumbs())==$k+1)
				 {
					 echo ' <li class="breadcrumbs__item"><span itemscope itemtype="https://data-vocabulary.org/Breadcrumb"><span itemprop="title" class="breadcrumbs__link">'.$url['text'].'</span></span></li>';
				 }
				 else
				 {
					 echo ' <li class="breadcrumbs__item"><span itemscope itemtype="https://data-vocabulary.org/Breadcrumb"><a  itemprop="url" class="breadcrumbs__link" href="'.$url['url'].'"><span itemprop="title">'.$url['text'].'</span></a></span> <span> > &nbsp; </span></li>';
				 }
			}

		    echo '</ul>';
		}

			?>

		</div>
		<!-- кінець breadcrumbs -->
          <span class="footer_left"><?=$mes['fut-mes1']?></span>
          <a href="https://smarto.agency/" rel="nofollow" target="_blank">
						  <img <?LazyLoad ("/img/smart-orange.svg")?> alt="smartorange">
          </a>
          <span class="footer_right"><?=$mes['fut-mes2']?></span>
        </div>
		<? }

function servername(){
	$t=$_SERVER['REQUEST_SCHEME'].'://'.str_replace("www.", "", $_SERVER['SERVER_NAME']);
	return $t;
}

function searchPagination($url){

	$page=substr($url, 0,4);
	$val=substr($url, 4);

	if ($page=='page' && $val>1) {
		$_GET['page']=$val;
		return $page;
	}
}

function enterAdminka($correct_link){
	foreach ($_SERVER as $key=>$t) {
	if ($key=='SCRIPT_URL') {$SCRIPT_URL=$t; break;}
}
 $correct_link=substr($SCRIPT_URL, 1);

if (strripos($correct_link, '.php')===false) {
	$correct_link.='index.php';
}
$dt='admin';
	require($correct_link);

 exit;
}

function LazyLoad ($src='', $option=''){

$t='';
	if (!empty($option['option'])) {$t='data-option="'.$option['option'].'"'; } else {$option['option']='';}
	if (empty($option['class']))  {$option['class']='';}

		echo 'class="'.$option['class'].' b-lazy" '.$t.' src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$src.'"';
}


function LoadingNews($postnumbers='', $offset='') {
	LangAdd();
	global $db, $mes;

if($_POST['lang']==''){$lg='ua';}else{$lg=substr($_POST['lang'], 0,2);}



	$result = $db->prepare("SELECT date, news_code,name_news_$lg,description_$lg,img_name,full_text_$lg, min_text_$lg, img_path, img_name FROM news WHERE isActive=0 ORDER BY date DESC");
	$result->execute();
	$result->store_result();	$num=$result->num_rows;



	//if ($postnumbers>$num) {$offset=$num;}

	$result = $db->prepare("SELECT date, news_code,name_news_$lg,description_$lg,img_name,full_text_$lg, min_text_$lg, img_path, img_name FROM news WHERE isActive=0 ORDER BY date DESC LIMIT $postnumbers OFFSET $offset");
	$result->execute();
	$result->store_result();
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['mini_text'],$s['img-min'],$s['img']);
	$i=0; $it=0;


	 while ($result->fetch()) { $s['img_news'] = $s['img-min'].'/'.$s['img'];
								$s['img-min'].='/min_'.$s['img'];
								//if(!file_exists($s['img-min'])){$s['img-min']=$s['img_news'];}
								//$s['mini_text']	=cropStrWord($text=$s['text']);
								$s['urls']='news/'.$s['urls'];
				foreach($s as $key=>$k){			$rez[$key]=$k;	}
								//if($i>=$news_onpage_start AND $i<=$news_onpage_end){	 $ReaNews[$it]=$rez; $it++;	}
								$ReaNews[$it]=$rez; $it++;
	   $i++; }

	   return array('ReaNews'=>$ReaNews, 'num'=>$num) ;


	}

function FormInclude($id, $par=''){ GLOBAL $mes;
	$kv=$par;
	$webAd=$_SERVER['SCRIPT_URI'];

	 include("inc/form/".$id.".php");

}

/**
 *  @brief (Кешування сторынок)
 *  @param [in] $file Description for $file
 *
 *  @details ()
 */
function CacheControls($file){

	if (Cash)
	{
		Global $result;

		$result=array();
		$write=0;
		$writeText='';

			   ///***Функці пошуку файлів в казаному каталозі**
			   function glob_recursive($dir, $mask=''){ Global $result;


					foreach(glob($dir.'/*') as $filename){
							if(strtolower(substr($filename, strlen($filename)-strlen($mask), strlen($mask)))==strtolower($mask))
			if ($filename==CashFile) {continue;}
						$result[$filename]=filemtime($filename);

							if(is_dir($filename)) glob_recursive($filename, $mask);
					}

				}

				///*** Пошуку файлів в каталогах з ControlDir**

					foreach (ControlDir as $t){

						glob_recursive($t);
					}

				$cashFile = parse_ini_file(CashFile);

				foreach($result as $key=>$t) {

					if (array_key_exists($key, $cashFile)) {
						if ($cashFile[$key]!=$t) {	$write=1; }
					} else {$write=1;}

				$writeText.=$key."=".$t."\r\n";
				}

				if ($write) {
					$fp = fopen(CashFile, "w"); // Открываем файл в режиме записи
					$test = fwrite($fp, $writeText);
				}

				if (array_search($file, NotCashlFile) ===false) {

	header("Cache-Control: public");
	header("Expires: " . date("r", time()+CashTime));

		$last_modified_time = filemtime($file);
		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $last_modified_time
			&& $write==0 && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= filemtime(CashFile)){
		    header('HTTP/1.1 304 Not Modified');
		   die; ///*** убили всё, что ниже**
		}

		header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');

	///***Cesh End**
					}

		}

}

/**
	 *  @brief (Перевіряє наявніть нових сторінок новин та додає їх в sitemap.xml)
	 *
	 *  @details (Функція виконується в адмінці!)
*/
function renewalSitemap()
{

		GLOBAL $len_default, $site_url,$news_url_in_db,$data_xml,$data_xml_news, $db;

		if (empty($db))
		{
			GLOBAL $DB;
			$db=$DB;
		}

		function setPref($pref)
		{
			GLOBAL $len_default;
			if ($len_default==$pref)
			{
				$lang='';
			}
			else
			{
				$lang='/'.$pref;
			}
			return $lang;
		}

		function addPageInXml ($url)
		{
			GLOBAL $news_url_in_db,$data_xml,$data_xml_news;

			$news_url_in_db[]=$url;

			if (array_search($url,$data_xml_news)===false)
			{

				$data_xml[]=(object) array('loc' => $url,
													'lastmod' => date(DATE_RFC3339),
													'changefreq' => 'daily',
													'priority' => "1.00"
													);
			}
		}

		$file = $_SERVER['DOCUMENT_ROOT'].'sitemap.xml';
		$xml = file_get_contents($file);
		$movies = new \SimpleXMLElement($xml, LIBXML_NOCDATA);

		$data_xml_news=[];

		foreach($movies->url as $key=> $item)
		{

			if (strlen($item->loc)==strlen($site_url.'/') || strlen($item->loc)==strlen($site_url.'/')+3)
			{
				$item->changefreq='always';
			}
			else{
				$item->changefreq='daily';
			}

			$data_xml[]=$item;
			end($data_xml);

			if (strripos($item->loc, $site_url.setPref('ua').'/section')!==false)
			{
				unset($data_xml[key($data_xml)]);
			}
			if (strripos($item->loc, $site_url.setPref('ru').'/section')!==false)
			{
				unset($data_xml[key($data_xml)]);
			}
			if (strripos($item->loc, $site_url.setPref('en').'/section')!==false)
			{
				unset($data_xml[key($data_xml)]);
			}

			if (strripos($item->loc, '/news/')!==false &&  substr($item->loc, -6)!='/news/')
			{
				$data_xml_news[key($data_xml)] = $item->loc;
			}

		}

		$data_xml_=$data_xml;

			/*Видаляєм із списку sitemap сторінки новин, яких вже нема
			*/
			$result = $db->prepare("SELECT news_code, title_ua, title_ru,title_en, isActive FROM `news` ");
			$result->execute();
			$result->bind_result($s['news_code'],$s['title_ua'],$s['title_ru'],$s['title_en'],$s['isActive']);

			while($result->fetch())
			{
				if ($s['isActive']!=0)
				{
					continue;
				}
				if ($s['title_ua'])
				{
					addPageInXml($site_url.setPref('ua').'/news/'.$s['news_code'].'/');
				}
				if ($s['title_ru'])
				{
					addPageInXml($site_url.setPref('ru').'/news/'.$s['news_code'].'/');
				}
				if ($s['title_en'])
				{
					addPageInXml($site_url.setPref('en').'/news/'.$s['news_code'].'/');
				}
			}


			foreach($data_xml_news as $key=> $t)
			{
				if (array_search($t,$news_url_in_db)===false)
				{
					unset($data_xml[$key]);
				}
			}
			/**
				*/

		/** Генерування sitemap при виявленні змін сторінок
		*/
		end($data_xml);
		end($data_xml_);

		if (count($data_xml)!=count($data_xml_) || key($data_xml)!=key($data_xml_))
		{

			require_once(dirname(__FILE__)."/../sitemap/common.inc.php");

			set_time_limit(0);
			ini_set('memory_limit', '64M');

			$dir = $_SERVER['DOCUMENT_ROOT'];//document root path

			$tmp_dir = dirname(__FILE__);//temp path
			$base_url =  $site_url;//url with sitemaps (http://mysite.ru/sitemap.xml)

			$config = array('path' => $dir , 'tmp_dir'=>$tmp_dir,'base_url'=>$base_url,'gzip'=>false, 'gzip_level'=>9);

			$builder = new SitemapBuilder($config);

			$builder->start();
			$time = time();

			foreach ($data_xml as $t)
			{
				$builder->addUrl(array('loc'=>$t->loc,'lastmod'=>$time,'priority'=>$t->priority,'changefreq'=>$t->changefreq));
			}

			$builder->commit();

		}

}
