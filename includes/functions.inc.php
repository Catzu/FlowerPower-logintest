<?php

#login start
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $telefoonnummer, $adress, $huisnummer, $postcode, $plaats) {
    #$result;
    if (empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)||empty($telefoonnummer)||empty($adress)||empty($huisnummer)||empty($postcode)||empty($plaats)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    //$result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    //$result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdmatch($pwd, $pwdRepeat) {
    //$result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultdData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $telefoonnummer, $adress, $huisnummer, $postcode, $plaats) {
    $sql = "INSERT INTO users (usersName, UsersEmail, usersUid, usersPwd, usersTelefoonnummer, usersAdress, usersHuisnummer, usersPostcode, usersPlaats) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $email, $username, $telefoonnummer, $adress, $huisnummer, $postcode, $plaats, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    //$result;
    if (empty($username)||empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed); 

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } 
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["useruid"] = $uidExists["usersUID"];
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["username"] = $uidExists["usersName"];
        $_SESSION["usersEmail"] = $uidExists["usersEmail"];
        header("location: ../index.php?");
        exit();
    }
}
#login end

#card start
    $fullstr = '<i class="fas fa-star"></i>';
    $emptstr = '<i class="far fa-star"></i>';
    # $n = X, X = fas, if X < than 5 fill far till 5

    function component($productname, $productpricediscount, $productprice, $productimg,) {
    $element = "
    
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                Some quick example text to build on the card.
                            </p>
                            <h5>
                                <span class=\"price\">$productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;

    }
#card end
