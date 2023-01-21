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
        if(isset($_COOKIE["id_user"])) {
            header("Location: {$url}/meal_plan");
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

        $userCookie = 'id_role';
        $cookieValue = $user->getIdRole();
        setcookie($userCookie, $cookieValue, time() + (60 * 30), "/");

        if ($user->getIdRole() === 2) {
            header("Location: {$url}/admin_dashboard");
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/meal_plan");
    }

    public function logout()
    {
        setcookie('id_user', $_COOKIE['id_user'], time() - 10, "/");
        setcookie('id_role', $_COOKIE['id_role'], time() - 10, "/");
        $this->sessionRepository->endSession($_COOKIE["id_user"]);

        return $this->render('login');
    }

    public function changePassword()
    {
        if(!$this->isPost()) {
            return $this->render('account_settings');
        }

        $oldPassword = sha1($_POST["old-password"]);
        $newPassword = sha1($_POST["new-password"]);
        $repeatedPassword = sha1($_POST["repeat-password"]);

        $user = $this->userRepository->getUserById($_COOKIE['id_user']);

        if($user->getPassword() !== $oldPassword) {
            return $this->render('account_settings', ['messages' => ['Wrong old password!']]);
        }

        if ($newPassword !== $repeatedPassword) {
            return $this->render('account_settings', ['messages' => ['Please provide proper password']]);
        }

        $this->userRepository->updatePassword($user, $repeatedPassword);
        return $this->render('account_settings', ['messages' => ['Password was successful changed!']]);
    }

    public function admin_dashboard() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            if($_COOKIE['id_role'] != 2){
                throw new Exception("You need to be admin!");
            }
            $registeredUsers = $this->userRepository->getRegisteredUsers();
            return $this->render('admin_dashboard', ['registeredUsers' => $registeredUsers]);
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }
}