<?php
    include "header.php";
?>



<?php
    $get=mysqli_query($conn, "SELECT * from patients where patient_id='$patientID'");

    $row=mysqli_fetch_assoc($get);

    $name=$row["name"];
    $gender=$row["gender"];
    $dob=$row["date_birth"];
    $email=$row["email"];
    $med=$row["medical_history"];

    $dobObject = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObject)->y;


?>


<?php
    $diagnosis='';
    $get_diag=mysqli_query($conn, "SELECT * from diagnosis where patient='$patientID' ");

    if(mysqli_num_rows($get_diag)<1){
        $diagnosis="<h1>No diagnosis here</h1>";
    }

    while($diag_row=mysqli_fetch_assoc($get_diag)){
        $test=$diag_row["test_done"];
        $complaint=
    }
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
                <div class="patient_img">

                </div>

                <h1>PROFILE</h1>

                <div class="ne">
                    <h3>Name:</h3>
                    <h3><?php echo $name?></h3>
                </div>

                <div class="ne">
                    <h3>Gender:</h3>
                    <h3><?php echo $gender?></h3>
                </div>

                <div class="ne">
                    <h3>Age:</h3>
                    <h3><?php echo $age?></h3>
                </div>

                <div class="ne">
                    <h3>Patient ID:</h3>
                    <h3><?php echo $patientID?></h3>
                </div>

                <h1>MEDICAL HISTORY:</h1>

                <div class="history_box">
                <?php echo $med?>
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
                    <h1> Blood Test</h1> 
                    <h1>Dr:  Anyakoya</h1>
                   <a href="result.php"> <button>View Diagnosis</button></a>
                  
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