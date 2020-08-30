<?php require '../header.php'; ?>
<table>
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>商品価格</th>
    </tr>
    <?php
    $pdo =new PDO('mysql:
                        host=localhost;
                        dbname=shop;
                        charset=utf8',
                        'staff', 'password');
    // prepareメソッドはSQL文を実行する準備
    // 「?」の部分には後から好きな値を設定することができる。
    $sql = $pdo -> prepare('SELECT * FROM product WHERE name=?');
    // prepareメソッドに引数として渡したSQL文を実行するためexecuteメソッドを使用。
    // 引数には、SQL文の中の「?」部分に設定する値を配列にして渡す。
    $sql -> execute([$_REQUEST['keyword']]);
    foreach ($sql as $row){
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
</table>

<?php require '../footer.php'; ?>
