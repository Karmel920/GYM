<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Meal.php';
require_once __DIR__.'/../repository/MealRepository.php';

class MealController extends AppController
{
    private $mealRepository;

    public function __construct()
    {
        parent::__construct();
        $this->mealRepository = new MealRepository();
    }

    public function addNewMeal()
    {
        $name = $_POST['name'];
        $kcal = $_POST['kcal'];
        $proteins = $_POST['proteins'];
        $fats = $_POST['fats'];
        $carbs = $_POST['carbs'];

        $meal = new Meal($name, $kcal, $proteins, $fats, $carbs);
        $this->mealRepository->addMeal($meal);
//        return $this->render('day_meals', ['messages' => ['Meal was succesful added to database!']]);
    }
}