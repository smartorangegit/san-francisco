<?php
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
session_start();
try {
    $pdo = new PDO(
        'mysql:host=forel.mysql.ukraine.com.ua;dbname=forel_adnminny',
        'forel_adnminny',
        'xe5caexy',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $where = [];
    $conditions = [];
    if($_GET['filter']=='all')
    {
        $where[] = "1";
        $_SESSION['filPar'] = $_GET['filter'];
        $_SESSION['fil']="1";
    }
    else {
        if ($_GET["page"] != '' && $_GET['page'] > 1) {
            $where[] = $_SESSION['fil'];
        } else {
            $where[] = "1";
        }
    }
    $lA=0;
    $lB=10;
    if(isset($_GET['filter'])) {
        $florDump = explode('u',$_GET['filter']);
        //fileter свич ловит геты, далее обрабатываем case и пишем условия для фильтрации
        //switch ($_GET['filter']) {
        switch ($florDump[1]){
            case 'rooms':
                $where[] = "rooms = ".$florDump[0];
                $conditions[] = ['is_active' => $_GET['filter']];
                $_SESSION['fil']="rooms = ".$florDump[0];
                $_SESSION['filPar'] = $_GET['filter'];
                $checkSql = $DB->query("SELECT COUNT(1) FROM `apartments` WHERE $where[1];");
                $r3Check = mysqli_fetch_array($checkSql);
                if($r3Check[0]<11) {
                    echo "<style>#pagens{display: none;}</style>";
                }
                break;
            case 'flor':
                $where[] = "floor = ".$florDump[0];
                $conditions[] = ['is_active' => $_GET['filter']];
                $_SESSION['fil']="floor = ".$florDump[0];
                $_SESSION['filPar'] = $florDump[1];
                $_SESSION['filFlor'] = $_GET['filter'];
                $checkSql = $DB->query("SELECT COUNT(1) FROM `apartments` WHERE $where[1];");
                $r3Check = mysqli_fetch_array($checkSql);
                if($r3Check[0]<11) {
                    echo "<style>#pagens{display: none;}</style>";
                }
                break;
            case 'onSale':
                $where[] = "onSale = 1";
                $conditions[] = ['is_active' => $_GET['filter']];
                $_SESSION['fil']="onSale = 1";
                $_SESSION['filPar'] = $_GET['filter'];
                $checkSql = $DB->query("SELECT COUNT(1) FROM `apartments` WHERE $where[1];");
                $r3Check = mysqli_fetch_array($checkSql);
                if($r3Check[0]<11) {
                    echo "<style>#pagens{display: none;}</style>";
                }
                break;
        }
    }
    if($where[0]==1 && ($_GET['page']=='' || $_GET['page']==1)){
        $countItemsId = $DB->query("SELECT COUNT(1) FROM `apartments`");
        $curCountDb = mysqli_fetch_array($countItemsId);
        $lA=0;
        $lB=10;
    }
    else {
        if ($_GET['page'] == '' || $_GET['page'] == 1) {
            $lA = 0;
            $lB = 10;
        } else {
            $lA = ($lB*$_GET['page'])-10;
            $lB = 10;
        }
    }
    $query = "SELECT * FROM `apartments`  WHERE ".implode(" AND ",$where)." LIMIT $lA,$lB";
    $usr = $pdo->prepare($query);
    $usr->execute($conditions);
    $i = 0;
    $idsArr = array();
    while($user = $usr->fetch()) {
       // echo "<div>".htmlspecialchars($user['type'])."</div>";
        echo "<label>Тип</label><input  type='text' name='type_$i' value=".$user['type'].">";
        echo "<label>Кол комнат</label><input type='text' name='rooms_$i' value=".$user['rooms'].">";
        echo "<label>Номер дома</label><input type='text' name='buld_$i' value=".$user['buld'].">";
        echo "<label>Номер секции</label><input type='text' name='sec_$i' value=".$user['sec'].">";
        echo "<label>Этаж</label><input type='text' name='flor_$i' value=".$user['floor'].">";
        echo "<label>Цена</label><input type='text' name='price_$i' value=".$user['price'].">";
        echo "<input type='hidden' name='id_$i' value=".$user['id'].">";
        ?><input type="button" value="Детально" onclick="location.href='/admin/apartments_list/list.php?id=<?= $user['id'];?>'"><?
        echo "<br>";
        $i++;
        //print_r($conditions);
    }
    if($i==0){
        $_SESSION['filPar'] = "all";
        $_SESSION['fil'] = 1;
        ?>
        <script>
            $(document).ready(function() {
              location.replace('?page=1');
            });

        </script>
        <?
    }
    //print_r($_GET);
    echo "<input name='upd' type='submit' value='Update' id='updButt'/>";
    //echo "SELECT * FROM `apart_test`  WHERE ".implode(" AND ",$where)." LIMIT $lA,$lB";
}
catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных";
    //echo "SELECT * FROM `apart_test`  WHERE ".implode($where)." LIMIT $lA,$lB";
    //echo "SELECT * FROM `apart_test`  WHERE ".implode("AND",$where)." LIMIT $lA,$lB";
}
//print_r($_GET);