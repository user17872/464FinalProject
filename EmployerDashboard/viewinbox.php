
<?php
    session_start();
    if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
        header("location: loginuser.php");
    }else{
        $userIDint = $_SESSION['userID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../boots_content/headTAG.inc';?>
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>Employer Dashboard</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="employerDash.php">Home</a></li>
                    <li><a href="manageJobs.php">Manage Jobs</a></li>
                    <li class="active"><a href="viewinbox.php">View Inbox</a></li>
                    <li><a href="logoutemployer.php">Logout</a></li>
                </ul>
                <br> 
            </div>

            <div class="col-sm-9"> 
                <div class="container-fluid w-75 shadow">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron ">
                                <a href = "employerdash.php"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </a> 

                                <h3> Applicants</h3>
                                <?php 

                            
                                    session_start();
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "logindb";
                                
                                    $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                                
                                    $empid = $_SESSION['ecompanyid'];
                                    $sql = "SELECT * FROM jobposting where employerID = '$empid' ";
                                    $result = $result = $conn->query($sql);
                                    
                                    $empid = $_SESSION['ecompanyid'];
                                    if ($result->num_rows > 0) {     
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $jobval = $row['jobpostingID'];

                                                echo "<hr>";
                                                //echo "<br>" . $jobval;
                                                echo "<br>" . "<b>Position: " . $row["position"]."</b>";
                                                                                            
                                                //echo $row["position"]. "<br>"." Qualifications: ". $row["qualifications"].  "<br>" ." Responsibilities: ". $row["responsibilities"].  "<br>"." Benefits: ". $row["benefits"].  "<br>"."Job Type: " . $row["jobType"].  "<br>" ."Compensation: " . $row["compensation"]. "<br><br>";
                                                //echo "<button name = >View Applicants for this job</button>";

                                                $newsql = "SELECT * FROM jobapplication inner join jobposting on jobapplication.jobPostingID = jobposting.jobpostingID inner join user on jobapplication.userID = user.id inner join userQualifications on user.id = userQualifications.userQualificationsID where employerID = $empid and jobposting.jobpostingID = $jobval ";
                                                //echo $newsql;
                                                $newresult = $conn->query($newsql);
                                                while($rowtw = $newresult->fetch_assoc()) {

                                                    $applicantEmail = $rowtw['useremail'];
                                                    $applicantDegree = $rowtw['userDegree'];
                                                    $applicantGPA= $rowtw['userGpa'];
                                                    $applicantExperience = $rowtw['userExperience'];
                                                    $applicantCourses = $rowtw['userCourses'];
                                                    $applicantUniversity= $rowtw['userUniversity'];

                                                    ?>
                                                        <table class="table border">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">E-mail</th>
                                                            <th scope="col">Degree</th>
                                                            <th scope="col">GPA</th>
                                                            <th scope="col">Experience</th>
                                                            <th scope="col">Courses</th>
                                                            <th scope="col">University</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $applicantEmail ?></td>
                                                                <td><?php echo $applicantDegree ?></td>
                                                                <td><?php echo $applicantGPA ?></td>
                                                                <td><?php echo $applicantExperience ?></td>
                                                                <td><?php echo $applicantCourses ?></td>
                                                                <td><?php echo $applicantUniversity ?></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                <?php
                                                }
                                        }
                                    }else{
                                        echo "No Records found";
                                    }

                                    $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>