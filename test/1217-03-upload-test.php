<?php
$output = [];

//先選擇圖片要傳送到的檔案位置
$upload_folder = __DIR__ . '/../uploads';

$ext_map = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

//上傳圖片改成亂數檔名(避免有檔名重複者覆蓋圖片)
// https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid
function gen_uuid(){
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

if (!empty($_FILES) and $ext_map[$_FILES['avatar']['type']]) {
    $output['file'] = $_FILES;

    $filename = gen_uuid() . $ext_map[$_FILES['avatar']['type']];
    $output['filename'] = $filename;
    move_uploaded_file(
        $_FILES['avatar']['tmp_name'],
        $upload_folder . '/' . $filename
    );
}

// if (!empty($_FILES)) {
//     $output['file'] = $_FILES;


//     move_uploaded_file(
//         $_FILES['avatar']['tmp_name'],
//         $upload_folder . '/' . $_FILES['avatar']['name']
//     );
// }

header('Content-Type: application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
