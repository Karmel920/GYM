<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserParameters.php';

class UserParametersRepository extends Repository
{
    public function getUserParameters(int $idUser)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_parameters WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $userParameters = $stmt->fetch(PDO::FETCH_ASSOC);

        try{
            if(!$userParameters) {
                throw new Exception("There is no parameters for this user");
            }
            return new UserParameters(
                $userParameters['sex'],
                $userParameters['age'],
                $userParameters['height'],
                $userParameters['weight'],
                $userParameters['aim'],
                $userParameters['id_user'],
                $userParameters['id_user_parameters']
            );
        } catch (Exception $exception) {
            return null;
        }
    }

    public function addUserParameters(UserParameters $userParameters): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users_parameters (sex, age, height, weight, aim, id_user)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $userParameters->getSex(),
            $userParameters->getAge(),
            $userParameters->getHeight(),
            $userParameters->getWeight(),
            $userParameters->getAim(),
            $userParameters->getIdUser()
        ]);
    }

    public function updateUserParameters(UserParameters $userParameters, int $idUser)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_parameters SET sex = :sex, age = :age, height = :height, weight = :weight, aim = :aim 
            WHERE id_user = :id_user
        ');

        $sex = $userParameters->getSex();
        $age = $userParameters->getAge();
        $height = $userParameters->getHeight();
        $weight = $userParameters->getWeight();
        $aim = $userParameters->getAim();
        $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':height', $height, PDO::PARAM_INT);
        $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);
        $stmt->bindParam(':aim', $aim, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }

}