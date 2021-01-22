<?php
require __DIR__ . '/is_admin.php';
$pageName = 'ab-insert';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<style>
    form small.error-msg {
        color: red;
    }
</style>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="alert alert-danger" role="alert" id="info" style="display:none">
                錯誤
            </div>


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">註冊資料</h5>
                    <!-- 下novalidate會使所有驗證或特殊標記失效 -->
                    <!-- return false用意在不使用傳統方式post/get發送 -->
                    <form method="post" novalidate onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <small class="form-text error-msg" style="display: none"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small class="form-text error-msg" style="display: none"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text error-msg">請使用09xx-xxx-xxx格式輸入</small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <!-- type下date會有日期格式 -->
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <input type="text" class="form-control" id="address" name="address">
                            <!-- <textarea class="form-control" id="address" name="address" cols="50" rows="3"></textarea> -->
                        </div>
                        <!-- button type="button" class="btn btn-danger">danger</button -->
                        <button type="submit" class="btn btn-primary">送出</button>
                        <!-- input class="btn btn-warning" type="submit" value="---" -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const info = document.querySelector('#info');
    // document.querySelector('#name').style.borderColor = 'red'
    const name = document.querySelector('#name');
    const email = document.querySelector('#email');
    // email格式檢查
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    function checkForm() {
        info.style.display = 'none';
        let isPass = true;

        name.style.borderColor = '#CCCCCC';
        name.closest('.form-group').querySelector('small').style.display = 'none';
        // name.nextElementSibling.style.display = 'none'; 為dump的api，意思同上，相對位置，但只能寫在下一句用，否則用上面這句
        email.style.borderColor = '#CCCCCC';
        email.closest('.form-group').querySelector('small').style.display = 'none';
        // email.nextElementSibling.style.display = 'none'; 為dump的api，意思同上，相對位置，但只能寫在下一句用，否則用上面這句

        //if名字的長度大於2
        if (name.value.length < 2) {
            //有沒有通過，假定false就執行下面
            isPass = false;
            name.style.borderColor = 'red';
            let small = name.closest('.form-group').querySelector('small');
            small.innerText = "請輸入正確的名字";
            small.style.display = 'block';
        }
        //test如果email_re沒有值，則顯示紅色
        // if (!email_re.test(email.value)) {
        //     isPass = false;
        //     email.style.borderColor = 'red';
        //     let small = email.closest('.form-group').querySelector('small');
        //     small.innerText = "請輸入正確的 email";
        //     small.style.display = 'block';
        // }
        if (isPass) {
            const fd = new FormData(document.forms[0]);

            fetch('ab-insert-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    //若新增成功
                    if (obj.success) {
                        info.classList.remove('alert-danger');//移除alert-danger
                        info.classList.add('alert-success');//新增alert-success
                        info.innerHTML = '新增成功';
                    //若新增失敗
                    } else {
                        info.classList.remove('alert-success');//移除alert-success
                        info.classList.add('alert-danger');//新增alert-danger
                        info.innerHTML = '新增失敗';
                    }
                    info.style.display = 'block';
                });
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>