<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption</title>
</head>
<body>
<center>
<h3>تشفير و فك تشفير النصوص</h3>

<?php if(isset($_GET["result"])): ?>
    <h3>النتيجة:</h3>
    <textarea rows="4" cols="60"><?php echo htmlspecialchars($_GET["result"]); ?></textarea>
    <br><br>
<?php endif; ?>

<?php
$plain_value = isset($_GET["plain"]) ? $_GET["plain"] : "";
$enc_value   = isset($_GET["enc"])   ? $_GET["enc"]   : "";
?>

<form action="encrypt_logic.php" method="POST">
    <label>النص المراد تشفيره</label><br>
    <textarea name="plaintext" rows="4" cols="60"><?php echo htmlspecialchars($plain_value); ?></textarea><br>
    <button type="submit" name="action" value="encrypt">تشفير</button>
</form>

<br><hr><br>

<form action="encrypt_logic.php" method="POST">
    <label>النص المشفر المراد فك تشفيره</label><br>
    <textarea name="encrypted_text" rows="4" cols="60"><?php echo htmlspecialchars($enc_value); ?></textarea><br>
    <button type="submit" name="action" value="decrypt">فك التشفير</button>
</form>

</center>
</body>
</html>
