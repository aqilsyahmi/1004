<?=head_template('Login_process')?>
    <body>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                include 'nav.inc.loggedin.php';
            }
            else{
                include 'nav.inc.php';
            }    
        ?>
        
        <?php
        $mem_id = $fname = $lname = $email = $errorMsg = "";
        $success = true;
        $email = sanitize_input($_POST["email"]);
       
        if ($success === true)
        {
           authenticateUser(); 
        }    
        
        if ($success){
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $mem_id;
            $_SESSION["email"] = $email;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
        }
        
        if ($success === true)
        {         
            echo "<h3>Login Successful!</h3>";
            echo "<p>Welcome back $fname $lname! </p>";
            echo "<a class='ReturnToHome' href= 'index.php'> Return To Home Page </a>";
        }
     
        else if ($success === false)
        {
            echo "<h3>Oops!</h3>";
            echo "<h5>Invalid login credentials !<h4>";
            echo "<p class = 'error-message'>" . $errorMsg . "</p>";
            echo "<a class='ReturnToLogin' href= 'login.php'> Return To Sign Up Page </a>";
        }
         
        /*
        * Helper function to authenticate the login.
        */
        function authenticateUser()
        {
            global $mem_id, $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
            // Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
            
            // Check connection
            if ($conn->connect_error)
            {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
                echo "<h4> INTERNAL SERVER ERROR <h4>";
            }
            else
            {
                // Prepare the statement: //EDIT THIS ONCE SERVER UP
                $stmt = $conn->prepare("SELECT * FROM gazette_members WHERE email=?");
                
                // Bind & execute the query statement:
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0)
                {
                // Note that email field is unique, so should only have
                // one row in the result set.
                    $row = $result->fetch_assoc();
                    $mem_id = $row['member_id'];
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $pwd_hashed = $row["password"];
                    // Check if the password matches:
                    if (!password_verify($_POST["password"], $pwd_hashed))
                    {
                        // Don't be too specific with the error message - hackers don't
                        // need to know which one they got right or wrong. :)
                        $errorMsg = "Email not found or password doesn't match...";
                        $success = false;
                    }
                }
                else
                {
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                }
                $stmt->close(); 
            }
            
            $conn->close();
       }
       
            
       
       function sanitize_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
       ?>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>
