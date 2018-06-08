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
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode) {?>
    <title>Список секций</title>
<?include ($dt."/menu.php");?>
    <?$trigButt = "all";?>

    <script type="text/javascript">
        // Назначить обработчики события click
        // после загрузки документа
        $(function(){
            $("button.filter").on("click", function(e){
                e.preventDefault();
                // Формируем ссылку для AJAX-обращения
                var url = "secList.php?filter=" + $(this).attr('id')+"&id="+$(this).attr('value');
                // Отправляем AJAX-запрос и выводим результат
                $.ajax({
                    url: encodeURI(url)
                }).done(function(data){
                    $('#updSection').html(data).removeClass("hidden");
                });
            });
            // Кликаем на ссылку #all сами, чтобы отобразить
            // первичный вывод при первой загрузке
            var ses = "<?=$trigButt;?>";
           $('#'+ses).trigger('click');
        });
        function selectChanged() {
            var sel = document.getElementById('myselect');
            var str = sel.selectedIndex ? (sel.options[sel.selectedIndex].innerHTML + '') : '1';
            document.getElementById('Floor').innerHTML = str+' Floor';
            //console.log(str);
            var iDparam = str+"*Floor";
            document.getElementById('Floor').setAttribute("value",iDparam);
        }
    </script>
<body>
    <form id="updSect">
        <button class="filter" id="all">all</button>
        <div>
            <label>Секиця № </label>
            <button class="filter" id="1*sec">1</button>
            <button class="filter" id="2*sec">2</button>
            <button class="filter" id="3*sec">3</button>
        </div>
        <div>
            <label>Дом № </label>
            <button class="filter" id="1*build">1</button>
            <button class="filter" id="2*build">2</button>
            <button class="filter" id="3*build">3</button>
        </div>
        <?
        $selMin = $DB->query("SELECT min(floor) FROM `section`");
        while ($rowSelMin = mysqli_fetch_array($selMin)){
            $zz = $rowSelMin[0];
            if($zz == 0 || empty($zz)){
                $zz=1;
            }
        }
        $qwe = $zz;
        $florSql = $DB->query("SELECT `floor` FROM `section`");
        while ($rowFlors = mysqli_fetch_array($florSql)) {
            $finFlor[] = $rowFlors['floor'];
        }
        $unFlors = array_unique($finFlor);
        $fi=count($unFlors);
        ?>
        <select id="myselect" onchange="javascript:selectChanged();">
            <? while($qwe<=$fi){
                if(isset($unFlors)) {
                    ?> <option <?if($_SESSION['secFlor']== $qwe.'*Floor'){echo "selected";}?> class="filter" id="<?=$qwe;?>*Floor" ><?=$qwe;?></option><?
                }
                $qwe++;
            }?>
        </select>
        <button name="fl" class="filter" id="Floor" value="<?if(!empty($_SESSION['secFlor'])){echo $_SESSION['secFlor'];}else{echo $zz."*Floor";}?>">
            <?$butName = explode("*",$_SESSION['filFlor']);
            if(!empty($butName[0])){ echo $butName[0].' '.$butName[1];}else{echo $zz." Floor";}?>
        </button>
    </form>
    <style>
        #updSect{
            margin: 0 0 50px 0;
        }
    </style>
    <form id='updSection' class='hidden'>
    </form>
    <script>
        form('#updSection');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Обновить данные?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "updSec.php", //путь до php фаила отправителя
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
        function dellFun(x) {
            var a = "del="+x; //передаем id элемента на удаление
                    var conf = confirm('Удалить секцию?');
                    if(conf) {
                        $.ajax({
                            type: "POST", //Метод отправки
                            url: "dellSec.php", //путь до php фаила отправителя
                            data: a,
                            processData: false,
                            success: function (html) {
                                //код в этом блоке выполняется при успешной отправке сообщения
                                alert(html);
                                console.log(x);
                            }
                        });
                    }
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