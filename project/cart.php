<?php
if (isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
    $id = (int)$_POST['id'];
    $quantity = (int)$_POST['quantity'];
    
    $stmt = $con->prepare('SELECT * FROM gazette_products WHERE product_id = ?');
    $stmt->execute([$_POST['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product && $quantity > 0){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            if(array_key_exists($id, $_SESSION['cart'])){
                $_SESSION['cart'][$id] += $quantity;
            }else{
                $_SESSION['cart'][$id] = $quantity;
            }
        }else{
            $_SESSION['cart'] = array($id => $quantity);
        }
    }
    
    header('location: index.php?page=cart');
    exit;
}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $product_id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            if (is_numeric($product_id) && isset($_SESSION['cart'][$product_id]) && $quantity > 0) {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    }

    header('location: index.php?page=cart');
    exit;
}

if (isset($_POST['checkout']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=checkout');
    exit;
}

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
if ($products_in_cart) {
    //return a string containing the same number of question marks as there are products in cart
    $qmstring = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $con->prepare('SELECT * FROM gazette_products WHERE product_id IN (' . $qmstring . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['product_id']];
    }
}

?>

<?=head_template('Shopping Cart')?>

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
        <h1>Shopping Cart</h1>
        <form action="index.php?page=cart" method="post">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="img">
                            <a href="index.php?page=product&product_id=<?=$product['product_id']?>">
                                <img src="<?=$product['img_src']?>" width="50" height="50" alt="<?=$product['p_name']?>">
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=product&product_id=<?=$product['product_id']?>"><?=$product['p_name']?></a>
                            <br>
                            <a href="index.php?page=cart&remove=<?=$product['product_id']?>">Remove</a>
                        </td>
                        <td>&dollar;<?=$product['price']?></td>
                        <td>
                            <input type="number" name="quantity-<?=$product['product_id']?>" value="<?=$products_in_cart[$product['product_id']]?>" min="1" max="<?=$product['stock']?>" placeholder="Quantity" required>
                        </td>
                        <td>&dollar;<?=$product['price'] * $products_in_cart[$product['product_id']]?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div>
                <span>Subtotal</span>
                <span>&dollar;<?=$subtotal?></span>
            </div>
            <div>
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Checkout" name="checkout">
            </div>
        </form>
    </div>
    
</body>
    
    <!-- Footer -->
    <?php
    include "footer.inc.php";
    ?>
    
</html>
