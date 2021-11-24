<?=head_template('Create Product')?>

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
            <form action="index.php?page=process_create" method="POST">                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input class="form-control" type="text" id="category" required
                           name="category" placeholder="Enter Product Category">
                </div>
                
                <div class="form-group">
                    <label for="p_name">Name:</label>
                    <input class="form-control" type="text" id="p_name" required
                           name="p_name" placeholder="Enter Product Name">
                </div>
                
                <div class="form-group">
                    <label for="p_desc">Description:</label>
                    <input  class="form-control" type="text" id="p_desc" required
                           name="p_desc" placeholder="Enter Product Description">
                </div>
                
                <div class="form-group">
                    <label for="img_src">Image Link:</label>
                    <input  class="form-control" type="text" id="img_src" required
                           name="img_src" placeholder="Enter Product Image Link">
                </div>
                
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input  class="form-control" type="text" id="price" required
                           name="price" placeholder="Enter Product Price">
                </div>
                
                <div class="form-group">
                    <label for="Stock">Stock:</label>
                    <input  class="form-control" type="text" id="stock" required
                           name="stock" placeholder="Enter Product Stock">
                </div>

                <div class = "form-group">
                    <button class="button button1" type="submit">Create</button>             
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