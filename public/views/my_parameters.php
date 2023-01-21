<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/index.js" defer></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <title>MY PARAMETERS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <header>
            <div>My parameters</div>
        </header>
        <section class='my_profile'>
            <div class="user-info-container">
                <form class="user-info" action="updateParameters" method="POST">
                    <div class="messages">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="input-header">Sex</div>
                    <select name="sex" id="sex">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="man">Man</option>
                        <option value="woman">Woman</option>
                    </select>
                    <div class="input-header">Age</div>
                    <input name="age" id="age" type="number" placeholder="age">
                    <div class="input-header">Height[cm]</div>
                    <input name="height" id="height" type="number" placeholder="170">
                    <div class="input-header">Weight[kg]</div>
                    <input name="weight" id="weight" type="number" placeholder="70">
                    <div class="input-header">Aim</div>
                    <select name="aim" id="aim">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="mass">Mass</option>
                        <option value="reduction">Reduction</option>
                    </select>
                    <button disabled type="submit" class="button-save button-font">Save</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
