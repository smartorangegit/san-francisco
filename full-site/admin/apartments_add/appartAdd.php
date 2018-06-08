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
    /*запись данных с формы в переменные, перед отправкой в базу */
    /*$ins запись данных в базу*/
    $type = $_POST['type'];
    $rooms = $_POST['rooms'];
    $build = $_POST['build'];
    $sec = $_POST['sec'];
    $floor = $_POST['floor'];
    $all_room = $_POST['all_room'];
    $life_room = $_POST['life_room'];
    $room1 = $_POST['room1'];
    $room2 = $_POST['room2'];
    $room3 = $_POST['room3'];
    $room4 = $_POST['room4'];
    $room5 = $_POST['room5'];
    $room6 = $_POST['room6'];
    $room7 = $_POST['room7'];
    $room8 = $_POST['room8'];
    $room9 = $_POST['room9'];
    $room10 = $_POST['room10'];
    $room11 = $_POST['room11'];
    $room12 = $_POST['room12'];
    $room13 = $_POST['room13'];
    $room14 = $_POST['room14'];
    $room15 = $_POST['room15'];
    $room16 = $_POST['room16'];
    $room17 = $_POST['room17'];
    $room18 = $_POST['room18'];
    $room19 = $_POST['room19'];
    $room20 = $_POST['room20'];
    $imgName = $_POST['imgName'];
    $level = $_POST['level'];
    $price = $_POST['price'];
    $onSale = $_POST['onSale'];
if(!empty($type) && !empty($rooms)) {
    $ins = $DB->query("INSERT INTO  `apartments` (`type`,`rooms`, `buld` , `sec` , `floor`,`all_room`,`life_room`,`room1`,`room2`,`room3`,`room4`,`room5`,`room6`,`room7`,
`room8`,`room9`,`room10`,`room11`,`room12`,`room13`,`room14`,`room15`,`room16`,`room17`,`room18`,`room19`,`room20`,`img`,`level`,`price`,`onSale`) 
VALUES ('$type','$rooms','$build','$sec','$floor','$all_room','$life_room','$room1','$room2','$room3','$room4','$room5','$room6','$room7','$room8','$room9','$room10',
'$room11','$room12','$room13','$room14','$room15','$room16','$room17','$room18','$room19','$room20','$imgName','$level','$price','$onSale')");
}
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