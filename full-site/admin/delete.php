<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
include ('bd.php');
session_start();

$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {

    $del_kod = $_POST['targ_dell'];

    $path_img = str_replace("/admin","", __DIR__);

    $del_img =  $path_img.$_POST['img_t_dell'];
    $del_dir =  $path_img.$_POST['dir_dell'];
    $dell_exp = str_replace("/admin/admin/", "/admin/", $del_dir);
    $dell_img = str_replace("/admin/admin/", "/admin/", $del_img);

    $ua_dir = str_replace("/admin","/news/".$del_kod."/", __DIR__);
    $ua_ind = $ua_dir.'index.php';

    $ru_dir = str_replace("/admin","/ru/news/".$del_kod."/", __DIR__);
    $ru_ind = $ru_dir.'index.php';

    $en_dir = str_replace("/admin","/en/news/".$del_kod."/", __DIR__);
    $en_ind = $en_dir.'index.php';

    unlink($ua_ind);
    rmdir($ua_dir);

    unlink($ru_ind);
    rmdir($ru_dir);

    unlink($en_ind);
    rmdir($en_dir);
    $deN = $DB->query("DELETE FROM `news` WHERE `news_code`='$del_kod'");

    unlink($dell_img);
    $mini_img = $path_img.'/img/'.$_POST['dt'].'/min_'.$_POST['i_name'];
    unlink($mini_img);
    rmdir($dell_exp);

    //echo $path_img.'/img/'.$_POST['dt'].'/thumb_'.$_POST['i_name'];

    echo "Новость с кодом - ".$del_kod."  удалена!\n";
}
else{
    echo "Нет прав!";
}