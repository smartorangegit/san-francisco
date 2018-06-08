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
    $pers1 = $_POST['pers1'];
    $pers2 = $_POST['pers2'];
    $pers3 = $_POST['pers3'];
    $pers4 = $_POST['pers4'];

    $op1 = $_POST['opP1'];
    $op2 = $_POST['opP2'];
    $op3 = $_POST['opP3'];
    $op4 = $_POST['opP4'];

    $opP1 = str_replace("'", "`", $op1);
    $opP2 = str_replace("'", "`", $op2);
    $opP3 = str_replace("'", "`", $op3);
    $opP4 = str_replace("'", "`", $op4);

    $updPers = $DB->query("UPDATE `pers` SET 
`persent_1`='$pers1',
`persent_2`='$pers2',
`persent_3`='$pers3',
`persent_4`='$pers4',
`perOpis_1` = '$opP1',
`perOpis_2` = '$opP2',
`perOpis_3` = '$opP3',
`perOpis_4` = '$opP4'");
    if($updPers){
        echo "Данные обновлены!";
    }
    else{
        echo "Произошла ошибка!";
    }

}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>