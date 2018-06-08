<?php
/*
$DB = mysql_connect ("customsh.mysql.ukraine.com.ua","customsh_sanfran","ze2he8qx");
mysql_select_db ("customsh_sanfran",$DB);
mysql_query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
}
*/
$Server = "customsh.mysql.ukraine.com.ua";
$Login = "customsh_sanfran";
$Password = "ze2he8qx";
$DataBase = "customsh_sanfran";

$DB = new MySQLi($Server, $Login, $Password, $DataBase);

$result = $DB->query("Set charset utf8");
$result = $DB->query("Set character_set_client = utf8");
$result = $DB->query("Set character_set_connection = utf8");
$result = $DB->query("Set character_set_results = utf8");
$result = $DB->query("Set collation_connection = utf8_general_ci");

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
?>
