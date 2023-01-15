<?php

class UserParameters
{
    private $sex;
    private $age;
    private $height;
    private $weight;
    private $aim;
    private $idUserParameters;
    private $idUser;

    public function __construct($sex, $age, $height, $weight, $aim, $idUser, $idUserParameters=null)
    {
        $this->sex = $sex;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->aim = $aim;
        $this->idUser = $idUser;
        $this->idUserParameters = $idUserParameters;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getAim()
    {
        return $this->aim;
    }

    public function setAim($aim)
    {
        $this->aim = $aim;
    }

    public function getIdUserParameters()
    {
        return $this->idUserParameters;
    }

    public function setIdUserParameters(int $idUserParameters)
    {
        $this->idUserParameters = $idUserParameters;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
}