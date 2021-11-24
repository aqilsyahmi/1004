<?=head_template('Create_process')?>

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
        
        $stmt = $con->prepare("INSERT INTO gazette_products (category, p_name, p_desc, img_src, price, stock) VALUES (?, ?, ?, ?, ?, ?)");
       
        $stmt->execute([$_POST["category"], $_POST["p_name"],
            $_POST["p_desc"], $_POST["img_src"], $_POST["price"],
            $_POST["stock"]]);
        
        $new = $con->lastInsertId();
        
        $check_stmt = $con->prepare("SELECT * FROM gazette_products WHERE product_id = ?");
        $check_stmt->execute(array($new));
        $check = $check_stmt->fetch(PDO::FETCH_ASSOC);
        
        if($check){
            echo "Product catalog updated. Newest product ID: " . $new;
        }else{
            echo "Something went wrong. Catalog not updated.";
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