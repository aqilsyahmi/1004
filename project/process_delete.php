<?=head_template('Deleted')?>

<body>
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
    
    <?php
    $stmt = $con->prepare("SELECT * FROM gazette_products WHERE product_id = ?");
    $stmt->execute([$_POST['product_id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$product){
        echo "Product ID does not exist.";
    }
    else{
        $del_stmt = $con->prepare("DELETE FROM gazette_products WHERE product_id = ?");
        $del_stmt->execute([$_POST['product_id']]);
        echo "Product with ID " . $_POST['product_id'] . " deleted.";
    }
    ?>
    
    <a href="index.php?page=admin_page">Return to admin page</a>

    
    <?php endif; ?>


</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>