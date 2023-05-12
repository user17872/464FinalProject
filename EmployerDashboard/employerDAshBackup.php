<?php

session_start();
    if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
        header("location: ../employerLogin.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>

    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     -->
    
    <?php include "../boots_content/globalcdn.inc" ; ?>  
    
    <div class="container-fluid w-75 shadow">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron ">

    <h1> Employer Dashboard</h1>
    <a href="manageJobs.php">Manage Jobs</a>
    <a href="viewinbox.php">View Inbox</a>
    <div class="accordion w-10 p-3 float-end" id="accordionExample" >
        <div class="accordion-item ">


            <h2 class="accordion-header" id="headingOne">
                
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Account Details
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse w-10 p-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>
                        <?php
                            session_start();

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
                    <div style = "text-align: right">
                        <p> <a href = "logoutemployer.php"> Logout </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2> Welcome, <?php print_r($_SESSION['ecompanyname']);  ?> </h2>
    <br>
    <h3>Jobs Posted</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                 + Job
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <section class="h-100 gradient-form " style="background-color: #eee;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-xl-10">
                                    <div class="card rounded-3 text-black">
                                    <div class="row g-0">
                                        <div class="col-lg-6">
                                        <div class="card-body p-md-5 mx-md-4">

                            
                                <label class="form-label" for="jobPosition">Position</label>
                                <input class="form-control" type = "text" name = "jobPosition" required placeholder="Senior Database Adminstrator"><br>
                                

                                <label class="form-label" for="jobQualifications">Qualifications</label>
                                <textarea class="form-control" id="" name="jobQualifications" rows="4" cols="50" ></textarea required><br>
                                


                              
                                <label class="form-label" for="jobResponsibilities">Responsibilities</label>
                                <textarea class="form-control" id="" name="jobResponsibilities" rows="4" cols="50" required></textarea><br>

                                
                                <label class="form-label" for="jobBenefits">Benefits</label>
                                <textarea class="form-control" id="" name="jobBenefits" rows="4" cols="50" required></textarea><br>

                                Job Type: <br>
                                <!-- <input type = "text" name = "jobType" required ><br> -->


                                <input type = "radio" name = "jobType"> In-Person <br>
                                <input type = "radio" name = "jobType"> Remote <br>
                                <input type = "radio" name = "jobType"> Hybrid <br>
                               

                                Compensation:<br>
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
  


    
</body>
</html>