<?php 
//for the number of items in the cart
$cart_items=0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $k => $v){
        $cart_items += (int)$v;
    }
}else{
    $cart_items=0;
}
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="assets/css/nav.css">

<nav class="navbar navbar-expand-sm py-4 navbar-light bg-light">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="index.php" class="navbar-left">
        <img id=navbar-logo src=assets/images/logo.png alt="LOGO"></a>
    <a class="navbar-brand" id= company-name href="#" style="padding-left: 10px;font-weight: bold; font-size: 42px;">GAZETTE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="padding-left: 60px;">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="active" href="index.php?page=home" style="font-size:18px; padding-left: 20px; padding-right: 20px; color: grey;">Home</a>
            </li>
            <li class="nav-item">
                <a href="index.php?page=about_us" style="font-size:18px; padding-left: 20px; padding-right: 20px; color: grey;">About</a>
            </li>
            <li class="nav-item">
                <div class="dropdown" id="dropdown-shop">
                    <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown_button" data-toggle="dropdown">
                        <a style="font-size:18px; padding-left: 20px; padding-right: 20px; color: grey;">Shop</a>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?page=shop">Womens</a>
                        <a class="dropdown-item" href="index.php?page=shop">Mens</a>
                    </div>
                </div>
                <!--                <a href="#" style="font-size:18px; padding-left: 20px; padding-right: 20px; color: grey;">Shop</a>-->
            </li>
            <li class="nav-item">
                <a href="#" style="font-size:18px; padding-left: 20px; padding-right: 20px; color: grey;">FAQs</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown_button" data-toggle="dropdown">
                    My Account
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=login">Login</a>
                    <a class="dropdown-item" href="index.php?page=create_account">Create Account</a>
                </div>
            </div>
            <li class="nav-item">
                <a class="material-icons" href="index.php?page=cart" style="font-size:25px;color:grey;">shopping_basket</a>
                <span><?=$cart_items?></span>
            </li>
        </ul>
    </div>
</nav>