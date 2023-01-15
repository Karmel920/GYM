<?php


class User
{
    private $email;
    private $password;
    private $idUser;

    public function __construct(string $email, string $password, int $idUser=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->idUser = $idUser;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser)
    {
        $this->idUser = $idUser;
    }

}