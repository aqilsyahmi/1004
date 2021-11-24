<?php            
    $products_per_page = 3;
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    $stmt = $con->prepare("SELECT * FROM gazette_products LIMIT ?, ?");
    $stmt->bindValue(1, ($current_page - 1) * $products_per_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $products_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_products = $con->query('SELECT * FROM gazette_products')->rowCount();
?>
<?=head_template('Test page')?>

    <body>
        <!-- Navbar -->
        <?=include "nav.inc.php";?>        
        <div>
            <h1>Products</h1>
            <p><?=$total_products?> Products</p>
            <div>
                <?php foreach ($products as $product): ?>
                <a href="index.php?page=product&id=<?=$product['product_id']?>">
                    <img src="<?=$product['img_src']?>" width="200" height="200" alt="<?=$product['p_name']?>">
                    <span><?=$product['p_name']?></span>
                    <span>
                        &dollar;<?=$product['price']?>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
            <div>
                <?php if ($current_page > 1): ?>
                <a href="index.php?page=testDB&p=<?=$current_page-1?>">Prev</a>
                <?php endif; ?>
                <?php if ($total_products > ($current_page * $products_per_page) - $products_per_page + count($products)): ?>
                <a href="index.php?page=testDB&p=<?=$current_page+1?>">Next</a>
                <?php endif; ?>
            </div>
        </div>

    </body>
    
    <!-- Footer -->
        <?php
        include "footer.inc.php";
        ?>
</html>
