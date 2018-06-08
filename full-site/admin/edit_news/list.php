<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
$check = $DB->query("SELECT * FROM `users`");
while ($myrow = mysqli_fetch_array($check)) {

    $sec_k = $myrow['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
$kod = $_GET['kod'];

$sel = $DB->query("SELECT * FROM `news` WHERE `news_code`='$kod'");
while ($myrow = mysqli_fetch_array($sel))
{?>
<!DOCTYPE html>
<html>
    <head>
        <title>Обновление новости</title>
        <meta charset="utf-8">
        <?php mb_internal_encoding("UTF-8"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link rel="stylesheet" type="text/css" href="/admin/css/style.css">
<script type="text/javascript">
    tinymce.init({
        selector: '#textua',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#textru',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#texten',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#vid',
                theme: 'modern',
                width: 'auto',
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
            });
        </script>
<script>tinymce.init({ selector:'textarea' });</script>
        <?include ($dt."/menu.php");?>
</head>
<body>
<?php
$dat1 = date("Y-m-d");
$dat2 = date("H:i:s");
?>
<div>
    <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
    <style type="text/css">
        #crop{
            display:none;
        }
        #cropresult{
            border:2px solid #ddd;
        }
        .mini{
            margin:5px;
        }
        .bigBadaImg{
            display: none;
        }
    </style>
    <form id="crop-image" enctype="multipart/form-data" style="margin: 5px;">
        <div class="form-group">
            <label for="image">Загрузить и обрезать изображение для новости:</label>
            <input type="file" name="image" id="image" required>
        </div>
        <p></p>
        <input class="butt"  type="submit" value="Загрузить">
    </form>
    <button type="submit" class="butt" id="fiButt">Работа с изображением</button>
    <br>
    <?
    $dir = str_replace("/admin/edit_news","/admin/edit_news/img/", __DIR__);
    $files = scandir($dir,1);
    //print_r($files);
    ?>
    <div class="bigBadaImg"> <!--style=" width: 1280px; height: 768px;"-->
        <img src="img/<?=$files[0];?>" id="target" alt="[Jcrop Example]" />
        <button id="release">Убрать выделение</button>
        <button id="crop">Обрезать</button>
        <!--        <button id="mini">Создать миниатюрю</button>-->
        <div class="optlist offset">
            <label><input type="checkbox" id="ar_lock" />Соблюдать пропорции (3:4)</label><?//было 3:4?>
            <label><input type="checkbox" id="size_lock" />min/max размер (80x80/350x350)</label>
        </div>
        <div class="inline-labels">
            <label>X1 <input readonly type="text" size="4" id="x1" name="x1" /></label>
            <label>Y1 <input readonly type="text" size="4" id="y1" name="y1" /></label>
            <label>X2 <input readonly type="text" size="4" id="x2" name="x2" /></label>
            <label>Y2 <input readonly type="text" size="4" id="y2" name="y2" /></label>
            <label>W <input  readonly type="text" size="4" id="w" name="w" /></label>
            <label>H <input  readonly type="text" size="4" id="h" name="h" /></label>
        </div>
        <p>Результаты:</p>
        <span>Для загрузки будет использоватся последнее вырезанное изображение</span>
        <div id="cropresult">
        </div>
    </div>

</div>
<div>
    <form id="upload-image2" enctype="multipart/form-data">
        <label class="bigBadaImg" style="font-size: 23px;">Отметьте если нужно обновить фото &#8658;</label>
        <input class="bigBadaImg" type="radio" name="updateImg" value="yes">
        <p></p>
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
                <label>Язык новости</label>
                <input name="langUA" type="text" value="ua" readonly/>
                <p></p>
                <label>Title новости</label><input onkeyup="javascript:countme1();" name="title_ua" value="<?=$myrow['title_ua'];?>" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme1();" name="descr_ua" value="<?=$myrow['description_ua'];?>" type="text"/>
                <p></p>
                <label>Название новости</label><input onkeyup="javascript:countme1();" name="name_news_ua" value="<?=$myrow['name_news_ua'];?>"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme1();" name="min_text_ua" value="<?=$myrow['min_text_ua'];?>" type="text"/>
                <textarea  rows="3" style="width:40%;" class="form-control" id="textua" type="text" name="full_text_ua" value="" ><?=$myrow['full_text_ua'];?></textarea>
            </section>
            <section id="content-tab2">
                <label>Язык новости</label>
                <input name="langRU" type="text" value="ru" readonly/>
                <p></p>
                <label>Title новости</label><input onkeyup="javascript:countme2();" name="title_ru" value="<?=$myrow['title_ru'];?>" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme2();" name="descr_ru" value="<?=$myrow['description_ru'];?>" type="text"/>
                <p></p>
                <label>Название новости</label><input onkeyup="javascript:countme2();" name="name_news_ru" value="<?=$myrow['name_news_ru'];?>"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme2();" name="min_text_ru" value="<?=$myrow['min_text_ru'];?>" type="text"/>
                <textarea rows="3" style="width:40%;" class="form-control" id="textru" type="text" name="full_text_ru" ><?=$myrow['full_text_ru'];?></textarea>
            </section>
            <section id="content-tab3">
                <label>Язык новости</label>
                <input name="langEN" type="text" value="en" readonly/>
                <p></p>
                <label>Title новости</label><input onkeyup="javascript:countme3();" name="title_en" value="<?=$myrow['title_en'];?>" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme3();" name="descr_en" value="<?=$myrow['description_en'];?>" type="text"/>
                <p></p>
                <label>Название новости</label><input onkeyup="javascript:countme3();" name="name_news_en" value="<?=$myrow['name_news_en'];?>"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme3();" name="min_text_en" value="<?=$myrow['min_text_en'];?>" type="text"/>
                <textarea rows="3" style="width:40%;" class="form-control" id="texten" type="text" name="full_text_en"><?=$myrow['full_text_en'];?></textarea>
            </section>
            <!--            <section id="content-tab4">-->
            <!--                <p>-->
            <!--                    Здесь размещаете любое содержание....-->
            <!--                </p>-->
            <!--            </section>-->
            <label>Видео</label>
            <textarea id="vid" rows="3"  name="video">
                        <?=$myrow['video'];?>
                    </textarea>
            <div class="bot_div">
                <div class="b_chi_1">
                    <label>Дата создания</label>
                    <input name="date" type="text" value="<?=$myrow['date'];?>" />
                    <p></p>
                    <label>Вермя создания</label>
                    <input name="time" type="text" value="<?=$myrow['time'];?>" />
                    <p></p>
                    <label>Символьный код</label>
                    <input name="news_code" value="<?=$myrow['news_code'];?>" type="text"/>
                    <p><input type="radio" name="isActive" value="0" <?if($myrow['isActive']==0){echo 'checked';}?>>Active</p>
                    <p><input type="radio" name="isActive" value="1" <?if($myrow['isActive']==1){echo 'checked';}?>>No Active</p>
                    <input type="hidden" name="id" value="<?=$myrow['id'];?>">
                </div>
                <div class="b_chi_2">
<!--                    <div class="form-group">-->
<!--                        <label for="image">Изображение для новости:</label>-->
<!--                        <input type="file" name="image" id="image">-->
<!--                        <img  src="--><?//=$myrow['img_path'].'/'.$myrow['img_name'];?><!--"  style="width:150px; height: 150px;"/>-->
<!--                        <input type="hidden" name="del_img" value="--><?//=$myrow['img_path'].'/'.$myrow['img_name'];?><!--"/>-->
<!--                        <input type="hidden" name="kod_d" value="--><?//=$kod;?><!--"/>-->
<!--                    </div>-->
                    <input class="butt"  type="submit" class="btn btn-default">
                    <a class="butt" onclick="window.location.href='/admin/edit_news/'">Назад</a>
                </div>

    </form>
    <form id="del_news">
        <input name="delete" type="submit" value="Удалить новсть" class="butt"/>
        <input name="targ_dell" type="hidden" value="<?=$kod;?>"/>
        <input name="img_t_dell" type="hidden" value="<?=$myrow['img_path'].'/'.$myrow['img_name'];?>"/>
        <input name="dir_dell" type="hidden" value="<?=$myrow['img_path'].'/';?>">
        <input name="i_name" type="hidden" value="<?=$myrow['img_name'];?>">
        <input name="dt" type="hidden" value="<?=$myrow['date'].'_'.$myrow['time'];?>">
    </form>
        </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script src="js/crop.js"></script>
<script>
    $(document).ready(function () {

        function readImage ( input ) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function printMessage(destination, msg) {

            $(destination).removeClass();

            if (msg == 'success') {
                $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
            }

            if (msg == 'error') {
                $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
            }

        }

        $('#image').change(function(){
            readImage(this);
        });

        $('#crop-image').on('submit',(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST', // Тип запроса
                url: '/admin/edit_news/upl.php', // Скрипт обработчика
                data: formData, // Данные которые мы передаем
                cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
                contentType: false, // Тип кодирования данных мы задали в форме, это отключим
                processData: false, // Отключаем, так как передаем файл
                success:function(data){
                    //alert(data);
                    console.log(data);
                    location.reload();
                    printMessage('#result', data);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }));
    });

    $(document).ready(function(){
        $("button#fiButt").click(function(){
            $(".bigBadaImg").fadeIn("slow");
        });
    });
</script>
</body>
</html>
<?}?>
<?}
else{echo 'Неавторизованный пользователь!';}
?>
