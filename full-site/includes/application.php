<?php session_start();  /*UA_application*/

require($_SERVER['DOCUMENT_ROOT'].'/includes/config.php');

//include('check_calls.php');

/* переменные для проверки*/
$day = date("Y-m-d H:i:s",strtotime("-1 hour"));
$check = $db->query("SELECT * FROM calls where dates >= CURRENT_TIME - INTERVAL 1.5 HOUR");
//print_r($_POST['tel']."-".$_POST['name']."<br/>");

function clear_phone($phone){
    $phone=	str_replace("+(38)", "38", $phone);
    $phone = str_replace("-", "", $phone);
    $phone = str_replace(" ", "", $phone);
    return $phone;
}

	 $utm=array(
		'utm_source' ,
		'utm_medium',
		'utm_campaign' ,
		'utm_term', 
		'utm_content' 
		);	
	$utms=array();	
	foreach($utm as $key=>$t)
	{
		if (isset($_SESSION[$t]))
		{
			$utms[]=$_SESSION[$t];
		}
		else
		{
			$utms[]='';
		}			
	}


$_POST['tel']=clear_phone($_POST['tel']);

$phone = $_POST['tel'];
$name = $_POST['name'];
$dat = date("Y-m-d H:i:s");
$good = 0;
/**/
session_start();

$time = date("H:i:s");
$Id = 1; //54
define('CRM_HOST', 'riverside-development.bitrix24.ua'); // Домен срм системы smartorange.bitrix24.ru riverside-development.bitrix24.ua
define('CRM_PORT', '443');
define('CRM_PATH', '/crm/configs/import/lead.php');

	if ($_POST['typ'] == 8) {
		define('CRM_LOGIN', 'a.sharshakow@saga-development.com.ua');  // логин
		define('CRM_PASSWORD', 'saga123'); // пароль
	}
	else {
		define('CRM_LOGIN', 'gav.sqrt@gmail.com');  // логин
		define('CRM_PASSWORD', '4561210_gav'); // пароль
	}

