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
        <input type="text" name="login" placeholder="Введите свой логин" minlength="6" pattern="[a-zA-Z0-9_]+[^\s]"  required>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" minlength="6" pattern="[a-zA-Z0-9]+" required>
        <label>Подтверждение пароля</label>
        <input type="password" name="confirm_password" placeholder="Повторите пароль" minlength="6" pattern="[a-zA-Z0-9]+" required>
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты" pattern="(\w\.?)+@[\w\.-]+\.\w{2,4}" required>
        <label>ФИО</label>
        <input type="text" name="name" placeholder="Введите своё полное имя" minlength="2" pattern="[a-zа-яA-ZА-Я]+" required>
        <button type="submit" class="regbtn">Зарегистрироваться</button>
        <noscript>
            <p style="text-align: center">JS отключен</p>
            <style>.regbtn { display:none; }</style>
        </noscript>
        <p>
            У вас уже есть аккаунт? - <a href="index.php">авторизируйтесь!</a>
        </p>
        <p class="msg none"></p>
    </form>
    
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/main.js"></script>  
    
</body>    
</html>