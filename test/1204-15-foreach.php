<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
<pre>
<?php
    $ar1 = [
        'name' => 'flora',
        'age' => 23,
        100,
    ];

    $ar1[9] = 99;
    $ar1[3] = 33;
    //foreach/as//在php比for迴圈還常用
    //查看索引式陣列--從陣列$ar1中取$v變數的value出來
    foreach($ar1 as $v){
        echo " $v <br/>";
    }

    //查看關聯式陣列--從陣列$ar1中取$k和$v變數的key和value出來
    //變數名稱不影響，只看位置，前面位置為key =>後面位置為value
    foreach($ar1 as $k => $v){
        echo "$k : $v <br>";
    }
    ?>
    </pre>
</div>

</body>
</html>