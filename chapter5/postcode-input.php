<?php require '../header.php'; ?>
<p>7桁の郵便番号をハイフンなしで入力してください。</p>
<form action="postcode-output.php" method="post">
    <input type="text" name="postcode">
    <p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
