<?=head_template('Registration_process')?>
    
    <body class = "process_account_background">
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            include 'nav.inc.loggedin.php';
        }
        else{
            include 'nav.inc.php';
        }
    ?>
    <?php
    $fname = $lname = $email = $errorMsg = "";
    $success = True;

    if (empty($_POST["email"]))
    {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    }

    if (empty($_POST["lname"]))
    {
        $errorMsg .="Last name is required. <br>";
        $success = false;
    }

    if (empty($_POST["pwd"]))
    {
        $errorMsg .="Password is required. <br>";
        $success = false;
    }

    if (empty($_POST["pwd_confirm"]))
    {
        $errorMsg .="Please confirm your password. <br>";
        $success = false;
    }

    if ($_POST["pwd"] != $_POST["pwd_confirm"])
    {
        $errorMsg .="Passwords do not match";
        $success = false;
    }

    else
    {
        if (!empty($_POST["fname"]))
        {
            $fname = sanitize_input($_POST["fname"]);
        }
        $email = sanitize_input($_POST["email"]);
        $lname = sanitize_input($_POST["lname"]);
        $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        $pwd_hashed_confirmed = password_hash($_POST["pwd_confirm"], PASSWORD_DEFAULT);
        // Additional check to make sure e-mail address is well-formed.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMsg .= "Invalid email format.";
            $success = false;
        }
    }
    
    if (!empty($_POST["pwd"]) && ($_POST["pwd"] == $_POST["pwd_confirm"])){
        $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
    }
    elseif (!empty($_POST["pwd"])){
        $errorMsg .= "Passwords do not match.<br>";
        $success = false;
    }
    else{
        $errorMsg .= "Password is required.<br>";
        $success = false;
    }

    if($success){
        saveMemberToDB();
    }
    
    function saveMemberToDB(){
        global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;

        $config = parse_ini_file('../../private/db-config.ini');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

        if  ($conn->connect_error){
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        }
        else{
            $stmt = $conn->prepare("INSERT INTO gazette_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
            if (!$stmt->execute()){
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                $success = false;
            }
            $stmt->close();
        }

        $conn->close();
    }      
   
    if ($success)
    {
        
        echo "<main class='container' id='process_account_succeed'>";
        echo "<div class = 'create_account_header'>";
        echo "<i class='material-icons' id = 'process_account_icon'>check_circle</i>";
        echo "<h5 class = 'account_creation_output'> Woohoo! Your account registration was successful!</h5>";
        echo "<h4 class = 'account_creation_output'> Welcome to the GAZETTE family, $fname $lname!</h4>";
        echo "<p class = 'account_creation_output'> Hurry, log in and start shopping now. Our products are selling out fast! We hope you will enjoy your shopping experience!'</p>";
        echo "<a class = 'button ReturnToLogin'href='index.php?page=login'>Login</a>";
        echo "</main>";
    }

    else
    {
        echo "<main class='container' id='process_account_failed'>";
        echo "<div class = 'create_account_header'>";
        echo "<i class='material-icons' id = 'process_account_icon'>error_outline</i>";
        echo "<h5 class ='account_creation_output'> Oh no ! Your account registration was unsuccessful!</h5>";
        echo "<h4 class = 'account_creation_output'> Hmm.. it seems like the following errors were detected: </h4>";
        echo "<p class = 'error-message'>" . $errorMsg . "</p>";
        echo"<p class ='account_creation_output'> Don't worry, click below to return to account registration page!</p>";
        echo "</div>";
        echo "<a class = 'ReturnToSignUp' href= 'index.php?page=create_account'> Return To Sign Up Page </a>";
        echo "</main>";
    }
    //Helper function that checks input for malicious or unwanted content.
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    </body>
    
    <?php
    include "footer.inc.php";
    ?>
</html>

    
    
