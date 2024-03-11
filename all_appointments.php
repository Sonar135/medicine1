<?php
    include "header.php";
?>


<?php
   if(isset($_GET["success"])){
    echo '  <div class="message" id="message">
   appointment made. Pending confirmation
</div>';
}




$output="";

$get=mysqli_query($conn, "SELECT * from appointments");

if(mysqli_num_rows($get)<1){
  $output='<h1>no appointments</h1>';
}

$doctor="";

while($row=mysqli_fetch_assoc($get)){
  $date=$row["date"];
  $time=$row["time"];
  $status=$row["status"];
  $doctor_id=$row["consulting_doc"];

  $get_doctor=mysqli_query($conn, "SELECT * from doctors where doctor_id='$doctor_id'");

  $doc_row=mysqli_fetch_assoc($get_doctor);
  


  if($row["consulting_doc"]==""){
    $doctor="not assigned";
  }

  else{
    $doctor=$row["name"];

  }




  $output.='
  <tr>
<td><h3>'.$date.'</h3></td>
<td><h3>'.$time.'</h3></td>
<td><h3>'.$status.'</h3></td>
<td><h3>'.$doctor.'</h3></td>
</tr>
';
}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/appointments.css?v=<?php echo time();?>">
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
                <h1>Appointments</h1>
                <span></span>
               
             </div>

             <h4>Crafting unforgettable events, stress-free planning.</h4>
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1">
        <div class="cent">
            <h1>All appointments</h1>
        <section>
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
      
          <th><h3>Date</h3></th>
          <th><h3>Time</h3></th>
          <th><h3>status</h3></th>
          <th><h3>consulting Doctor</h3></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">
  
 

 <?php echo $output;?>






      </tbody>
    </table>
  </div>
</section>

        </div>
    </div>

    <?php
        include "footer.php"
    ?>
</body>
</html>

