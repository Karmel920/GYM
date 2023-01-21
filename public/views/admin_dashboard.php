<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/admin_dashboard.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <script src="public/js/registered_users.js" defer></script>
    <title>ADMIN DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <header>
            <div>Admin dashboard</div>
        </header>
        <section class='admin-panel'>
            <div class="registered-users-list">
                <div class="user-box">
                    <h2>Registered users</h2>
                    <?php foreach ($registeredUsers as $registeredUser): ?>
                    <p><?= $registeredUser['email']; ?></p>
<!--                    <p>Jasper role: user</p>-->
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
