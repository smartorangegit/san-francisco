<?php
/*удаление дамовых файлов после обрезки*/
$dir_dump = str_replace("/admin/edit_news","/admin/edit_news/dump_img/", __DIR__);
$files_dump = scandir($dir_dump,1);
$countFiles_dump = count($files_dump);
for($z=0;$z<$countFiles_dump;$z++){
    unlink($dir_dump.$files_dump[$z]);
}
/*удаление файлов до обрезания*/
$dir = str_replace("/admin/edit_news","/admin/edit_news/img/", __DIR__);
$files = scandir($dir,1);
$countFiles = count($files);
for($i=0;$i<$countFiles;$i++){
    unlink($dir.$files[$i]);
}
$path_img_n = str_replace("/admin/edit_news","/admin/edit_news/img/", __DIR__);
$structure = $path_img_n;

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
$imageFullName = $path_img_n /*. hash('crc32',time()) . '.'*/ . $image['name'];

// Сохраняем тип изображения в переменную
$imageType = $image['type'];

$path = $structure . $image['name'];

// Сверяем доступные форматы изображений, если изображение соответствует,
// копируем изображение в папку images
if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
    if (move_uploaded_file($image['tmp_name'], $path)) {
        echo 'success - upload';
    } else {
        echo 'error - upload';
    }
}