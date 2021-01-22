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
<!-- table 1-9 -->
<table border="1">
    <?php for($i=1; $i<10; $i++): ?>
    <tr>
 <!-- 同<td><?php echo $i ?></td> -->
        <td><?= $i ?></td>
    </tr>
    <?php endfor; ?>
</table>

<br>
<!-- table 9*9 -->
<table border="1">
    <?php for($i=1; $i<10; $i++): ?>
    <tr>
        <?php for($j=1; $j<10; $j++): ?>
        <td><?= $i*$j ?></td>
        <?php endfor; ?>
    </tr>
    <?php endfor; ?>
</table>
</body>
</html>