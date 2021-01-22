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
<!-- printf和sprintf的用法 -->

<!-- printf輸出到頁面上 -->
<!-- sprintf回傳字串-->

<!-- printf語法 -->
<!-- %s(填字串)挖洞給後面的變數填(轉成字串) -->
<!-- %d(填整數)挖洞給後面的變數填(轉成字串) -->
<?php
$a = 10;
$b = 7;

printf("---%s---%s-------<br>", $a, $b);
printf("---%d---%d-------<br>", $b, $a);
?>

<!-- 用printf或sprintf做九九乘法表 -->
<table border="1">
    <?php for($i=1; $i<10; $i++): ?>
    <tr>
        <?php for($j=1; $j<10; $j++): ?>
        
        <!-- sprintf的寫法 -->        
   <!-- <td><?= sprintf("%s X %s = %s", $i, $j, $i*$j); ?></td> -->
        <!-- printf的寫法 -->
        <td><?php printf("%s X %s = %s", $i, $j, $i*$j); ?></td>
        
        <?php endfor; ?>
    </tr>
    <?php endfor; ?>
</table>
</body>
</html>