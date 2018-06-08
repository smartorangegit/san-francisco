<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
include ('bd.php');
session_start();

$path_img = str_replace("/admin","", __DIR__);
$cc = count($_POST['cur_img']);

$db_path = $_POST['path_imgs'];
$imgs = $_POST['cur_img'];
$hod_code = $_POST['sumb_cod'];

$full_path = $path_img.$db_path;
for($n=0; $n<$cc; $n++){
        unlink($full_path.'/'.$imgs[$n]);
     }
$upN = $DB->query("UPDATE `hod_stroy` SET `ar_imgs`=' ' WHERE `sumb_cod`='$hod_code'");