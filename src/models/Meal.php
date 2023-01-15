<?php

class Meal
{
    private $name;
    private $kcal;
    private $proteins;
    private $fats;
    private $carbs;
    private $idMeal;

    public function __construct($name, $kcal, $proteins, $fats, $carbs, $idMeal=null)
    {
        $this->name = $name;
        $this->kcal = $kcal;
        $this->proteins = $proteins;
        $this->fats = $fats;
        $this->carbs = $carbs;
        $this->idMeal = $idMeal;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
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

    public function getIdMeal()
    {
        return $this->idMeal;
    }

    public function setIdMeal($idMeal)
    {
        $this->idMeal = $idMeal;
    }

}