<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Создать</title>
    <link rel="stylesheet" href="../css/crud.css">
</head>
<body>
    <form action="crud.php" method="post">
<?php
    require 'usersClass.php';
    require_once 'jconnectClass.php';
    $db = new jconnectClass('db.json');
    $us = new usersClass();
    $login = $_GET['login'];
    $user = $us->getUsersByLog($login);
        echo "<label>Логин</label>";
        echo "<input type='text' name='login' value = '".$user['login']."'/>";
        echo "<label>Пароль</label>";
        echo "<input type='text' name='password' value = '".$user['password']."'/>";
        echo "<label>Почта</label>";
        echo "<input type='text' name='email' value = '".$user['email']."'/>";
        echo "<label>ФИО</label>";
        echo "<input type='text' name='name' value = '".$user['name']."'/>";
        echo"<button type='submit' name='update'>Изменить</button>";
?>
  </form>
  
</body>    
</html>