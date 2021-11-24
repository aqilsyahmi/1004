<?=head_template('Cehck All Products')?>

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
    $stmt = $con->prepare("SELECT * FROM gazette_products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <div>
        <table>
            <thead>
                <tr>
                    <td>Product ID</td>
                    <td colspan="2">Product</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Stock</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Product catalog is empty.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?=$product['product_id']?></td>
                    <td>
                        <a href="index.php?page=product&product_id=<?=$product['product_id']?>">
                            <img src="<?=$product['img_src']?>" width="50" height="50" alt="<?=$product['p_name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&product_id=<?=$product['product_id']?>"><?=$product['p_name']?></a>
                    </td>
                    <td><?=$product['p_desc']?></td>
                    <td>&dollar;<?=$product['price']?></td>
                    <td><?=$product['stock']?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>    
    </div>
    <?php endif; ?>
    
    <a href="index.php?page=admin_page">Return to admin page</a>

    
</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>