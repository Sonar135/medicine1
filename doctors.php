<?php
    include "header.php";
?>

<?php
$doctors="";

    $get=mysqli_query($conn, "SELECT * from doctors");

    if(mysqli_num_rows($get)<1){
        $patients='<h1>no doctors registered</h1>';
    }

   while($row=mysqli_fetch_assoc($get)){

    $name=$row["name"];
    $dob=$row["date_birth"];
    $gender=$row["gender"];
    $nationality=$row["nationality"];
    $dobObject = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObject)->y;
    $doc_id=$row["doctor_id"];


    $doctors.='
    
    <div class="doctor_card">
    <div class="doctor_photo">

    </div>

    <div class="ne">
        <h3>id:</h3>

        <h3>'.$doc_id.'</h3>

    </div>

    <div class="ne">
        <h3>name:</h3>

        <h3 id="name">'.$name.'</h3>


    </div>

    <div class="ne">
        <h3>age:</h3>

        <h3>'.$age.'</h3>

    </div>

  <a href="doc_account.php?doc='.$doc_id.'"> <button>See Profile</button></a> 
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
        <?php
            echo $doctors;
        ?>

            <div class="doctor_card" id="add">
             <a href="add_doc.php"><div class="add_button">
                <i class="fa-solid fa-plus"></i>
                </div></a>   
                </div>

          
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>