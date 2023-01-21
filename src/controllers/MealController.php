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
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $data = json_decode($content, true);

            $date = $data['date'];

            $name = $data['name'];
            $kcal = $data['kcal'];
            $proteins = $data['proteins'];
            $fats = $data['fats'];
            $carbs = $data['carbs'];

            $meal = new Meal($name, $kcal, $proteins, $fats, $carbs);
            $this->mealRepository->addMeal($meal);

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode(['message' => 'added']);
//            $url = "http://$_SERVER[HTTP_HOST]";
//            header("Location: {$url}/day_meals");
        }
    }
}