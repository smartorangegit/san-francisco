<?php
//print_r($_POST);
//print_r($_FILES);

session_start();
require($_SERVER['DOCUMENT_ROOT']."/admin/bd.php");


$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {

    $ins = false;


    $name_hod_ua = $_POST['name_hod_ua'];
    $min_text_ua = $_POST['min_text_ua'];

    $name_hod_ru = $_POST['name_hod_ru'];
    $min_text_ru = $_POST['min_text_ru'];

    $name_hod_en = $_POST['name_hod_en'];
    $min_text_en = $_POST['min_text_en'];

    $date = $_POST['date'];
    $time = $_POST['time'];
    $hod_code = $_POST['hod_code'];

    if (!empty($_POST['name_hod_ua']) && !empty($_POST['min_text_ua']) && !empty($_POST['hod_code'])) {
        $ins = true;
    }
    if (!empty($_POST['name_hod_ru']) && !empty($_POST['min_text_ru']) && !empty($_POST['hod_code'])) {
        $ins = true;
    }
    if (!empty($_POST['name_hod_en']) && !empty($_POST['min_text_en']) && !empty($_POST['hod_code'])) {
        $ins = true;
    }
    $path_img_n = str_replace("/admin","/img", __DIR__);

    $path = $path_img_n.'/hod_images/' . $_POST['date'] . '_' . $_POST['time'];
    $path_dump = '/img/hod_images/' . $_POST['date'] . '_' . $_POST['time'];



    $date = $_POST['date'] . '_' . $_POST['time'];
    $structure = $path_img_n.'/hod_images/' . $_POST['date'] . '_' . $_POST['time'].'/';

    $namanama = $_POST['name'];

    $dir = $path_img_n."/hod_images/";

    chdir($dir);
    $uploaddir = "./$date/";

    if (is_dir("$date")) {

    } else {
        if (!mkdir($uploaddir, 0777, true)) {
            die('Не удалось создать директории...');
        }
    }

// Для создания вложенной структуры необходимо указать параметр
// $recursive в mkdir() .
    if ($ins == true) {
        $ins = $DB->query("INSERT INTO `hod_stroy` (`hod_name_ua`,`hod_full_ua`,`hod_name_ru`,`hod_full_ru`,`hod_name_en`,`hod_full_en`,`date`,`time`,`sumb_cod`,`path`)
 VALUES ('$name_hod_ua','$min_text_ua','$name_hod_ru','$min_text_ru','$name_hod_en','$min_text_en','$date','$time','$hod_code','$path_dump')");


        foreach ($_POST as $index => $value) {
            $$index = $value;
        }

        $qwe = count($_FILES["image"]["name"]);
        $add = 0;

        $ar_im = array();
        for ($i = 0; $i < count($_FILES["image"]["name"]); $i++) {
            $uploadFile = $structure . basename($_FILES['image']['name'][$i]);
            $path = $structure . '/' . $_FILES["image"]["name"][$i];
            if (copy($_FILES['image']['tmp_name'][$i], $path)) {
                $namana = $_FILES["image"]["name"][$i];

                $imaga[] =  $_FILES["image"]["name"][$i];
                $imageS = implode("*/*", $imaga);

                if ($i >= 0) {
                    $add = 777;
                }

                $imga = $DB->query("UPDATE `hod_stroy` SET `ar_imgs`='$imageS' WHERE `sumb_cod`='$hod_code' ");
            } else {
                //echo "Ошибка! Не удалось загрузить файл на сервер!";
                echo $uploaddir.'-'.$uploadFile;
            }
        }
        if ($add == 777) {
            echo "Данныые добавлены, к ним загружено " . $qwe . " изображений";
        }

    }
}
else{
    echo "Нет доступа!";
}
?>

