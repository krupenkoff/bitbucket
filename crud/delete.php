<?php
    require 'usersClass.php';
    $us = new usersClass();
    $login = $_GET['login'];
    $us->deleteUser($login);
?>