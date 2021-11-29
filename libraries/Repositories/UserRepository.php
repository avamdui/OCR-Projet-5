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
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
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
        }
        return $user;
    }

    public function insertUser(UserEntity $articleEntity)
        {
            $query = $this->pdo->prepare('INSERT INTO users (id, firstname, lastname, email, password, role) VALUES(NULL, ?, ? ,? , ?, ?)');
            $query->execute(
            array
            (
                $articleEntity->getFirstname(), 
                $articleEntity->getLastname(), 
                $articleEntity->getEmail(), 
                $articleEntity->getPassword(),
                $articleEntity->getRole('user')
            ));
           }



}



