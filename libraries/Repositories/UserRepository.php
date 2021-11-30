<?php
require_once('libraries/database.php');
require_once('libraries/models/Entity/user.entity.php');

class UserRepository
{
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function getUserById(int $id): ?UserEntity
    {    
        $query = $this->pdo->prepare("SELECT u.* FROM users as u where  u.id = :id");
        $query->execute(['id' => $id]);
        $userLine = $query->fetch();
        $user = null;

        if ($userLine) 
        {
            $user = new UserEntity();
            $user->setId($userLine['id']);
            $user->setFirstname($userLine['firstname']);
            $user->setLastname($userLine['lastname']);
            $user->setEmail($userLine['email']);
            $user->setRole($userLine['role']);
        }
        return $user;
    }
    
    public function getUserByauthorId(int $id): ?UserEntity
    {    
        $query = $this->pdo->prepare("SELECT u.* FROM users as u where  u.id = :id");
        $query->execute(['id' => $id]);
        $userLine = $query->fetch();
        $user = null;

        if ($userLine) 
        {
            $user = new UserEntity();
            $user->setId($userLine['id']);
            $user->setFirstname($userLine['firstname']);
            $user->setLastname($userLine['lastname']);
            $user->setEmail($userLine['email']);
            $user->setRole($userLine['role']);
        }
        return $user;
    }

    public function isRegister(UserEntity $entite){
        $a = [
            'email'     => $entite->getEmail(),
            'password'  => $entite->getPassword()
        ];
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password AND status='active'");
        $query->execute($a);
        $exist = $query->rowCount();
        return $exist;

    }
    public function exist(UserEntity $entite){
    
        $a = [
            'email'     => $entite->getEmail(),
         
        ];       
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute($a);
        $exist = $query->rowCount();
        return $exist;
    }


    public function findUser($UserMail)
    {
    
        $query = $this->pdo->prepare("SELECT * FROM users as a JOIN COMMENTS as b ON a.id = b.id WHERE a.email = :email");
        $query->execute(['email' => $UserMail]);
        $userLine = $query->fetch();
        $user = null;
        if ($userLine) 
        {
            $user = new UserEntity();
            $user->setId($userLine['id']);
            $user->setFirstname($userLine['firstname']);
            $user->setLastname($userLine['lastname']);
            $user->setEmail($userLine['email']);
            $user->setRole($userLine['role']);
            $user->setPassword($userLine['password']);
            $user->setStatus($userLine['status']);
        }
        return $user;
    }

    public function insertUser(UserEntity $userEntity)
        {
            $query = $this->pdo->prepare('INSERT INTO users (id, firstname, lastname, email, password, role, status) VALUES(NULL, ?, ? ,? , ?, ?,?)');
            $query->execute(
            array
            (
                $userEntity->getFirstname(), 
                $userEntity->getLastname(), 
                $userEntity->getEmail(), 
                $userEntity->getPassword(),
                $userEntity->getRole('user'),
                $userEntity->getstatus()

            ));
           }

    public function activateAccount(UserEntity $entite)
    {
        $a = [
            'email'     => $entite->getEmail(),
                 ];  
        $sql = "UPDATE `users` SET status='active' WHERE email=:email";
        $query = $this->pdo->prepare($sql);
        $query->execute($a);
    }





}



