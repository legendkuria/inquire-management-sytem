<?php


function getNumOfInquiries(){
   include ("include/config.php");
    $result = mysqli_query($con, "SELECT * from inquiries");

    return mysqli_num_rows($result);
}


function getNumOfStudents(){
    include ("include/config.php");
     $result = mysqli_query($con, "SELECT * from register");
 
     return mysqli_num_rows($result);
 }
 function getNumOfNotProcessed(){
    include ("include/config.php");
     $result = mysqli_query($con, "SELECT * FROM inquiries where status is null");
 
     return mysqli_num_rows($result);
 }
 function getNumOfInProcess(){
    include ("include/config.php");
    $status = "in Process";
     $result = mysqli_query($con, "SELECT * FROM inquiries where status='$status'");
 
     return mysqli_num_rows($result);
 }
 function getNumOfClosed(){
    include ("include/config.php");
    $status = "closed";
     $result = mysqli_query($con, "SELECT * FROM inquiries where status='$status'");
 
     return mysqli_num_rows($result);
 }
 
?>