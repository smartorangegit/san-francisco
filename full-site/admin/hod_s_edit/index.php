<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
$check0 = $DB->query("SELECT * FROM `users`");
while ($myrow0 = mysqli_fetch_array($check0)) {

    $sec_k = $myrow0['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Список | Ход строительства</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
        <?include ($dt."/menu.php");?>
        <style>
            .persLin>input{
                position: relative;
                bottom: 66px;
            }
        </style>
    </head>
    <body>
    <?$perstSelect = $DB->query("SELECT * FROM `pers`");
    while ($rowPers= mysqli_fetch_array($perstSelect)) {
        //print_r($rowPers);
        ?>
        <h3>Проценты для хода строительства</h3>
        <form id="persents">
            <div class="persLin">
            <input type="text" name="pers1" value="<?=$rowPers['persent_1'];?>">
            <textarea name="opP1"  rows="5"><?=$rowPers['perOpis_1'];?></textarea>
            </div>
            <div class="persLin">
            <input type="text" name="pers2" value="<?=$rowPers['persent_2'];?>">
            <textarea name="opP2" rows="5"><?=$rowPers['perOpis_2'];?></textarea>
            </div>
            <div class="persLin">
            <input type="text" name="pers3" value="<?=$rowPers['persent_3'];?>">
            <textarea name="opP3" rows="5"><?=$rowPers['perOpis_3'];?></textarea>
            </div>
            <div class="persLin">
            <input type="text" name="pers4" value="<?=$rowPers['persent_4'];?>">
            <textarea name="opP4" rows="5"><?=$rowPers['perOpis_4'];?></textarea>
            </div>
            <button type="submit" >Обновить проценты</button>
        </form>
        <?
    }
    ?>
    <script>
        form('#persents');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Обновить данные?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "persUpdate.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            console.log(html);
                            //location.reload();
                        }
                    });
                }
            });

        }
        </script>
    <h3>Список галерей</h3>
    <div class="obol">
        <div class="list_left"></div>
        <div class="list_center">
            <?php mb_internal_encoding("UTF-8"); ?>
            <?
            $sel = $DB->query("SELECT * FROM `hod_stroy` ORDER BY `date` DESC ");
            while ($myrow = mysqli_fetch_array($sel))
            {
            $pieces = explode("*/*", $myrow['ar_imgs']);
            $pieces[1];
            $kol_lan = 0;
            ?>
            <div class="cont_b">
                <span><?=$myrow['date'];?></span>
                <a class="a_text" href="/admin/hod_s_edit/list.php?kod=<?=$myrow['sumb_cod'];?>">
                    <?
                    if(!empty($myrow['hod_name_ua'])){
                        echo $myrow['hod_name_ua'];
                    }
                    else {
                        if(!empty($myrow['hod_name_ru'])){echo $myrow['hod_name_ru'];}
                        if(!empty($myrow['hod_name_en'])){echo $myrow['hod_name_en'];}
                    }
                    if(!empty($myrow['hod_name_ua'])){$kol_lan = $kol_lan+1;}
                    if(!empty($myrow['hod_name_ru'])){$kol_lan = $kol_lan+3;}
                    if(!empty($myrow['hod_name_en'])){$kol_lan = $kol_lan+5;}
                    ?>
                </a>
                <br>
                <a href="/admin/hod_s_edit/list.php?kod=<?=$myrow['sumb_cod'];?>"><?if(!empty($myrow['ar_imgs'])){?>
                        <img src="<?=$myrow['path'].'/'.$pieces[1];?>" style="width:150px; height: 150px;"/>
                    <?}?>
                </a>
                <br>
                <?$cc = count($pieces);
                for($n=0; $n<$cc; $n++){
                    if($n!=0){?><img src="<?=$myrow['path'].'/'.$pieces[$n];?>" style="width:150px; height: 150px;">|<?}
                }
                ?>
                <br>
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