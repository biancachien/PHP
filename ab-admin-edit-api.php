<?php
require __DIR__. '/is_admin.php';
require __DIR__. '/db_connect.php';

$upload_folder = __DIR__. '/uploads';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

$ext_map = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$fields = [];

$field[] = "`nickname`=". $pdo->quote($_POST['nickname']);
// 有沒有要改密碼

if(! empty($_POST['new_password'])){
    $fields[] = sprintf("`password`=SHA1(%s)", $pdo->quote($_POST['new_password']));
}

// 有沒有上傳圖
if(!empty($_FILES) and !empty($_FILES['avatar']['type']) and $ext_map[$_FILES['avatar']['type']]){
    $output['file'] = $_FILES;

    $filename = uniqid(). $ext_map[$_FILES['avatar']['type']];
    $output['filename'] = $filename;
    if(move_uploaded_file( $_FILES['avatar']['tmp_name'], $upload_folder. '/'. $filename)){
        $fields[] = "`avatar`= '$filename' ";
    }
}
$sql = sprintf("UPDATE `admins` SET %s WHERE sid=? AND password=SHA(?) ", implode(',', $fields));

$output['sql'] = $sql;

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['admin']['sid'],
    $_POST['password'],
]);

if($stmt->rowCount()==1){
    $output['success'] = true;
    // 更新 session

    $_SESSION['admin'] = $pdo->query("SELECT * FROM admins WHERE sid=". intval($_SESSION['admin']['sid']))
       ->fetch();
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;


if(! isset($_POST['name']) or ! isset($_POST['email'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// TODO: 檢查欄位格式

$email_re = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
if(! preg_match($email_re, $_POST['email'])){
    $output['code'] = 400;
    $output['error'] = 'Email 格式錯誤';

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`, `birthday`, `address`, `created_at`
) VALUES (
    ?, ?, ?, ?, ?, NOW()
)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        empty($_POST['birthday']) ? NULL : $_POST['birthday'],
        $_POST['address'],
]);

$output['rowCount'] = $stmt->rowCount();
if($stmt->rowCount()){
    $output['success'] = true;
    unset($output['error']);
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);


