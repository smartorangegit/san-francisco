<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
if(!empty($_POST)) {
    if(empty($dt)){
        $dt = "..";
    }
    include('bd.php');
    $kod = $_POST['kod_d'];

    session_start();

    $provirka = $DB->query("SELECT * FROM `users`");
    while ($liniyka = mysqli_fetch_array($provirka)) {
        $sec_k = $liniyka['sec_code'];
    }
    if (!empty($_SESSION['check']) && $_SESSION['check'] == $sec_k) {

        $add_true = 0;

        $titleDumpUa = str_replace("'", "`",$_POST['title_ua']);
        $title_ua = $titleDumpUa;
        $descriptionDumpUa = str_replace("'","`",$_POST['descr_ua']);
        $description_ua = $descriptionDumpUa;
        $nameDumpUa = str_replace("'","`",$_POST['name_news_ua']);
        $name_news_ua = $nameDumpUa;
        $minTextDumpUa = str_replace("'","`",$_POST['min_text_ua']);
        $min_text_ua = $minTextDumpUa;

        $full_text_ua = $_POST['full_text_ua'];
        $rep_text_ua = str_replace("'", "`", $full_text_ua);

        $titleDumpRu = str_replace("'", "`",$_POST['title_ru']);
        $title_ru = $titleDumpRu;
        $descriptionDumpRu = str_replace("'","`",$_POST['descr_ru']);
        $description_ru = $descriptionDumpRu;
        $nameDumpRu = str_replace("'","`",$_POST['name_news_ru']);
        $name_news_ru = $nameDumpRu;
        $minTextDumpRu = str_replace("'","`",$_POST['min_text_ru']);
        $min_text_ru = $minTextDumpRu;

        $full_text_ru = $_POST['full_text_ru'];
        $rep_text_ru = str_replace("'", "`", $full_text_ru);

        $titleDumpEn = str_replace("'", "`",$_POST['title_en']);
        $title_en = $titleDumpEn;
        $descriptionDumpEn = str_replace("'","`",$_POST['descr_en']);
        $description_en = $descriptionDumpEn;
        $nameDumpEn = str_replace("'","`",$_POST['name_news_en']);
        $name_news_en = $nameDumpEn;
        $minTextDumpEn = str_replace("'","`",$_POST['min_text_en']);
        $min_text_en = $minTextDumpEn;

        $full_text_en = $_POST['full_text_en'];
        $rep_text_en = str_replace("'", "`", $full_text_en);

        $news_code = $_POST['news_code'];

        $d = $_POST['date'];
        $t = $_POST['time'];

        $acT = $_POST['isActive'];
        $id = $_POST['id'];
        $vid_1 = str_replace("<p>","<div>",$_POST['video']);
        $vid_2 = str_replace("</p>","</div>", $vid_1);
        $video = $vid_2;
//print_r($_POST);
        $upN = $DB->query("UPDATE `news`SET
 `title_ua`='$title_ua',
 `description_ua`='$description_ua',
 `name_news_ua`='$name_news_ua',
 `min_text_ua`='$min_text_ua',
 `full_text_ua`='$rep_text_ua',
 `title_ru`='$title_ru',
 `description_ru`='$description_ru',
 `name_news_ru`='$name_news_ru',
 `min_text_ru`='$min_text_ru',
 `full_text_ru`='$rep_text_ru',
 `title_en`='$title_en',
 `description_en`='$description_en',
 `name_news_en`='$name_news_en',
 `min_text_en`='$min_text_en',
 `full_text_en`='$rep_text_en',
 `news_code`='$news_code',
 `date`='$d',
 `time`='$t',
 `isActive`='$acT',
 `video`='$video'
 WHERE `id`='$id'");

  	/** Оновлення карти сайту
	*/ 
	 ConnectSiteFunction();
	/***/ 
 
 
        if (!empty($_POST['title_ua']) && !empty($_POST['name_news_ua']) && !empty($_POST['min_text_ua']) && !empty($_POST['full_text_ua']) && !empty($_POST['news_code'])) {
            $ins = true;
            $dirCheckua = 1;
        }
        if (!empty($_POST['title_ru']) && !empty($_POST['name_news_ru']) && !empty($_POST['min_text_ru']) && !empty($_POST['full_text_ru']) && !empty($_POST['news_code'])) {
            $ins = true;
            $dirCheckru = 1;
        }
        if (!empty($_POST['title_en']) && !empty($_POST['name_news_en']) && !empty($_POST['min_text_en']) && !empty($_POST['full_text_en']) && !empty($_POST['news_code'])) {
            $ins = true;
            $dirChecken= 1;
        }
        /*обработчики на создание папки по символьному коду для новости и копировании index файла, как шаблона для новости*/
        if($dirCheckua == 1) {
            $curDir = __DIR__;
            $newDir = str_replace("admin", "news", $curDir);
            $news_dir = $newDir . '/' . $news_code;
            if (is_dir($news_dir) == false) {
                mkdir($news_dir, 0775, true);
                $filewka = 'index.php';
                $newFilewka = $news_dir . '/' . $filewka;
                $copPath = $newDir . '/index_dump/' . $filewka;

                    if (!copy($copPath, $newFilewka)) {
                        echo "не удалось скопировать $file... шаблон для создния\n";
                    }
            }
        }
        if($dirCheckru == 1){
            $curDir = __DIR__;
            $newDirru = str_replace("admin", "ru/news", $curDir);
            $news_dir = $newDirru.'/'.$news_code;
            if (is_dir($news_dir) == false) {
                mkdir($news_dir, 0775, true);
                $filewka = 'index.php';
                $newFilewka = $news_dir . '/' . $filewka;
                $copPath = $newDirru . '/index_dump/' . $filewka;

                if (!copy($copPath, $newFilewka)) {
                    echo "не удалось скопировать $file... шаблон для создния\n";
                }
            }
        }
        if($dirChecken == 1){
            $curDir = __DIR__;
            $newDiren = str_replace("admin", "en/news", $curDir);
            $news_dir = $newDiren.'/'.$news_code;
            if (is_dir($news_dir) == false) {
                mkdir($news_dir, 0775, true);
                $filewka = 'index.php';
                $newFilewka = $news_dir . '/' . $filewka;
                $copPath = $newDiren . '/index_dump/' . $filewka;

                if (!copy($copPath, $newFilewka)) {
                    echo "не удалось скопировать $file... шаблон для создния\n";
                }
            }
        }
        if($_POST['updateImg']=='yes'){
            //echo "Будет обнова изображения!";
            $path_img_n = str_replace("/admin","/img/", __DIR__);
            $structure = $path_img_n. $_POST['date'] . '_' . $_POST['time'];
            mkdir($structure, 0777, true);
            //Переданный массив сохраняем в переменной
            $image = $_FILES['image'];
            // Проверяем размер файла и если он превышает заданный размер
            // завершаем выполнение скрипта и выводим ошибку
            if ($image['size'] > 2000000) {
                die('error');
            }
            // Достаем формат изображения
            $imageFormat = explode('.', $image['name']);
            $imageFormat = $imageFormat[1];
            // Генерируем новое имя для изображения. Можно сохранить и со старым
            // но это не рекомендуется делать
            $imageFullName = $path_img_n.$image['name'];
            // Сохраняем тип изображения в переменную
            $imageType = $image['type'];

            $path = $structure . '/' . $image['name'];

            $dirImgName = str_replace("/admin","/admin/edit_news/img/", __DIR__);
            $files_dump = scandir($dirImgName,1);
            $cropImg =  str_replace("/admin","/admin/edit_news/dump_img/", __DIR__);
            $oldNameImg = $files_dump[0];
            $dotExplode = explode(".",$oldNameImg);

            $dumpPathImg = $cropImg.$dotExplode[0].'.jpg';
            $finPathImg = $structure.'/'.$files_dump[0];
            $finPathImgMini = $structure.'/min_'.$files_dump[0];
            //print_r($dotExplode);

            $dir_dump = str_replace("/admin","/img/", __DIR__);
            $dellDirDump = $dir_dump.$_POST['date'] . '_' . $_POST['time'].'/';
            $filesDump = scandir($dellDirDump,1);
            $countFiles_dump = count($filesDump);
            for($z=0;$z<$countFiles_dump;$z++){
                unlink($dellDirDump.$filesDump[$z]);
            }
            copy($dumpPathImg,$finPathImg);
            $new_image = $files_dump[0];

            $sel = $DB->query("UPDATE `news`SET `img_name`='$new_image' WHERE `news_code`='$news_code'");

            $a = $finPathImg;
            $b = $structure.'/min_'.$files_dump[0];
            function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
                list($w_i, $h_i, $type) = getimagesize($file_input);
                if (!$w_i || !$h_i) {
                    echo 'Невозможно получить длину и ширину изображения при уменьшении'.$w_i.'-'.$h_i.'-'.$type;
                    return;
                }
                $types = array('','gif','jpeg','png');
                $ext = $types[$type];
                if ($ext) {
                    $func = 'imagecreatefrom'.$ext;
                    $img = $func($file_input);
                } else {
                    echo 'Некорректный формат файла';
                    return;
                }
                if ($percent) {
                    $w_o *= $w_i / 100;
                    $h_o *= $h_i / 100;
                }
                if (!$h_o) $h_o = $w_o/($w_i/$h_i);
                if (!$w_o) $w_o = $h_o/($h_i/$w_i);
                $img_o = imagecreatetruecolor($w_o, $h_o);
                imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
                if ($type == 2) {
                    return imagejpeg($img_o,$file_output,75);
                } else {
                    $func = 'image'.$ext;
                    return $func($img_o,$file_output);
                }
            }
            resize($a,$b,266,312);
        }
//закоментил старое обновление фотографии в edit_news обработчике, для добавления кропа
       /* if (isset($_FILES) && isset($_FILES['image'])) {
            $path_img_n = str_replace("/admin","/img/", __DIR__);
            $structure = $path_img_n. $_POST['date'] . '_' . $_POST['time'];
            //mkdir($structure, 0777, true);
            //Переданный массив сохраняем в переменной
            $image = $_FILES['image'];
            if (!empty($image['name'])) {
                if ($image['name'] != $_POST['del_img']) {
                    $path_img = str_replace("/admin","", __DIR__);
                    $dni = $path_img.$_POST['del_img'];
                    $minDni = $structure.'/min_'.$image['name'];
                    //echo $minDni;
                    unlink($dni);
                    unlink($minDni);
                    $new_image = $image['name'];
                    $sel = $DB->query("UPDATE `news`SET `img_name`='$new_image' WHERE `news_code`='$kod'");
                }
            }
            // Проверяем размер файла и если он превышает заданный размер
            // завершаем выполнение скрипта и выводим ошибку
            if ($image['size'] > 2000000) {
                die('error');
            }

            // Достаем формат изображения
            $imageFormat = explode('.', $image['name']);
            $imageFormat = $imageFormat[1];

            // Генерируем новое имя для изображения. Можно сохранить и со старым
            // но это не рекомендуется делать
            $imageFullName = $path_img_n . $image['name'];

            // Сохраняем тип изображения в переменную
            $imageType = $image['type'];

            $path = $structure . '/' . $image['name'];

            // Сверяем доступные форматы изображений, если изображение соответствует,
            // копируем изображение в папку images
            if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
                if (move_uploaded_file($image['tmp_name'], $path)) {
                    echo 'success';
                    //.$path
                    $a = '../img/'.$_POST['date'] . '_' . $_POST['time'].'/'.$image['name'];
                    $b = '../img/'.$_POST['date'] . '_' . $_POST['time'].'/'.'min_'.$image['name'];

                    function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
                        list($w_i, $h_i, $type) = getimagesize($file_input);
                        if (!$w_i || !$h_i) {
                            echo 'Невозможно получить длину и ширину изображения при уменьшении'.$w_i.'-'.$h_i.'-'.$type;
                            return;
                        }
                        $types = array('','gif','jpeg','png');
                        $ext = $types[$type];
                        if ($ext) {
                            $func = 'imagecreatefrom'.$ext;
                            $img = $func($file_input);
                        } else {
                            echo 'Некорректный формат файла';
                            return;
                        }
                        if ($percent) {
                            $w_o *= $w_i / 100;
                            $h_o *= $h_i / 100;
                        }
                        if (!$h_o) $h_o = $w_o/($w_i/$h_i);
                        if (!$w_o) $w_o = $h_o/($h_i/$w_i);
                        $img_o = imagecreatetruecolor($w_o, $h_o);
                        imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
                        if ($type == 2) {
                            return imagejpeg($img_o,$file_output,100);
                        } else {
                            $func = 'image'.$ext;
                            return $func($img_o,$file_output);
                        }
                    }

                    resize($a,$b,1280);


                } else {
                    echo 'error';
                    //.$path

                }
            }
        }*/
        echo "Данные обновлены!";
        //print_r($_POST);
    } else {
        echo "Нет доступа!";
    }
}
else{
    echo "POST - пуст, данных для обработки нет!";
}