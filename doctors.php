<?php
    include "header.php";
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
                <h1>Doctors</h1>
                <span></span>
               
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>


    <div class="container sec1">
        <div class="cent">
            <div class="doctor_card">
                <div class="doctor_photo">

                </div>

                <div class="ne">
                    <h3>id:</h3>

                    <h3>doc01</h3>

                </div>

                <div class="ne">
                    <h3>name:</h3>

                    <h3>Efidi Victor</h3>


                </div>

                <div class="ne">
                    <h3>age:</h3>

                    <h3>37</h3>

                </div>

                <button>See Profile</button>
            </div>

            <div class="doctor_card" id="add">
             <a href="add_doc.php"><div class="add_button">
                <i class="fa-solid fa-plus"></i>
                </div></a>   
                </div>

                <div class="doctor_card">
                
                </div>

                <div class="doctor_card">
                
                </div>
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>