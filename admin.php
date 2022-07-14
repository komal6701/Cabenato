<?php

//user details in session
session_start();
//connect to mysql server
include ('connect.php');

//query to show last 10 bookings
$sql2="SELECT * from booking  order by BookingID desc limit 10;";
$result2=$DBConnect->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="css/result.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@300&display=swap" rel="stylesheet">
</head>
<body>
        <div style="float:right;"> 
        <a href="form.php" class="btn btn-danger" role="button">SignOut</a>
        </div>   
        <br>
        <br>
   <center> <h2>Welcome to the Admin Page</h2>
    <div class="container">
        <h2>Booking history</h2>
        <br> 

        <table class="table caption-top">
        <caption>Latest Cab Booking Data</caption>
          <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">BookingID</th>
          <th scope="col">CustomerEmail</th>
          <th scope="col">DriverID</th>
          <th scope="col">BookingDate</th>
          
       </tr>
        </thead>
        <tbody>
        <?php 
        $count=1;

        while($row = $result2->fetch_assoc()) {        /// showing records in table format
        ?>
                                                                
      <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td><?php echo $row["BookingID"]; ?></td>
        <td><?php echo $row["CustomerEmail"]; ?></td>
        <td><?php echo $row['DriverID']; ?></td>
        <td><?php echo $row["Pickup_Date"]; ?></td>
      </tr>

        <?php
          $count=$count+1;
         }
        ?>
        </tbody>
        </table>
    </div></center>
   
    
</body>
</html>