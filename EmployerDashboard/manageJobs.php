<?php
session_start();
    if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
        header("location: ../employerLogin.php");
    }


    session_start();
    //echo $_SESSION['refreshmypage'];
    $myrefresh = $_SESSION['refreshmypage'];

    if($myrefresh == 1){
        header("Refresh:0");
    }

    unset($_SESSION['refreshmypage']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../boots_content/headTAG.inc';?>
</head>
<body onload="myFunctionta()"  >
    
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Employer Dashboard</h4>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="employerdash.php">Home</a></li>
                <li class="active" ><a href="manageJobs.php">Manage Jobs</a></li>
                <li><a href="viewinbox.php">View Inbox</a></li>
                <li><a href="logoutemployer.php">Logout</a></li>
            </ul>
            <br> 
        </div>
    <!-- <p> 
        <a href = "employerdash.php"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
        </a> 
    </p> -->

    <div class="col-sm-9"> 
            <div class="container-fluid w-75 shadow">
	            <div class="row">
		            <div class="col-md-12">
			            <div class="jumbotron ">


                            <h2> Manage Jobs </h2>
                            <p> Select the job you wish to edit </p>
                        


    
    
    
    <!-- <center>
    <table>
        <tr>
            <td class = "border" width = 50% > -->

            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                <?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Connect failed: %s\n". $conn -> error);

$empid = $_SESSION['ecompanyid'];
$sql = "SELECT * FROM jobposting where employerID = '$empid' ";
$result = $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $count = 0;
    while($row = $result->fetch_assoc()) {
        $count +=1 ;
        $jobval = $row['jobpostingID'];
        $accordionjbID = $row["position"];
?>
        
        <div class="card">
            <div class="card-header" id="heading<?php echo $jobval; ?>">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $jobval; ?>" aria-expanded="false" aria-controls="collapse<?php echo $jobval; ?>">
                        <?php echo $row["position"]; ?>
                    </button>
                </h2>
            </div>
            <div id="collapse<?php echo $jobval; ?>" class="collapse" aria-labelledby="heading<?php echo $jobval; ?>" data-parent="#accordion">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Qualifications:</strong> <?php echo $row["qualifications"]; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Responsibilities:</strong> <?php echo $row["responsibilities"]; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Benefits:</strong> <?php echo $row["benefits"]; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Job Type:</strong> <?php echo $row["jobType"]; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Compensation:</strong> <?php echo $row["compensation"]; ?>
                        </li>
                    </ul>
                    <div class="text-right">
                        <input hidden type="text" id="<?php echo $jobval; ?>" name="jobPosition" value="<?php echo $jobval; ?>">
                        <input hidden type="text" id="<?php echo $row["position"]; ?>" name="jobPosition" value="<?php echo $row["position"]; ?>">


                        
                        
                        

                            <!-- Do not add button into form. It will act like a delete button otherwise. -->
                            <button class="btn btn-primary" onclick="myFunctionnew(<?php echo $jobval; ?>)">Edit</button>
                            
                            <form method="post" action="delete.php?jobvaldel=<?php echo $jobval; ?>" class="d-inline">
                                <input type="submit" name="delete" value="Delete" onclick="myFunctionconfirm(<?php echo $jobval; ?>)" class="btn btn-danger">
                            </form>
                        
                        
                        
                    </div>
                </div>

            </div>
        </div>
        <?php

        if($count <= ($result->num_rows - 1)){
            echo "<hr>";
        }

        ?>


        
<?php
    }
} else {
    echo "You have not posted a job yet";
}
?>

                                </div>
            </div>
            
            <!-- </td>
            <td class = "border">
                <p >  Each buttons information will go here using ajax</p>
            </td>
        </tr>
    </table>
                    </center> -->

<script>
function myFunction(jobval) {
    console.log(jobval);
  var x = document.getElementById(jobval);
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }


}

function myFunctionta(jobval){

    //Code that works for ids 5 and 6
    // var x = document.getElementById(5);
    // x.style.visibility = 'hidden';

    // var x = document.getElementById(6);
    // x.style.visibility = 'hidden';


    //code taht does not work for all input types
    var inputs = document.getElementsByTagName('input');

    for(var i = 0; i < inputs.length; i++) {
    if(inputs[i].type.toLowerCase() == 'text') {
        inputs[i].style.visibility = 'hidden';
    }
}
  
}


function myFunctionnew(jobval){
    console.log(jobval);
    window.open(
            "deletejob.php?jobval="+jobval);
}

function myFunctionconfirm(jobval) {
    var a = jobval;
    var b = jobval;
    var c = ("" + a + b);
    //console.log(c);

    let text = "Are you sure you want to delete the job? You will not be able to undo this.\nPress OK to confirm.";
    if (confirm(text) == true) {
        var t = <?php echo 5; ?>;
        console.log(t);
        location.reload();
    } else {
        text = "";
    }
    document.getElementById(c).innerHTML = text;
}


</script>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
</div>
</body>
</html>

