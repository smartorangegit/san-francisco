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
    }
    if($_GET['filter'] == "Floor"){
        $florDump = explode('*',$_GET['id']);
        //$_SESSION['secFloor'] = $florDump[0];

    }
    else {
        $florDump = explode('*', $_GET['filter']);
    }
    if(isset($_GET['filter'])) {
        switch ($florDump[1]) {
            case 'sec':
                $_SESSION['z'] = $florDump;
                $where[] = "sec = ".$florDump[0];
                if($_SESSION['secFloor']) {
                    $where[] = "floor = " . $_SESSION['secFloor'];
                }
                $conditions[] = ['is_active' => $_GET['filter']];
                break;
            case 'build':
                $_SESSION['z'] = $florDump;
                $where[] = "build = ".$florDump[0];
                if($_SESSION['secFloor']) {
                    $where[] = "floor = " . $_SESSION['secFloor'];
                }
                $conditions[] = ['is_even' => $_GET['filter']];
                break;
            case 'Floor':
                $florDump = explode('*',$_GET['id']);
                $where[] = "floor = ".$florDump[0];
                if($_SESSION['z']){
                    $where[] = $_SESSION['z'][1]."= ".$_SESSION['z'][0];
                }
                $conditions[] = ['is_even' => $_GET['filter']];
                break;
        }
    }

    $query = "SELECT * 
            FROM `section`
            WHERE ".implode(" AND ", $where);
    $usr = $pdo->prepare($query);
    $usr->execute($conditions);
    while($row = $usr->fetch()) {
        ?>
        <div>
        <label> Номер секции :
            <input type="text" name="sec*<?=$row['id'];?>" value="<?=$row['sec'];?>">
        </label>
        <label> Этаж :
            <input type="text" name="floor*<?=$row['id'];?>" value="<?=$row['floor'];?>">
        </label>
        <label> Дом :
            <input type="text" name="build*<?=$row['id'];?>" value="<?=$row['build'];?>">
        </label>
        <label> Имя изображения :
            <input type="text" name="img*<?=$row['id'];?>" value="<?=$row['img'];?>">
        </label>
        <label> Компас :
            <input type="text" name="compas*<?=$row['id'];?>" value="<?=$row['compas'];?>">
        </label>
            <input type="hidden" name="id*<?=$row['id'];?>" value="<?=$row['id'];?>">
            <input id="DelSec" type="button" value="Удалить" onclick="dellFun(<?=$row['id'];?>);">
        </div>
        <?
        //print_r($query);
        echo "<br>";
        //print_r($_SESSION);
        //echo "<br>";
        //print_r($_GET);
    }
    ?><button id="UpdSec" type="submit" >Обновить</button>

   <?
}
catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных \n";
    //print_r($query);
    echo "<br>";
    print_r($_SESSION);
    echo "<br>";
    print_r($_GET);
}