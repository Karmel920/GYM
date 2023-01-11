<?php


class User
{
    private $email;
    private $password;
    private $idUserParameters;
    private $idUserMacros;

    public function __construct(string $email, string $password, int $idUserParameters, int $idUserMacros)
    {
        $this->email = $email;
        $this->password = $password;
        $this->idUserParameters = $idUserParameters;
        $this->idUserMacros = $idUserMacros;
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

    public function getIdUserParameters(): int
    {
        return $this->idUserParameters;
    }

    public function setIdUserParameters(int $idUserParameters)
    {
        $this->idUserParameters = $idUserParameters;
    }

    public function getIdUserMacros(): int
    {
        return $this->idUserMacros;
    }

    public function setIdUserMacros(int $idUserMacros)
    {
        $this->idUserMacros = $idUserMacros;
    }


}