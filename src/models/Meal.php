<?php

class Meal
{
    private $name;
    private $kcal;
    private $proteins;
    private $fats;
    private $carbs;

    public function __construct(string $name, int $kcal, int $proteins, int $fats, int $carbs)
    {
        $this->name = $name;
        $this->kcal = $kcal;
        $this->proteins = $proteins;
        $this->fats = $fats;
        $this->carbs = $carbs;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getKcal(): int
    {
        return $this->kcal;
    }

    public function setKcal(int $kcal)
    {
        $this->kcal = $kcal;
    }

    public function getProteins(): int
    {
        return $this->proteins;
    }

    public function setProteins(int $proteins)
    {
        $this->proteins = $proteins;
    }

    public function getFats(): int
    {
        return $this->fats;
    }

    public function setFats(int $fats)
    {
        $this->fats = $fats;
    }

    public function getCarbs(): int
    {
        return $this->carbs;
    }

    public function setCarbs(int $carbs)
    {
        $this->carbs = $carbs;
    }

}