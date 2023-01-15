<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserParameters.php';
require_once __DIR__.'/../models/UserMacros.php';
require_once __DIR__.'/../repository/UserParametersRepository.php';
require_once __DIR__.'/../repository/UserMacrosRepository.php';

class UserParametersController extends AppController
{
    private $userParametersRepository;
    private $userMacrosRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userParametersRepository = new UserParametersRepository();
        $this->userMacrosRepository = new UserMacrosRepository();
    }

    public function updateParameters()
    {
        if(!$this->isPost()) {
            return $this->render('my_parameters');
        }

        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $aim = $_POST['aim'];

        $userParameters = new UserParameters($sex, $age, $height, $weight, $aim, $_COOKIE["id_user"]);
        $this->userParametersRepository->updateUserParameters($userParameters, $_COOKIE["id_user"]);
        $this->userMacrosRepository->updateUserMacros($userParameters, $_COOKIE["id_user"]);
        return $this->render('my_parameters', ['messages' => ['Parameters was succesful updated!']]);
    }

    public function settings()
    {
        $parameters = $this->userParametersRepository->getUserParameters($_COOKIE["id_user"]);
        return $this->render('settings', ['parameters' => $parameters]);
    }
}