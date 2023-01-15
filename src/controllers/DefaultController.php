<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function login(){
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function meal_plan() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('meal_plan');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }
    
    public function recipes() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('recipes');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function menus() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('menus');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function settings() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('settings');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function my_parameters() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('my_parameters');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function account_settings() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('account_settings');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function day_meals() {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('day_meals');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }
}