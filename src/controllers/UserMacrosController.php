<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserMacros.php';
require_once __DIR__.'/../repository/UserMacrosRepository.php';

class UserMacrosController extends AppController
{
    private $userMacrosRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userMacrosRepository = new UserMacrosRepository();
    }

    public function getUserMacros()
    {
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($this->userMacrosRepository->getUserMacrosFetch($_COOKIE["id_user"]));
    }
}