<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        td {
            width: 30px;
            height: 30px;
        }

        table {
            border-spacing: 0;
        }
    </style>
</head>

<body>
    <!-- 漸層色塊 -->
    <table>
        <?php for ($i = 0; $i < 16; $i++) : ?>
            <tr>
                <!-- %x表示16進位 -->
                <?php for ($j = 0; $j < 16; $j++) : ?>
                <td style="background-color: #<?= sprintf("%x%x", $i, $j) ?>0;"> </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>