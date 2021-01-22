<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<pre>
<?php
// 若為get就把此改成print_r($_GET)
print_r($_POST)
?>
</pre>

<!-- 傳統表單的欄位要有效是以name的屬性為主，而非id -->
<!-- 通常name和id會命名一樣 -->
<!-- action是指表單要送給誰，沒填(空字串)會送給自己 -->
<!-- method預設值為get，傳統表單只有get/post兩種 -->
<form name="form1" action="" method="post">
   <input type="text" id="account" name="account" placeholder="帳號"><br>
   <input type="password" id="password" name="password" placeholder="密碼"><br>
   <input type="submit">
   
</form>
<script>
    //拿到password的欄位
    const password = document.form1.password;

    function changeType(){
        //拿到password的type
        const t = password.getAttribute('type');
        if(t === 'password'){
            //如果t的屬性是password就將它的屬性成text
            password.setAttribute('type', 'text');
        } else {
            //如果t的屬性不是password就將它的屬性成password
            password.setAttribute('type', 'password');
        }
    }
</script>


<!--以下三種方法皆可讀取到passward的值
(1)document.getElementById('password').value
(2)document.querySelector('form > input[type=password]').value
(3)document.querySelectorAll('input')[1].value
-->

<!--
(1)document.form1.password.value
   可讀取passward的值
   若用document.form1.password.value = 也可給值
(2)document.forms[0].elements
   elements指的是表單裡所有有作用的欄位
(3)document.forms[0].elements[1].value 
   可讀取passward的值
-->

</body>

</html>