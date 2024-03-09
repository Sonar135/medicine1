<?php
    include "header.php";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/records.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
             
                </div>
            </div>
        </div>

    </div>

    <div class="container sec2">
        <div class="cent">
        <div class="acct_box">
                    <div class="profile_i">
                        <div class="i_cont">
                        <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="ne">
                        <h3>Name:</h3>
                        <h3>Efidi Victor</h3>
                    </div>

                    <div class="ne">
                        <h3>Email:</h3>
                        <h3>vefidi135@gmail.com</h3>
                    </div>

                    <div class="ne">
                        <h3>Address:</h3>
                        <h3></h3>
                    </div>

                    <div class="ne">
                        <h3>Phone:</h3>
                        <h3>08109495127</h3>
                    </div>
                </div>
        </div>
    </div>

    <div class="container sec1">
        <div class="cent">
            <h1>Medical Diagnosis</h1>

            <div class="diagnosis_cont">
                <div class="diag_card">
                    <div class="diag_icon">
                    <i class="fa-solid fa-suitcase-medical"></i>
                    </div>
                    <h1>19/09/2023</h1>
                    <h1>Test For: Malaria</h1> 
                    <h1>Dr:  Anyakoya</h1>
                    <button>View Result</button>
                  
                </div>

                <div class="diag_card">
                    
                    </div>

                    <div class="diag_card">
                    
                    </div>
            </div>
        </div>
    </div>

    <?php 
        include "footer.php";
    ?>
</body>
</html>