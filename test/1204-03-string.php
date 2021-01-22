<?php

#(三)string--字串
$name = 'Bianca';

#用""會直接顯示變數
echo "Hello $name <br>";

#用''則不會顯示
echo 'Hello $name <br>';

#變數需用花括號包起來和數字相接，才會顯現
#錯誤
echo "Hello $name123 <br>";
#正確(同JS)
echo "Hello {$name}123 <br>";
#正確
echo "Hello ${name}123 <br>";


echo '<br>';
#跳脫字元-須放在雙引號內才會有作用
#\n(出現空格)  \"(出現")  \\(出現\)
$a = "xyz\nabc\"def'ghi\\\<br>";
$b = 'xyz\nabc\"def\'ghi\\';
echo $a;
echo $b;

echo '<br>';
#字串可使用即為文件表示法(不須使用跳脫字元)
#用<<<開頭，緊接標示名HDOC(可自訂，通常為大寫字母)加換行，再用標示名結尾HDOC;
$a = "PHP - MySQL是好朋友!";
$b = <<<HDOC
<br>
<h1>PHP - </h1>
<div style="color:red;">MySQL</div>
HDOC;

echo $a;
echo $b;

?>