<?php
//將post進來的資料看成array再回傳
//unicode可以顯示中文(不會跳脫中文字)
//json_encode
echo json_encode($_POST, JSON_UNESCAPED_UNICODE);

