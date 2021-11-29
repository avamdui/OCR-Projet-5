<?php
class UserModel
{
    private $id;
    private $firstname;
    private $lastname;
    private $fullname;
    private $email;
    private $status;
    private $role;

    //---------------------------------------------------------------------------------------------------------------------     
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    //---------------------------------------------------------------------------------------------------------------------     
    public function getFirstname() : string
    {
        return $this->firstname;
    }
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }
    //--------------------------------------------------------------------------
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }
        //--------------------------------------------------------------------------     

    public function getFullname() : string
    {
        return $this->fullname;
    }
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;
    }
    //--------------------------------------------------------------------------     
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    //--------------------------------------------------------------------------
    public function getStatus()  : string
    {
        return $this->status;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
        //--------------------------------------------------------------------------
        public function getRole(): string
        {
            return $this->role;
        }
        public function setRole(string $role): void
        {
            $this->role = $role;
        }

}
