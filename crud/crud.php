<?php
    require_once 'jconnectClass.php';
    require_once 'usersClass.php';
    $db = new jconnectClass('db.json');

    if( isset( $_POST['create'] ) ){
        $us = new usersClass();
        $us->createUser($login = $_POST['login'], $password = $_POST['password'],$email = $_POST['email'],$name = $_POST['name']);
    }
    if( isset( $_POST['update'] ) ){
        $us = new usersClass();
        $us->updateUser($login = $_POST['login'], $password = $_POST['password'],$email = $_POST['email'],$name = $_POST['name']);
    } 
?>

<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="../css/crud.css">
</head>
     
<body>
    <div id="crud">
    <div>
        <div><a class="button" href="create.html" id="cr">Создать</a></div>
    <table>
        <thead>
            <tr>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Почта</th>
                <th>ФИО</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($db->connection as $user): ?>
            <tr>
                <td><?php echo $user['login'] ?></td>
                <td><?php echo $user['password'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td>
                    <a href="update.php?login=<?php echo $user['login'] ?>"class="button">Изменить</a>
                    <a href="delete.php?login=<?php echo $user['login'] ?>"class="button" id="del">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
        </div>
        </div>
</body>    
</html>