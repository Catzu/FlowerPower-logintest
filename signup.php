<?php
include_once 'header.php';
echo "header";
?>

    <section class="signup-form">
        <h2>Registreren</h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="full name">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="uid" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwdrepeat" placeholder="repeat password">
                <button type="submit" name="submit">Registreren</button>
            </form>
        </div>
    </section>

<?php
include_once 'footer.php';
echo "footer";
?>