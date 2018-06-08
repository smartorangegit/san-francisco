<?php
//echo 'tyt delaem vivid i filtr';
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
require 'button.class.php';
require 'pagination.class.php';
$checkSecur = $DB->query("SELECT * FROM `users`");
while ($rowSecure = mysqli_fetch_array($checkSecur)) {
    $securKode = $rowSecure['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check'] == $securKode){
    if(!empty($_SESSION['filPar'])){$trigButt = $_SESSION['filPar'];}else{$trigButt = "all";}
    $ver = $_SESSION['fil'];
    $countItemsId = $DB->query("SELECT COUNT(1) FROM `apartments` WHERE $ver");
    $curCountDb = mysqli_fetch_array($countItemsId);
    $quantity = round($curCountDb[0]/10);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $p = new Pagination(array(
        'itemsCount' => $curCountDb[0],
        'itemsPerPage' => 10,
        'currentPage' => $page
    ));
    if($curCountDb[0]>=10){
        ?>
        <style>
            #pagens{
                visibility: visible !important;
            }
        </style>
        <?
    }
$sel = $DB->query("SELECT * FROM `apartments`");
while ($row = mysqli_fetch_array($sel)){
    //echo "<br>";
    //print_r($row);
}?>
    <!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='utf-8'>
        <?include ($dt."/menu.php");?>
        <script type="text/javascript">
            // Назначить обработчики события click
            // после загрузки документа
            $(function(){
                $("button.filter").on("click", function(){
                    // Формируем ссылку для AJAX-обращения
                    var url = "appartList.php?filter=" + $(this).attr('id');
                    var pagen = "page=<?=$_GET['page'];?>";
                    var tId = $(this).attr('id');
                    if(tId === "flor" || tId === "<?=$_GET['filter'];?>") {
                        var url = "appartList.php?filter=" + $(this).attr('value');
                    }
                    // Отправляем AJAX-запрос и выводим результат
                    $.ajax({
                        url: encodeURI(url),
                        data: pagen
                    }).done(function(data){
                        $('#updAppart').html(data).removeClass("hidden");
                        $("#pagens").load(" #pagens");
                    });
                });
                // Кликаем на ссылку #all сами, чтобы отобразить
                // первичный вывод при первой загрузке
                var ses = "<?=$trigButt;?>";
                $('#'+ses).trigger('click');
            });
        </script>
    </head>
    <body>
    <div>
        <label>Select type of filtration: </label>
        <button class="filter" id="all">All</button>
        <?// u  - розделитель в место спец символа?>
        <button class="filter" id="uonSale">On Sale</button>
        <button class="filter" id="1urooms">1 rooms</button>
        <button class="filter" id="2urooms">2 rooms</button>
        <button class="filter" id="3urooms">3 rooms</button>
        <button class="filter" id="4urooms">4 rooms</button>
        <button class="filter" id="5urooms">5 rooms</button>
        <div>
<?
$florSql = $DB->query("SELECT `floor` FROM `apartments`");
while ($rowFlors = mysqli_fetch_array($florSql)) {
    $finFlor[] = $rowFlors['floor'];
}
$unFlors = array_unique($finFlor);
$qwe=1; 
$fi=count($unFlors);
?>
        <select id="myselect" onchange="javascript:selectChanged();">
            <? while($qwe<=$fi){
                if(isset($unFlors)) {
?> <option <?if($_SESSION['filFlor']== $qwe.'uflor'){echo "selected";}?> class="filter" id="<?=$qwe;?>uflor" ><?=$qwe;?></option><?
                }
                $qwe++;
            }?>
        </select>
        <button class="filter" id="flor" value="<?if(!empty($_SESSION['filFlor'])){echo $_SESSION['filFlor'];}else{echo "1uflor";}?>">
            <?$butName = explode("u",$_SESSION['filFlor']);
            if(!empty($butName[0])){ echo $butName[0].' '.$butName[1];}else{echo "1 flor";}?></button>
        </div>
    </div>
    <script type="text/javascript">
        function selectChanged() {
            var sel = document.getElementById('myselect');
            var str = sel.selectedIndex ? (sel.options[sel.selectedIndex].innerHTML + '') : '1';
            document.getElementById('flor').innerHTML = str+' flor';
            //console.log(str);
            var iDparam = str+"uflor";
            document.getElementById('flor').setAttribute("value",iDparam);
        }
    </script>
    <form id='updAppart' class='hidden'>
    </form>
    <style>
        form#updAppart>input{
            width: 5%;
        }
        #pagens{
            visibility: hidden;
            position: absolute;
            bottom: calc(100% - 95%);
            width: calc(100% - 1%);
        }
        span{
            text-shadow: 1px 1px 0 #444;
        }
    </style>
    <div id="pagens" class="hidden">
        <b>Pagination</b> <hr/>
        <?php foreach ($p->buttons as $button) :
            if ($button->isActive) : ?>
                <a id="left" href = '?page=<?=$button->page?>'><?=$button->text?></a>
            <?php else : ?>
                <span id="right" style="color:#555555"><?=$button->text?></span>
            <?php endif;
        endforeach;
        ?>
    </div>
    <script>
        form('#updAppart');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Обновить данные?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "appartUpdate.php", //путь до php фаила отправителя
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
    </body>
    </html>
<?}
else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
print_r($_SESSION);
?>
