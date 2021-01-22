<!-- 負責儲存資料用，非頁面，所以不用給$pageName -->
<?php
require __DIR__. '/is_admin.php';
require __DIR__ . '/db_connect.php';

//輸出給前端的格式
$output = [
    'success' => false, //以此判斷有沒有新增成功，預設值為false
    'code' => 0,
    'error' => '參數不足',
];

if (!isset($_POST['name']) or !isset($_POST['email'])) { //若沒有填name或email欄位，就不做
    echo json_encode($output, JSON_UNESCAPED_UNICODE); //然後把$output的資料傳給前端
    exit;
}


//TODO: 檢查欄位格式
// preg_match//和ab-insert-api.php的email格式檢查會互相影響，所以選擇其一
// $email_re = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
                //(pattern,'string')
// if(! preg_match($email_re, $_POST['email'])){
//    $output['code'] = 400;
//    $output['error'] = 'email格式錯誤';
// }



//到資料庫的SQL按insert去找語法複製貼上來
$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        ?, ?, ?, ?, ?, NOW()
    )";

//用?可以處理SQL injection的SQL隱碼問題，?欄位裡若有單引號，prepare會幫忙做跳脫
//用於防範重大的資安問題
$stmt = $pdo->prepare($sql);

//真正的VALUES在execute執行的時候給
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
//用empty空字串才會判斷成true，印出NULL
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'],
]);


//以下判斷有沒有寫進去

//rowCount是指新增幾筆//若用select是指拿到幾筆
$output['rowCount'] = $stmt->rowCount();
if ($stmt->rowCount()) {
    $output['success'] = true;
    unset($output['error']);//若error就把他unset清除
}

//看network-response裡有沒有success:true,rowCount有沒有1
echo json_encode($output, JSON_UNESCAPED_UNICODE);
