<?php

include('bd.php');
session_start();

$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {
    $name_hod_ua = $_POST['name_hod_ua'];
    $min_text_ua = $_POST['min_text_ua'];
    $name_hod_ru = $_POST['name_hod_ru'];
    $min_text_ru = $_POST['min_text_ru'];
    $name_hod_en = $_POST['name_hod_en'];
    $min_text_en = $_POST['min_text_en'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $hod_code = $_POST['hod_code'];
    $pathDb = $_POST['path'];
    $acT = $_POST['isActive'];
    $id = $_POST['id'];

//print_r($_FILES["image"]["name"]);


    $upN = $DB->query("UPDATE `hod_stroy` SET
 `hod_name_ua`='$name_hod_ua',
 `hod_full_ua`='$min_text_ua',
 `hod_name_ru`='$name_hod_ru',
 `hod_full_ru`='$min_text_ru',
 `hod_name_en`='$name_hod_en',
 `hod_full_en`='$min_text_en',
  `date`='$date',
  `time`='$time',
  `isActive`='$acT'
 WHERE `id`='$id'");

    $path_img = str_replace("/admin","", __DIR__);
    $structure = $path_img.$pathDb.'/';
    chdir($structure);
    $add = 0;
    $qwe = count($_FILES["images"]["name"]);
    $ar_im = array();
    if ($_FILES["images"]["name"][0]==""){
        $noUpdImg = "Галерея не нуждается в обновлении! \n или \n";
    }
    for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {
        $uploadFile = $structure . basename($_FILES['images']['name'][$i]);
        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadFile)) {
            $imaga[] = $_FILES["images"]["name"][$i];
            $imageS = implode("*/*", $imaga);

            if ($i >= 0) {
                $add = 777;
            }
            $imga = $DB->query("UPDATE `hod_stroy` SET `ar_imgs`='$imageS' WHERE `sumb_cod`='$hod_code' ");
        } else {
            echo $noUpdImg."Произошла Ошибка! Не удалось загрузить файл на сервер!\n";
        }
        //$qwe = $i;
    }
    if ($add == 777) {
        echo "Данныые добавлены, к ним загружено " . $qwe . " изображений";
    }
    else {

        echo "Данные обновлены!";
    }
}
else{
    echo "Нет доступа!";
}
