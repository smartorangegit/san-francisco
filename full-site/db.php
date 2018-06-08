<?php
$Server = "customsh.mysql.ukraine.com.ua";
$Login = "customsh_sanfran";
$Password = "ze2he8qx";
$DataBase = "customsh_sanfran";

$db = new MySQLi($Server, $Login, $Password, $DataBase);

$result = $db->query("Set charset utf8");
$result = $db->query("Set character_set_client = utf8");
$result = $db->query("Set character_set_connection = utf8");
$result = $db->query("Set character_set_results = utf8");
$result = $db->query("Set collation_connection = utf8_general_ci");

if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

?>
