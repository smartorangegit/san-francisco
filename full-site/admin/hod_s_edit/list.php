<?
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
    $kod = $_GET['kod'];
    $check = $DB->query("SELECT * FROM `hod_stroy` WHERE `sumb_cod`='$kod'");
while ($myrow = mysqli_fetch_array($check)) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ход строительства</title>
        <meta charset="utf-8">
        <?php mb_internal_encoding("UTF-8"); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    </head>
    <body>
    <?include ($dt."/menu.php");?>
    <?php
    $dat1 = date("Y-m-d");
    $dat2 = date("H:i:s");
    ?>
    <div>
        <form id="up_i_h_up" enctype="multipart/form-data">
            <div class="tabs">
                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1" title="Вкладка 1">Ua<span id="t_ua">&#10004;</span></label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2" title="Вкладка 2">Ru<span id="t_ru">&#10004;</span></label>

                <input id="tab3" type="radio" name="tabs">
                <label for="tab3" title="Вкладка 3">En<span id="t_en">&#10004;</span></label>

                <!--            <input id="tab4" type="radio" name="tabs">-->
                <!--            <label for="tab4" title="Вкладка 4">Вкладка 4</label>-->

                <section id="content-tab1">

                    <label>Язык</label>
                    <input name="langUA" type="text" value="ua" readonly/>
                    <p></p>
                    <label>Название </label><input  name="name_hod_ua"  value="<?=$myrow['hod_name_ua'];?>" type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input  name="min_text_ua" value="<?=$myrow['hod_full_ua'];?>" type="text"/>


                </section>
                <section id="content-tab2">

                    <label>Язык</label>
                    <input name="langRU" type="text" value="ru" readonly/>
                    <p></p>
                    <label>Название </label><input  name="name_hod_ru" value="<?=$myrow['hod_name_ru'];?>"  type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input  name="min_text_ru"  value="<?=$myrow['hod_full_ru'];?>"  type="text"/>

                </section>
                <section id="content-tab3">

                    <label>Язык</label>
                    <input name="langEN" type="text" value="en" readonly/>
                    <p></p>
                    <label>Название </label><input  name="name_hod_en" value="<?=$myrow['hod_name_en'];?>"  type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input name="min_text_en"   value="<?=$myrow['hod_full_en'];?>"  type="text"/>

                </section>
                <!--            <section id="content-tab4">-->
                <!--                <p>-->
                <!--                    Здесь размещаете любое содержание....-->
                <!--                </p>-->
                <!--            </section>-->
                <div class="bot_div">
                    <div class="b_chi_1">
                        <label>Дата создания</label>
                        <input name="date" type="text"  value="<?=$myrow['date'];?>" />
                        <p></p>
                        <label>Вермя создания</label>
                        <input name="time" type="text"  value="<?=$myrow['time'];?>" />
                        <p></p>
                        <label>Символьный код</label>
                        <input name="hod_code"  value="<?=$myrow['sumb_cod'];?>"  type="text"/>
                        <p><input type="radio" name="isActive" value="0" <?if($myrow['isActive']==0){echo 'checked';}?>>Active</p>
                        <p><input type="radio" name="isActive" value="1" <?if($myrow['isActive']==1){echo 'checked';}?>>No Active</p>
                    </div>
                    <div class="b_chi_2">
                        <div class="form-group">
                            <label>После того как вы удалили галерею, тут можно загрузить новые фото</label>
                            <input   id="images" name="images[]" type="file" multiple><br>
                        </div>
                        <p></p>
                        <input type="hidden" name="path" value="<?=$myrow['path'];?>">
                        <input type="hidden" name="id" value="<?=$myrow['id'];?>">
                        <input class="butt"  type="submit" class="btn btn-default" value="Обновить">
                        <a class="butt" onclick="window.location.href='/admin'">Назад</a>
                    </div>
                </div>


        </form>
            <form id="dell_img_hod" enctype="multipart/form-data" style="text-align: right;">
                <?
                $pieces = explode("*/*", $myrow['ar_imgs']);
                $cc = count($pieces);
                ?>
                <select size="3" multiple name="cur_img[]">
                    <?
                    for($n=1; $n<$cc; $n++){
                        ?>
                        <option selected value="<?=$pieces[$n];?>"><?=$pieces[$n];?></option>
                    <?}?>
                </select>
                <input name="sumb_cod" type="hidden" value="<?=$myrow['sumb_cod'];?>">
                <input  name="path_imgs" type="hidden" value="<?=$myrow['path'];?>">
                <input class="butt_red"  type="submit"  value="Удалить галерею">
            </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    </body>
    </html>
<?}
}
else{echo 'Неавторизованный пользователь!';}
?>

