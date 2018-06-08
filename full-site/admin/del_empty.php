<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
session_start();

$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {



    $delEMPT = $DB->query("DELETE FROM `news` WHERE `news_code`=''");
    unlink($del_img);
    rmdir($del_dir);
    echo "Новость с кодом - ".$del_kod." удалена!";
}
else{
    echo "Нет прав!";
}