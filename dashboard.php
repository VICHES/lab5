<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Сайт</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Хай <?php echo $_SESSION['name']; ?>!</p>
        <p>Вы зашли на наш сайт.</p>
        <p><a href="logout.php">Выйти</a></p>
    </div>
</body>
</html>
