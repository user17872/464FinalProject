<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

$conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);


    $username = $_POST['etxtuseremail'];
    $password = $_POST['epswrduserpassword'];

    $sql = "SELECT * FROM `employer` WHERE employerEmail = '$username' and employerPassword = '$password'";
    $result = mysqli_query($conn, $sql);



    $track = mysqli_query($conn, $sql);
    // while($rowtrack = $track->fetch_assoc()) {
    //     $_SESSION['currentEmployerLoggedIn'] = $rowtrack['employerID'];

    // }

    $efollowingdata = $result->fetch_assoc();

    //print_r($efollowingdata['employerID']);


    // Array ( [employerID] => 1 
    //             [employerEmail] => comp@email.com 
    //             [employerPassword] => admin 
    //             [employerCompanyName] => Comp 
    //             [employerIndustry] => ind 
    //             [employerAbout] => about )
    
    if(isset($efollowingdata)){


        session_start();

        $_SESSION["loggedin_emp"] = true;
    
        $emailofcomp = $efollowingdata['employerEmail'];
        $_SESSION['ecompanyemail'] = $efollowingdata['employerEmail'];
        $_SESSION['ecompanyname'] = $efollowingdata['employerCompanyName'];
        $_SESSION['ecompanyindustry'] = $efollowingdata['employerIndustry'];
        $_SESSION['ecompanyabout'] = $efollowingdata['employerAbout'];
        $_SESSION['ecompanyid'] = $efollowingdata['employerID'];
        

        header("Location: EmployerDashboard/employerdash.php");
        exit;
    }else{
        header('Location: employerLogin.php?r');
        //$_SESSION["error"] = "Invalid email or password";
        exit;
        
    }
    



    
?>
