<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Meal.php';
require_once __DIR__.'/../models/Day.php';

class DayRepository extends Repository
{
    public function addMealDay(Day $day)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.days (id_user, id_meal, date)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $day->getIdUser(),
            $day->getIdMeal(),
            $day->getDate()
        ]);
    }

    public function getMealByDay($idUser, $date)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT meals.* FROM meals JOIN (SELECT * FROM days WHERE days.date = :date AND days.id_user = :id_user) day_meals 
            ON meals.id_meal = day_meals.id_meal;
        ');
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSumMacros($idUser, $date)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT SUM(kcal) AS skcal, SUM(proteins) AS sproteins, SUM(fats) AS sfats, SUM(carbs) AS scarbs FROM (SELECT meals.* FROM meals JOIN (SELECT * FROM days WHERE days.date = :date AND days.id_user = :id_user) day_meals 
            ON meals.id_meal = day_meals.id_meal) user_meals;
        ');
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}