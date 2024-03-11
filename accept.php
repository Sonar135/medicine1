<?php

ob_start();
session_start();
include 'connect.php';
if(isset($_SESSION["id"])){
  $email=$_SESSION['email'];
  $user_type=$_SESSION['user_type'];
  $user_name=$_SESSION['name'];


   if($user_type=="patient"){
    $patientID=$_SESSION['patient_id'];
   }


   if($user_type=="doctor"){
    $doctorID=$_SESSION['doctor_id'];
   }

}

    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }




    $update=mysqli_query($conn, "UPDATE appointments set status='approved', consulting_doc='$doctorID' where id='$id'");

    if($update){
        header("location: doctor_appointments.php?confirmed");
    }

?>