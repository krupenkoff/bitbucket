<?php

require_once 'jconnectClass.php';

class usersClass{
    
    public function getUsersByLog($login){
        $db = new jconnectClass('db.json');
            foreach ($db->connection as $user){
                if ($user['login']==$login){
                    return $user;
                }
            }
    }
    
    public function deleteUser($login){
        $db = new jconnectClass('db.json');
        $this->getUsersByLog($login);
        foreach ( $db->connection  as $i=> $user  ){ 
            if ($user['login'] == $login){
                array_splice($db->connection, $i, 1);
                file_put_contents('../db.json',json_encode($db->connection));
            }
        }
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

    public function createUser($login,$password,$email,$name){
        $db = new jconnectClass('db.json');
        $db->connection[] = array('login'=>$login,'password'=>md5($password.'mysalt'),'email'=>$email,'name'=>$name); 
        file_put_contents('../db.json',json_encode($db->connection)); 
        unset($db->connection); 
        header('Location: crud.php');    
    }
    
    public function updateUser($login,$password,$email,$name){
        $db = new jconnectClass('db.json');
        $this->getUsersByLog($login);
        foreach ( $db->connection  as $i=> $user){ 
            if ($user['login'] == $login){
                $db->connection[$i] =   array('login'=>$login,'password'=>md5($password.'mysalt'),'email'=>$email,'name'=>$name);
            }
        }
        file_put_contents('../db.json',json_encode($db->connection));     
        header('Location: crud.php'); 
    }
}
    
?>