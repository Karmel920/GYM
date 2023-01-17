<?php

class Day
{
    private $idUser;
    private $idMeal;
    private $date;

    public function __construct($idUser, $idMeal, $date)
    {
        $this->idUser = $idUser;
        $this->idMeal = $idMeal;
        $this->date = $date;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdMeal()
    {
        return $this->idMeal;
    }

    public function setIdMeal($idMeal)
    {
        $this->idMeal = $idMeal;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

}