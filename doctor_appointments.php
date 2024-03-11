<?php
    include "header.php";
?>


<?php
   if(isset($_GET["confirmed"])){
    echo '  <div class="message" id="message">
 appointment confirmed
</div>';
}


$appointed="";

$output="";

$get=mysqli_query($conn, "SELECT * from appointments where status='pending'");

if(mysqli_num_rows($get)<1){
  $output='<h1>no appointments available</h1>';
}

$doctor="";

while($row=mysqli_fetch_assoc($get)){
  $date=$row["date"];
  $time=$row["time"];
  $patient_id=$row["patient_id"];
  $id=$row["id"];
  



  if($row["consulting_doc"]==""){
    $doctor="not assigned";
  }

  else{
    $doctor=$row["consulting_doc"];

  }




  $output.='
  <tr>
<td><h3>'.$date.'</h3></td>
<td><h3>'.$time.'</h3></td>
<td><h3>'.$patient_id.'</h3></td>
<td id="ico"><a href="accept.php?id='.$id.'" class=""><div class="tb_ico"><i class="fa-solid fa-check"></i></div></a></td>
<td id="ico"><a href="desc.php?id='.$id.'#lock"><div class="tb_ico"> <i class="fa-solid fa-user"></i> </div></a></td>
</tr>
';
}







$get_app=mysqli_query($conn, "SELECT * from appointments where consulting_doc='$doctorID'");

if(mysqli_num_rows($get_app)<1){
  $appointed='<h1>no appointments available</h1>';
}

$doctor="";

while($row2=mysqli_fetch_assoc($get_app)){
  $date=$row2["date"];
  $time=$row2["time"];
  $patient_id=$row2["patient_id"];
  $id=$row2["id"];
  



  if($row2["consulting_doc"]==""){
    $doctor="not assigned";
  }

  else{
    $doctor=$row2["consulting_doc"];

  }




  $appointed.='
  <tr>
<td><h3>'.$date.'</h3></td>
<td><h3>'.$time.'</h3></td>
<td><h3>'.$patient_id.'</h3></td>
<td id="ico"><a href="account.php?pat='.$patient_id.'#lock"><div class="tb_ico"> <i class="fa-solid fa-user"></i> </div></a></td>
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
          <th><h3>patient</h3></th>
          <th><h3>accept</h3></th>
          <th><h3>view prodile</h3></th>
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




    
    <div class="container sec1">
        <div class="cent">
            <h1>Your appointments</h1>
        <section>
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
      
          <th><h3>Date</h3></th>
          <th><h3>Time</h3></th>
          <th><h3>patient</h3></th>
          <th><h3>view prodile</h3></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">
  
 

 <?php echo $appointed;?>






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

