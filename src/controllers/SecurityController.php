<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';

class SecurityController extends AppController
{
    private $userRepository;
    private $sessionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->sessionRepository = new SessionRepository();
    }

    public function login()
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        if(isset($_COOKIE["user-id"])) {
            header("Location: {$url}/dashboard");
            return;
        }

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = sha1($_POST["password"]);

        $user = $this->userRepository->getUserByEmail($email);

        if(!$user) {
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $userCookie = 'id_user';
        $cookieValue = $user->getIdUser();
        setcookie($userCookie, $cookieValue, time() + (60 * 30), "/");
        $this->sessionRepository->startSession($cookieValue);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/meal_plan");
    }

    public function logout()
    {
        setcookie('id_user', $_COOKIE['id_user'], time() - 10, "/");
        $this->sessionRepository->endSession($_COOKIE["id_user"]);

        return $this->render('login');
    }
}