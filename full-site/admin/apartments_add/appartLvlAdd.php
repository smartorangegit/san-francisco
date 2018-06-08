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
    echo "Добавляем уровнеь для квартиры с id - ".$_POST['id_flat'];
    $id = $_POST['id_flat'];
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
    $room21 = $_POST['room21'];
    $room22 = $_POST['room22'];
    $room23 = $_POST['room23'];
    $room24 = $_POST['room24'];
    $room25 = $_POST['room25'];
    $room26 = $_POST['room26'];
    $room27 = $_POST['room27'];
    $room28 = $_POST['room28'];
    $room29 = $_POST['room29'];
    $room30 = $_POST['room30'];
    //print_r($_POST);
    if(!empty($id)) {
        $ins = $DB->query("INSERT INTO `apartments_level` SET 
`room1`='$room1',
`room2`='$room2',
`room3`='$room3',
`room4`='$room4',
`room5`='$room5',
`room6`='$room6',
`room7`='$room7',
`room8`='$room8',
`room9`='$room9',
`room10`='$room10',
`room11`='$room11',
`room12`='$room12',
`room13`='$room13',
`room14`='$room14',
`room15`='$room15',
`room16`='$room16',
`room17`='$room17',
`room18`='$room18',
`room19`='$room19',
`room20`='$room20',
`room21`='$room21',
`room22`='$room22',
`room23`='$room23',
`room24`='$room24',
`room25`='$room25',
`room26`='$room26',
`room27`='$room27',
`room28`='$room28',
`room29`='$room29',
`room30`='$room30',
`id_flat`='$id'"
        );
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