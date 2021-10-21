<?php
class UserRepository {

    public function getOneUser($id) {
        $query = $this->pdo->prepare("SELECT * FROM Users as u WHERE u.id = :id");
        $query->execute(['email' => $id]);
        $line = $query->fetch();

        $user = new UserEntity();
        $user->id = $line['id'];
        $user->firstname = $line['firstname'];
        $user->lastname = $line['lastname'];
        $user->email = $line['email'];
        $user->password = $line['password'];
        $user->isAdmin = $line['isAdmin'];
        
        return $user;
    }
}