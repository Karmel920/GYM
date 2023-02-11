<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/day_meals.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <script src="public/js/add_new_meal.js" defer></script>
    <script type="module" src="public/js/day_meal.js" defer></script>
    <script type="module" src="public/js/show_day_meals.js" defer></script>
    <script src="public/js/search_bar.js" defer></script>
    <title>DAY MEALS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <div class="overlay">
                   <form class="meal-form">
                        <div class="message"></div>
                        <div class="close-container"><i class="fa-solid fa-xmark close-menu"></i></div>
                        <div class="input-header">Name</div>
                        <input name="name" id="name" type="text" placeholder="name">
                        <div class="input-header">Kcal</div>
                        <input name="kcal" id="kcal" type="number" placeholder="300">
                        <div class="input-header">Proteins</div>
                        <input name="proteins" id="proteins" type="number" placeholder="50">
                        <div class="input-header">Fats</div>
                        <input name="fats" id="fats" type="number" placeholder="10">
                        <div class="input-header">Carbs</div>
                        <input name="carbs" id="carbs" type="number" placeholder="20">
                        <button disabled type="reset" class="button-save button-font">Add</button>
                   </form>
        </div>
        <header>
            <div class="date-day">06-01-2023</div>
        </header>
        <section class='day'>
            <div class="form-container">
                <form>
                    <div class="search-bar-container">
                        <input class="meal-name" type="text" id="name-input" placeholder="find meal">
                        <div class="search-bar hide">
                        </div>
                    </div>
                    <button disabled type="reset" class="button-form button-add-meal">Add meal</button>
                    <span>OR</span>
                    <button class="button-form button-new-meal">New Meal</button>
                </form>
            </div>
            <div class="meals">
            </div>
            <div class="sum-container">
                <div class="sum">
                    <h3>Summarise:</h3>
                    <div class="macros-list">
                        <span>kcal: </span>
                        <span>proteins: </span>
                        <span>fats: </span>
                        <span>carbs: </span>
                    </div>
                </div>
                <div class="user-macro">
                    <h3>Your goals:</h3>
                    <div class="macros-list">
                        <span>kcal: </span>
                        <span>proteins: </span>
                        <span>fats: </span>
                        <span>carbs: </span>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>

<template id="meal-template">
    <div class="meal">
        <h2>Hamburger</h2>
        <div class="macros-list">
            <span class="meal-kcal">kcal:2000</span>
            <span class="meal-proteins">proteins:200g</span>
            <span class="meal-fats">fats:100g</span>
            <span class="meal-carbs">carbs:100g</span>
        </div>
    </div>
</template>

<template id="summarise-template">
    <div class="sum">
        <h3>Summarise:</h3>
        <div class="macros-list">
            <span class="macro-kcal">kcal: </span>
            <span class="macro-proteins">proteins: </span>
            <span class="macro-fats">fats: </span>
            <span class="macro-carbs">carbs: </span>
        </div>
    </div>
</template>

<template id="user-macro-template">
    <div class="user-macro">
        <h3>Your goals:</h3>
        <div class="macros-list">
            <span class="user-kcal">kcal: </span>
            <span class="user-proteins">proteins: </span>
            <span class="user-fats">fats: </span>
            <span class="user-carbs">carbs: </span>
        </div>
    </div>
</template>

