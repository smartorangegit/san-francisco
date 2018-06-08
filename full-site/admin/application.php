<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
if(empty($dt)){
    $dt = "..";
}
include('bd.php');
session_start();

$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {

    $ins = false;
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

    $vid_1 = str_replace("<p>","<div>",$_POST['video']);
    $vid_2 = str_replace("</p>","</div>", $vid_1);
    $video = $vid_2;

    $dirCheckua = 0 ;
    $dirCheckru = 0 ;
    $dirChecken = 0 ;

    if (!empty($_POST['title_ua']) && !empty($_POST['name_news_ua']) && !empty($_POST['min_text_ua']) && !empty($_POST['full_text_ua']) && !empty($_POST['news_code'])) {
        $ins = true;
        $dirCheckua = 0;
    }
    if (!empty($_POST['title_ru']) && !empty($_POST['name_news_ru']) && !empty($_POST['min_text_ru']) && !empty($_POST['full_text_ru']) && !empty($_POST['news_code'])) {
        $ins = true;
        $dirCheckru = 0;
    }
    if (!empty($_POST['title_en']) && !empty($_POST['name_news_en']) && !empty($_POST['min_text_en']) && !empty($_POST['full_text_en']) && !empty($_POST['news_code'])) {
        $ins = true;
        $dirChecken= 0;
    }
    $nk_CH = $_POST['news_code'];
    $chek_kod = $DB->query("SELECT * FROM `news` WHERE `news_code`='$nk_CH'");
    while ($kod_lon = mysqli_fetch_array($chek_kod)) {
        if($nk_CH['news_code'] != ""){
            $add_true = 1;
        }
    }
    if ($ins == true) {//вернуть проверку на код

// Проверяем установлен ли массив файлов и массив с переданными данными
        //if (isset($_FILES) && isset($_FILES['image'])) {
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

            $dirImgName = str_replace("/admin","/admin/add_news/img/", __DIR__);
            $files_dump = scandir($dirImgName,1);
            $cropImg =  str_replace("/admin","/admin/add_news/dump_img/", __DIR__);
            $oldNameImg = $files_dump[0];
            $dotExplode = explode(".",$oldNameImg);

            $dumpPathImg = $cropImg.$dotExplode[0].'.jpg';
            $finPathImg = $structure.'/'.$files_dump[0];
            //print_r($dotExplode);
            //echo $dumpPathImg;
            copy($dumpPathImg,$finPathImg);
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

            // Сверяем доступные форматы изображений, если изображение соответствует,
            // копируем изображение в папку images
            /*if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
                if (move_uploaded_file($image['tmp_name'], $path)) {
                    echo 'success - ';
                    $nm_IMG =  $image['name'];
                    //тут  php обрезание изобржение
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
                            return imagejpeg($img_o,$file_output,75);
                        } else {
                            $func = 'image'.$ext;
                            return $func($img_o,$file_output);
                        }
                    }

                    resize($a,$b,300);
                    resize($a,$a,1152,864);

                } else {
                    echo 'error - ';
                }
            }*/
        //}
        $date = $_POST['date'];
        $time = $_POST['time'];
        /*символьный код и преобразование его в транслит*/
        function rus2translit($string) {
            $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',
                'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
                'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',
                'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',
                'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
                'ь' => '',  'ы' => 'y',   'ъ' => '',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya',


                'А' => 'A',   'Б' => 'B',   'В' => 'V',
                'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
                'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',
                'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',
                'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
                'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                ' ' => '-','є' => 'e', 'Є'=>'E', 'І'=>'I',
                'і'=>'i','Ї'=>'yi','ї'=>'yi',
            );
            return strtr($string, $converter);
        }

        $news_code = rus2translit($_POST['news_code']);


        //$img_n = $image['name'];
        $img_n = $files_dump[0];
        $path_brow = '/img/' . $_POST['date'] . '_' . $_POST['time'];

        /*обработчики на создание папки по символьному коду для новости и копировании index файла, как шаблона для новости*/
        if($dirCheckua == 1){
            $curDir = __DIR__;
            $newDir = str_replace("admin", "news", $curDir);
            $news_dir = $newDir.'/'.$news_code;
            mkdir($news_dir, 0775, true);
            $filewka = 'index.php';
            $newFilewka = $news_dir.'/'.$filewka;
            $copPath = $newDir.'/index_dump/'.$filewka;

            if (! copy($copPath,$newFilewka)) {
                echo "не удалось скопировать $file...\n";
            }
        }
        if($dirCheckru == 1){
            $curDir = __DIR__;
            $newDirru = str_replace("admin", "ru/news", $curDir);
            $news_dir = $newDirru.'/'.$news_code;
            mkdir($news_dir, 0775, true);
            $filewka = 'index.php';
            $newFilewka = $news_dir.'/'.$filewka;
            $copPath = $newDirru.'/index_dump/'.$filewka;

            if (! copy($copPath,$newFilewka)) {
                echo "не удалось скопировать $file...\n";
            }
        }
        if($dirChecken == 1){
            $curDir = __DIR__;
            $newDiren = str_replace("admin", "en/news", $curDir);
            $news_dir = $newDiren.'/'.$news_code;
            mkdir($news_dir, 0775, true);
            $filewka = 'index.php';
            $newFilewka = $news_dir.'/'.$filewka;
            $copPath = $newDiren.'/index_dump/'.$filewka;

            if (! copy($copPath,$newFilewka)) {
                echo "не удалось скопировать $file...\n";
            }
        }

        $inser = $DB->query("INSERT INTO `news` (`title_ua`, `description_ua`, `name_news_ua` , `min_text_ua` , `full_text_ua`,`title_ru`, `description_ru`, `name_news_ru` , `min_text_ru` , `full_text_ru`,`title_en`, `description_en`, `name_news_en` , `min_text_en` , `full_text_en`,`date`,`time`,`news_code`,`img_name`,`img_path`,`video`)
 VALUES ('$title_ua', '$description_ua', '$name_news_ua', '$min_text_ua', '$rep_text_ua','$title_ru', '$description_ru', '$name_news_ru', '$min_text_ru', '$rep_text_ru','$title_en', '$description_en', '$name_news_en', '$min_text_en', '$rep_text_en','$date','$time','$news_code','$img_n','$path_brow','$video')");
if($inser){
echo "Новость добавлена ! \n";
}
else{
    echo "Ошибка добавления!";
	
	 	/** Оновлення карти сайту
	*/ 
	 ConnectSiteFunction();
	/***/ 
}
    }
    else{
        echo "Нет данных или символьный код уже используется!";
    }
}
else{
    echo "Нет прав!";
}
