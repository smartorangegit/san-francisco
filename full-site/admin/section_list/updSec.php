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
    $postCount = count($_POST);
    $items = $postCount;
    $a = array("5");
    for ($s = 0; $s <= ($items / 6); $s++) {
        $last = array_pop($a);
        $new = $last + 6;
        array_push($a, $last);
        array_push($a, $new);
    }

    for ($i = 0; $i <= $items;) {
        $currKey = array_keys($_POST);
        if (in_array($i, $a)) {
            $idUP = $currKey[$i];
            $id = $_POST[$idUP];
            $sec = $_POST[$currKey[$i - 5]];
            $floor = $_POST[$currKey[$i - 4]];
            $build = $_POST[$currKey[$i - 3]];
            $img = $_POST[$currKey[$i - 2]];
            $compas = $_POST[$currKey[$i - 1]];

            $ins = $DB->query("UPDATE `section` SET
    `sec`='$sec',
    `floor`='$floor',
    `build`='$build',
    `img`='$img',
    `compas`='$compas'
    WHERE `id`='$id'");
        }
        if ($i >= $postCount) {
            break;
        }
        $i++;
    }
    //echo $sec.'-'.$floor.'-'.$build.'-'.$img.'-'.$compas.'-'.$id."\n";
    //print_r($a);


    if($ins){
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