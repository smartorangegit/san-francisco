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
        <form id="up_i_h" enctype="multipart/form-data">
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
                    <label>Название </label><input  name="name_hod_ua"  id="name" type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input  name="min_text_ua" type="text"/>


                </section>
                <section id="content-tab2">

                    <label>Язык</label>
                    <input name="langRU" type="text" value="ru" readonly/>
                    <p></p>
                    <label>Название </label><input  name="name_hod_ru"  type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input  name="min_text_ru" type="text"/>

                </section>
                <section id="content-tab3">

                    <label>Язык</label>
                    <input name="langEN" type="text" value="en" readonly/>
                    <p></p>
                    <label>Название </label><input  name="name_hod_en"  type="text"/>
                    <p></p>
                    <label>Кратое описание </label><input name="min_text_en" type="text"/>

                </section>
                <!--            <section id="content-tab4">-->
                <!--                <p>-->
                <!--                    Здесь размещаете любое содержание....-->
                <!--                </p>-->
                <!--            </section>-->
                <div class="bot_div">
                    <div class="b_chi_1">
                        <label>Дата создания</label>
                        <input name="date" type="text" value="<?=$dat1;?>" />
                        <p></p>
                        <label>Вермя создания</label>
                        <input name="time" type="text" value="<?=$dat2;?>" />
                        <p></p>
                        <label>Символьный код</label>
                        <input id="sKod" name="hod_code" type="text"/>
                    </div>
                    <div class="b_chi_2">
                        <div class="form-group">
                            <input   id="image" name="image[]" type="file" multiple><br>
                        </div>
                        <p></p>
                        <input class="butt"  type="submit" class="btn btn-default">
                        <a class="butt" onclick="window.location.href='/admin'">Назад</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    <script> function translit(){
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
                ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                '?': space, '<': space, '>': space, '№':space
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

