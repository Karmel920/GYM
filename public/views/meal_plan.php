<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <title>MEAL PLAN</title>
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
                <div>Meal plan</div>
            </header>
            <section class='calendar'>
                <div></div>
            </section>
        </main>
    </div>
    <script src="public/js/drop_down_menu.js"></script>
</body>
