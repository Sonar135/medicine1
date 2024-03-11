<?php
    include "header.php";
?>


<?php
$patients="";

    $get=mysqli_query($conn, "SELECT * from patients");

    if(mysqli_num_rows($get)<1){
        $patients='<h1>no patients registered</h1>';
    }

   while($row=mysqli_fetch_assoc($get)){

    $name=$row["name"];
    $dob=$row["date_birth"];
    $gender=$row["gender"];
    $nationality=$row["nationality"];
    $med_hist=$row["medical_history"];
    $dobObject = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObject)->y;
    $pat_id=$row["patient_id"];


    $patients.='
    <div class="doctor_card">
    <div class="doctor_photo">

    </div>

    <div class="ne">
        <h3>id:</h3>

        <h3>'.$pat_id.'</h3>

    </div>

    <div class="ne">
        <h3>name:</h3>

        <h3 id="name">'.$name.'</h3>


    </div>

    <div class="ne">
        <h3>age:</h3>

        <h3> '.$age.'</h3>

    </div>

  <a href="account.php?pat='.$pat_id.'"> <button>See Profile</button></a> 
</div>
    ';


   }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/doctors.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
                <div class="welcome_cont">
                <h1>Registered Patients</h1>
                <span></span>
               
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>


    <div class="container sec1">
        <div class="cent">
      
        <?php echo $patients?>
        
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>