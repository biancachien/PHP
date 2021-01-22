<?php
$db_host = 'localhost'; //要連線的主機是哪一台
$db_name = '22_mysql'; //要連線的資料庫名稱
$db_user = 'root'; //連到資料庫的登入帳號
$db_pass = ''; //連到資料庫的登入密碼

//dsn-data source name
//mysql後面不能有任何空格
//charset編碼名稱
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

//額外的設定
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //拿資料的方法，FETCH_ASSOC指拿一本資料出來的時候會是關聯式陣列
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" //第一次連線去執行//NAME'S'記得加S
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options); //除錯使用//大寫PDO是類別


if (!isset($_SESSION)) {
    session_start();
}
