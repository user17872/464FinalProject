<?php

session_start();


$text = "text";

$_SESSION[$text] = false;

if($_SESSION[$text] == true){
    print "true";
}


?>