<?php
 
 session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: loginuser.php");
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <?php include "././boots_content/globalcdn.inc" ; ?>   
</head>
<body>
    <?php

        $userIDint = $_SESSION['userID'];
     
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";
        $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

        $sql = "SELECT * FROM userQualifications WHERE userQualificationsID = $userIDint";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          $userDegree = $row["userDegree"];
          $userGpa = $row["userGpa"];
          $userExperience = $row["userExperience"];

          $userCourses = $row["userCourses"];
          $userUniversity = $row["userUniversity"];
          $userAddress = $row["userAddress"];
        }
      } else {
        echo "0 results";
      }

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $userDegree= $_POST["degree"];
        $userGpa = $_POST["gpa"];
        $userExperience = $_POST["experience"];
        $userCourses = $_POST["courses"];
        $userUniversity = $_POST["university"];
        $userAddress = $_POST["address"];
    }
?> 

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">   
                    <div class="card-body p-md-5 mx-md-4">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                            <p> 
                                <a href = "home.php"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </a> 
                            </p>
                            <h1> Account Details</h1>
                                  
                            <label class="form-label" for="degree">Degree Earned:</label>
                            <input type = "text" name = "degree"  class="form-control" value = "<?php echo $userDegree; ?>">
                                                                          
                            <label class="form-label" for="gpa">Cumulative GPA:</label>
                            <input type = "text" name = "gpa" class="form-control" value = "<?php echo $userGpa; ?>">
                                                                 
                            <label class="form-label" for="university">College Attended:</label>
                            <input type = "text" name = "university" class="form-control" value = "<?php echo $userUniversity; ?>">
                                                               
                            <label for="courses">Overview of Experience:</label>
                            <textarea class="form-control" id="experience" name="experience" rows="4" cols="50">
                                <?php echo $userExperience; ?>
                            </textarea>
                            <br>
                                                                      
                            <label for="courses">Courses Taken:</label>
                            <textarea class="form-control" id="courses" name="courses" rows="4" cols="50">
                                <?php echo $userCourses; ?>
                            </textarea>
                            <br>
                                                                                              
                            <label class="form-label" for="address">Zip Code:</label>
                            <input type = "number" name = "address" class="form-control" value = "<?php echo $userAddress; ?>">
                            <br>                             
                            <center> <input type="submit" name="submit" value="Save" class="btn btn-primary" ></center>                                          
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>

<?php

        // echo "<h2>Your Input:</h2>";
        // echo $userDegree;
        // echo $userGpa;
        // echo $userExperience;       
        // echo "<br>";
        $updateSql = "UPDATE userQualifications SET userDegree ='$userDegree',userGpa = $userGpa, userExperience = '$userExperience', userCourses = '$userCourses', userUniversity = '$userUniversity', userAddress = '$userAddress' WHERE userQualificationsID = $userIDint";
        
        //print $updateSql;
        $result = $conn->query($updateSql);
          
    ?>



</body>
</html>
