<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserParameters.php';
require_once __DIR__.'/../repository/UserParametersRepository.php';

class UserMacrosController extends AppController
{
    private $userMacrosRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userMacrosRepository = new UserMacrosRepository();
    }

    public function updateMacros(UserParameters $userParameters)
    {
        //get params
        //new userMacros
    }
}