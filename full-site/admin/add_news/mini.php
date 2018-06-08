<?php
$dir_dump = str_replace("/admin/add_news","/admin/add_news/dump_img/", __DIR__);
$files_dump = scandir($dir_dump,1);
$a = $dir_dump.$files_dump[0];
$b = $dir_dump.'min_'.$files_dump[0];
function resizeMin($file_input, $file_output, $w_o, $h_o, $percent = false) {
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
        $func = 'image' . $ext;
        return $func($img_o, $file_output);
    }
}
resizeMin($a,$b,300);