/********************************************************************************************/
if(empty($_POST['message']))
{
    $_POST['message']=$_POST['email'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $count=$_POST['count'];
if($count !=0 || $count > 0) {
     // получаем данные из полей и задаем название лида
	 
	 if ($_POST['typ'] == 8) {
		 		 $postData = array(
			'TITLE' => $_POST['metka'], // сохраняем нашу метку и формируем заголовок лида
			'NAME' => $_POST['name'],   // сохраняем имя
			'PHONE_WORK' => $_POST['tel'], // сохраняем телефон
			'EMAIL_WORK' => $_POST['email'], // сохраняем почту
			'UF_CRM_1485774805' => $_POST['inn'], // сохраняем ИНН UF_CRM_1485437157
			'ASSIGNED_BY_ID' => $Id,
			'ADDRESS' => $_POST['webad'],
			'UF_CRM_1527676517'	=> $_POST['name_an'],
			'UF_CRM_1485774841' => $time, //UF_CRM_1485510398
			'UF_CRM_1485774828' => $_POST['message'], //UF_CRM_1485507619
			'UF_CRM_1517487869'=>$utms[0],
			'UF_CRM_1517487957'=>$utms[1],
			'UF_CRM_1517488014'=>$utms[2],
			'UF_CRM_1517489120'=>$utms[3],
			'UF_CRM_1517489335'=>$utms[4]
		);
	 }
	 else{
		 $postData = array(
			'TITLE' => $_POST['metka'], // сохраняем нашу метку и формируем заголовок лида
			'NAME' => $_POST['name'],   // сохраняем имя
			'PHONE_WORK' => $_POST['tel'], // сохраняем телефон
			'EMAIL_WORK' => $_POST['email'], // сохраняем почту
			'UF_CRM_1485774805' => $_POST['inn'], // сохраняем ИНН UF_CRM_1485437157
			'ASSIGNED_BY_ID' => $Id,
			'ADDRESS' => $_POST['webad'],
			'UF_CRM_1485774841' => $time, //UF_CRM_1485510398
			'UF_CRM_1485774828' => $_POST['message'], //UF_CRM_1485507619
			'UF_CRM_1517487869'=>$utms[0],
			'UF_CRM_1517487957'=>$utms[1],
			'UF_CRM_1517488014'=>$utms[2],
			'UF_CRM_1517489120'=>$utms[3],
			'UF_CRM_1517489335'=>$utms[4]
		);
	 }

    function addintbd($name, $phone, $formData, $typs, $kv, $crm=0)
    {
        GLOBAL $db;

        date_default_timezone_set('Europe/Kiev');
        $today = date("Y-m-d H:i:s");
        $ip = $_SERVER["REMOTE_ADDR"];
        $phone = $_POST['tel'];
        $name = $_POST['name'];
        $formData = $_POST['message'];



        $result = $db->query("INSERT INTO `calls` (`dates`, `ip`, `name`, `fhonenumber`, `texts`, `typs`,`kv`,`crm`) VALUES ('$today', '$ip', '$name', '$phone', '$formData', '$typs', '$kv', '$crm')");
		return $result->insert_id; 

    }

    // авторизация, проверка логина и пароля
    if (defined('CRM_AUTH')) {
        $postData['AUTH'] = CRM_AUTH;
    } else {
        $postData['LOGIN'] = CRM_LOGIN;
        $postData['PASSWORD'] = CRM_PASSWORD;
    }

    $fp = fsockopen("ssl://" . CRM_HOST, CRM_PORT, $errno, $errstr, 30);
    if ($fp) {

        // формируем и шифруем строку с данными из формы
        $strPostData = '';
        foreach ($postData as $key => $value)
            $strPostData .= ($strPostData == '' ? '' : '&') . $key . '=' . urlencode($value);
        $str = "POST " . CRM_PATH . " HTTP/1.0\r\n";
        $str .= "Host: " . CRM_HOST . "\r\n";
        $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $str .= "Content-Length: " . strlen($strPostData) . "\r\n";
        $str .= "Connection: close\r\n\r\n";

        $str .= $strPostData;
        while ($myrow = mysqli_fetch_array($check)) {
            if (in_array($phone, $myrow)) {
                //echo "Нашел номер";
              //  if ($day <= $myrow["dates"]) {
                    /*echo "Обращался за прошлый час! --- ";
                    print_r("Номер : ".$myrow["fhonenumber"]."  Время : ".$myrow["dates"]."<br/>");*/
                    $good = 1;
              //  }
            }
            /*echo "<pre>";
                print_r("Номер : ".$myrow["fhonenumber"]."  Время : ".$myrow["dates"]);
            echo "</pre>";
            */ 
        }
		
		$insert_id=addintbd($name, $phone, $formData, $typs = $_POST['typ'], $kv);
		
        if ($good == 1) {
// если 1 то номер есть в базе и за последний час человек оставлял заявку и мы его записываем в базу но не шлем в CRM
//$zDB = mysql_query("INSERT INTO `bristol_calls` (`name`, `fhonenumber`,`dates`) VALUES ('$name', '$phone', '$dat')");
       
            //header("Location: /success.php");
		 echo json_encode(array('result'=>1,'page'=>'/message/'));
        } else {
//если такого номера нет или он не звонил за последний час, добавляем в базу и отправляем в CRM

            // отправляем запрос в срм систему
            fwrite($fp, $str);
            $result = '';
            while (!feof($fp)) {
                $result .= fgets($fp, 128);
            }
            fclose($fp);

            $response = explode("\r\n\r\n", $result);
            $output = '<pre>' . print_r($response[1], 1) . '</pre>';
            $_SESSION['rezult_text'] = $mes['c-mes13'];
			
			$error=str_replace("'", '"',$response[1]);
			$error=json_decode($error);

			ob_start();
			echo '<pre>'; print_r($response); echo '</pre>'; 	
			$text=ob_get_contents ();
			ob_clean ();
			
			$format = "\n\n[" . date('Y-m-d H:i:s') . "]\nTel: ".$phone."\n";
			$message=$format."\n".$result."\n";

			$path = $_SERVER['DOCUMENT_ROOT']."/log/call.log";
			file_put_contents($path, $message,FILE_APPEND);
			if ($error->error) {$crm=$error->error;} else {$crm=0;}
								
			if ($error->error!=201) {
				$mail = array(  
				'to' => "vitaliyzell@gmail.com",  
				'subject' => "ОШИБКА ОТПРАВКИ ЛИДА В CRM",  
				'message' => 'Ошибка отправки лида в CRM с формы "'.$_POST['metka'].'" для номера '.$phone,  
				'headers' => "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n"."From: ОШИБКА ОТПРАВКИ ЛИДА В CRM <errorloger@email.ua>\r\n"
					);  

				$rez=mail($mail['to'], $mail['subject'], $mail['message'], iconv ('utf-8', 'windows-1251', $mail['headers']));
			}
			
          //  addintbd($name, $phone, $formData, $typs = $_POST['typ'], $kv,$crm);
			$result = $db->query("UPDATE `calls` SET `crm` = $crm WHERE `id` = $insert_id;");
            //header("Location: success.php");  
		 echo json_encode(array('result'=>1,'page'=>'/message/'));
        }
    } else {
		
		echo json_encode(array('result'=>0,'message'=>'Connection Failed! '.$errstr.' ('.$errno.')'));
    }

    /* }
     else
     {
         //header("Location: fail.php");
     }

 }
 else
 {
     //header("Location: fail.php");
 }
*/
}else{
    //форма не прошла проверку на бота
}
}
?>
