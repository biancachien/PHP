<?php
//避免格式有html的框架
//指server回應給你的格式是什麼
//預設是text/html，plain是指一般文字
header('Content-Type: text/plain');
//自訂常數
define('MY_CONST', 3);
$c = 100;

//function裡無法引用全域變數，只能在function裡設全域變數後才可使用，但不要這樣用
function multi($a, $b=10){
    global $c;  // 不要這樣用
    //return $a*$b*$c;
    //常數在函式裡可以使用，沒有範圍的問題
    return $a*$b*MY_CONST;
}

//()裡一定要填數字否則會error
echo multi(6,7);
echo "\n";
echo multi(6);
