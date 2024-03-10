<?php

  ob_start();
  session_start();
  include 'connect.php';
  if(isset($_SESSION["id"])){
    $email=$_SESSION['email'];
    $user_type=$_SESSION['user_type'];
    $user_name=$_SESSION['name'];
 

     if($user_type=="patient"){
      $patientID=$_SESSION['patient_id'];
     }
  
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/b782cf5553.js" crossorigin="anonymous"></script>  
    <link rel="icon" type="image/x-icon" href="images\kisspng-babcock-university-university-of-ibadan-academic-d-5b1c90eb26da71.7889147215285987631592-removebg-preview.png">
    <link rel="stylesheet" href="css/header.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedAppoint</title>
</head>
<body>

<div class="loader">
  <img src="images\8-removebg-preview.png" alt="">
</div>
    <div class="nav">
  
        <div class="nav_cont">
            <div class="logo_cont">
          <a href="main.php"> <h1>MedAppoint</h1></a>  
            </div>

            <div class="menu">
                <ul>

             


                  <?php

                            if(isset($_SESSION["id"])){

                              if($user_type=="patient"){
                                echo '   <li>
                                <a href="main.php">  home</a>
                              </li>
                              
                              <li>
                              <a href="appointments.php">Appointments</a>
                            </li>
                                    
                            <li>
                            <a href="records.php">Diagnosis/records</a>
                          </li>
          
                     
                            ';
                                   }

                                   else if($user_type=="admin"){
                                    echo '
                                    <li>
                                    <a href="doctors.php">Doctors</a>
                                  </li>

                                  <li>
                                  <a href="patients.php">Patients</a>
                                </li>

                                <li>
                                <a href="all_appointments.php">Appointments</a>
                              </li>
                                    ';
                                   }

                                   else if($user_type=="doctor"){
                                    echo '   <li>
                                    <a href="doctor_appointments.php">Appointments</a>
                                  </li>
                                  
                                  <li>
                                  <a href="patients.php">Patients</a>
                                </li>
                                  ';
                                   }
                                   echo '
                                   <li>
                      
                            
                             
                               
       
                               
                                   <a href="logout.php">Logout</a>
                           
                            
                           </li>
                                   ';
                            }

                     

                            else{
                              echo '      <li>
               
                     
                      
                        

                        
                              <a href="reg.php">Register/Login</a>
                      
                       
                      </li>';
                            }
                
                      
                      
                  ?>
          
                  
                  
                    
                      

                     
                    


                      


                     

               
                      
      
                 

   
                  
              
                </ul>
            </div>
        </div>
        <span id="line"></span>
    </div>
</body>
<script src="js/min.js"></script>
<script src="js/dom.js"></script>

<script>
  $(window).on("load", ()=>{
    $(".loader").fadeOut("slow")
    $("body").css("overflow-y", "scroll");
  });
</script>
</html>






