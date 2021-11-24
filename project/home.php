<?=head_template('GAZETTE - Premium Leather')?>
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

        <!-- Slideshow --> 
        <div class="slideshow-container">

            <!-- Full-width images -->
            <div class="mySlides fade">
                <img class="slides-images" src="assets/images/img1.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img class="slides-images" src="assets/images/img2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img class="slides-images" src="assets/images/img3.jpg" style="width:100%">
            </div>
        </div>
        <!-- End Slideshow -->
        
        <section class="header-section d-flex justify-content-center align-items-center position-relative overflow-hidden">
            <div class="content position-relative text-center">
                <br><br>
                <h2 class="text-capitalize">bespoke leather<br></h2>
                    <span class="text-lowercase">like never before</span><br><br>
                <a href="#"><button id="shop-now-btn" class="btn btn-outline-light text-uppercase shop-now-btn">Shop Now</button></a>
            </div>
        </section>

    </body>
    
    <!-- Footer -->
        <?php
        include "footer.inc.php";
        ?>
</html>
