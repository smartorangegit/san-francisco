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
    //print_r($_POST);
        $sec = $_POST['sec'];
        $floor = $_POST['floor'];
        $build = $_POST['build'];
        $img = $_POST['img'];
        $compas = $_POST['compas'];
    //print_r($_POST);
        $ins = $DB->query("INSERT INTO `section` SET 
`sec`='$sec',
`floor`='$floor',
`build`='$build',
`img`='$img',
`compas`='$compas'");

    if($ins){
        echo "Данные добавлены!";
    }
    else{
        echo "Произошла ошибка!";
    }
}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>