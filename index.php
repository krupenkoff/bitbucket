<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин" pattern="[a-zA-Z0-9_]+[^\s]" required>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <button type="submit" class="loginbtn">Войти</button>
        <noscript>
            <p style="text-align: center">JS отключен</p>
            <style>.loginbtn { display:none; }</style>
        </noscript>
        <p>
            У вас нет аккаунта? - <a href="register.php">зарегистрируйтесь!</a>
        </p>
        <p class="msg none"></p>
    </form>
    
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/main.js"></script>   
</body>    
</html>