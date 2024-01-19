<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $name    = stripslashes($_REQUEST['name']);
        $name    = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (username, password, name)
                     VALUES ('$username', '" . md5($password) . "', '$name')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Регестрация прошла успешно.</h3><br/>
                  <p class='link'>Нажмите здесь<a href='login.php'>Вход</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Регестрация провалилась</h3><br/>
                  <p class='link'>Нажмите здесь<a href='registration.php'>Создать аккаунт</a> снова.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Регистрация</h1>
        <input type="text" class="login-input" name="username" placeholder="Логин" required />
        <input type="text" class="login-input" name="name" placeholder="Имя">
        <input type="password" class="login-input" name="password" placeholder="Пароль">
        <input type="submit" name="submit" value="Зарегистрироваться" class="login-button">
        <p class="link">У вас уже есть аккаунт? <a href="login.php">Войти здесь</a></p>
    </form>
<?php
    }
?>
</body>
</html>