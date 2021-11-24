<?php
if (isset($_GET['product_id'])){
    $stmt = $con->prepare('SELECT * FROM gazette_products WHERE product_id = ?');
    $stmt->execute([$_GET['product_id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$product){
        exit("Product not found.");
    }
}else{
    exit("Product not found.");
}
?>

<?=head_template('GAZETTE - Products')?>
<body>
    <!-- Navbar -->
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            include 'nav.inc.loggedin.php';
        }
        else{
            include 'nav.inc.php';
        }
    ?>
    <div>
        <img src="<?=$product['img_src']?>" width="500" height="500" alt="<?=$product['p_name']?>">
        <div>
            <h1><?=$product['p_name']?></h1>
            <span>
                &dollar;<?=$product['price']?>
            </span>
            <form action="index.php?page=cart" method="post">
                <input type="number" name="quantity" value="1" min="1" max="<?=$product['stock']?>" placeholder="Quantity" required>
                <input type="hidden" name="id" value="<?=$product['product_id']?>">
                <input type="submit" value="Add To Cart">
            </form>
            <div>
                <?=$product['p_desc']?>
            </div>
        </div>
    </div>
    
</body>
    
    <!-- Footer -->
    <?php
    include "footer.inc.php";
    ?>
    
</html>
