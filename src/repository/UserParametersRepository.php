<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserParameters.php';

class UserParametersRepository extends Repository
{
    public function getUserParameters(int $idUserParameters)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_parameters WHERE id_user_parameters = :id_user_parameters
        ');
        $stmt->bindParam(':id_user_parameters', $idUserParameters, PDO::PARAM_INT);
        $stmt->execute();

        $userParameters = $stmt->fetch(PDO::FETCH_ASSOC);

        if($userParameters == false) {
            return null;
        }

        return new UserParameters(
            $userParameters['sex'],
            $userParameters['age'],
            $userParameters['height'],
            $userParameters['weight'],
            $userParameters['aim']
        );
    }

    public function addUserParameters(UserParameters $userParameters): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users_parameters (sex, age, height, weight, aim)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $userParameters->getSex(),
            $userParameters->getAge(),
            $userParameters->getHeight(),
            $userParameters->getWeight(),
            $userParameters->getAim()
        ]);
    }

//    public function updateUserParameters()
//    {
//
//    }
}