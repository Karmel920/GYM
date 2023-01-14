<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('meal_plan', 'DefaultController');
Routing::get('recipes', 'DefaultController');
Routing::get('menus', 'DefaultController');
Routing::get('settings', 'UserParametersController');
Routing::get('my_parameters', 'DefaultController');
Routing::get('day_meals', 'DefaultController');
Routing::get('account_settings', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('updateParameters', 'UserParametersController');

Routing::run($path);
