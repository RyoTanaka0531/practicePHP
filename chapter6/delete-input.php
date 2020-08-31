<?php require '../header.php'; ?>
<table>
    <tr>
        <td>商品番号</td>
        <td>商品名</td>
        <td>商品価格</td>
    </tr>
    <?php
    $pdo = new PDO('mysql:
                        host=localhost;
                        dbname=shop;
                        charset=utf8',
                        'staff', 'password');
    foreach($pdo -> query('SELECT * FROM product') as $row){
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>';
        echo '<a href="delete-output.php?id=', $row['id'], '">削除</a>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
</table>
<?php require '../footer.php'; ?>
