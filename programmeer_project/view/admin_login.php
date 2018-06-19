<!DOCTYPE html>
<html lang="nl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

        <!-- Font Awsome CSS  -->
        <link rel="stylesheet" href="view/assets/css/fontAwesome-all.min.css" >

        <!-- Custom CSS -->
        <link rel="stylesheet" href="view/assets/css/grid-v1.2.css" >
        <link rel="stylesheet" href="view/assets/css/master.css" >

    </head>
    <body>
        <form action="index.php?view=admin" method="post">
            <?php
                // echo $check1_1;
                // echo $check1_2;
                // echo $check2_1;
                // echo $check2_2;

                if (isset($message)) {
                    echo "<div style='border: 1px black solid; height: 50px; width: 300px;'>
                        " . $message . "
                    </div><br>";
                }
            ?>

            <label for="username">Gebruikersnaam</label><br>
            <input type="text" name="username" id="username" value="<?php echo $admin_input?>"><br><br>

            <label for="password">Wachtwoord</label><br>
            <input type="text" name="password" id="password"><br><br>

            <input type="submit" name="submit" value="login">

            
        </form>
    </body>
</html>
