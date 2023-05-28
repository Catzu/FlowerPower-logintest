<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $adress = $_POST["adress"];
    $huisnummer = $_POST["huisnummer"];
    $postcode = $_POST["postcode"];
    $plaats = $_POST["plaats"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $telefoonnummer, $adress, $huisnummer, $postcode, $plaats) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdmatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($conn, $name, $email, $username, $pwd, $telefoonnummer, $adress, $huisnummer, $postcode, $plaats);
    

}
else {
    header("location: ../signup.php");
    exit();
}
