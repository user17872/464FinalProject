<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "././boots_content/headTAG.inc" ; ?>   
</head>
<body>

<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";


        $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

        $username = sanatize($_POST['txtusername']);
        $useremail = sanatize($_POST['txtuseremail']);
        $userpassord = sanatize($_POST['pswrduserpassword']);



        $sql = "INSERT INTO user (username, useremail, userpassword)
        VALUES ('$username', '$useremail', '$userpassord ')";


        mysqli_query($conn, $sql);

        header('Location: landing.php');
         
        

        mysqli_close($conn);

?>

    
</body>
</html>
