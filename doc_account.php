<?php
    include "header.php";
?>



<?php
    if(isset($_GET["doc"])){
        $doc_id=$_GET["doc"];
    }

    $get=mysqli_query($conn, "SELECT * from doctors where doctor_id='$doc_id' ");

    $row=mysqli_fetch_assoc($get);

    $name=$row["name"];
    $dob=$row["date_birth"];
    $ggender=$row["gender"];
    $nationality=$row["nationality"];
    $dobObject = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObject)->y;
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="stylesheet" href="css/account.css?v=<?php echo time()?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="edit_overlay">
    <div class="container edit">
        <div class="cent">


        <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
                <h1>upload diagnosis</h1>

              <form action="" method="post" enctype="multipart/form-data"> <div class="input">
                    <input type="text" value="" name="name" placeholder="Chief Complaint">
                    <input type="text" value="" name="test" placeholder="test done">
                </div>

                <div class="input">
                    <input type="text" value="" name="address" placeholder="Medications to be Taken)">

                </div>

                <div class="input">
                <label for="prof" class="label">upload test result</label>
                <input type="file"  name="profile"  hidden accept="image/*"  id="prof">
            
            </div>

                <button name="edit_stud">submit</button></form> 
            </div>

         


        </div>
    </div>
</div>
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
            <div class="record_cont">
            <div class="p_left">
                <div class="p_prof">
                    <div class="circle">
                        <div class="inner">
                            <img src="images\1000_F_266287799_pMhlhwus2gB8YG6HUdduMef8I5DujeLP.jpg" alt="">
                        </div>
                    </div>

                    <h1>Name: <?php echo $name?></h1>
                    <h1>Age: <?php echo $age?></h1>
                    <h1>Gender: <?php echo $ggender?></h1>
                    <h1>Nationality: <?php echo $nationality?></h1>
                 
                </div>
            </div>

            <div class="p_right">
                <h1>Doctor ID : <?php echo $doc_id?></h1>
                <!-- <h1>Appointment Date: 20/05/2024</h1> -->
               

               
              

            </div>
        </div>

     
            </div>
  

            <div class="button_cont">
                    <button >delete account</button>
                 
                    </div>

    </div>
    
    <?php
        include "footer.php";
    ?>
</body>
</html>