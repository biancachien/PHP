<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
<pre>
<?php
    $ar = [];
    for($i=1; $i<=42; $i++){
        $ar[] = $i; //array_push把$i的值放到$ar[]裡
    }

    echo implode(',', $ar) ; //將陣列用,串起來
    
    echo "\n";

    shuffle($ar);  // shuffle亂數排序
    echo implode(',', $ar) ; //將陣列用,串起來

    ?>
    </pre>
</div>

</body>
</html>