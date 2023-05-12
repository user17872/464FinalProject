<?php

session_start();

if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
    header("location: ../employerLogin.php");
}

$empid = $_SESSION['ecompanyid'];
$currentjob = $_GET['jobvaldel'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";


$conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

$sql = "DELETE FROM jobposting WHERE employerID = '$empid ' and jobpostingID = '$currentjob'";
$result = $result = $conn->query($sql);


header('Location: manageJobs.php');
exit;

?>