<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/day_meals.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <title>DAY MEALS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
                <a href="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
        </ul>
    </nav>
    <main>
        <div class="overlay">
                   <form class="meal-form">
                        <div class="close-container"><i class="fa-solid fa-xmark close-menu"></i></div>
    <!--                    <div class="messages">-->
    <!--                        --><?php //if(isset($messages)) {
    //                            foreach ($messages as $message){
    //                                echo $message;
    //                            }
    //                        }
    //                        ?>
    <!--                    </div>-->
                        <div class="input-header">Name</div>
                        <input name="name" id="name" type="text" placeholder="name">
                        <div class="input-header">Kcal</div>
                        <input name="kcal" id="kcal" type="text" placeholder="300">
                        <div class="input-header">Proteins</div>
                        <input name="proteins" id="proteins" type="text" placeholder="50">
                        <div class="input-header">Fats</div>
                        <input name="fats" id="fats" type="text" placeholder="10">
                        <div class="input-header">Carbs</div>
                        <input name="carbs" id="carbs" type="text" placeholder="20">
                        <button disabled type="submit" class="button-save button-font">Add</button>
                   </form>
        </div>
        <header>
            <div class="date-day">06-01-2023</div>
        </header>
        <section class='day'>
            <div class="meals">
                <div class="meal">
                    <h2>Hamburger</h2>
                    <div class="macros-list">
                        <span>kcal:2000</span>
                        <span>proteins:200g</span>
                        <span>carbo:100g</span>
                        <span>fats:100g</span>
                    </div>
                </div>
                <div class="meal">
                    <h2>Hamburger</h2>
                    <div class="macros-list">
                        <span>kcal:2000</span>
                        <span>proteins:200g</span>
                        <span>carbo:100g</span>
                        <span>fats:100g</span>
                    </div>
                </div>
                <div class="meal">
                    <h2>Hamburger</h2>
                    <div class="macros-list">
                        <span>kcal:2000</span>
                        <span>proteins:200g</span>
                        <span>carbo:100g</span>
                        <span>fats:100g</span>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <form>
                    <input type="text" placeholder="find meal">
                    <button class="button-form button-add-meal">Add meal</button>
                    <span>OR</span>
                    <button class="button-form button-new-meal">New Meal</button>
                </form>
            </div>
            <div class="sum">
                Summarise:
                <div class="macros-list">
                    <span>kcal: 2000/2500</span>
                    <span>proteins: 100/200g</span>
                    <span>fats: 50/100g</span>
                    <span>carbo: 100/300g</span>
                </div>
            </div>
        </section>
    </main>
</div>
<script src="public/js/drop_down_menu.js"></script>
<script src="public/js/day_meal.js"></script>
</body>
