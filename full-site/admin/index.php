<?
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
//include ("redir.php");
//var_dump(is_dir('/home/forel/webiart.com.ua/new-york/en/news/pp/'));
?>
<!DOCTYPE html>
<html>
<head>
<title>Админ Панель</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/admin/dart.ico" />
</head>
<body>
<?php
include ("bd.php");
//print_r(__DIR__);
$check = $DB->query("SELECT * FROM `users`");
while ($myrow = mysqli_fetch_array($check)) {
    $sec_k = $myrow['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){?>
  <div class="main_d">
   <?include ("menu.php");?>
    <form id="logout">
     <input type="submit" value="Выйти"/>
        <input name="Yday" type="hidden" value="lg_Xasd"/>
    </form>
  </div>
<?}else{?>
    <div>
<form id="login">
    <input name="log" type="text" />
    <input name="pass" type="password"/>
    <input type="submit" value="Войти"/>
</form>
    </div>
<?}?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript"></script>
</body>
</html>
