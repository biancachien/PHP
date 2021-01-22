<?php
require __DIR__. '/is_admin.php';
require __DIR__ . '/db_connect.php';

if (isset($_GET['sid'])) {
    //取整數
    $sid = intval($_GET['sid']);
    $pdo->query("DELETE FROM `address_book` WHERE sid=$sid ");
}

//回到ab-list.php
$backTo = 'ab-list.php';
//若有設定則到HTTP_REFERER
if(isset($_SERVER['HTTP_REFERER'])){
    $backTo = $_SERVER['HTTP_REFERER'];
}

//header回傳
header('Location: '. $backTo);
