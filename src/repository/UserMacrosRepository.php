<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserMacros.php';

class UserMacrosRepository extends Repository
{
    public function getUserMacros(int $idUser)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_macros WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $userMacros = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$userMacros) {
            return null;
        }

        return new UserMacros(
            $userMacros['kcal'],
            $userMacros['proteins'],
            $userMacros['fats'],
            $userMacros['carbs'],
            $userMacros['id_user'],
            $userMacros['id_user_macros']
        );
    }

    public function addUserMacros(UserMacros $userMacros): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users_macros (kcal, proteins, fats, carbs, id_user)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $userMacros->getKcal(),
            $userMacros->getProteins(),
            $userMacros->getFats(),
            $userMacros->getCarbs(),
            $userMacros->getIdUser()
        ]);
    }

    public function updateUserMacros(UserParameters $userParameters, int $idUser)
    {
        $kcal = 0;
        if($userParameters->getSex() == 'man') {
            $kcal = 66.47 + (13.7 * $userParameters->getWeight()) + (5 * $userParameters->getHeight()) -
                    (6.76 * $userParameters->getAge());
        } else if($userParameters->getSex() == 'woman') {
            $kcal = 655.47 + (9.567 * $userParameters->getWeight()) + (1.85 * $userParameters->getHeight()) -
                (4.68 * $userParameters->getAge());
        }

        $kcal *= 1.8;
        if($userParameters->getAim() == 'mass') {
            $kcal += 300;
        } else if($userParameters->getAim() == 'reduction') {
            $kcal -= 300;
        }

        $proteins = ceil(($kcal * 0.2) / 4);
        $fats = ceil(($kcal * 0.25) / 9);
        $carbs = ceil(($kcal * 0.55) / 4);
        $kcal = ceil($kcal);

        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_macros SET kcal = :kcal, proteins = :proteins, fats = :fats, carbs = :carbs 
            WHERE id_user = :id_user
        ');
        $stmt->bindParam(':kcal', $kcal, PDO::PARAM_INT);
        $stmt->bindParam(':proteins', $proteins, PDO::PARAM_INT);
        $stmt->bindParam(':fats', $fats, PDO::PARAM_INT);
        $stmt->bindParam(':carbs', $carbs, PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }
}