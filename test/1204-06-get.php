<?php
#在PHP裡抓query string的方式
#內建變數get(query string)
#會印出notice，所以用下面的方法寫
echo $_GET['a'];

#寫法一
$a = isset($_GET['a']) ? $_GET['a'] : '';
#寫法二
$a = $_GET['a'] ?? '';
echo "$a <br>";

// // ?a=hh&b=76%208789
// //intval指轉換成整數，因此%20後的小數不會顯示
// //%20表示空格(跳脫表示法)
// //query string裡不需要用''因為會自動轉成字串
#要輸入值否則只會印出0
$b = isset($_GET['b']) ? intval($_GET['b']) : 0;
echo $b;

