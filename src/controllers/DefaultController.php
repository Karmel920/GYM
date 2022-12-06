<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function login() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function meal_plan() {
        $this->render('meal_plan');
    }
    
    public function recipes() {
        $this->render('recipes');
    }

    public function menus() {
        $this->render('menus');
    }
}