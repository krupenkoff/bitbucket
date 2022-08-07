<?php

require_once 'jconnectClass.php';

class loginClass{
    
    public $login;
    public $password;
    
    public function setlog($logpost,$passpost){
        $this->login=$logpost;
        $this->password=$passpost;
        return  $this->login;
        return  $this->password;
        }
   
    public function checkfields($logpost,$passpost){
        if (ctype_space($logpost) or ctype_space($passpost) or $logpost=='' or $passpost=='' ) {
            $responce = [
                "status" => false,
                "message" => 'Не все поля заполнены!'
            ];
            echo json_encode ($responce);
            exit;
        }
    }
    
    public function checkspacing($logpost,$passpost){
        if (strpos($logpost, ' ') !== false or strpos($passpost, ' ') !== false) {
                    $responce = [
            "status" => false,
            "message" => 'Поля не должны содержать пробелы!'
                    ];
            echo json_encode ($responce);
            exit;
    }    
    }
    
    public function checklog($logpost,$passpost,$data){
    $bool = false;
    if (isset($data)){
        foreach ($data as $item) {
            if ((($item['login']) == $logpost) && (($item['password']) == md5($passpost.'mysalt'))){
                $bool = true;
                $_SESSION['user']=[
                    "name" => $item['name']];
            }
        }
    }
    if ($bool== true) {
        $responce = [
            "status" => true
        ];
        echo json_encode ($responce);
        setcookie('name',$_SESSION['user']['name'],time()+60,'/');    
    } else {
        $responce = [
            "status" => false,
            "message" => 'Неверный логин или пароль!'
        ];
        echo json_encode ($responce);
    }
    }    
    
}
    
?>