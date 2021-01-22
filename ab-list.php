<?php
require __DIR__ . '/db_connect.php'; //連線這個檔案

if (!isset($_SESSION['admin'])) {
    include __DIR__ . '/ab-list-noadmin.php';
    exit;
}

$pageName = 'ab-list';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//下列$_GET不須放intval，否則會變成0
$search = isset($_GET['search']) ? $_GET['search'] : '';
$params = [];

$where = ' WHERE 1 ';
if (!empty($search)) {
    $where .= sprintf(" AND `name` LIKE %s ", $pdo->quote('%' . $search . '%'));
    $params['search'] = $search;
}

$perPage = 5;
$t_sql = "SELECT COUNT(1) FROM address_book $where";
$totalRows = $pdo->query($t_sql)->fetch()['COUNT(1)'];
$totalPages = ceil($totalRows / $perPage);

if ($page > $totalPages) $page = $totalPages;
if ($page < 1) $page = 1;

$p_sql = sprintf(
    "SELECT * FROM address_book %s
ORDER BY sid DESC LIMIT %s, %s",
    $where,
    ($page - 1) * $perPage,
    $perPage
);

echo '<!-- ';
echo $p_sql;
echo ' -->';

$stmt = $pdo->query($p_sql);

$rows = $stmt->fetchAll();
//echo json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); //轉換成JSON格式
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    .remove-icon a i {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php
                                                    $params['page'] = 1;
                                                    echo http_build_query($params);
                                                    ?>">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php
                                                    $params['page'] = $page - 1;
                                                    echo http_build_query($params);
                                                    ?>">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a></li>
                    <!-- for迴圈設定顯示前5頁和後5頁 -->
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        //並設定$i要大於1頁and小於總頁數
                        if ($i >= 1 and $i <= $totalPages) : ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?<?php
                                                            $params['page'] = $i;
                                                            echo http_build_query($params);
                                                            ?>">
                                    <?= $i ?>
                                </a>
                            </li>

                    <?php endif;
                    endfor ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php
                                                    $params['page'] = $page + 1;
                                                    echo http_build_query($params);
                                                    ?>">
                            <i class="far fa-arrow-alt-circle-right"></i>
                        </a></li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php
                                                    $params['page'] = $totalPages;
                                                    echo http_build_query($params);
                                                    ?>">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col d-flex flex-row-reverse bd-highlight">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search" value="<?= htmlentities($search) ?>" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="fas fa-minus-circle"></i>
                        </th>
                        <th scope="col">sid</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">mobile</th>
                        <th scope="col">birthday</th>
                        <th scope="col">address</th>
                        <!-- 新增編輯按鈕 -->
                        <th scope="col">
                            <i class="fas fa-edit"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r) : ?>
                        <tr>
                            <td class="remove-icon">
                                <a href="javascript: del_it(<?= $r['sid'] ?>)">
                                    <!-- onclick(優先)會先執行再轉頁 -->
                                    <!-- 呼應下方的function del_it -->
                                    <!-- <a href="ab-delete.php?sid=<?//= $r['sid'] ?>" onclick="del_it(event)"> -->
                                    <i class="fas fa-minus-circle"></i>
                                </a></td>
                            <td><?= $r['sid'] ?></td>
                            <td><?= htmlentities($r['name']) ?></td>
                            <td><?= htmlentities($r['email']) ?></td>
                            <td><?= htmlentities($r['mobile']) ?></td>
                            <td><?= $r['birthday'] ?></td>
                            <!-- strip_tags可將輸出或寫入中的標籤去除，避免script產生效用，為了安全性每個為'字串'的欄位皆須設置 -->
                            <!-- <?//= strip_tags($r['address']) ?> -->
                            <!-- htmlentities將符號><=作跳脫，可和strip_tags擇一使用，但較建議使用此 -->
                            <td> <?= htmlentities($r['address']) ?>
                                <!-- 連結編輯頁面 -->
                            <td>
                                <a href="ab-edit.php?sid=<?= $r['sid'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    // function removeItem(event) {
    //     const t = event.target;
    //     t.closest('tr').remove();
    // }

    // function del_it(event) {
    //     if (!confirm('是否要刪除資料')) {
    //         event.preventDefault(); //不要刪除才不執行
    //     }
    // }

    function del_it(sid) {
        if (confirm(`是否要刪除編號為 ${sid} 的資料?`)) {
            location.href = 'ab-delete.php?sid=' + sid;
        }
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>