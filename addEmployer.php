<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";


$conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);



$employerEmail = $_POST['employerCompanyEmail'];
$employerPassword = $_POST['employerPassword'];
$employername = $_POST['employerCompanyName'];
$employerIndustry = $_POST['employerCompanyIndustry'];
$employerAbout = $_POST['employerAbout'];


$sql = " INSERT INTO employer( employerEmail, employerPassword, employerCompanyName, employerIndustry, employerAbout) 
VALUES ('$employerEmail ','$employerPassword','$employername','$employerIndustry','$employerAbout') ";
    header("location: employerLogin.php?msg");
if (mysqli_query($conn, $sql)) {

} else {
    echo "no";
}
mysqli_close($conn);

// if (mysqli_query($conn, $sql)) {
//     echo "not New record created successfully";
// } else {
//     echo "no";
// }
// mysqli_close($conn);






?>