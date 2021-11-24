<?=head_template('Update Product')?>

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
        <h1>Create Product</h1>
            <form action="index.php?page=process_update" method="POST">
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <input class="form-control" type="text" id="product_id" required
                           name="product_id" placeholder="Enter Product ID">
                </div>           
                
                <div class="form-group">
                    <label for="category">New Category:</label>
                    <input class="form-control" type="text" id="category" 
                           name="category" placeholder="Enter New Product Category">
                </div>
                
                <div class="form-group">
                    <label for="p_name">New Name:</label>
                    <input class="form-control" type="text" id="p_name" 
                           name="p_name" placeholder="Enter New Product Name">
                </div>
                
                <div class="form-group">
                    <label for="p_desc">New Description:</label>
                    <input  class="form-control" type="text" id="p_desc" 
                           name="p_desc" placeholder="Enter New Product Description">
                </div>
                
                <div class="form-group">
                    <label for="img_src">New Image Link:</label>
                    <input  class="form-control" type="text" id="img_src" 
                           name="img_src" placeholder="Enter New Product Image Link">
                </div>
                
                <div class="form-group">
                    <label for="price">New Price:</label>
                    <input  class="form-control" type="text" id="price" 
                           name="price" placeholder="Enter New Product Price">
                </div>
                
                <div class="form-group">
                    <label for="Stock">New Stock:</label>
                    <input  class="form-control" type="text" id="stock" 
                           name="stock" placeholder="Enter New Product Stock">
                </div>

                <div class = "form-group">
                    <button class="button button1" type="submit">Update</button>             
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