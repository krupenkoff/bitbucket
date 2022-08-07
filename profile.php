<?php
    session_start();
    if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
    <form action="vendor/logout.php" style="text-align: center">
        <?= 'Hello'.' '. $_SESSION['user']['name'] ?>
        <button type="submit">Выход</button>
    </form>
    
</body>    
</html>