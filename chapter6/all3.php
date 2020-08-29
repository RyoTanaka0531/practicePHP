<?php require '../header.php'; ?>
<?php
$pdo = new PDO('mysql:
                    host=localhost;
                    dbname=shop;
                    charset=utf8',
                    'staff', 'password');
    foreach ($pdo -> query('SELECT * FROM product') as $row){
        echo "<p>$row[id]:$row[name]:$row[price]</p>";
    }
?>
<?php require '../footer.php'; ?>
