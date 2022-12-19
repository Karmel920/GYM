<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <title>RECIPES</title>
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
            <div class="overlay">
                <div class="popup">
                    <div class="close-container"><i class="fa-solid fa-xmark close-recipe"></i></div>
                    <h1>Fish</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu ornare mi, quis pellentesque risus. Maecenas non orci turpis. Fusce et pulvinar metus, sit amet finibus lorem. Sed ac pulvinar dolor. Morbi elementum, massa eget commodo volutpat, purus risus ullamcorper lectus, eget iaculis augue nunc ac ex. Quisque ut nulla maximus, pulvinar arcu vitae, pulvinar justo. Pellentesque imperdiet justo ornare tincidunt pharetra. Duis sodales, odio et sagittis iaculis, sem eros sagittis erat, vel vehicula diam magna non enim. Integer consequat tempus sem at auctor. Nullam gravida turpis ac neque porttitor hendrerit. Sed venenatis magna non feugiat lobortis. Interdum et malesuada.</p>
                </div>
            </div>
            <header class="recipes-header">
                <div>Recipes</div>
                <div class="search-form">
                    <input class="input-search-recipes" type="text" placeholder="over 1 milion recipes">
                    <button class="button button-search">search</button>
                </div>
            </header>
            <section class='recipes'>
                <div class="recipe-box" data-id="555">
                    <div class="img-container">
                        <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-ioL7-9Upn-eojW_ryba-zapiekana-z-warzywami-prosty-przepis-na-danie-rybne-664x442-nocrop.jpg">
                    </div>
                    <h2>Fish</h2>
                    <div class="macro-container">
                        <span class="kcal">kcal: 400k</span>
                        <div class="macros">
                            <span>protein: 30g</span>
                            <span>fats: 50g</span>
                            <span>carbs: 10g</span>
                        </div>
                    </div>
                    <a href="#" class="button button-recipe">Show recipe</a>
                </div>
            </section>
        </main>
    </div>
    <script src="public/js/drop_down_menu.js"></script>
    <script src="public/js/recipes.js"></script>
</body>