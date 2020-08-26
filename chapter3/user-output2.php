<?php require '../header.php';?>
<?php
if (isset($_REQUEST['user'])){
    echo 'ようこそ、', $_REQUEST['user'], 'サン。';
}
?>
<?php require '../footer.php'?>