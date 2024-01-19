<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Вход</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Неверный пароль или Логин.</h3><br/>
                  <p class='link'>Нажмите здесь<a href='login.php'>Войти</a> Снова.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Вход</h1>
        <input type="text" class="login-input" name="username" placeholder="Логин" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Пароль"/>
        <input type="submit" value="Авторизироваться" name="submit" class="login-button"/>
        <p class="link">У вас не аккаунта? <a href="registration.php">Создать аккаунт</a></p>
  </form>
<?php
    }
?>
</body>
</html>
