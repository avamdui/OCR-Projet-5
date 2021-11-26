<?php

class UserEntity
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $role;
    private $password;
    //--------------------------------------------------------------------------
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    //--------------------------------------------------------------------------
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    //--------------------------------------------------------------------------
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    //--------------------------------------------------------------------------
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
