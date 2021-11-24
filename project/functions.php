<?php
function connect_mysql(){
    $config = parse_ini_file('../../private/db-config.ini');
    //$conn = new mysqli($config['servername'], $config['username'],$config['password'], $config['dbname']);
    
    try {
    	return new PDO('mysql:host=' . $config['servername'] . ';dbname=' . $config['dbname'] . ';charset=utf8', $config['username'], $config['password']);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	echo 'Failed to connect to database!' . $exception->getMessage();
    }
    /*
    if  ($conn->connect_error){
        exit("Failed to connect to database.");
    }else{
        return $conn;
    }*/
}

function head_template($title){
    echo <<<EOF
    <!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet"
                  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                  integrity=
                  "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                  crossorigin="anonymous">

            <link rel="stylesheet" href="assets/css/main.css">

            <!--jQuery-->
            <script defer
                    src="https://code.jquery.com/jquery-3.4.1.min.js"
                    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                    crossorigin="anonymous">
            </script>


            <!--Bootstrap JS-->
            <script defer
                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                    crossorigin="anonymous">
            </script>


            <!-- Custom JS -->
            <script defer src="assets/js/main.js"></script>

            <title>$title</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
    EOF;
}

?>