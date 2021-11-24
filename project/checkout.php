<?=head_template('Login')?>

<body class = "login_background">
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            include 'nav.inc.loggedin.php';
        }
        else{
            include 'nav.inc.php';
        }
    ?>
    
    <?php
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            echo <<<EOF
                <h1>Please log in before checking out.<h1>
                <div class='form-group'>
                    <form action='index.php?page=login' method='post'>
                        <button class='btn btn-success' type='submit'>Log In</button>
                    </form>
                    <form action='index.php?page=create_account' method='post'>
                        <button class='btn btn-success' type='submit'>Sign Up</button>
                    </form>
                </div>
            EOF;
        }
        else{
            echo 'tbd';
        }
    ?>

</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>