<?=head_template('Check Product')?>

<body class = "login_background">
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            include 'nav.inc.loggedin.php';
        }
        else{
            include 'nav.inc.php';
        }
    ?>
    
    <?php if($_SESSION['id'] !== 1): ?>
    <h1>Access Denied.</h1>
    <?php else: ?>
    <main class="login_container" >
        <div class = "login_box">
        <h1>Check Product</h1>
            <form action="index.php?page=process_read" method="POST">                
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <input class="form-control" type="text" id="product_id" required
                           name="product_id" placeholder="Enter Product ID">
                </div>

                <div class = "form-group">
                    <button class="button button1" type="submit">Check</button>             
                </div>
            </form>
       </div>
    </main>
    <?php endif; ?>

</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>