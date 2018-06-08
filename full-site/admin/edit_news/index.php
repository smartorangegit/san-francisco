<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
$check0 = $DB->query("SELECT * FROM `users`");
while ($myrow0 = mysqli_fetch_array($check0)) {

    $sec_k = $myrow0['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Список новостей</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
</head>
<body>
<?include ($dt."/menu.php");?>
<div class="obol">
<div class="list_left"></div>
<div class="list_center">
<?php mb_internal_encoding("UTF-8"); ?>
<?
        $sel = $DB->query("SELECT * FROM `news` ORDER BY `date` DESC ");
    while ($myrow = mysqli_fetch_array($sel))
{
    $kol_lan = 0;
    ?>
<div class="cont_b">
<a class="a_text" href="/admin/edit_news/list.php?kod=<?=$myrow['news_code'];?>">
    <?
    $b = 0;
        if(!empty($myrow['name_news_ua'])){
            echo $myrow['name_news_ua'];
        }
        else {
            if(!empty($myrow['name_news_ru'])){echo $myrow['name_news_ru'];}
            if(!empty($myrow['name_news_en'])){echo $myrow['name_news_en'];}
            }
    if(!empty($myrow['name_news_ua'])){$kol_lan = $kol_lan+1;}
    if(!empty($myrow['name_news_ru'])){$kol_lan = $kol_lan+3;}
    if(!empty($myrow['name_news_en'])){$kol_lan = $kol_lan+5;}
?>
</a>
    <?if(empty($myrow['name_news_ua']) && empty($myrow['name_news_ru']) && empty($myrow['name_news_en']) ){
        echo "eto GG";
echo "<form id='d_e_n'><input type='submit' value='Удалить'/></form>";
    }?>
    <br>
<a href="/admin/edit_news/list.php?kod=<?=$myrow['news_code'];?>"><?if(!empty($myrow['img_name'])){?><img src="<?=$myrow['img_path'].'/'.$myrow['img_name'];?>" style="width:150px; height: 150px;"/><?}?></a>
<?
    if($kol_lan == 1){echo "<ul><li>UA</li></ul>";}
    elseif($kol_lan == 3){echo "<ul><li>RU</li></ul>";}
    elseif($kol_lan == 5){echo "<ul><li>EN</li></ul>";}
    elseif($kol_lan == 4){echo "<ul><li>UA</li><li>RU</li></ul>";}
    elseif($kol_lan == 6){echo "<ul><li>UA</li><li>EN</li></ul>";}
    elseif($kol_lan == 8){echo "<ul><li>RU</li><li>EN</li></ul>";}
    elseif($kol_lan == 9){echo "<ul><li>UA</li><li>RU</li><li>EN</li></ul>";}
    echo '<br>';
echo '</div>';
}
?>
</div>
<div class="list_right"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
</body>
</html>
<?}
else{echo 'Неавторизованный пользователь!';}
?>