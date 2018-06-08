<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
$checkSecur = $DB->query("SELECT * FROM `users`");
while ($rowSecure = mysqli_fetch_array($checkSecur)) {
    $securKode = $rowSecure['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check'] == $securKode) {
    include ($dt."/menu.php");
     ?>
    <div class="all">
    <form id="addApparts">
        <div id="coll1">
            <label>Тип квартиры: </label>
            <input id="typ" type="text" name="type">
            <label>Кол комнат: </label>
            <input type="text" name="rooms">
            <label>Номер дома: </label>
            <input type="text" name="build">
            <label>Номер секции: </label>
            <input type="text" name="sec">
            <label>Этаж квартиры: </label>
            <input type="text" name="floor">
            <label>Общая площадь: </label>
            <input type="text" name="all_room">
            <label>Жилая площадь: </label>
            <input type="text" name="life_room">
            <label>Комната №1: </label>
            <input type="text" name="room1">
            <label>Комната №2: </label>
            <input type="text" name="room2">
            <label>Комната №3: </label>
            <input type="text" name="room3">
            <label>Комната №4: </label>
            <input type="text" name="room4">
        </div>
        <div id="coll2">
            <label>Комната №5: </label>
            <input type="text" name="room5">
            <label>Комната №6: </label>
            <input type="text" name="room6">
            <label>Комната №7: </label>
            <input type="text" name="room7">
            <label>Комната №8: </label>
            <input type="text" name="room8">
            <label>Комната №9: </label>
            <input type="text" name="room9">
            <label>Комната №10: </label>
            <input type="text" name="room10">
            <label>Комната №11: </label>
            <input type="text" name="room11">
            <label>Комната №12: </label>
            <input type="text" name="room12">
            <label>Комната №13: </label>
            <input type="text" name="room13">
            <label>Комната №14: </label>
            <input type="text" name="room14">
            <label>Комната №15: </label>
            <input type="text" name="room15">
        </div>
        <div id="coll3">
            <label>Комната №16: </label>
            <input type="text" name="room16">
            <label>Комната №17: </label>
            <input type="text" name="room17">
            <label>Комната №18: </label>
            <input type="text" name="room18">
            <label>Комната №19: </label>
            <input type="text" name="room19">
            <label>Комната №20: </label>
            <input type="text" name="room20">
            <label>Название изображения: </label>
            <input type="text" name="imgName">
            <label>Многоуровневая: </label>
                <div>
            <input type="radio" name="level" value="1">Да<br>
            <input type="radio" name="level" value="0">Нет
                </div>
            <label>Цена: </label>
            <input type="text" name="price">
            <label>Статус квартиры: </label>
                <div>
            <input type="radio" name="onSale" value="1">В продаже<br>
            <input type="radio" name="onSale" value="0">Не в продаже
                </div>
        </div>
        <button type="submit">Add</button>
    </form>
    <form id="maxId">
        <button type="submit">Получить id</button>
    </form>
    <form id="addLvlApparts">
        <label>Id первого уровня </label>
        <input type="text" name="id_flat" id="id_flat" readonly>
        <div id="coll1">
            <label>Комната №1: </label>
            <input type="text" name="room1">
            <label>Комната №2: </label>
            <input type="text" name="room2">
            <label>Комната №3: </label>
            <input type="text" name="room3">
            <label>Комната №4: </label>
            <input type="text" name="room4">
            <label>Комната №5: </label>
            <input type="text" name="room5">
            <label>Комната №6: </label>
            <input type="text" name="room6">
            <label>Комната №7: </label>
            <input type="text" name="room7">
            <label>Комната №8: </label>
            <input type="text" name="room8">
            <label>Комната №9: </label>
            <input type="text" name="room9">
            <label>Комната №10: </label>
            <input type="text" name="room10">
        </div>
        <div id="coll2">
            <label>Комната №11: </label>
            <input type="text" name="room11">
            <label>Комната №12: </label>
            <input type="text" name="room12">
            <label>Комната №13: </label>
            <input type="text" name="room13">
            <label>Комната №14: </label>
            <input type="text" name="room14">
            <label>Комната №15: </label>
            <input type="text" name="room15">
            <label>Комната №16: </label>
            <input type="text" name="room16">
            <label>Комната №17: </label>
            <input type="text" name="room17">
            <label>Комната №18: </label>
            <input type="text" name="room18">
            <label>Комната №19: </label>
            <input type="text" name="room19">
            <label>Комната №20: </label>
            <input type="text" name="room20">
        </div>
        <div id="coll3">
            <label>Комната №21: </label>
            <input type="text" name="room21">
            <label>Комната №22: </label>
            <input type="text" name="room22">
            <label>Комната №23: </label>
            <input type="text" name="room23">
            <label>Комната №24: </label>
            <input type="text" name="room24">
            <label>Комната №25: </label>
            <input type="text" name="room25">
            <label>Комната №26: </label>
            <input type="text" name="room26">
            <label>Комната №27: </label>
            <input type="text" name="room27">
            <label>Комната №28: </label>
            <input type="text" name="room28">
            <label>Комната №29: </label>
            <input type="text" name="room29">
            <label>Комната №30: </label>
            <input type="text" name="room30">
        </div>
        <button type="submit">Добавить уровень</button>
    </form>
    </div>
    <style>
        #coll1,#coll2,#coll3{
            display: inline-grid;
        }
        .all{
            display: inline-flex;
            width: 100%;
        }
        #maxId{
            margin: 0 0 0 5%;
        }
        form>button{
            position: relative;
            float: right;
            top: 100%;
        }
        form{
            height:445px;
        }
        input[type=text]{
            width: 130px;
        }
    </style>
    <script>
        form('#addApparts');
        form2('#maxId');
        form3('#addLvlApparts');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Добавить новую квартиру?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "appartAdd.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            //location.reload();
                        }
                    });
                }
            });

        }
        function form2(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы

                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "checkId.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            //alert(html);
                            console.log(html);
                            document.getElementById('id_flat').setAttribute("value",html);
                            //location.reload();
                        }
                    });

            });

        }
        function form3(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var valInpId = document.getElementById('id_flat').getAttribute("value");
                var conf = confirm('Добавить уровень?');
                if(conf) {
                    if (valInpId) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "appartLvlAdd.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            //location.reload();
                        }
                    });
                }
                else {
                        alert("Вы не получили id для добавления!")
                    }
                }
            });

        }
        function translit(){
// Символ, на который будут заменяться все спецсимволы
            var space = '_';
// Берем значение из нужного поля и переводим в нижний регистр
            var text = $('#typ').val().toLowerCase();
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
            $('#typ').val(result);

        }
        function TrimStr(s) {
            s = s.replace(/^-/, '');
            return s.replace(/-$/, '');
        }
        // Выполняем транслитерацию при вводе текста в поле
        $(function(){
            $('#typ').keyup(function(){
                translit();
                return false;
            });
        });
    </script>
    <?
}
else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>
