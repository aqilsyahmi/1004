<?=head_template('Registration')?>
    
    <body class = "create_account_background">
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                include 'nav.inc.loggedin.php';
            }
            else{
                include 'nav.inc.php';
            }
        ?>
           <main class="container" id="create_account">
            <form action="index.php?page=process_account_creation" method="POST">
                <div class = "create_account_header">
                <i class="material-icons" id = "register_icon">person_outline</i>
                    <div class ="text-box">
                        <h5>Create a new GAZETTE account<h5>
                        <p>For existing members, please login <a href="index.php?page=login"> here.</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname"
                           name="fname" placeholder="Enter first name">
                </div>

                <div class = "form-group">
                    <label for="lname">Last Name:</label>
                    <input class="form-control" type="text" id="lname" required
                           maxlength="45" name="lname" placeholder="Enter last name">
                </div>

                <div class = "form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" required
                           name="email" placeholder="email@example.com" type="email">
                </div>

                <div class = "form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd" required
                           minlength="8" name="pwd" placeholder="Enter password" type="password">
                </div>

                <div class = "form-group">
                    <label for="pwd_confirm">Confirm Password:</label>
                    <input class="form-control" type="password" id="pwd_confirm" required
                           minlength="8" name="pwd_confirm" placeholder="Confirm password">
                </div>

                <div class = "form-check">
                    <label>
                        <input type="checkbox" name="tos" required>
                        By creating an account you agree to our<button class ="btn btn-link" onclick = "togglePopup()">Terms & Conditions</button>
                    </label>
                </div>
               
                <!-- Terms and conditions overlay -->
                <div class ="popup" id ="terms_and_conditions">
                    <div class ="overlay" onclick = "togglePopup()"></div>
                    <div class = "content">
                    <div class ="close-btn" onclick = "togglePopup()">&times;</div>
                    <!-- Mock TOS generated from www.termsofusegenerator.com-->
                    <h2>Website Terms of Use</h2>
                    <p class = "tos">Version 1.0</p>
                    <p class = "tos">The Gazette Leather website located at www.gazetteleather.com is a copyrighted work belonging to Gazette Leather. Certain features of the Site may be subject to additional guidelines, terms, or rules, which will be posted on the Site in connection with such features.</p>
                    <p class = "tos">All such additional terms, guidelines, and rules are incorporated by reference into these Terms.</p>
                    <p class = "tos">These Terms of Use described the legally binding terms and conditions that oversee your use of the Site. BY LOGGING INTO THE SITE, YOU ARE BEING COMPLIANT THAT THESE TERMS and you represent that you have the authority and capacity to enter into these Terms. YOU SHOULD BE AT LEAST 18 YEARS OF AGE TO ACCESS THE SITE. IF YOU DISAGREE WITH ALL OF THE PROVISION OF THESE TERMS, DO NOT LOG INTO AND/OR USE THE SITE.<p>
                    <p class = "tos">These terms require the use of arbitration Section 10.2 on an individual basis to resolve disputes and also limit the remedies available to you in the event of a dispute. These Terms of Use were created with the help of the <a href="https://www.termsofusegenerator.net">Terms Of Use Generator</a>.</p>
                    <p class = "tos"><strong>No Support or Maintenance.</strong> You agree that Company will have no obligation to provide you with any support in connection with the Site.</p>
                    </div>
                </div>
                <div class = "form-group">
                    <button class="button button1" type="submit">Create Account</button>                   
                </div>
            </form>
       </main>   
    </body>
    <?php
    include "footer.inc.php";
    ?>
</html>