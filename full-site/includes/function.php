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
					 echo ' <span itemscope itemtype="https://data-vocabulary.org/Breadcrumb"><li class="breadcrumbs__item"><span itemprop="title" class="breadcrumbs__link">'.$url['text'].'</span></li></span>';
				 }
				 else
				 {
					 echo ' <li class="breadcrumbs__item"><span itemscope itemtype="https://data-vocabulary.org/Breadcrumb"><a  itemprop="url" class="breadcrumbs__link" href="'.$url['url'].'"><span itemprop="title">'.$url['text'].'</span></a></span> <span> > </span></li>';
				 }
			}

		    echo '</ul>';
		}

			?>

<!--		</span>-->
		</div>
		<!-- кінець breadcrumbs -->
          <span class="footer_left"><?=$mes['fut-mes1']?></span>
          <a href="https://smarto.agency/" rel="nofollow" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="-216 258.3 757.6 325.6"><style>.st0{enable-background:new}.st1{fill:#CCC}.st2{fill:#727376}.st3{fill:#898a8d}.st4{fill:#a0a1a3}.st5{fill:#8d8e91}.st6{fill:#6c6e70}.st7{fill:#f2f2f2}.st8{fill:#e5e5e5}.st9{fill:#a0a0a0}.st10{fill:#d8d8d8}.st11{fill:#999}.st12{fill:#a5a5a5}.st13{fill:#bfbfbf}.st14{fill:#808183}.st15{fill:#9c9ea0}.st16{fill:#b9b9ba}.st17{fill:#6e6f72}.st18{fill:#b9baba}.st19{fill:#b2b2b2}.st20{fill:#727272}.st21{fill:#8c8c8c}</style><g class="st0"><path class="st1" d="M90.9 398.1h2.7c.3 5.7 2.8 10.4 7.6 14 4.8 3.6 10.8 5.5 18 5.5 7 0 12.8-1.8 17.3-5.4s6.7-8.2 6.7-13.8c0-4.4-1.5-7.9-4.6-10.6s-8.1-4.9-15.1-6.6l-9.1-2.3c-7.4-1.8-12.8-4.3-16.2-7.3-3.4-3-5.1-7-5.1-11.8 0-5.9 2.5-10.9 7.4-14.9s10.9-6 17.8-6c7.3 0 13.4 1.9 18.4 5.7 5 3.8 7.6 8.5 7.8 14.1h-2.7c-.3-4.9-2.6-9-7.1-12.3-4.4-3.3-9.9-4.9-16.4-4.9-6.3 0-11.6 1.7-15.9 5.2-4.4 3.5-6.5 7.8-6.5 13.1 0 4.2 1.5 7.5 4.6 10.1s8 4.7 14.8 6.4l9 2.2c7.5 1.9 13.1 4.4 16.5 7.5 3.5 3.1 5.2 7.2 5.2 12.2 0 6.4-2.5 11.6-7.5 15.7s-11.4 6.1-19.4 6.1-14.6-2.1-19.9-6.2c-5.2-4-8.1-9.3-8.3-15.7zM231 340.1V419h-2.7v-72.6h-.2L196.2 419h-2.9l-31.9-72.6h-.2V419h-2.7v-78.9h2.9l33.3 75.5h.2l33.1-75.5h3zM302.3 419L292 391.6h-36.7L244.8 419h-3l30.4-78.9h2.8l30.4 78.9h-3.1zm-28.8-75.2L256.3 389H291l-17.2-45.2h-.3zM318.8 384.5V419H316v-78.9h24.5c7.9 0 14.1 2 18.6 5.9 4.5 4 6.8 9.4 6.8 16.3 0 5.8-1.7 10.6-5 14.4s-8 6.3-13.9 7.3l20.8 35h-3.1l-20.6-34.6c-1.3.1-2.5.1-3.6.1h-21.7zm0-41.9V382h21.7c7 0 12.6-1.8 16.6-5.3s6-8.3 6-14.4c0-6.2-2-11-6-14.5s-9.6-5.2-16.7-5.2h-21.6zM404.3 419h-2.7v-76.3h-28.5v-2.6h59.6v2.6h-28.5l.1 76.3z"/></g><g class="st0"><path class="st1" d="M126.3 427c10.6 0 19.1 3.7 25.3 11 6.3 7.3 9.4 17.2 9.4 29.6s-3.1 22.3-9.4 29.6c-6.3 7.3-14.7 11-25.4 11s-19.1-3.7-25.4-11-9.4-17.2-9.4-29.6 3.1-22.2 9.4-29.6c6.3-7.4 14.7-11 25.5-11zm0 2.5c-9.8 0-17.6 3.4-23.4 10.3-5.8 6.8-8.7 16.1-8.7 27.7s2.9 20.8 8.7 27.7c5.8 6.9 13.6 10.3 23.4 10.3 9.7 0 17.5-3.4 23.3-10.3s8.7-16.1 8.7-27.7-2.9-20.8-8.7-27.7c-5.8-6.8-13.6-10.3-23.3-10.3zM176.8 472.5V507H174v-78.9h24.5c7.9 0 14.1 2 18.6 5.9 4.5 4 6.8 9.4 6.8 16.3 0 5.8-1.7 10.6-5 14.4-3.4 3.8-8 6.3-13.9 7.3l20.8 35h-3.1l-20.6-34.6c-1.3.1-2.5.1-3.6.1h-21.7zm0-41.9V470h21.7c7 0 12.6-1.8 16.6-5.3s6-8.3 6-14.4c0-6.2-2-11-6-14.5s-9.6-5.2-16.7-5.2h-21.6zM293 507l-10.3-27.4H246L235.6 507h-3l30.4-78.9h2.8l30.4 78.9H293zm-28.7-75.2L247 477h34.7l-17.2-45.2h-.2zM309.5 507h-2.8v-78.9h3l52.4 73.7h.2v-73.7h2.7V507h-2.5l-52.8-74.3h-.2V507zM443.5 476.1c0 9.9-2.8 17.7-8.4 23.4-5.6 5.7-13.3 8.5-23 8.5-6.6 0-12.5-1.7-17.7-5.2-5.2-3.4-9.2-8.3-12-14.5-2.9-6.2-4.3-13.4-4.3-21.4 0-12 3.1-21.7 9.4-29 6.2-7.3 14.5-11 24.7-11 7.8 0 14.5 2.2 20.2 6.5s9.2 9.9 10.7 16.9h-2.7c-1.5-6.3-4.9-11.3-10-15.1-5.1-3.8-11.2-5.7-18.2-5.7-9.4 0-17 3.4-22.7 10.3S381 455.7 381 467c0 11.4 2.9 20.7 8.7 27.8 5.8 7.1 13.3 10.7 22.6 10.7 8.9 0 15.9-2.6 21-7.8 5.1-5.2 7.7-12.4 7.7-21.4v-5.5h-29v-2.5h31.7v7.8h-.2zM502.3 504.4v2.6h-45.2v-78.9h45.2v2.6h-42.4v34.6h40.5v2.5h-40.5v36.7h42.4v-.1z"/></g><path class="st2" d="M54.1 446.2l-1-5.6L65 418.9l-11.5-18.4 4.5-11.3-11-8.5-1.5-23-21.6-9.7-4-9.3-6.4-2.1L4 321.5l-20.1.9-17-15.1-15.5 5.3-5-2.7-12.3 6-23.7-5.1-9.5 10-6.5-.9-9.3 14.3-26.4 8.3-5.6 23.7-4.7 3.5-.3 5.3-2.4 2.3.2 3.2-16 17.5 7 18.5-5.8 10.8 6.1 10.8-4.1 18.1 16 16.3 1.8 14.3 10.3 5.1 7.2 21.9 24.3 4.2 8.2 10.6 11.7-.4 14.3 10.5 18.5-7 20.7 8.1 8.9-7.6 8 1.6 13.1-14.6 23.4-2.8 6.1-15.3 4.4-1.9 4-12.9 21.1-14.1-2.6-23.5z"/><path class="st3" d="M29.3 467.8l-5.2 10.4 10.4-22.8z"/><path class="st4" d="M-7.5 512.8l-7.3 2.9L6 500.5z"/><path class="st5" d="M48.3 406.9l-8.8-27.6 8 14.6z"/><path class="st6" d="M-103.9 513.5l-7.7-4.3 25.5 9.1z"/><path class="st7" d="M54.1 446.2l-7.6 11.1 5.4-24.8z"/><path class="st8" d="M-154.1 388.6l-.2-11.3 12.7-12.4z"/><path class="st9" d="M2.5 511l16.6-9.2 10.9-2.6z"/><path class="st1" d="M30 499.2l-10.9 2.6 16.4-20.3z"/><path class="st10" d="M6.5 335.4l13.4 3.3 6.4 14.9z"/><path class="st7" d="M-8.3 329.4l28.2 9.3-13.4-3.3z"/><path class="st11" d="M-149.9 468.9l15.8 25.2-15-7.3z"/><path class="st12" d="M-149.9 468.9l.8 17.9-4.2-32z"/><path class="st13" d="M-17 533.8l-28-5.8 18 .8z"/><path class="st10" d="M-17 533.8l-10-5 24.5-11.1z"/><path class="st13" d="M-159.4 440.1l6.1 14.7-15.6-27.5z"/><path class="st10" d="M-161.6 413.4l2.2 26.7-9.5-12.8z"/><path class="st1" d="M-45 528l-28.1 10.7 19-8.2z"/><path class="st8" d="M-33.1 307.3l24.8 22.1-9.8-6.9zM65 418.9l-13.2-14.1-4.2-13.6z"/><path class="st14" d="M51.8 404.8l-8.4-27 4.2 13.4z"/><path class="st10" d="M47.6 391.2l-4.2-13.4 2.1-20.1z"/><path class="st11" d="M-73.1 538.7l-10.5-13.1 29.5 4.9zM-73.1 538.7l-26.2-19.3 15.7 6.2z"/><path class="st7" d="M-94.4 323.4l-15.9 9.4 20.7-22zM-89.6 310.8l28.2 6.1-8.9 1z"/><path class="st8" d="M-94.4 323.4l4.8-12.6 19.3 7.1z"/><path class="st7" d="M-44.5 316.8l11.4-9.5 15 15.2z"/><path class="st15" d="M-61.4 316.9l16.9-.1-25.8 1.1z"/><path class="st8" d="M-61.4 316.9l28.3-9.6-11.4 9.5z"/><path class="st16" d="M-117.8 338.5l7.5-5.7 15.9-9.4z"/><path class="st8" d="M-117.8 338.5l-23.5 4 31-9.7z"/><path class="st7" d="M65 418.9l-13.6 9.9.4-24z"/><path class="st8" d="M51.8 443.2l-.4-14.4 13.6-9.9z"/><path class="st13" d="M-27 528.8l16.1-8.8 8.4-2.3z"/><path class="st12" d="M-159.9 425.4l.5 14.7-2.2-26.7z"/><path class="st17" d="M-99.3 519.4l-11.3-6 27 12.2z"/><path class="st11" d="M-99.3 519.4l-32.3-5.6 21-.4z"/><path class="st7" d="M-139.3 361.8l-2-19.3 23.5-4z"/><path class="st8" d="M-139.3 361.8l-9.8 13.1 7.8-32.4zM19.5 346.1l26 11.6-16.4 2.5z"/><path class="st7" d="M29.1 360.2l16.4-2.5-2.1 20.1z"/><path class="st1" d="M-83.6 525.6l17.7 1.8 11.8 3.1z"/><path class="st10" d="M55.1 472.2l-9.5-22.7 6.2-6.3z"/><path class="st1" d="M45.6 449.5l5.8-20.7.4 14.4z"/><path class="st18" d="M-152.4 386.6l3.3-11.7 9.8-13.1z"/><path class="st7" d="M-152.4 386.6l-17.7 11.4 21-23.1z"/><path class="st1" d="M-44.5 316.8l26.4 5.7-8.9 1.4z"/><path class="st7" d="M-27 323.9l8.9-1.4 22.1-1z"/><path class="st1" d="M-94.4 323.4l24.1-5.5-7.3 5.7z"/><path class="st8" d="M-139.3 361.8l21.5-23.3-7 11.1z"/><path class="st12" d="M-129.8 491.7l19.2 21.7-21 .4z"/><path class="st19" d="M-129.8 491.7l-1.8 22.1-10.5-32.2z"/><path class="st8" d="M55.1 472.2l-20-1.7 10.5-21z"/><path class="st7" d="M30.5 488.7l4.6-18.2 20 1.7z"/><path class="st1" d="M51.8 404.8l-5.5 4.5L58 389.2z"/><path class="st10" d="M51.4 428.8l-5.1-19.5 5.5-4.5z"/><path class="st8" d="M37.5 381.2l5.9-3.4L58 389.2z"/><path class="st7" d="M37.5 381.2l20.5 8-11.7 20.1z"/><path class="st1" d="M29.1 360.2l14.3 17.6-5.9 3.4z"/><path class="st10" d="M-152.4 386.6l-2.2 24-15.5-12.6z"/><path class="st19" d="M-154.6 410.6l-5.3 14.8-10.2-27.4z"/><path class="st1" d="M19.5 346.1l9.6 14.1-16.8-12.1z"/><path class="st8" d="M4 321.5l15.5 24.6-7.2 2z"/><path class="st10" d="M-77.6 323.6l7.3-5.7 16.7-8zM19.5 516.4l.8-27.6 10.2-.1z"/><path class="st8" d="M20.3 488.8l14.8-18.3-4.6 18.2z"/><path class="st12" d="M-33.9 539.8l-32-12.4 19.6-4.2z"/><path class="st1" d="M-33.9 539.8l-12.4-16.6 26.2-7.1z"/><path class="st8" d="M-33.9 539.8l13.8-23.7 9.2 3.9z"/><path class="st1" d="M-10.9 520L1 504.4l18.5 12z"/><path class="st8" d="M19.5 516.4L1 504.4l19.3-15.6z"/><path class="st10" d="M-20.1 516.1L1 504.4-10.9 520z"/><path class="st19" d="M-143.9 464.3l1.8 17.3-24.8-25.4z"/><path class="st11" d="M-129.8 491.7l-12.3-10.1-1.8-17.3z"/><path class="st11" d="M-152.1 436.3l8.2 28-23-8.1z"/><path class="st10" d="M-152.1 436.3l-7.8-10.9 5.3-14.8z"/><path class="st7" d="M-152.1 436.3l-14.8 19.9 7-30.8zM-9.4 338.5l13.4-17 8.3 26.6z"/><path class="st8" d="M-27 323.9l31-2.4-13.4 17z"/><path class="st10" d="M-104.9 342.3l-19.9 7.3 19.2-29.7z"/><path class="st12" d="M-65.9 527.4l-33.2 1.2 24.2-10.1z"/><path class="st11" d="M-65.9 527.4l-9-8.9 28.6 4.7zM-112.3 499.1l1.7 14.3-19.2-21.7z"/><path class="st13" d="M-112.3 499.1l13.2 29.5-11.5-15.2z"/><path class="st8" d="M-104.9 342.3l-.7-22.4 25.2 13.6z"/><path class="st10" d="M-105.6 319.9l28 3.7-2.8 9.9zM-151.6 369.7l7.3 27.2-8.1-10.3z"/><path class="st13" d="M-144.3 396.9l-10.3 13.7 2.2-24z"/><path class="st1" d="M-27 323.9l17.6 14.6-23.5-4.7z"/><path class="st10" d="M-53.6 309.9l26.6 14-5.9 9.9z"/><path class="st7" d="M-125.4 364.8l.6-15.2 19.9-7.3z"/><path class="st10" d="M-125.4 364.8l-26.2 4.9 26.8-20.1z"/><path class="st7" d="M-77.6 323.6l24-13.7-4 22.5z"/><path class="st8" d="M-57.6 332.4l4-22.5 20.7 23.9zM-77.6 323.6l20 8.8-22.8 1.1zM37.5 381.2l8.8 28.1L32 398.4z"/><path class="st1" d="M32 398.4l14.3 10.9 6.3 20.2z"/><path class="st10" d="M35.1 470.5l-1.8-22.7 12.3 1.7z"/><path class="st7" d="M45.6 449.5l-12.3-1.7 19.3-18.3z"/><path class="st8" d="M12.3 348.1l16.8 12.1 2.2 2.1z"/><path class="st10" d="M31.3 362.3l6.2 18.9-5.5 17.2z"/><path class="st12" d="M-92.1 502.3l-7 26.3-13.2-29.5z"/><path class="st13" d="M-92.1 502.3l17.2 16.2-24.2 10.1z"/><path class="st8" d="M-9.4 338.5l21.7 9.6-7.8 10.2z"/><path class="st7" d="M4.5 358.3l7.8-10.2 19 14.2z"/><path class="st10" d="M-46.3 523.2l10.3-14.5 15.9 7.4z"/><path class="st8" d="M-46.3 523.2l-9.8 3.3 20.1-17.8z"/><path class="st13" d="M-136.9 447.5l-7 16.8-8.2-28z"/><path class="st1" d="M-129.6 387.5l-14.7 9.4-7.3-27.2z"/><path class="st8" d="M-125.4 364.8l-4.2 22.7-22-17.8z"/><path class="st10" d="M1 504.4l3-20.9 16.3 5.3z"/><path class="st7" d="M32 398.4l20.6 31.1-28.3-11.9z"/><path class="st10" d="M24.3 417.6l28.3 11.9-19.3 18.3zM-104.9 342.3l24.5-8.8-6.5 17.7z"/><path class="st1" d="M32 398.4l-7.7 19.2-10-32.1z"/><path class="st7" d="M31.3 362.3l.7 36.1-17.7-12.9z"/><path class="st10" d="M4.5 358.3l26.8 4-17 23.2z"/><path class="st12" d="M-135.9 481l23.6 18.1-17.5-7.4zM-136.9 447.5l1 33.5-8-16.7z"/><path class="st19" d="M-65.6 503.7l9.5 22.8-18.8-8z"/><path class="st11" d="M-65.6 503.7l-9.3 14.8-17.2-16.2z"/><path class="st10" d="M-65.6 503.7l29.6 5-20.1 17.8z"/><path class="st19" d="M-152.9 419.4l16 28.1-15.2-11.2z"/><path class="st7" d="M-144.3 396.9l-8.6 22.5-1.7-8.8z"/><path class="st12" d="M-152.9 419.4l.8 16.9-2.5-25.7z"/><path class="st8" d="M-114.6 348.1l9.7-5.8 18 8.9z"/><path class="st1" d="M20.3 488.8L4 483.5l24.8-12zM35.1 470.5l-6.3 1 4.5-23.7z"/><path class="st10" d="M20.3 488.8l8.5-17.3 6.3-1zM-57.6 332.4l24.7 1.4-7.7 14z"/><path class="st13" d="M-103.6 482.2l-8.7 16.9-23.6-18.1z"/><path class="st11" d="M-92.1 502.3l-20.2-3.2 8.7-16.9z"/><path class="st10" d="M-108.1 374.5l-21.5 13 4.2-22.7z"/><path class="st10" d="M-114.6 348.1l27.7 3.1-21.2 23.3z"/><path class="st8" d="M-114.6 348.1l6.5 26.4-17.3-9.7z"/><path class="st13" d="M-20.1 516.1l-15.9-7.4 25.7-2.4zM1 504.4l-11.3 1.9L4 483.5z"/><path class="st8" d="M-20.1 516.1l9.8-9.8L1 504.4z"/><path class="st13" d="M-126.1 408.6l-18.2-11.7 14.7-9.4z"/><path class="st8" d="M-126.1 408.6l-26.8 10.8 8.6-22.5z"/><path class="st7" d="M-40.6 347.8l7.7-14 20.6 10z"/><path class="st10" d="M-32.9 333.8l23.5 4.7-2.9 5.3z"/><path class="st1" d="M-12.3 343.8l2.9-5.3 13.9 19.8z"/><path class="st8" d="M24.3 417.6l9 30.2-21.8-10.1z"/><path class="st7" d="M11.5 437.7l21.8 10.1-4.5 23.7z"/><path class="st13" d="M-114.4 458.4l-21.5 22.6-1-33.5z"/><path class="st12" d="M-114.4 458.4l10.8 23.8-32.3-1.2z"/><path class="st8" d="M4.5 358.3l9.8 27.2-22.7-9.2z"/><path class="st7" d="M-12.3 343.8l16.8 14.5-12.9 18z"/><path class="st12" d="M-44.5 489.7l34.2 16.6-25.7 2.4z"/><path class="st13" d="M-44.5 489.7l8.5 19-29.6-5z"/><path class="st11" d="M-114.4 458.4l-22.5-10.9 15.5-14z"/><path class="st19" d="M-126.1 408.6l4.7 24.9-31.5-14.1z"/><path class="st12" d="M-121.4 433.5l-15.5 14-16-28.1z"/><path class="st1" d="M-64.6 338.6l7-6.2 17 15.4z"/><path class="st10" d="M-80.4 333.5l22.8-1.1-7 6.2z"/><path class="st7" d="M-86.9 351.2l6.5-17.7 15.8 5.1z"/><path class="st8" d="M11.5 437.7l17.3 33.8-33.3-14.6z"/><path class="st1" d="M-4.5 456.9l33.3 14.6-24.8 12z"/><path class="st1" d="M-23.9 475.2L4 483.5l-14.3 22.8z"/><path class="st19" d="M-23.9 475.2l13.6 31.1-34.2-16.6z"/><path class="st13" d="M-4.5 456.9L4 483.5l-27.9-8.3z"/><path class="st8" d="M-86.9 351.2l22.3-12.6-18.5 33.1z"/><path class="st1" d="M-86.9 351.2l3.8 20.5-25 2.8z"/><path class="st10" d="M-40.6 347.8l28.3-4-20.7 26.4z"/><path class="st8" d="M-12.3 343.8l3.9 32.5-24.6-6.1z"/><path class="st13" d="M-64.6 338.6l5.7 29.4-24.2 3.7z"/><path class="st8" d="M-64.6 338.6l24 9.2-18.3 20.2z"/><path class="st1" d="M-40.6 347.8l7.6 22.4-25.9-2.2z"/><path class="st11" d="M-87.9 465.3l-15.7 16.9-10.8-23.8z"/><path class="st12" d="M-23.9 475.2l-20.6 14.5-12.4-20.5z"/><path class="st11" d="M-102.9 418l-18.5 15.5-4.7-24.9z"/><path class="st13" d="M-80.3 493.3l14.7 10.4-26.5-1.4zM-87.9 465.3l31 3.9-23.4 24.1z"/><path class="st11" d="M-56.9 469.2l12.4 20.5-35.8 3.6z"/><path class="st19" d="M-80.3 493.3l35.8-3.6-21.1 14z"/><path class="st12" d="M-87.9 465.3l7.6 28-23.3-11.1z"/><path class="st19" d="M-80.3 493.3l-11.8 9-11.5-20.1z"/><path class="st1" d="M11.5 437.7l-16 19.2-12-30.4z"/><path class="st19" d="M-58.9 368l-23.4 26.2-.8-22.5z"/><path class="st10" d="M-8.4 376.3l-18.4 20.5-6.2-26.6z"/><path class="st8" d="M14.3 385.5l10 32.1-16.5-14.9zM-8.4 376.3l16.2 26.4-34.6-5.9z"/><path class="st10" d="M-8.4 376.3l22.7 9.2-6.5 17.2z"/><path class="st7" d="M7.8 402.7l3.7 35-28-11.2z"/><path class="st10" d="M7.8 402.7l16.5 14.9-12.8 20.1z"/><path class="st10" d="M-26.8 396.8l34.6 5.9-24.3 23.8z"/><path class="st13" d="M-113.4 392.7l31.1 1.5-20.6 23.8z"/><path class="st10" d="M-83.1 371.7l.8 22.5-31.1-1.5z"/><path class="st12" d="M-113.4 392.7l10.5 25.3-23.2-9.4z"/><path class="st19" d="M-113.4 392.7l-12.7 15.9-3.5-21.1z"/><path class="st7" d="M-108.1 374.5l-5.3 18.2-16.2-5.2z"/><path class="st8" d="M-108.1 374.5l25-2.8-30.3 21z"/><path class="st12" d="M-67.1 444.4l10.2 24.8-31-3.9z"/><path class="st11" d="M-82.3 394.2l6.2 25.1-26.8-1.3zM-46.6 419.9l-20.5 24.5-9-25.1z"/><path class="st1" d="M-26.8 396.8l10.3 29.7-30.1-6.6z"/><path class="st13" d="M-101.1 445.2l34-.8-20.8 20.9z"/><path class="st12" d="M-101.1 445.2l13.2 20.1-26.5-6.9zM-102.9 418l1.8 27.2-20.3-11.7z"/><path class="st13" d="M-101.1 445.2l-13.3 13.2-7-24.9z"/><path class="st12" d="M-76.1 419.3l9 25.1-34 .8z"/><path class="st19" d="M-102.9 418l26.8 1.3-25 25.9z"/><path class="st10" d="M-56.3 387.9l29.5 8.9-19.8 23.1z"/><path class="st7" d="M-33 370.2l6.2 26.6-29.5-8.9z"/><path class="st13" d="M-58.9 368l25.9 2.2-23.3 17.7z"/><path class="st12" d="M-56.3 387.9l9.7 32-29.5-.6z"/><path class="st7" d="M-58.9 368l2.6 19.9-26 6.3z"/><path class="st19" d="M-82.3 394.2l26-6.3-19.8 31.4z"/><path class="st7" d="M-16.5 426.5l12 30.4-29.4-5.1z"/><path class="st10" d="M-33.9 451.8l29.4 5.1-19.4 18.3z"/><path class="st19" d="M-46.6 419.9l12.7 31.9-33.2-7.4z"/><path class="st10" d="M-46.6 419.9l30.1 6.6-17.4 25.3z"/><path class="st13" d="M-33.9 451.8l10 23.4-33-6z"/><path class="st11" d="M-67.1 444.4l33.2 7.4-23 17.4z"/><g><path class="st20" d="M-151.6 305.3l23.2 9.9 8.6 20.8z"/><path class="st12" d="M-124.8 306.5l5 29.5-8.6-20.8-8-17.6z"/><path class="st21" d="M-168.6 297.6l17 7.7 23.2 9.9-8-17.6z"/><path class="st19" d="M-150.3 285l13.9 12.6h-32.2z"/><path class="st13" d="M-176.8 285h26.5l-18.3 12.6z"/><path class="st21" d="M-150.3 285l17.9 1.3-16.2-10.3-28.2 9z"/><path class="st12" d="M-123.9 286.3h-8.5l-16.2-10.3z"/><path class="st20" d="M-124.8 306.5l-7.6-20.2-17.9-1.3 13.9 12.6zM-114.9 334.5l-9.9-28 5 29.5z"/><path class="st21" d="M-123.9 286.3l9 48.2-9.9-28-7.6-20.2z"/></g></svg>
            <!-- <img <?LazyLoad ("/img/logo-smart.png")?> alt="smartorange"> -->
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
