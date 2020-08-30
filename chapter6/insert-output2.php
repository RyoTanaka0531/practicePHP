<?php require '../header.php'; ?>
<?php
$pdo = new PDO('mysql:
                    host=localhost;
                    dbname=shop;
                    charset=utf8',
                    'staff', 'password');
$sql = $pdo -> prepare('INSERT INTO product VALUES(null, ?, ?)');
if (empty($_REQUEST['name'])){
    echo '商品名を入力してください。';
} else
    // 「!」は「〜ではない時...」というニュアンス。条件を反転させる。
    // 正規表現内の「+」は直前の文字が１個以上並ぶことを表している。
    if (!preg_match('/[0-9]+/', $_REQUEST['price'])){
        echo '商品価格を整数で入力してください。';
    } else{
        if ($sql -> execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['price']]
        )){
            echo '追加に成功しました。';
        } else{
            echo '追加に失敗しました。';
        }
    }
?>
<?php require '../footer.php'; ?>
