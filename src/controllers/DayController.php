<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Meal.php';
require_once __DIR__.'/../models/Day.php';
require_once __DIR__.'/../repository/DayRepository.php';
require_once __DIR__.'/../repository/MealRepository.php';

class DayController extends AppController
{
    private $dayRepository;
    private $mealRepository;

    public function __construct()
    {
        parent::__construct();
        $this->dayRepository = new DayRepository();
        $this->mealRepository = new MealRepository();
    }

    public function addMealToDay()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $data = json_decode($content, true);

            $date = $data['date'];
            $name = $data['name'];

            $meal = $this->mealRepository->getMealByName($name);
            if(!$meal) {
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode(['message' => 'failed']);
            } else {
                $day = new Day($_COOKIE["id_user"], $meal->getIdMeal(), $date);
                $this->dayRepository->addMealDay($day);
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode(['message' => 'success']);
            }
        }
    }

    public function getMealByDay()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $data = json_decode($content, true);

            $date = $data['date'];

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($this->dayRepository->getMealByDay($_COOKIE["id_user"], $date));
        }
    }

    public function getSumMacros()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $data = json_decode($content, true);

            $date = $data['date'];

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($this->dayRepository->getSumMacros($_COOKIE["id_user"], $date));
        }
    }
}