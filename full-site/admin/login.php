<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
$pL = $_POST['log'];
$pP = $_POST['pass'];
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
$check = $DB->query("SELECT * FROM `users`");
while ($myrow = mysqli_fetch_array($check)) {
    //print_r($myrow);
    $adLog = $myrow['login'];
    $adPass= $myrow['password'];
    if(($pL == $adLog) && ($pP == $adPass)){
        //echo "Gotcha!";
        $_SESSION['check'] = $myrow['sec_code'];
        //print_r($_SESSION['check']);
        echo "Вы вошли, как - ".$myrow['login'];
    }
    else{
        echo "В доступе отказано, проврьте данные!";
    }

}
?>

