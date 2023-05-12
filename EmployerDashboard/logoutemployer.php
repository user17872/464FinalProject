<?php
    session_start();
 


    $_SESSION["loggedin_emp"] = false;

    //$_SESSION['ecompanyemail'] = "";
    $_SESSION['ecompanyname'] = "";
    $_SESSION['ecompanyindustry'] = "";
    $_SESSION['ecompanyabout'] = "";
    $_SESSION['ecompanyid'] = -1;


    


    header("Location: ../landing.php");
    exit;
?>