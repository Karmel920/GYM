<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = sha1($_POST["password"]);

        $user = $userRepository->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

//        return $this->render('meal_plan');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/meal_plan");
    }

    public function register()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST["email"];
        $password = sha1($_POST["password"]);

        $user = $userRepository->getUser($email);

        if($user) {
            return $this->render('register', ['messages' => ['User with this email exist!']]);
        }

        $userRepository->addNewUser($email, $password);
        return $this->render('register', ['messages' => ['Registration was successful, sign in!']]);

//        $url = "http://$_SERVER[HTTP_HOST]";
//        header("Location: {$url}/login");
    }

}