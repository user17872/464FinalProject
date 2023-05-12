<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";



$conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);


    $username = $_POST['ltxtuseremail'];
    $password = $_POST['lpswrduserpassword'];
    $sql = "SELECT * FROM `user` WHERE useremail = '$username' and userpassword = '$password'";
    $result = mysqli_query($conn, $sql);

    $followingdata = $result->fetch_assoc();

    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo "<br>". "Position: " . $row["position"]. "<br>"." Qualifications: ". $row["qualifications"].  "<br>" ." Responsibilities: ". $row["responsibilities"].  "<br>"." Benefits: ". $row["benefits"].  "<br>"."Job Type: " . $row["jobType"].  "<br>" ."Compensation: " . $row["compensation"]. "<br>";
                    }
                  } else {
                    echo "0 results";
                  }

    //$row = implode(mysqli_fetch_assoc($result));

    if(isset($followingdata)){
        session_start();
        $_SESSION['username'] = $followingdata['username'];
        $_SESSION['userID'] = $followingdata['id'];
        $_SESSION["loggedin"] = true;
        header("Location: home.php");
        exit;
    }else{
        header("Location: loginuser.php?r");
        exit;
    }

?>

