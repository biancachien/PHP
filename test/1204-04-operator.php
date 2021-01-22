<?php

#(四)運算子


$name = 'Bill';
echo "$name <br>";
#若要印出true或false要加上''否則會印出1或空字串
echo isset($name) ? true : false;

echo "<br>";
#寫法一
#語法isset，測試變數有無設定
#如果有設定印$name
if(isset($name)){
    echo "$name <br>";
#如果沒有設定，印noname
} else {
    echo "noname <br>";
}

#寫法二(三元運算子)
echo isset($name) ? $name : 'noname';
echo "<br>";

#寫法三(不需用isset)PHP7新功能
#用??區分，如果$name有設定，印$name，如果沒有設定印noname
#比較適合只有字串的情況下使用(數值不適合)
echo $name ?? 'noname';  
echo "<br>";



