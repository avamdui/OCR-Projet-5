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
    public function findUser($email): array
    {
        // 2. On prépare une requête
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} as a JOIN COMMENTS as b ON a.id = b.id WHERE a.email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch();

        // 5. On retourne l'article retrouvé
        return $user;
    }
}