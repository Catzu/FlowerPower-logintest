<?php
include_once 'header.php';
?>
        <section>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<p>Hello there ". $_SESSION["useruid"]."</p>";
                }
                if (isset($_SESSION["useruid"])) {
                    echo "<p>Hello there ". $_SESSION["usersEmail"]."</p>";
                }
                if (isset($_SESSION["useruid"])) {
                    echo "<p>Hello there ". $_SESSION["username"]."</p>";
                }
            ?>
            <h1>Hello world</h1>
            <p>This is my trying to make a functional webshop</p>
        </section>
        
        <section>
            <h2>Categories</h2>
            <div>
                <div>
                    <h3>nmr 1</h3>
                </div>
                <div>
                    <h3>nmr 2</h3>
                </div>
                <div>
                    <h3>nmr 3</h3>
                </div>
            </div>
        </section>
<?php
include_once 'footer.php';
echo "imaginary footer";
?>