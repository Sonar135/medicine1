<?php
    include "header.php";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/problem.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent" id="lock">

                </div>
            </div>
        </div>

    </div>

    <div class="container sec1" >
        <div class="cent" >
            <div class="p_left">
                <div class="p_prof">
                    <div class="circle">
                        <div class="inner">
                            <img src="images\1000_F_266287799_pMhlhwus2gB8YG6HUdduMef8I5DujeLP.jpg" alt="">
                        </div>
                    </div>

                    <h1>Fortune Ibem</h1>
                    <h1>Age: 28</h1>
                    <h1>Gender: Male</h1>
                   <a href="account.php?pat=1"> <button>View Profile</button></a>
                </div>
            </div>

            <div class="p_right">
                <h1>Appointment ID: 1009384</h1>
                <h1>Appointment Date: 20/05/2024</h1>
                    <div class="med_ail">
                        <h1>Complaint</h1>

                        <div class="ail_cont">
                        Migraine headaches with aura: Recommend lifestyle modifications including stress reduction techniques and maintaining regular sleep patterns. Adjust Sumatriptan dosage if frequency of headaches increases.     </div>
                    </div>

                    <button>Approve</button>
            </div>
        </div>
    </div>
    
    <?php
        include "footer.php";
    ?>
</body>
</html>