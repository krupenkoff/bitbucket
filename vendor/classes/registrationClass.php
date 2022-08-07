<?php

require_once 'jconnectClass.php';
require_once 'loginClass.php';

class registrationClass extends loginClass{
    
    public $confirm_password;
    public $email;
    public $name;  
    
    public function setreg($logpost,$passpost,$confirmpos,$emailpos,$namepos){
        $this->login=$logpost;
        $this->password=$passpost;
        $this->confirm_password=$confirmpos;
        $this->email=$emailpos;
        $this->name=$namepos;
        return  $this->login;
        return  $this->password;
        return  $this->confirm_password;
        return  $this->email;
        return  $this->name;
        }
    
    public function regUser($login,$password,$email,$name){
        $db = new jconnectClass('db.json');
        $db->connection[] = array('login'=>$login,'password'=>md5($password.'mysalt'),'email'=>$email,'name'=>$name); 
        file_put_contents('../db.json',json_encode($db->connection)); 
        unset($db->connection); 
        $responce = [
            "status" => true
                    ];
        echo json_encode ($responce);  
    }
    
    public function checkUser($login,$password,$confirm_password,$email,$name,$arr){
         $db = new jconnectClass('db.json');
         $arr= $db->connection;
         if (isset($arr)){
            foreach ($arr as $item) {
                if (($item['login']) === $_POST['login']){
                            $responce = [
                "status" => false,
                "message" => 'Такой логин уже существует!'
            ];
                    echo json_encode ($responce);
                    exit;
                }
            }
            if (ctype_space($login) or ctype_space($password) or ctype_space($confirm_password) or ctype_space($email) or ctype_space($name) or $login=='' or $password=='' or $confirm_password=='' or $email=='' or $name=='' ) {
                        $responce = [
                "status" => false,
                "message" => 'Не все поля заполнены!'
                        ];
                echo json_encode ($responce);
                exit;
            }
            if (strpos($login, ' ') !== false or strpos($password, ' ') !== false or strpos($confirm_password, ' ') !== false or strpos($email, ' ') !== false) {
                        $responce = [
                "status" => false,
                "message" => 'Поля не должны содержать пробелы!'
                        ];
                echo json_encode ($responce);
                exit;
            }
            if($password != $confirm_password) {
                        $responce = [
                "status" => false,
                "message" => 'Пароли не совпадают!'
                        ];
                echo json_encode ($responce);
                exit;
            }
            foreach ($arr as $item) {
                if (($item['email']) === $_POST['email']){
                            $responce = [
                "status" => false,
                "message" => 'Такой email уже зарегистрирован!'
            ];
                    echo json_encode ($responce);
                   exit; 
                }
            }
            $this->regUser($login,$password,$email,$name);
            } else {
            $this->regUser($login,$password,$email,$name);  
        }    

     }
}
?>