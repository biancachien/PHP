<?php
//整篇是用中文
mb_internal_encoding("UTF-8");
//只需連結資料庫
require __DIR__. '/db_connect.php';

//要作亂碼使用的字
$str = "統一獅隊陳鏞基昨晚對富邦悍將隊完成生涯百盜";

//跑亂碼的function
function str_shuffle_unicode($str) {
    $tmp = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    shuffle($tmp);
    return join("", $tmp);
}

//要輸入的欄位和下面的prepare配合
$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`, `birthday`, `address`, `created_at`
) VALUES (
    ?, ?, ?, ?, ?, NOW()
)";

$stmt = $pdo->prepare($sql);


//用for迴圈跑亂碼資料(100筆)出來
for($i=0; $i<100; $i++) {
    $stmt->execute([
        //擷取中文字串(拿到一個弄亂的字串，從0開始，拿3個)//擷取英文字串用substr//擷取多國語系字串用mb_substr
        mb_substr(str_shuffle_unicode($str), 0, 3),
        'test@gmail.com',
        '0918-444-777',
        '1990-10-10',
        '台北市',
    ]);
}

//在網頁印出ok
echo 'ok';
