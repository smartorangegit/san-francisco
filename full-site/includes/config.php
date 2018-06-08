<?
$Server = "customsh.mysql.ukraine.com.ua"; 
$Login = "customsh_sanfran"; 
$Password = "ze2he8qx";
$DataBase = "customsh_sanfran";
global $site_url, $len_default; $site_url='http://san.smarto.com.ua';

$len_default='ua';
$len=array('ru');


$db = new MySQLi($Server, $Login, $Password, $DataBase);

$result = $db->query("Set charset utf8");
$result = $db->query("Set character_set_client = utf8");
$result = $db->query("Set character_set_connection = utf8");
$result = $db->query("Set character_set_results = utf8");
$result = $db->query("Set collation_connection = utf8_general_ci");

if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 


define(DIR, $_SERVER['DOCUMENT_ROOT']);  

define(Cash, true);            
define(CashFile,'includes/inc/cash.ini'); 
define(CashTime, 10800);
define(ControlDir, array('js','css','includes',
						'parking',
						'premise',
						'social',
						'floorplan',
						'fail',
						'pdf_docs',
						'webcam',
						'commercial',
						'home',
						'news_list',
						'plan',
						'usloviya-priobreteniya-rassrochka',
						'comingsoon',
						'developer',
						'flats',
						'maps',
						'building',
						'sucsess',
						'sitemap',
						'documentation',
						'application'
						)
		);
define(NotCashlFile, array('news/index.php')); 





?>