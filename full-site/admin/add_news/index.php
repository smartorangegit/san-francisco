<?
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}

if(!empty($_SESSION['upl'])){
$sesUpl = $_SESSION['upl'];
}else{
    $sesUpl = "[0,0]";
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
        <title>Добавление новости</title>
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
    </head>
    <body>
    <?include ($dt."/menu.php");?>
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
        </style>
        <form id="crop-image" enctype="multipart/form-data" style="margin: 5px;">
            <div class="form-group">
                <label for="image">Загрузить и обрезать изображение для новости:</label>
                <input type="file" name="image" id="image" required>
            </div>
            <p></p>
            <input class="butt"  type="submit" value="Загрузить">
        </form>
        <?
        $dir = str_replace("/admin/add_news","/admin/add_news/img/", __DIR__);
        $files = scandir($dir,1);
        //print_r($files);
        ?>
        <div> <!--style=" width: 1280px; height: 768px;"-->
            <img src="img/<?=$files[0];?>" id="target" alt="[Jcrop Example]" />
        </div>
        <button id="release">Убрать выделение</button>
        <button id="crop">Обрезать</button>
<!--        <button id="mini">Создать миниатюрю</button>-->
        <div class="optlist offset">
            <label><input type="checkbox" id="ar_lock" />Соблюдать пропорции (3:4)</label><?//было 3:4?>
            <label><input type="checkbox" id="size_lock" />min/max размер (80x80/350x350)</label>
            <label><input type="checkbox" id="size_full" value=""/>Целиком</label>
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
        <form id="upload-image" enctype="multipart/form-data">
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
                <label>Title новости</label><input onkeyup="javascript:countme1();" name="title_ua" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme1();" name="descr_ua" type="text"/>
                <p></p>
                <label>Название новости</label><input id="name"  name="name_news_ua"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme1();" name="min_text_ua" type="text"/>
                <textarea  rows="3" style="width:40%;" class="form-control" id="textua" type="text" name="full_text_ua"></textarea>
            </section>
            <section id="content-tab2">
                <label>Язык новости</label>
                <input name="langRU" type="text" value="ru" readonly/>
                <p></p>
                <label>Title новости</label><input onkeyup="javascript:countme2();" name="title_ru" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme2();" name="descr_ru" type="text"/>
                <p></p>
                <label>Название новости</label><input onkeyup="javascript:countme2();" name="name_news_ru"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme2();" name="min_text_ru" type="text"/>
                <textarea rows="3" style="width:40%;" class="form-control" id="textru" type="text" name="full_text_ru"></textarea>
            </section>
            <section id="content-tab3">
                <label>Язык новости</label>
                <input name="langEN" type="text" value="en" readonly/>
                <p></p>
                <label>Title новости</label><input onkeyup="javascript:countme3();" name="title_en" type="text"/>
                <p></p>
                <label>Description новости</label><input onkeyup="javascript:countme3();" name="descr_en" type="text"/>
                <p></p>
                <label>Название новости</label><input onkeyup="javascript:countme3();" name="name_news_en"  type="text"/>
                <p></p>
                <label>Кратое описание новости</label><input onkeyup="javascript:countme3();" name="min_text_en" type="text"/>
                <textarea rows="3" style="width:40%;" class="form-control" id="texten" type="text" name="full_text_en"></textarea>
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
            <input name="date" type="text" value="<?=$dat1;?>" />
            <p></p>
            <label>Вермя создания</label>
            <input name="time" type="text" value="<?=$dat2;?>" />
            <p></p>
            <label>Символьный код</label>
            <input name="news_code" type="text" id="sKod"/>
                </div>
                <div class="b_chi_2">
<!--                    <div class="form-group">-->
<!--                        <label for="image">Изображение для новости:</label>-->
<!--                        <input type="file" name="image" id="image">-->
<!--                    </div>-->
<!--                    <p></p>-->
                    <input class="butt"  type="submit" class="btn btn-default">
                    <a class="butt" onclick="window.location.href='/admin'">Назад</a>
                </div>
            </div>

        </div>
        </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    <!--        <script src="js/jquery.min.js"></script>-->
    <script src="js/jquery.Jcrop.min.js"></script>
    <script src="js/crop.js"></script>
    <script>
        $(document).ready(function () {
            var z = "<?=$sesUpl;?>";
            Q = JSON.parse(z);
            console.log(Q);
            $("#size_full").val(Q[0]+','+Q[1]);

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
                    url: '/admin/add_news/upl.php', // Скрипт обработчика
                    data: formData, // Данные которые мы передаем
                    cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
                    contentType: false, // Тип кодирования данных мы задали в форме, это отключим
                    processData: false, // Отключаем, так как передаем файл
                    success:function(data){
                        //alert(data);
                        var z = "<?=$sesUpl;?>";
                        Q = JSON.parse(z);
                        console.log(Q);
                        $("#size_full").val(Q[0]+','+Q[1]);
                        location.replace('/admin/add_news/');
                        printMessage('#result', data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
            }));
        });
        function translit(){
// Символ, на который будут заменяться все спецсимволы
            var space = '_';
// Берем значение из нужного поля и переводим в нижний регистр
            var text = $('#name').val().toLowerCase();
// Массив для транслитерации
            var transl = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
                'є': 'e','ї': 'yi','і': 'i',
                ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                '?': space, '<': space, '>': space, '№':space, '’':space
            }

            var result = '';
            var curent_sim = '';
            for(i=0; i < text.length; i++) {
                // Если символ найден в массиве то меняем его
                if(transl[text[i]] != undefined) {
                    if(curent_sim != transl[text[i]] || curent_sim != space){
                        result += transl[text[i]];
                        curent_sim = transl[text[i]];
                    }
                }
                // Если нет, то оставляем так как есть
                else {
                    result += text[i];
                    curent_sim = text[i];
                }
            }

            result = TrimStr(result);

// Выводим результат
            $('#sKod').val(result);

        }
        function TrimStr(s) {
            s = s.replace(/^-/, '');
            return s.replace(/-$/, '');
        }
        // Выполняем транслитерацию при вводе текста в поле
        $(function(){
            $('#name').keyup(function(){
                translit();
                return false;
            });
        });
    </script>
    </body>
</html>
<?}
else{echo 'Неавторизованный пользователь!';}
?>

