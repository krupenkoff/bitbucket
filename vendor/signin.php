<?php
    session_start();
    
    require_once 'jconnectClass.php';
    require_once 'loginClass.php';

    $db = new jconnectClass('db.json');
    $arr= $db->connection;
    
    $lc= new loginClass();
    $lc->setlog($_POST['login'],$_POST['password']);
    $login=$lc->login;
    $password=$lc->password;

    $lc->checkfields($login,$password);
    $lc->checkspacing($login,$password);
    $lc->checklog($login,$password,$arr);
?>