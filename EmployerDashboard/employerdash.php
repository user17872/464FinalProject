<?php
    session_start();
    if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
        header("location: ../employerLogin.php");
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
                <li class="active"><a href="#section1">Home</a></li>
                <li><a href="manageJobs.php">Manage Jobs</a></li>
                <li><a href="viewinbox.php">View Inbox</a></li>
                <li><a href="logoutemployer.php">Logout</a></li>
            </ul>
            <br> 

            <p>
                            <?php
                          

                                $empid = $_SESSION['ecompanyid'];

                                echo "<br>";
                                print "Account ID:  ";
                                print_r($_SESSION['ecompanyid']);

                                echo "<br>";
                                print "Company Name:   ";
                                print_r($_SESSION['ecompanyname']);

                                echo "<br>";
                                print_r($_SESSION['ecompanyemail']); 

                                echo "<br>";
                                
                                print_r($_SESSION['ecompanyindustry']);
                                echo "<br>";

                                print_r($_SESSION['ecompanyabout']); 
                            ?>
                        </p>
        </div>

        <div class="col-sm-9"> 
            <div class="container-fluid w-75 shadow">
	            <div class="row">
		            <div class="col-md-12">
			            <div class="jumbotron ">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            + Job
                                            </a>
                                        </h4>
                                    </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <section class="h-100 gradient-form" style="background-color: #eee;">
                                                <div class="container py-5 h-100">
                                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                                        <div class="col-xl-10">
                                                            <div class="card rounded-3 text-black">
                                                                <div class="row g-0">
                                                                    <div class="col-lg-6">
                                                                        <div class="card-body p-md-5 m-5 ">
                                                                            <label class="form-label" for="jobPosition">Position</label>
                                                                            <input class="form-control" type = "text" name = "jobPosition" required placeholder="Senior Database Adminstrator"><br>
                                
                                                                            <label class="form-label" for="jobQualifications">Qualifications</label>
                                                                            <textarea class="form-control" id="" name="jobQualifications" rows="4" cols="50" ></textarea required><br>
                            
                                                                            <label class="form-label" for="jobResponsibilities">Responsibilities</label>
                                                                            <textarea class="form-control" id="" name="jobResponsibilities" rows="4" cols="50" required></textarea><br>

                                                                            <label class="form-label" for="jobBenefits">Benefits</label>
                                                                            <textarea class="form-control" id="" name="jobBenefits" rows="4" cols="50" required></textarea><br>


                                                                            <label class="form-label" for="jobType"> Job Type</label>
                                                                            <br>
                                                                            <input type = "radio" name = "jobType"> In-Person <br>
                                                                            <input type = "radio" name = "jobType"> Remote <br>
                                                                            <input type = "radio" name = "jobType"> Hybrid <br>
                                                                            <br>
                            
                                                                            <label class="form-label" for="jobCompensation"> Compensation</label>
                                                                            <input class="form-control" type = "number" name = "jobCompensation" required> <br>

                                                                            <input type = "submit" name = "jobsubmit" class="btn btn-primary mb-3" value = "Post">
                                                                                <?php

                                                                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                                                        // Something posted                  
                                                                                        if (isset($_POST['jobsubmit'])) {
                                                                                            $servername = "localhost";
                                                                                            $username = "root";
                                                                                            $password = "";
                                                                                            $dbname = "logindb";                                                                                            
                                                                                            $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

                                                                                            $ecompanyid = $_SESSION['ecompanyid'];
                                                                                            $jobPosition = $_POST['jobPosition'];
                                                                                            $jobQualifications = $_POST['jobQualifications'];
                                                                                            $jobResponsibilities = $_POST['jobResponsibilities'];
                                                                                            $jobBenefits = $_POST['jobBenefits'];
                                                                                            $jobType = $_POST['jobType'];
                                                                                            $jobCompensation = $_POST['jobCompensation'];

                                                                                            $sql= "INSERT INTO jobposting(employerID, position, qualifications, responsibilities, benefits, jobType, compensation) VALUES ('$ecompanyid',' $jobPosition',' $jobQualifications','$jobResponsibilities','$jobBenefits',' $jobType ','$jobCompensation')";
                                                                                            mysqli_query($conn, $sql);                                          
                                                                                            mysqli_close($conn);

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
                                            </section>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
		        </div>
	        </div>
        </div>
    </div>
</div>

    
</body>
</html>