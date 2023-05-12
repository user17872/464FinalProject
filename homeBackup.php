
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprout</title>
</head>
<body>
    
    <script>
    var p1 = "success";
    function called(valueof){
        alert(valueof);

    }

    </script>

    <?php include "././boots_content/globalcdn.inc" ; ?>   
    <h1> Applicant Home</h1>

    <h2> Welcome, 
    <?php

    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginuser.php");
    }
    
    print_r($_SESSION['username']);
    print "<br>";


    $userIDint = $_SESSION['userID'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logindb";

    $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
    
    $sqluserinfo = "SELECT * FROM userQualifications WHERE userQualificationsID = '$userIDint' ";
    //print $sqluserinfo;
    $resulta = $conn->query($sqluserinfo);

        // $sqluserinsert = "INSERT INTO userQualifications (userQualificationsID') VALUES ($userIDint)";
        // print $sqluserinsert;
        // //$conn->query($sqluserinsert);
    
    //print_r($efollowingdata); 

    ?> </h2>
    
    <div style = "text-align: right">
        <p> 
            <a href = "manageProfile.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </p>

        <p> <a href = "userAppliedJobs.php"> View My Applications</a> </p>
        <!-- <p> <a href = "searchJobs.php"> Search for Jobs</a> </p> -->
        <p> <a href = "logout.php"> Logout </a> </p>


    </div>
    
    

    
    <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="card-body p-md-5 mx-md-4">
    

    <div class="accordion " id="accordionExample"> 
    <center> <form name="form1" action="" method="post">
        <!-- Form inputs here -->
        Search for Jobs: &nbsp
        <input type="text" name="nameSearch" class="form-control" required> 
        <input type="submit" name="submit_form1" value="Search" class="btn btn-primary">
    </form> </center>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                View Results
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php

                    if(isset($_POST['submit_form1'])) {
                        $searchID = ($_POST["nameSearch"]);
                        if($searchID == ""){
                            echo "EMPTY1";
                        }
                        echo $searchID ;
                        

                        $mysqlQuery = "SELECT * FROM jobposting where jobpostingID = $searchID; ";
                        $resultFound = $conn->query($mysqlQuery);

                        if ($resultFound->num_rows > 0) {
                            // output data of each row
                            while($row = $resultFound->fetch_assoc()) {
                                
                                $jobTitle_found = $row['position'];
                                $jobQual_found = $row['qualifications'];
                                $jobResp_found = $row['responsibilities'];
                                $jobBenefit_found = $row['benefits'];
                                $jobType_found = $row['jobType'];
                                $jobComp_found = $row['compensation'];

                                print "<b>Title: </b>".$jobTitle_found;
                                print "<br>";
                                print "<b>Qualifications: </b>".$jobQual_found;
                                print "<br>";
                                print "<b>Responsibilities: </b>".$jobResp_found;
                                print "<br>";
                                print "<b>Job Type: </b>".$jobBenefit_found;
                                print "<br>";
                                print "<b>Job Type: </b>".$jobType_found;
                                print "<br>";
                                $number = 1234.56;
                        
                                //echo '$' . number_format($money, 2);

                                echo "<b>Compensation </b>: $".$english_format_number = number_format($jobComp_found);


                                print "<hr>";
                                //print $row['jobPostingID'];
                            }
                        } else {
                            echo "0 results";
                        }

                    }


                        ?>
           
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
            echo "0 results";
        }
        
        
        //print_r($stack);

        

    ?>
    <!-- <form method = "post" action = "">

    <input type = "text" placeholder="Search for jobs">
        <button name = "btnJobSearch"> Search</button>
    </form> -->



                        <center><h3>Recently Posted Jobs</h3><br></center>
                        
                        <?php 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "logindb";


                        $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                        
                        
                        $results_per_page = 10;

                        $sql = "SELECT * FROM jobposting";
                        $result = $result = $conn->query($sql);

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
                                    //echo "<div class='card' style='width: 50%;' >";
                                    echo "<div class='card' >";
                                        echo "<h5 class='card-header'>". $row["position"] ."</h5>";
                                            echo "<div class='card-body'>";
                                            echo "<h5 class='card-title'>". $row['employerCompanyName']."</h5>";
                                                echo "<br><form method='post' action = 'addjobdb.php'id='form-$jobID'>" .
                                                    // "JobID: " . $row["jobpostingID"] . "<br>" .
                                                    "<b>Position</b>: " . $row["position"] . "<br>" .
                                                    "<b>Qualifications</b>: " . $row["qualifications"] . "<br>" .
                                                    "<b>Responsibilities</b>: " . $row["responsibilities"] . "<br>" .
                                                    "<b>Benefits</b>: " . $row["benefits"] . "<br>" .
                                                    "<b>Job Type</b>: " . $row["jobType"] . "<br>" .
                                                    "<b>Compensation</b>: " . "$".$row["compensation"] .
                                                    "<br><input type='submit' value='Applied' class='btn btn-primary' onclick='submitForm($jobID)' disabled><br>" .
                                                    "<input type='hidden' name='jobID' value='$jobID'>" .
                                                    "</form>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo"<br>";
                                }
                                else{
                                    //echo "<div class='card' style='width: 50%;' >";
                                    echo "<div class='card'>";
                                        echo "<h5 class='card-header'>". $row["position"] ."</h5>";
                                            echo "<div class='card-body'>";
                                            echo "<h5 class='card-title'>". $row['employerCompanyName']."</h5>";
                                            echo "<br><form method='post' action = 'addjobdb.php'id='form-$jobID'>" .
                                                "JobID: " . $row["jobpostingID"] . "<br>" .
                                                "Position: " . $row["position"] . "<br>" .
                                                "Qualifications: " . $row["qualifications"] . "<br>" .
                                                "Responsibilities: " . $row["responsibilities"] . "<br>" .
                                                "Benefits: " . $row["benefits"] . "<br>" .
                                                "Job Type: " . $row["jobType"] . "<br>" .
                                                "Compensation: " . $row["compensation"] .
                                                "<br><input type='submit' class='btn btn-primary' value='$strjobID' onclick='submitForm($jobID)'><br>" .
                                                "<input type='hidden' name='jobID' value='$jobID'>" .
                                                "</form>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo"<br>";
                                    
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
</section>

    

 
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
//DO NOT MOVE ABOVE, OR APPLICATION WILL BREAK
$qualSQL = "INSERT INTO `userQualifications`(`userQualificationsID`, `userDegree`, `userGpa`, `userExperience`, `userCourses`, `userUniversity`, `userAddress`) VALUES ($userIDint,'Your Degree',0.00,'[value-4]','[value-5]','[value-6]','[value-7]');";
$resultsra = $conn->query($qualSQL);    
?>





