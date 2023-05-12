<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginuser.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Jobs</title>
    <?php include "././boots_content/globalcdn.inc" ; ?>  
</head>
<body>
    <h1>Search for jobs</h1>
    
</body>
</html>

