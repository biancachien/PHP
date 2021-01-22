<!-- setcookie放置在最上頭，其餘的內容放在body裡即可 -->
<?php
// cookie變數名稱，變數數值
setcookie("mycookie", "2");
?>
<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- 讀取cookie -->
    <?= $_COOKIE['mycookie'] ?>
</body>

</html>