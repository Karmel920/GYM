<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/menus.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <script type="module" src="public/js/menus.js" defer></script>
    <title>MENUS</title>
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
                    <a href="logout" class="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="overlay">
                <div class="popup">
                    <div class="close-container"><i class="fa-solid fa-xmark close-menu"></i></div>
                    <h1>Menu</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu ornare mi, quis pellentesque risus. Maecenas non orci turpis. Fusce et pulvinar metus, sit amet finibus lorem. Sed ac pulvinar dolor. Morbi elementum, massa eget commodo volutpat, purus risus ullamcorper lectus, eget iaculis augue nunc ac ex. Quisque ut nulla maximus, pulvinar arcu vitae, pulvinar justo. Pellentesque imperdiet justo ornare tincidunt pharetra. Duis sodales, odio et sagittis iaculis, sem eros sagittis erat, vel vehicula diam magna non enim. Integer consequat tempus sem at auctor. Nullam gravida turpis ac neque porttitor hendrerit. Sed venenatis magna non feugiat lobortis. Interdum et malesuada.</p>
                </div>
            </div>
            <header>
                <div>Menus</div>
            </header>
            <section class='menus'>
                <div class="menu-box" data-type="balance">
                    <div class="img-container">
                        <img src="https://s20427.pcdn.co/wp-content/uploads/2017/09/how-to-eat-a-balanced-diet.jpg">
                    </div>
                    <h2>Balance</h2>
                    <a href="#" class="button button-menu">Show menu</a>
                </div>
                <div class="menu-box" data-type="high-protein">
                    <div class="img-container">
                        <img src="https://thumbs.dreamstime.com/b/enjoy-nice-steak-6925104.jpg">
                    </div>
                    <h2>High-protein</h2>
                    <a href="#" class="button button-menu">Show menu</a>
                </div>
                <div class="menu-box" data-type="high-carbs">
                    <div class="img-container">
                        <img src="https://s3.przepisy.pl/przepisy3ii/img/variants/800x0/proste-spaghetti-bolognese.jpg">
                    </div>
                    <h2>High-carbs</h2>
                    <a href="#" class="button button-menu">Show menu</a>
                </div>
                <div class="menu-box" data-type="vege">
                    <div class="img-container">
                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/13/e0/79/d7/vege-to-tu.jpg">
                    </div>
                    <h2>Vege</h2>
                    <a href="#" class="button button-menu">Show menu</a>
                </div>
                <div class="menu-box" data-type="gluten-free">
                    <div class="img-container">
                        <img src="http://www.todayifoundout.com/wp-content/uploads/2014/03/mmmmm-gluten.jpg">
                    </div>
                    <h2>Gluten free</h2>
                    <a href="#" class="button button-menu">Show menu</a>
                </div>
            </section>
        </main>
    </div>
</body>