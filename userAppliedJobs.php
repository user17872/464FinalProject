<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginuser.php");
}else{

    $userIDint = $_SESSION['userID'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "././boots_content/headTAG.inc" ; ?>    
</head>
<body>


<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Applicant Dashboard</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="home.php">Home</a></li>
                    <li class="active" ><a href="userAppliedJobs.php">View My Applications</a></li>
                    <li><a href="manageProfile.php">Manage Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <br> 
        </div>

        <div class="col-sm-9"> 
            <div class="container-fluid w-75 shadow">
	            <div class="row">
		            <div class="col-md-12">
			            <div class="jumbotron ">


    <?php

    $count;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";

        $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

        

        $jobapplicationIDnew = $_POST["$jobapplicationID"];
        $name = $_POST["name"];
        $newname = $_POST["newname"];

        //Forming the new query

        $delteQuery = "DELETE FROM jobapplication WHERE jobapplicationID = $newname  and userID = $userIDint";
        //print $delteQuery;
        $result = $conn->query($delteQuery);

        header("Refresh:0");
    }

    ?>

        <p> 
            <a href = "home.php"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
            </a> 
        </p>
        <h3>Applied Jobs</h3>

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";

        $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

        $sql = "SELECT * from jobapplication inner join jobposting on jobapplication.jobPostingID = jobposting.jobPostingID where userID  = $userIDint";
        $result = $conn->query($sql);
    
        //print_r($result);
        echo "<br>";

        ?>
            <form method="post" action= "<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
        <?php 
            
            while($row = $result->fetch_assoc()) {
            $catch = 0;

            $jobapplicationID = $row['jobapplicationID'];
            $position  = $row['position'];
            $qualifications  = $row['qualifications'];
            $responsibilities  = $row['responsibilities'];
            $benefits  = $row['benefits'];
            $jobType  = $row['jobType'];
            $compensation  = $row['compensation'];
        ?>

        <style>
            p {
            font-size: 14px;
            }
        </style>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo $position ?></h4>
                </div>
                <div class="panel-body">
                    <!-- <p><b>Job ID:</b> <?php echo $jobapplicationID ?></p> -->
                    <p><b>Qualifications:</b> <?php echo $qualifications ?></p>
                    <p><b>Responsibilities:</b> <?php echo $responsibilities ?></p>
                    <p><b>Benefits:</b> <?php echo $benefits ?></p>
                    <p><b>Job Type:</b> <?php echo $jobType ?></p>
                    <p><b>Compensation:</b> <?php echo $compensation ?></p>
                    <button class="btn btn-danger" name="newname" value="<?php echo $jobapplicationID ?>" type="submit">Withdraw</button>
                </div>
            </div>

        <?php
            } 
        ?>

        <?php 
            if($catch != 0) {
                echo "You have not applied to any jobs";
            } 
        ?>


            
                <!-- <input type="text" name="name"> -->
                <!-- <input type="submit" name="submit" value="Withdraw">
            </form> -->

            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        

    </div>
</div>

</body>
</html>
