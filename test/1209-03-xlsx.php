<?php

//include和require基本上兩者相同，指讀取後面接的檔案的意思
//但找不到檔案時，include顯示warning，require顯示error
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet(); //建立新表(透過類別去建立一個物件)
$sheet = $spreadsheet->getActiveSheet(); //getActiveSheet開分頁(活動表)(呼叫物件的方法)
$sheet->setCellValue('A1', '是在哈囉!'); //setCellValue設定座標(A1表示縱軸和橫軸的位置)

$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx');