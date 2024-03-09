<?php
    include "header.php";
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/appointments.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/dec_app.css?v=<?php echo time();?>">
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


    <div class="container sec1">
        <div class="cent">
            <h1>Pending Appointments</h1>
        
            <section>
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th><h3>Application id</h3></th>
          <th><h3>Date</h3></th>
          <th><h3>Time</h3></th>
          <th><h3>status</h3></th>
          <th><h3>Details</h3></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">
      <tr>
 
    <td><h3>1087657</h3> </td>
    <td><h3>9/3/2023</h3></td>
    <td><h3>13:00 - 18:00</h3></td>
    <td><h3>Pending</h3></td>
    <td><button>View</button></td>

  </tr>

  <tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><a href="problem.php?pat=1#lock"><button>View</button></td></a>

</tr>

<tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><button>View</button></td>

</tr>

<tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><button>View</button></td>

</tr>






      </tbody>
    </table>
  </div>
</section>
        </div>
    </div>

<div class="container sec2">
    <div class="cent">
       <h1> Upcoming Appointments</h1>

               
        <section>
  <!--for demo wrap-->

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th><h3>Application id</h3></th>
          <th><h3>Date</h3></th>
          <th><h3>Time</h3></th>
          <th><h3>status</h3></th>
          <th><h3>Approve</h3></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">
      <tr>
 
    <td><h3>1087657</h3> </td>
    <td><h3>9/3/2023</h3></td>
    <td><h3>13:00 - 18:00</h3></td>
    <td><h3>Pending</h3></td>
    <td><button>Approve</button></td>

  </tr>

  <tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><button>Approve</button></td>

</tr>

<tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><button>Approve</button></td>

</tr>

<tr>
 
 <td><h3>1087657</h3> </td>
 <td><h3>9/3/2023</h3></td>
 <td><h3>13:00 - 18:00</h3></td>
 <td><h3>Pending</h3></td>
 <td><button>Approve</button></td>

</tr>






      </tbody>
    </table>
  </div>
</section>
    </div>
</div>

<?php
    include "footer.php";
?>
</body>
</html>