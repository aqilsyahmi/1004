<?php
$products_per_page = 10;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
$stmt = $con->prepare("SELECT * FROM gazette_products LIMIT ?, ?");
$stmt->bindValue(1, ($current_page - 1) * $products_per_page, PDO::PARAM_INT);
$stmt->bindValue(2, $products_per_page, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_products = $con->query('SELECT * FROM gazette_products')->rowCount();
?>
<?= head_template('GAZETTE - Shop') ?>
<link rel="stylesheet" href="test.css">

<body>
    <!-- Navbar -->
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        include 'nav.inc.loggedin.php';
    } else {
        include 'nav.inc.php';
    }
    ?>
    <div class="products content-wrapper">

        <h1 class="products-title">Products</h1>

        <div class="products-header">
            <p><?= $total_products ?> Products</p>

            <form action="" method="get" class="products-form">
                <input type="hidden" name="page" value="products">
                <label class="category">
                    Category
                    <select name="category">
                        <option value="all"<?= ($category == 'all' ? ' selected' : '') ?>>All</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"<?= ($category == $c['id'] ? ' selected' : '') ?>><?= $c['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="sortby">
                    Sort by
                    <select name="sort">
                        <option value="sort1"<?= ($sort == 'sort1' ? ' selected' : '') ?>>Alphabetical A-Z</option>
                        <option value="sort2"<?= ($sort == 'sort2' ? ' selected' : '') ?>>Alphabetical Z-A</option>
                        <option value="sort3"<?= ($sort == 'sort3' ? ' selected' : '') ?>>Newest</option>
                        <option value="sort4"<?= ($sort == 'sort4' ? ' selected' : '') ?>>Oldest</option>
                        <option value="sort5"<?= ($sort == 'sort5' ? ' selected' : '') ?>>Highest Price</option>
                        <option value="sort6"<?= ($sort == 'sort6' ? ' selected' : '') ?>>Lowest Price</option>
                    </select>
                </label>
            </form>
        </div>                

        <div class="products-wrapper">
            <?php foreach ($products as $product): ?>
                <a href="index.php?page=product&product_id=<?= $product['product_id'] ?>" class="product">
                    <img src="<?= $product['img_src'] ?>" width="200" height="200" alt="<?= $product['p_name'] ?>">
                    <span class="name">
                        <?= $product['p_name'] ?>
                    </span>
                    <span class="price">
                        &dollar;<?= $product['price'] ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="buttons">
            <?php if ($current_page > 1): ?>
                <a href="index.php?page=shop&p=<?= $current_page - 1 ?>">Prev</a>
            <?php endif; ?>
            <?php if ($total_products > ($current_page * $products_per_page) - $products_per_page + count($products)): ?>
                <a href="index.php?page=shop&p=<?= $current_page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>

    </div>
</body> 

<!-- Footer -->
<?php
include "footer.inc.php";
?>
</html>
