<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserParameters.php';
require_once __DIR__.'/../repository/UserParametersRepository.php';

class UserParametersController extends AppController
{
    private $userParametersRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userParametersRepository = new UserParametersRepository();
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

        $userParameters = new UserParameters($sex, $age, $height, $weight,$aim);

        $this->userParametersRepository->addUserParameters($userParameters);
        return $this->render('my_parameters', ['messages' => ['Parameters was succesful updated!']]);

        //get id_user_paramters
        //if not null update paramaters where id = id_user_parameters
        //if null insert new user_parameters and set id_user_parameters in users
    }

    public function settings()
    {
        $parameters = $this->userParametersRepository->getUserParameters(10);
        return $this->render('settings', ['parameters' => $parameters]);
    }
}