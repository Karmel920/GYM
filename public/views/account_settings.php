<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/account_settings.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <script src="public/js/update_password.js" defer></script>
    <title>ACCOUNT SETTINGS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <header>
            <div>Account settings</div>
        </header>
        <section class='account-settings'>
            <form class="change-password" action="changePassword" method="POST">
                <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="input-header">Old password</div>
                <input name="old-password" type="password">
                <div class="input-header">New Password</div>
                <input name="new-password" type="password">
                <div class="input-header">Repeat Password</div>
                <input name="repeat-password" type="password">
                <button class="button-ok button-font" type="submit">OK</button>
            </form>
        </section>
    </main>
</div>
</body>
