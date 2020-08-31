<?php require '../header.php'; ?>
<?php
$pdo = new PDO('mysql:
                    host=localhost;
                    dbname=shop;
                    charset=utf8',
                    'staff', 'password');
$sql = $pdo ->prepare('DELETE FROM product WHERE id=?');
if ($sql -> execute([$_REQUEST['id']])){
    echo '削除に成功しました。';
} else{
    echo '削除に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
