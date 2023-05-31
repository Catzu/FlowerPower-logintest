<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    
    <nav>
        <div>
            <a href="index.php"><img src="img/Icon 3.png" alt="Flower Power logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Winkel</a></li>
                <li><a href="winkel.php">Webwinkel</a></li>
                <li><a href="#">Informatie</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Winkelwagen</a></li>
                <?php
                    if (isset($_SESSION["userid"])) {
                        echo '<li><a href="profile.php">Profiel pagina</a></li>';
                        echo '<li><a href="includes/logout.inc.php">Uitloggen</a></li>';
                        echo '<li><a href="https://www.youtube.com/watch?v=ZRtdQ81jPUQ" target="_blank">pain</a></li>';
                    }
                    else {
                        echo '<li><a href="login.php">Inloggen</a></li>';
                        echo '<li><a href="signup.php">registreren</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="wrapper">