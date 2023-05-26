<?php
include_once 'header.php';
echo "header";
?>

    <section class="signup-form">
        <h2>Inloggen</h2>
        <div class="signup-form-form">
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="name" placeholder="Username/Email">
                <input type="password" name="pwd" placeholder="password">
                <button type="submit" name="submit">Inloggen</button>
            </form>
        </div>
    </section>

<?php
include_once 'footer.php';
echo "footer";
?>