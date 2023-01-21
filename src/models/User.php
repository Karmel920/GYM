<?php


class User
{
    private $email;
    private $password;
    private $idUser;
    private $idRole;

    public function __construct(string $email, string $password, int $idUser=null, int $idRole=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->idUser = $idUser;
        $this->idRole = $idRole;
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

    public function getIdRole(): int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole)
    {
        $this->idRole = $idRole;
    }

}