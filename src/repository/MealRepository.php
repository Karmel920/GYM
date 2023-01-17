<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Meal.php';

class MealRepository extends Repository
{
    public function getMealByName($name)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.meals WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $meal = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$meal) {
            return null;
        }

        return new Meal(
            $meal['name'],
            $meal['kcal'],
            $meal['proteins'],
            $meal['fats'],
            $meal['carbs'],
            $meal['id_meal']
        );
    }

    public function addMeal(Meal $meal): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.meals (name, kcal, proteins, fats, carbs)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $meal->getName(),
            $meal->getKcal(),
            $meal->getProteins(),
            $meal->getFats(),
            $meal->getCarbs()
        ]);
    }
}