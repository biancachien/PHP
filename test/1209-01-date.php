<div>
    <?php

    //PHP的時間格式

    //改現在時區
    //或可在php.ini搜尋timezone，改成Asia/Taipei
    date_default_timezone_set('Asia/Taipei');

    echo date("Y-m-d H:i:s"); //MySQL儲存的格式(見PHP官網說明表)
    echo '<br>';
    echo time(); //指timestamp，1970年到現在的秒數
    echo '<br>';
    echo date("Y-m-d H:i:s", time() - 7 * 24 * 60 * 60); //選取過去某段時間
    //指天數*24小時*60分*60秒
    ?>
</div>