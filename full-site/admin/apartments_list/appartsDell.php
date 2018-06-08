<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
$checkSecur = $DB->query("SELECT * FROM `users`");
while ($rowSecure = mysqli_fetch_array($checkSecur)) {
    $securKode = $rowSecure['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode) {
    $id = $_POST['dellId'];
    $del_lvl = $DB->query("DELETE FROM `apartments_level` WHERE `id_flat`='$id'");
    $del = $DB->query("DELETE FROM `apartments` WHERE `id`='$id'");
        if($del){
            echo "Квартира удалена! \n";
        }
}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>