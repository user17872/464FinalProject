<!DOCTYPE html>
<html lang="en">
<head>

<?php include "../boots_content/headTAG.inc"; ?>   
</head>
<body>
    <h1> Edit or Delete the job posting</h1>
       

    <div class="col-sm-9"> 
        <div class="container-fluid w-75 shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron ">
                        <?php

                            session_start();
                            if(!isset($_SESSION["loggedin_emp"]) || $_SESSION["loggedin_emp"] !== true){
                                header("location: ../employerLogin.php");
                            }
                            
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $name = $_POST["name"];
                                $jobQual = $_POST["jobQual"];
                                $jobResp = $_POST["jobResp"];
                                $jobBene = $_POST["jobBene"];
                                $jobType = $_POST["jobType"];
                                $jobComp = $_POST["jobComp"];
                                }
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "logindb";
                        
                            $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
                        
                            $empid = $_SESSION['ecompanyid'];
                            $jobval = htmlspecialchars($_GET["jobval"]);


                            $sql = "SELECT * FROM jobposting WHERE employerID = '$empid' and jobpostingID = '$jobval' ";
                            $result = $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                            
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $currentjobname = $row['position'];

                                    ?> 
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                        <!-- <input type="text" name="name" placeholder="<?php echo $currentjobname;?>"> -->

                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">

                                        <p> Job position: <input type="text" name="name" value ="<?php echo $row['position']; ?>"></p>
                                        <p> Qualifications: <input type="text" name="jobQual" value="<?php echo $row['qualifications']; ?>"></p>
                                        <p> Responsibilities: <input type="text" name="jobResp" value="<?php echo $row['responsibilities']; ?>"></p>
                                        <p> Benefits: <input type="text" name="jobBene" value="<?php echo $row['benefits']; ?>"></p>
                                        <p> Job Type: <input type="text" name="jobType" value="<?php echo $row['jobType']; ?>"></p>
                                        <p> compensation: <input type="text" name="jobComp" value="<?php echo $row['compensation']; ?>"></p>

                                        <button type="submit" name="submit"  class="btn btn-primary" onClick = 'refParent()'>Save & Return</button>

                                    </form>                 
                                    <?php

                                    $updateSql = "UPDATE jobposting SET position='$name',
                                                                        qualifications='$jobQual',
                                                                        responsibilities='$jobResp',
                                                                        benefits='$jobBene',
                                                                        jobType='$jobType',
                                                                        compensation='$jobComp' WHERE employerID='$empid ' and jobpostingID='$jobval' ";

                                    $result = $conn->query($updateSql);
                                    if(isset($result)){
                                            session_start();
                                            $_SESSION['refreshmypage'] = 1;
                                    }
                                    echo "Changes saved. You may close this tab.";

                                    echo "<button onClick = 'refParent()'; > Return</button>";
                                    echo "<script>

                                        function refreshCurrent(){
                                            location.reload();
                                        }
                            
                                        function refParent(){
                                            window.opener.location.reload(); 
                                            window.close();
                                        }
                                    </script>";
                                }
                            }      
                        ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body> 
    
</html>