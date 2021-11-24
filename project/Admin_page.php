<?=head_template('Admin')?>

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
    <ol>
        <li>
            <a href="index.php?page=create">Create Product</a>
        </li>
        <li>
            <a href="index.php?page=readall">View All Products</a>
        </li>
        <li>
            <a href="index.php?page=read">View Specific Product</a>
        </li>
        <li>
            <a href="index.php?page=update">Update Product</a>
        </li>
        <li>
            <a href="index.php?page=delete">Delete Product</a>
        </li>
    </ol>
    <?php endif; ?>

</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>