<?php
namespace Models;
class Login extends model
{
    protected $table = "users";
    function is_admin($email,$password){
        $a = [
            'email'     =>  $email,
            'password'  =>  $password
        ];
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email AND password = :password AND admin = 1 ");
        $query->execute($a);
        $exist = $query->rowCount();
        return $exist;

    }
    function get_modos()
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table}");
        $query->execute();
        $modo = $query->fetchAll();
        return $modo;
    }
}