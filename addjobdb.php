


<?php

    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginuser.php");
        exit();
    }
    
    $_SESSION['pagerefresh'] = true;
    $currentUserID = $_SESSION['userID'];
    $currentjobID =  $_GET['value'];


    //echo "$currentjobID";
    //print "user id is => $currentUserID";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";
        $conn = new mysqli($servername, $username, $password,$dbname);


        

        



        $sql = "INSERT INTO jobapplication (userID, jobPostingID) VALUES ('$currentUserID','$currentjobID')";

        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            ?> 
            <?php 
                include "././boots_content/globalcdn.inc" ;
                //include("././../includes/php_scripts/script.php");
            ?>

                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Your application was recieved by the employer. </p>
                <hr>
                <p class="mb-0">You can return to your job search by using the button below.</p>
                </div>
            <?php
        } else {
            echo "no";
        }

        mysqli_close($conn);
        
    

?>
<script>

    document.getElementById(window.location.href).readOnly = true;
     
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="home.php"> Return to job search</a>
</body>
</html>