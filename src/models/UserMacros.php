<?php

class UserMacros
{
    private $kcal;
    private $proteins;
    private $fats;
    private $carbs;
    private $idUserMacros;
    private $idUser;

    public function __construct($kcal, $proteins, $fats, $carbs, $idUser, $idUserMacros=null)
    {
        $this->kcal = $kcal;
        $this->proteins = $proteins;
        $this->fats = $fats;
        $this->carbs = $carbs;
        $this->idUser = $idUser;
        $this->idUserMacros = $idUserMacros;
    }

    public function getKcal()
    {
        return $this->kcal;
    }

    public function setKcal(int $kcal)
    {
        $this->kcal = $kcal;
    }

    public function getProteins()
    {
        return $this->proteins;
    }

    public function setProteins(int $proteins)
    {
        $this->proteins = $proteins;
    }

    public function getFats()
    {
        return $this->fats;
    }

    public function setFats(int $fats)
    {
        $this->fats = $fats;
    }

    public function getCarbs()
    {
        return $this->carbs;
    }

    public function setCarbs(int $carbs)
    {
        $this->carbs = $carbs;
    }

    public function getIdUserMacros()
    {
        return $this->idUserMacros;
    }

    public function setIdUserMacros(int $idUserMacros)
    {
        $this->idUserMacros = $idUserMacros;
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