<?php
session_start();
require($_SERVER['DOCUMENT_ROOT']."/admin/bd.php");
$provirka = $DB->query("SELECT * FROM `users`");
while ($liniyka = mysqli_fetch_array($provirka)) {
    $sec_k = $liniyka['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k) {
    if($_POST['Yday']){
    session_destroy();
    }
}