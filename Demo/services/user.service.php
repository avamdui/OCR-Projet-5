<?php
class UserService {
    public function getOneUser($id) {
        $userEntity = (new UserRepository())->getOneUser($id);

        $user = new User();
        $user->id = $userEntity->id;
        //...
        $user->fullname = $userEntity->firstname . " " . $userEntity->lastname;
    }
}