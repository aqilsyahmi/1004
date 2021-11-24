<?=head_template('Login')?>
    
<body class = "login_background">
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            include 'nav.inc.loggedin.php';
        }
        else{
            include 'nav.inc.php';
        }
    ?>
     <main class="login_container" id="Register">
        <div class = "login_box">
        <i class="material-icons" id = "login_icon">login</i>
        <div class = "text-box">
        <p class ="login_text">    
            Existing members log in here. For new members please sign up via
            <a href="index.php?page=create_account">Sign Up page</a>.
        </p>
        </div>
        <form action="index.php?page=process_login" method="POST"> <!-- action = where to send forms to -->
            <div class="form-group">
                <label for="email">Email / Username:</label>
                <input  type ="email" class="form-control" type="text" id="email" required
                       name="email" placeholder="Enter email or username">
            </div>

            <div class = "form-group">
                <label for="password">Password:</label>
                <input type = "password" class="form-control" type="text" id="password" required
                       maxlength="45" name="password" placeholder="Enter password" >
            </div>

            <div class = "form-group">
                <button class="button button1" type="submit"><span>Login</span></button>             
            </div>
        </form>
       </div>
    </main>
</body>

    <?php
    include "footer.inc.php";
    ?>
    
</html>
