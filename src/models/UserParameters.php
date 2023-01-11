<?php

class UserParameters
{
    private $sex;
    private $age;
    private $height;
    private $weight;
    private $aim;

    public function __construct($sex, $age, $height, $weight, $aim)
    {
        $this->sex = $sex;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->aim = $aim;
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

}