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
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode){
 //print_r($_POST);
 $postCount = count($_POST);
 $items = $postCount;
 $z=3;
 //$a = array("3","7","11");
    $a = array("6");
    for($s=0;$s<=($items/7);$s++){
        $last = array_pop($a);
        $new = $last+7;
        array_push($a,$last);
        array_push($a,$new);
    }
    //echo $s;
 for($i = 0; $i<=$items;) {
     $currKey = array_keys($_POST);
//     if ($i == 0) {
//         $idUP = $currKey[$i+6];
//         $id = $_POST[$idUP];
//         $type = $_POST[$currKey[$i]];
//         $rooms = $_POST[$currKey[$i+1]];
//         $buld = $_POST[$currKey[$i+2]];
//         $sec = $_POST[$currKey[$i+3]];
//         $flor = $_POST[$currKey[$i+4]];
//         $price = $_POST[$currKey[$i+5]];
//         $update = $DB->query("UPDATE `apartments` SET `type`='$type',`rooms`='$rooms',`buld`='$buld',`sec`='$sec',`floor`='$flor',`price`='$price' WHERE `id`='$id'");
//     }
         if (in_array($i, $a)) {
             $idUP = $currKey[$i];
             $id = $_POST[$idUP];
             $type = $_POST[$currKey[$i-6]];
             $rooms = $_POST[$currKey[$i-5]];
             $buld = $_POST[$currKey[$i-4]];
             $sec = $_POST[$currKey[$i-3]];
             $flor = $_POST[$currKey[$i-2]];
             $price = $_POST[$currKey[$i-1]];
             //echo $type.'-'.$rooms.'-'.$buld.'-'.$sec.'-'.$flor.'-'.$price.'-'.$id."\n";

             $update = $DB->query("UPDATE `apartments` SET `type`='$type',`rooms`='$rooms',`buld`='$buld',`sec`='$sec',`floor`='$flor',`price`='$price' WHERE `id`='$id'");
         }
     if ($i >= $postCount) {
         break;
     }
     $i++;
 }
    echo  "Данные обновлены!";
    //print_r($_POST);
    //print_r($a);


}else{
    echo "Нет доступа!";
}