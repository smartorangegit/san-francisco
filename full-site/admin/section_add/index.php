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
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode) {
    ?>
    <?include ($dt."/menu.php");?>
    <body>
    <form id="addSec" style="display: table-caption;">
        <label> Номер секции :
        <input type="text" name="sec">
        </label>
        <label> Этаж :
        <input type="text" name="floor">
        </label>
        <label> Дом :
        <input type="text" name="build">
        </label>
        <label> Имя изображения :
        <input type="text" name="img">
        </label>
        <label> Компас :
        <input type="text" name="compas">
        </label>
        <button type="submit">Добавить секцию</button>
    </form>
    <script>
        form('#addSec');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Добавить секцию?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "addSec.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            console.log(html);
                            location.replace('/admin/section_list/');
                        }
                    });
                }
            });

        }
    </script>
    </body>
    </html>
    <?
}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>