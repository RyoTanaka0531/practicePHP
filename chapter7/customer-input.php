<?php session_start();?>
<?php require '../header.php';?>
<?php require 'menu.php';?>
<?php
$name = $address=$login=$password='';
if (isset($_SESSION['customer'])){
    $name = $_SESSION['customer']['name'];
    $address = $_SESSION['customer']['address'];
    $login = $_SESSION['customer']['login'];
    $password = $_SESSION['customer']['password'];
}
echo '<form action="customer-output.php" mathod="post">';
echo '<table>';
echo '<tr>';
echo '<td>お名前</td>';
echo '<td><input type="text" name="name" value="', $name, '"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>ご住所</td>';
echo '<td><input type="text" name="address" value="', $address, '"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>ログイン名</td>';
echo '<td><input type="text" name="login" value="', $login, '"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>パスワード</td>';
echo '<td><input type="password" name="password" value="', $password, '"></td>';
echo '</tr>';
echo '</table>';
echo '<p><input type="submit" value="確定"></p>';
echo '</form>';
?>
<?php require '../footer.php';?>
