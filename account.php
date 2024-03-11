<?php
    include "header.php";
?>



<?php
    if(isset($_GET["pat"])){
        $patient_id=$_GET["pat"];
    }

    $get=mysqli_query($conn, "SELECT * from patients where patient_id='$patient_id' ");

    $row=mysqli_fetch_assoc($get);

    $name=$row["name"];
    $dob=$row["date_birth"];
    $ggender=$row["gender"];
    $nationality=$row["nationality"];
    $med_hist=$row["medical_history"];
    $dobObject = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObject)->y;
?>







<?php
    if(isset($_POST["submit"])){

      
        $targetDir = "uploads/";
        $targetFile = $targetDir. basename($_FILES["file"] ["name"]);
        $fileType = strtolower (pathinfo($targetFile, PATHINFO_EXTENSION));
        $file_name=$_FILES["file"]["name"];
        $complaint=$_POST["complaint"];
        $test=$_POST["test"];
        $medications=$_POST["medications"];



        if($complaint=="" or $test=="" or $medications==""){
            echo '  <div class="message" id="message">
          please fill all fields
        </div>';
        }

        else{
            if($fileType=="jpg" or  $fileType=="png" or $fileType=="jpeg"){
                $type="image";
            }
    
            if($fileType=="pptx" or $fileType=="ppt"){
                $type="powerpoint";
            }
    
            if($fileType=="docx" or $fileType=="doc"){
                $type="word";
            }
    
          

            if($fileType=="pdf"){
                $type="pdf";
            }
    
          
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
    
            $query=mysqli_query($conn, "INSERT into diagnosis (patient, test_done, chief_complaint, medications, doctor, report) values('$patient_id' , '$test', '$complaint',  '$medications', '$doctorID', '$file_name'  )");

            if($query){
                header("location: account.php?pat=$patient_id&uploaded");
            }
        }

    


    }
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
                    <input type="text" value="" name="complaint" placeholder="Chief Complaint">
                    <input type="text" value="" name="test" placeholder="test done">
                </div>

                <div class="input">
                    <input type="text" value="" name="medications" placeholder="Medications to be Taken)">

                </div>

                <div class="input">
                <label for="prof" class="label">upload test result</label>
                <input type="file"  name="file"  hidden accept="application/pdf, .doc, .docx, .ppt, .pptx"  id="prof">
            
            </div>

                <button name="submit">submit</button></form> 
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
                <h1>Patient ID : <?php echo $patient_id?></h1>
                <!-- <h1>Appointment Date: 20/05/2024</h1> -->
                    <div class="med_ail">
                        <h1>Medical History:</h1>

                        <div class="ail_cont">
                        <?php echo $med_hist?>  
                     </div>
                    </div>

               
              

            </div>
        </div>

     
            </div>
  

            <div class="button_cont">
                    <button id="toggle">Upload Diagnosis/document</button>
                 
                    </div>

    </div>
    
    <?php
        include "footer.php";
    ?>
</body>
</html>