<?php
    session_start();

    function message($st) {
        $_SESSION['message'] = $st;
        header('Location: ../register.php');
        exit;    
    }
    
    require_once 'jconnectClass.php';
    require_once 'registrationClass.php';

    $db = new jconnectClass('db.json');
    $arr= $db->connection;

    $rc= new registrationClass();
    $rc->setreg($_POST['login'],$_POST['password'],$_POST['confirm_password'],$_POST['email'],$_POST['name']);
    
    $login=$rc->login;
    $password=$rc->password;
    $confirm_password=$rc->confirm_password;
    $email=$rc->email;
    $name=$rc->name;
    
    $rc->checkUser($login,$password,$confirm_password,$email,$name,$arr);
?>