<?php
//第二步-if session沒有啟動，啟動session
if (!isset($_SESSION)) {
    session_start();
}
//顯示小分頁文字
$title = '登入';

if (isset($_POST['account']) and isset($_POST['password'])) { //第一步-先看帳號和密碼欄位有沒有post
    if ($_POST['account'] === 'bianca' and $_POST['password'] === '1234') { //第一步-有post才做帳號和密碼的判斷
        $_SESSION['admin'] = 'bianca'; //第二步-設定$_SESSION代表登入
    } else { //第一步-若帳號或密碼錯誤則顯示此，再加上下面的errorMsg顯示alert
        $errorMsg = '帳號或密碼錯誤';
    }
}
?>
<?php include __DIR__ . '/./parts/html-head.php'; ?>
<?php include __DIR__ . '/./parts/navbar.php'; ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <!-- 第一步-配合上面的errorMsg -->
            <?php if (isset($errorMsg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errorMsg ?>
                </div>
            <?php endif ?>
            <!-- 第二步-if確定登入後顯示歡迎問候語 -->
            <?php if (isset($_SESSION['admin'])) : ?>
                <div>
                    <h3>Hello <?= $_SESSION['admin'] ?></h3>
                    <p><a href="logout.php">登出</a></p>
                </div>
            <!-- 第二步-沒登入就秀card表單出來 -->
            <?php else : ?>
                <!-- 登入帳號和密碼的畫面 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">登入</h5>

                        <form method="post">
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" name="account" value="<?= htmlentities($_POST['account']  ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= htmlentities($_POST['password'] ?? '') ?>">
                            </div>
                            <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" value="1" id="exampleCheck1" name="exampleCheck1">
                            <?= isset($_POST['exampleCheck1']) ? 'checked' : '' ?>)
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    <?php endif ?>
    </div>
</div>


<?php include __DIR__ . './parts/scripts.php'; ?>
<?php include __DIR__ . './parts/html-foot.php'; ?>