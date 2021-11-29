<?php
require_once('libraries/Models/model/User.Model.php');

class UserLoginModel extends Usermodel


{


    private $password;

    //--------------------------------------------------------------------------
    public function getPassword()  : string
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }


}
