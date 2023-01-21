<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <title>SETTINGS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <header>
            <div>Settings</div>
        </header>
        <section class='settings'>
            <button onclick="location.href='/account_settings'" type="button" class="button-account-settings button-font">Account settings</button>
            <div class="informations">
                <?php $parameters?>
                <h2>My parameters</h2>
                <div>
                    <p>Sex:</p>
                    <p><?= $parameters->getSex(); ?></p>
                </div>
                <div>
                    <p>Age:</p>
                    <p><?= $parameters->getAge(); ?></p>
                </div>
                <div>
                    <p>Height:</p>
                    <p><?= $parameters->getHeight(); ?></p>
                </div>
                <div>
                    <p>Weight:</p>
                    <p><?= $parameters->getWeight(); ?></p>
                </div>
                <div>
                    <p>Aim:</p>
                    <p><?= $parameters->getAim(); ?></p>
                </div>
                <?php ?>
                <button onclick="location.href='/my_parameters'" type="button" class="button-update-info button-font">Update parameters</button>
            </div>
        </section>
    </main>
</div>
</body>
