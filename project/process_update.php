<?=head_template('Update_process')?>

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
            $product_id = $_POST['product_id'];
            if(empty($_POST['category'])){
                $category = $product['category'];
            }else{
                $category = $_POST['category'];
            }
            if(empty($_POST['p_name'])){
                $p_name = $product['p_name'];
            }else{
                $p_name = $_POST['p_name'];
            }
            if(empty($_POST['p_desc'])){
                $p_desc = $product['p_desc'];
            }else{
                $p_desc = $_POST['p_desc'];
            }
            if(empty($_POST['img_src'])){
                $img_src = $product['img_src'];
            }else{
                $img_src = $_POST['img_src'];
            }
            if(empty($_POST['price'])){
                $price = $product['price'];
            }else{
                $price = $_POST['price'];
            }
            if(empty($_POST['stock'])){
                $stock = $product['stock'];
            }else{
                $stock = $_POST['stock'];
            }

            $update_stmt = $con->prepare("UPDATE gazette_products "
                    . "SET category = ?, p_name = ?, p_desc = ?, img_src = ?, price = ?, stock = ?"
                    . "WHERE product_id = ?");
            $update_stmt->execute(array($category, $p_name, $p_desc, $img_src, $price, $stock, $product_id));

            echo "Product with ID " . $product_id . " has been updated.";
        }
        function sanitize_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
    ?>
    
    <a href="index.php?page=admin_page">Return to admin page</a>
    <?php endif; ?>

</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>