<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <div class="open-nav"><i class="fa-solid fa-bars"></i></div>
    <nav class="nav hidden">
        <div class="close-nav"><i class="fa-solid fa-xmark"></i></div>
        <img src="public/img/logo_words.svg">
        <ul>
            <li>
                <i class="fa fa-regular fa-calendar"></i>
                <a href="meal_plan" class="button button-meal-plan">Meal plan</a>
            </li>
            <li>
                <i class="fa fa-solid fa-utensils"></i>
                <a href="recipes" class="button button-recipes">Recipes</a>
            </li>
            <li>
                <i class="fa fa-solid fa-receipt"></i>
                <a href="menus" class="button button-menus">Menus</a>
            </li>
            <li>
                <i class="fa fa-solid fa-dumbbell"></i>
                <a href="#" class="button button-trainings">Trainings</a>
            </li>
            <li>
                <i class="fa fa-solid fa-gear"></i>
                <a href="settings" class="button button-settings">Settings</a>
                <i class="fa-solid fa-right-from-bracket"></i>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div>Settings</div>
        </header>
        <section class='settings'>
            <div class="user-info-container">
                <form class="user-info">
                    <div class="input-header">Sex</div>
                    <select name="sex">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="man">Man</option>
                        <option value="woman">Woman</option>
                    </select>
                    <div class="input-header">Age</div>
                    <input name="age" type="text" placeholder="age">
                    <div class="input-header">Height[cm]</div>
                    <input name="height" type="text" placeholder="170">
                    <div class="input-header">Weight[kg]</div>
                    <input name="weight" type="text" placeholder="70">
                    <div class="input-header">Aim</div>
                    <select name="aim">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="mass">Mass</option>
                        <option value="reduction">Reduction</option>
                    </select>
                    <button class="button-save button-font" type="submit">Save</button>
                </form>
            </div>
        </section>
    </main>
</div>
<script src="public/js/index.js"></script>
</body>
