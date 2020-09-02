<?php session_start();?>
<?php require '../header.php';?>
<?php require 'menu.php';?>
<?php
$pdo = new PDO('mysql:
                    host=localhost;
                    dbname=shop;
                    charset=utf8',
                    'staff', 'password');
if (isset($_SESSION['customer'])){
    $id = $_SESSION['customer']['id'];
    $sql = $pdo -> prepare('SELECT * FROM customer WHERE id!=? and login=?');
    $sql -> execute([$id, $_REQUEST['login']]);
} else {
    $sql = $pdo -> prepare('SELECT * FROM customer WHERE login=?');
    $sql -> execute([$_REQUEST['login']]);
}
if (empty($sql-> fetchAll())){
    if (isset($_SESSION['customer'])){
        $sql=$pdo->prepare('UPDATE customer SET name=?, address=?,'.'login=?, password=? WHERE id=?');
        $sql->execute([
            $_REQUEST['name'], $_REQUEST['address'],$_REQUEST['login'],$_REQUEST['password'], $id
        ]);
        $_SESSION['customer']=[
            'id' => $id, 'name'=>$_REQUEST['name'], 'address'=>$_REQUEST['address'],
            'login'=>$_REQUEST['login'], 'password'=>$_REQUEST['password']
        ];
        echo 'お客様情報を更新しました。';
    } else{
        $sql= $pdo ->prepare('INSERT INTO customer VALUES(null, ?,?,?,?)');
        $sql->execute([
            $_REQUEST['name'], $_REQUEST['address'], $_REQUEST['login'], $_REQUEST['password']
        ]);
        echo 'お客様情報を登録しました。';
    }
} else {
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require '../footer.php';?>