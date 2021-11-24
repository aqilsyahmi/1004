<?=head_template('GAZETTE - About Us')?>

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

    <!-- Top Image --> 
    <div class="about-us-image-container">
        <!-- Full-width images with number and caption text -->
        <div class="quality-slide">
            <img class="quality-slide-img" src="assets/images/quality.jpg" style="width:100%">
<!--            <h1 class="about-us-image-header">quality<br></h1>
                <h2 class="about-us-image-lower">you can trust</h2><br><br>-->
        </div>
    </div>
    <!-- close -->

    <div class="container position-relative item-containers" id="about-history">
        <h1 class="about-history" style="text-align: center;font-size: 56px;">Our History</h1><br>
        <h2 class="about-history-starter" style="text-align: center;"><b>Chasing Leather Perfection since 2008</b></h2>
        <p class="about-history-para">We set up shop in 2008 with a simple vision. Craft leather goods that we'd be proud of.
            Family owned and operated, we've had the experience creating and selling premium leather goods online for more than 12 years. 
            Our journey started off with belts, and as interest grew, we began to explore wallets and eventually bags.
            And now, we hope to have the chance to prove we are one of the best to you! We are
            always here for you.</p>
    </div>

    <div class="container position-relative item-containers" id="about-ethos">
        <h1 class="about-ethos" style="text-align: center;font-size: 56px;">Our Ethos</h1><br>
        <!--        <h2><b>Quality you can Trust. Since 1969</b> </h2>
                <p class="para">Family owned and operated, we've had the experience of selling die cast models online for more than 2 years. We are
                    proud to announce becoming 2021 Dealer Of The Year.</p>-->
    </div>

    <div class="ethos-style-master">
        <div class="ethos-wrap-style-top container">
            <div class="ethos-wrap-style row" align ="center">
                <div class="ethos-wrap-columns col-sm">
                    <img class="ethos-images" src="assets/images/experience.png" >
                    <h2 class="ethos-caption-title"> Exquisite Craftsmanship </h2>
                    <p class="ethos-caption-para"> Our skilled craftsmen feature a combined total of 21 years of experience, ensuring your product
                        is crafted with the finest workmanship and and with the greatest attention to detail.</p>
                </div>
                <div class="ethos-wrap-columns col-sm">
                    <img class="ethos-images" src="assets/images/quality.png" >
                    <h2 class="ethos-caption-title"> The Highest of Quality </h2>
                    <p class="ethos-caption-para"> All leather used in our products are of the highest grade and are
                        subject to as little treatment as possible for the most authentic and premium leather feel money can buy.</p>
                </div>
                <div class="ethos-wrap-columns col-sm">
                    <img class="ethos-images" src="assets/images/sustain.png" >
                    <h2 class="ethos-caption-title"> Sustainability </h2>
                    <p class="ethos-caption-para"> We've made it a point to ensure all leather used in our products come from sustainable and
                        free range farms. <br> As of 2017, we've also gone completely carbon neutral and intend to stay so for the foreseeable future</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.inc.php";
    ?>

</body>