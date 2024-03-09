<?php
    include "header.php";
?>

<?php
    if(isset($_GET["fill"])){
        echo '  <div class="message" id="message">
    please fill all fields
    </div>';
    }

    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $time=$_POST["time"];
        $date=$_POST["date"];
        $desc=htmlentities($_POST["desc"]);
        $status="pending";


        if($name=="" or $email=="" or $time=="" or $date==""){
       

        header("location: main.php?fill#lock");
        }


        else{
            $insert=mysqli_query($conn, "INSERT into appointments (name, patient_id, email, date, time, reason, status) values(

          '$name', '$patientID', '$email', '$date', '$time', '$desc' , '$status' )");

          if($insert){
            header("location: appointments.php?success#lock");
          }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css?v=<?php echo time();?>">
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
                <h1>WELCOME TO</h1>
                <span></span>
                <h1> MEDAPPOINT</h1>
                <div class="circle">

                </div>
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>


    <div class="container sec1">
      <div class="cent">
        <div class="l">
  
        </div>

        <div class="r">
          <h1>ABOUT US</h1>

          <p>Vestibulum condimentum, risus sedones honcus rutrum, salah lacus mollis zurna, nec finibusmi velit advertisis. Proin vitae odin quis magna aliquet laciniae. Etiam auctor, nisi vel. Pellentesque ultrices nisl quam iaculis, nec pulvinar augue.</p>


          <div class="stat_box">
            <h1>EXPERIENCED DOCTORS</h1>

            <div class="meter">
                <div class="meter_level">

                </div>
            </div>
          </div>

          <div class="stat_box">
               <h1>MODERN EQUIPMENTS</h1>

            <div class="meter">
                <div class="meter_level">
                  
                </div>
            </div>

          
        </div>

        <div class="stat_box">
                  <h1>FRIENDLY STAFF</h1>

            <div class="meter">
                <div class="meter_level">
                  
                </div>
            </div>
            </div>
      </div>
    </div>
</div>


<div class="container sec2">
    <div class="cent">
        <div class="card">
            <div class="ico">
            <i class="fa-brands fa-react"></i>
            </div>
            <h1>20</h1>
            <h2>Years Of Experience</h2>
        </div>
        <div class="card">
        <div class="ico">
        <i class="fa-regular fa-heart"></i>
            </div>
            <h1>700+</h1>
            <h2>Happy Patients</h2>
            </div>
            <div class="card">
            <div class="ico">
            <i class="fa-solid fa-certificate"></i>
            </div>
            <h1>120</h1>
            <h2>Certificates</h2>
            </div>
            <div class="card">
            <div class="ico">
            <i class="fa-solid fa-id-card"></i>
            </div>
            <h1>40</h1>
            <h2>Doctors</h2>
            </div>
    </div>
</div>


<div class="container auth">
            <div class="cent signup">
                <div class="left" id="super">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post" id="lock"   enctype="multipart/form-data">  <div class="right">
                    <h1>BOOK AN APPOINTMENT</h1>

                    <div class="n_e">
                        <input type="text" placeholder="name" name="name" value="<?php echo $user_name?>">
                        <input type="email" placeholder="email" name="email" value="<?php echo $email?>">
                    </div>

                    <div class="n_e">

                        <div class="select">
                           <span id="selected"> select time </span>

                            <div class="selections">
                                <ul>
                                    <li id="list">9am-10am </li>
                                     
                                  
                                    <li id="list">10am-11am</li>
                                     
                                     
                                       <li id="list">11am-12am </li>
                                      
                                     
                                       <li id="list">12am-1pm</li>
                                       <li id="list">1pm-2pm</li>
                                       <li id="list">2pm-3pm</li>
                                    
                                </ul>
                            </div>
                        </div>
                        <input type="text" placeholder="" name="time"  id="myInput" hidden >

                       
                        <input type="date"  name="date"  id="image">
                    </div>

                  

               

               
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="reason for appointment (optional)"></textarea>
                 

                    <button name="submit">submit</button>
                </div></form>  
            </div>

  

  
        </div>



    <?php 
        include "footer.php";
    ?>
</body>
</html>