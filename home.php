<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginuser.php");
        exit();
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
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="userAppliedJobs.php">View My Applications</a></li>
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
                            <script>
                                var p1 = "success";
                                function called(valueof){
                                    alert(valueof);

                                }
                            </script>
                            <nav class="navbar navbar-light bg-light">
                                <a class="navbar-brand"> 
                                    <h4> Welcome, 
                                        <?php
                                            print_r($_SESSION['username']);
                                            print "<br>";

                                            $userIDint = $_SESSION['userID'];
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "logindb";

                                            $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);                                      
                                            $sqluserinfo = "SELECT * FROM userQualifications WHERE userQualificationsID = '$userIDint' ";
                                            $resulta = $conn->query($sqluserinfo);
                                        ?> 
                                    </h4>
                                </a>
                            </nav>
                            <section class="h-100 gradient-form" style="background-color: #eee;">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-xl-10">
                                            <div class="card rounded-3 text-black">
                                                <div class="card-body p-md-5 mx-md-4">
                                                    <div class="col-sm-9"> 
                                                        <div class="container-fluid w-75 shadow">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="jumbotron ">
                                                                        <center> 
                                                                            <form name="form1" action="" method="post">
                                                                                <!-- Form inputs here -->
                                                                                <input type="text" name="nameSearch" class="form-control" required placeholder=" Search for jobs here by Job ID. Ex: Software Engineer"> 
                                                                                <br>
                                                                                <input type="submit" name="submit_form1" value="Search" class="btn btn-primary">
                                                                            </form> 
                                                                        </center>
                                                                        <br>
                                                                            <div class="panel-group" id="accordion">
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                                            View Results
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                                                    <div class="panel-body">
                                                                                        <?php

                                                                                            if(isset($_POST['submit_form1'])) {
                                                                                                $searchID = ($_POST["nameSearch"]);
                                                                                                if($searchID == ""){
                                                                                                    //echo "EMPTY1";
                                                                                                }
                                                                                                //echo $searchID ;
                                                                                                
                                                                                                $beforeStack = array();

                                                                                                $sqlqr = "SELECT * FROM jobapplication where userID = $userIDint "; 
                                                                                                
                                                                                                $resultFoundr = $conn->query($sqlqr);
                                                                                                if ($resultFoundr->num_rows > 0) {
                                                                                                    // output data of each row
                                                                                                    while($row = $resultFoundr->fetch_assoc()) {
                                                                                                        //print $appliedID;

                                                                                                        $appliedID = $row['jobPostingID'];
                                                                                                        array_push($beforeStack,$appliedID);
                                                                                                        //echo "user applied to jobs:".$appliedID;
                                                                                                    }
                                                                                                }
                                                                                                //print "Array is:";
                                                                                                //print_r($beforeStack);


                                                                                                $mysqlQuery = "SELECT * FROM jobposting where position  like '%$searchID%'  ";
                                                                                                //echo $mysqlQuery;
                                                                                                $resultFound = $conn->query($mysqlQuery);

                                                                                                //echo $sqlqr;
                                                                                                if ($resultFound->num_rows > 0) {
                                                                                                    // output data of each row
                                                                                                    while($row = $resultFound->fetch_assoc()) {
                                                                                                        
                                                                                                        $jobPosting_found = $row['jobpostingID'];
                                                                                                        $jobTitle_found = $row['position'];
                                                                                                        $jobQual_found = $row['qualifications'];
                                                                                                        $jobResp_found = $row['responsibilities'];
                                                                                                        $jobBenefit_found = $row['benefits'];
                                                                                                        $jobType_found = $row['jobType'];
                                                                                                        $jobComp_found = $row['compensation'];

                                                                                                        if (in_array($jobPosting_found , $beforeStack)) {
                                                                                                            
                                                                                                            echo "<div class='card' >";
                                                                                                                echo "<h5 class='card-header'>". $row["position"] ."</h5>";
                                                                                                                    echo "<div class='card-body'>";
                                                                                                                    echo "<h5 class='card-title'>". $row['employerCompanyName']."</h5>";
                                                                                                                    echo "<hr>";
                                                                                                                        echo "<br><form method='post'" .
                                                                                                                            // "JobID: " . $row["jobpostingID"] . "<br>" .
                                                                                                                            "<b>Position</b>: " . $row["position"] . "<br><br>" .
                                                                                                                            "<b>Qualifications</b>: " . $row["qualifications"] . "<br><br>" .
                                                                                                                            "<b>Responsibilities</b>: " . $row["responsibilities"] . "<br><br>" .
                                                                                                                            "<b>Benefits</b>: " . $row["benefits"] . "<br><br>" .
                                                                                                                            "<b>Job Type</b>: " . $row["jobType"] . "<br><br>" .
                                                                                                                            "<b>Compensation</b>: " . "$".$row["compensation"] .
                                                                                                                            "<br><br><input type='submit' value='Applied' class='btn btn-primary' onclick='submitForm($searchID)' disabled><br>" .
                                                                                                                            "<input type='hidden' name='jobID' value='$searchID'>" .
                                                                                                                            "</form>";
                                                                                                                    echo "</div>";
                                                                                                                echo "</div>";
                                                                                                            echo"<br>";                                    

                                                                                                            
                                                                                                        }else{

                                                                                                            echo "<div class='card'>";
                                                                                                                echo "<h5 class='card-header'>". $row["position"] ."</h5>";
                                                                                                                    echo "<div class='card-body'>";
                                                                                                                    echo "<h5 class='card-title'>". $row['employerCompanyName']."</h5>";
                                                                                                                    echo "<hr>";
                                                                                                                    echo "<br><form method='post' action = 'addjobdb.php'id='form-$jobPosting_found'>" .
                                                                                                                        "JobID: " . $row["jobpostingID"] . "<br><br>" .
                                                                                                                        "Position: " . $row["position"] . "<br><br>" .
                                                                                                                        "Qualifications: " . $row["qualifications"] . "<br><br>" .
                                                                                                                        "Responsibilities: " . $row["responsibilities"] . "<br><br>" .
                                                                                                                        "Benefits: " . $row["benefits"] . "<br><br>" .
                                                                                                                        "Job Type: " . $row["jobType"] . "<br><br>" .
                                                                                                                        "Compensation: " . $row["compensation"] .
                                                                                                                        //"<br><br><input type='submit' class='btn btn-primary' value='$jobPosting_found' onclick='submitForm($jobPosting_found)'><br>" .
                                                                                                                        "<br><br><button type='submit' class='btn btn-primary' value='$jobPosting_found' onclick='submitForm($jobPosting_found)'>Apply</button>" .
                                                                                                                        "<input type='hidden' name='jobID' value='$jobPosting_found'>" .
                                                                                                                        "</form>";
                                                                                                                    echo "</div>";
                                                                                                                echo "</div>";
                                                                                                            echo"<br>";
                                                                                                        }
                                                                                                    }
                                                                                                } else {
                                                                                                    echo "No jobs Found. Try searching for another position.";
                                                                                                }

                                                                                            }


                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php 

                                                            $servername = "localhost";
                                                            $username = "root";
                                                            $password = "";
                                                            $dbname = "logindb";

                                                            $results_page = 7;

                                                            $userIDint = $_SESSION['userID'];

                                                            $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                                                            
                                                                $sql = "SELECT * FROM jobapplication WHERE userID = $userIDint";
                                                                $result = $conn->query($sql);
                                                                $stack = array();           
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    $number_of_results = mysqli_num_rows($result);
                                                                    while($row = $result->fetch_assoc()) {
                                                                        
                                                                        array_push($stack, $row['jobPostingID']);
                                                                        //print $row['jobPostingID'];
                                                                    }
                                                                } else {
                                                                    //echo "0 results";
                                                                }
                                                        ?>
 
                                                        <center><h3>Recently Posted Jobs</h3><br></center>
                                                        <hr>            
                                                        <?php 
                                                            $servername = "localhost";
                                                            $username = "root";
                                                            $password = "";
                                                            $dbname = "logindb";


                                                            $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                                                            
                                                            
                                                            $results_per_page = 10;

                                                            $sql = "SELECT * FROM jobposting";
                                                            $result = $conn->query($sql);

                                                            //print_r($_SESSION['username']);

                                                            $strUsername = strval($_SESSION['username']);
                                                            $userIDint = $_SESSION['userID'];
                                                            //print "$userIDint";

                                                            //echo " stringversion of username => '$strUsername'";
                                                            //print "<br>";

                                                                //echo "NEW RESULT<br><br><br><br>";
                                                                
                                                            
                                                            if ($result->num_rows > 0) {
                                                                $number_of_results = mysqli_num_rows($result);
                                                            
                                                                $count = 0;
                                                            $jobArray = array();
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                //print ($count += 1);
                                                                $jobID =  $row["jobpostingID"];
                                                                $strjobID = strval($jobID);
                                                            
                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                        
                                                            $number_of_pages = ceil($number_of_results/$results_per_page);
                                                            if(!isset($_GET['page'])){
                                                                $page = 1;
                                                            } else{
                                                                $page = $_GET['page'];
                                                            }

                                                                $this_page_first_result = ($page-1)*$results_per_page;

                                                                $servername = "localhost";
                                                                $username = "root";
                                                                $password = "";
                                                                $dbname = "logindb";

                                                                $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                                                            
                                                                //$sql = "SELECT * FROM jobposting LIMIT 0,10";
                                                                $sql = "SELECT * FROM jobposting inner join employer on jobposting.employerID = employer.employerID LIMIT $this_page_first_result, $results_per_page; ";
                                                                $result = $result = $conn->query($sql);
                                                                $count = 0;
                                                                
                                                                while($row = $result->fetch_assoc()) {
                                                                    //echo $count +=1 ;
                                                                    $jobID =  $row["jobpostingID"];
                                                                    $strjobID = strval($jobID); 
                                                                        if (in_array($jobID, $stack)) { 
                                                                            echo "<div class='card'>";
                                                                                echo "<div class='card-body'>";
                                                                                echo "<form method='post' action='addjobdb.php' id='form-$jobID'>" .
                                                                                    "<b>Position</b>: " . $row["position"] . "<br><br>" .
                                                                                    "<b>Qualifications</b>: " . $row["qualifications"] . "<br><br>" .
                                                                                    "<b>Responsibilities</b>: " . $row["responsibilities"] . "<br><br>" .
                                                                                    "<b>Benefits</b>: " . $row["benefits"] . "<br><br>" .
                                                                                    "<b>Job Type</b>: " . $row["jobType"] . "<br><br>" .
                                                                                    "<b>Compensation</b>: " . "$".$row["compensation"] . "<br><br>" .
                                                                                    "<input type='submit' value='Applied' class='btn btn-primary' onclick='submitForm($jobID)' disabled><br>" .
                                                                                    "<input type='hidden' name='jobID' value='$jobID'>" .
                                                                                    "</form>";
                                                                                echo "</div>";
                                                                            echo "</div>";
                                                                            echo "<br>";
                                                                        } else {                                         
                                                                            echo "<div class='card'>";       
                                                                                echo "<div class='card-body'>";          
                                                                                echo "<form method='post' action='addjobdb.php' id='form-$jobID'>" .
                                                                                    "<b>Position</b>: " . $row["position"] . "<br><br>" .
                                                                                    "<b>Qualifications</b>: " . $row["qualifications"] . "<br><br>" .
                                                                                    "<b>Responsibilities</b>: " . $row["responsibilities"] . "<br><br>" .
                                                                                    "<b>Benefits</b>: " . $row["benefits"] . "<br><br>" .
                                                                                    "<b>Job Type</b>: " . $row["jobType"] . "<br><br>" .
                                                                                    "<b>Compensation</b>: " . "$".$row["compensation"] . "<br><br>" .
                                                                                    "<input type='submit' value='$strjobID' class='btn btn-primary' onclick='submitForm($jobID)'><br>" .
                                                                                    "<input type='hidden' name='jobID' value='$jobID'>" .
                                                                                    "</form>";
                                                                                echo "</div>";
                                                                            echo "</div>";
                                                                            echo "<br>";
                                                                        }
                                                                    echo "</center>";                          
                                                                }
                                                            echo "<center>Page";  
                                                            for($page=1;$page<=$number_of_pages;$page++ ){
                                                                echo '&nbsp <a href = "home.php?page=' . $page.  '" class="btn btn-outline-secondary">'.$page.  '</a>';
                                                            }    
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
		        </div>
	        </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
    function myfunction($id){
        console.log($id); 
    }  
</script>

<script>
function submitForm(jobID) {
    var form = document.getElementById("form-" + jobID);
    form.action = "addjobdb.php?value=" + jobID;
    form.submit();
 
    console.log(jobID);

}
</script>

<?php
//DO NOT MOVE ABOVE
$qualSQL = "INSERT INTO `userQualifications`(`userQualificationsID`, `userDegree`, `userGpa`, `userExperience`, `userCourses`, `userUniversity`, `userAddress`) VALUES ($userIDint,'Your Degree',0.00,'[value-4]','[value-5]','[value-6]','[value-7]');";
$resultsra = $conn->query($qualSQL);    
?>

