<?php require '../header.php';?>
<?php require 'menu.php';?>
<form action="product.php" mathop="post">
    商品検索
    <input type="text" name="keyword">
    <input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<th>商品番号</td>';
echo '<th>商品名</td>';
echo '<th>商品価格</td>';
$pdo = new PDO('mysql:
                    host=localhost;
                    dbname=shop;
                    charset=utf8',
                    'staff', 'password');
if (isset($_REQUEST['keyword'])){
    $sql=$pdo->prepare('SELECT * FROM product WHERE name LIKE ?');
    $sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
    $sql=$pdo->prepare('SELECT * FROM product');
    $sql->execute([]);
}
foreach($sql as $row){
    $id=$row['id'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>';
    echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require '../footer.php';?>