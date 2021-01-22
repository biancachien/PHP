<?php
session_start();//啟動session

unset($_SESSION['admin']);//登出會把session刪除//unset用法清除某一陣列的元素

// session_destroy();//也是刪除的做法，但會把購物紀錄等等都一併清除，是較為強烈的做法，不建議使用

header('Location: login.php');//轉向，登出後會再回到登入頁面
