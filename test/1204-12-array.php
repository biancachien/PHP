<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
<!-- pre可完整顯示空格，方便程式碼排版 -->
<pre>
<?php
    // 索引式陣列
    //傳統寫法
    $ar1 = array(2,4,6,8);
    //較新寫法(同js)
    $ar2 = [2,4,6,8];
    
    
    // 關聯式陣列
    //寫法一
    $ar3 = array(
        'name' => 'David',
        'age' => 25,
        //沒有key，索引值會帶[0]
        100,
    );
    //寫法二
    $ar4 = [
        'name' => 'David',
        'age' => 25,
    ];


    //查詢用-可看array內容
    print_r($ar1);
    //查詢用-可看比較詳細的array內容
    var_dump($ar2);

    print_r($ar3);
    var_dump($ar4);
?>
</pre>
</div>

</body>
</html>