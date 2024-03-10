<?php
    include "header.php";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/reg.css?v=<?php echo time();?>">
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
                <h1>Register</h1>
                <span></span>
               
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>



    <div class="container reg">
            <div class="cent">
                <a href="doctor_auth.php"><div class="reg_box">
                    <div class="prof_i">
                    <i class="fa-solid fa-user"></i>                   
                    </div>

                    <h1>Doctor</h1>
                </div></a>

                  <a href="patient_auth.php"><div class="reg_box">
                    <div class="prof_i">
                    <i class="fa-solid fa-user-tie"></i>              
                    </div>

                    <h1>Patient</h1>
                </div></a>

                <a href="Admin_auth.php"><div class="reg_box">
                    <div class="prof_i">
                    <i class="fa-solid fa-user-tie"></i>              
                    </div>

                    <h1>Admin</h1>
                </div></a>


                

             
        </div>
</div>


<?php
    include "footer.php";
?>
</body>
</html>