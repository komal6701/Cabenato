<?php 
//user details in session
session_start();

 //connect to mysql server
include ('connect.php');


//get name, password, e-mail  passed from client

	$pickup = $_POST['pickup'];
	$drop = $_POST['drop'];
	$time = $_POST['time'];
	$date = $_POST['date'];
  $car=$_POST['car'];

  $dateTimestamp1 = strtotime($date);
  date_default_timezone_set('Asia/Kolkata');
  $currentdate2 = date('Y-m-d ', time());
  $currenttime=date('h:i:s ', time());

  //check whether the user input of date and time
  if((empty($date) )||(empty($time)) ){
    $msg= "Please Enter date and time.";
    header ("Location: home_page/Home.php?msg=".$msg);
    exit();
  }//check whether the user input of pickup and drop
  elseif($pickup=='Select Location' || $drop=='Select Location'){
    $msg = "Please Enter Pickup and Drop Location";
    header ("Location: home_page/Home.php?msg=".$msg);
    exit();
  }
  elseif($pickup==$drop){
    $msg = "Please Enter drop location other than Pickup location";
    header ("Location: home_page/Home.php?msg=".$msg);
    exit();
  }
  //checking booking date is greater than current date
  elseif($currentdate2>=$date){
      $msg="Enter Date which is at least greater than today's date.";
      header ("Location: home_page/Home.php?msg=".$msg);
      exit();
  }else{

  ////runs the query to find suitable drivers
  $sql = "SELECT * from driver where Car='$car' AND City = '$pickup' AND startingtime < CAST('$time' AS time) AND endingtime > CAST('$time' AS time) ;";
  }
	$sql2="SELECT DriverID from booking where pickup='$pickup' AND Pickup_Date='$date' ;";
    //sql result when above query is run
    $result = $DBConnect->query($sql);
    
    $result2=$DBConnect->query($sql2);
    $unavailable=array();
  if ($result2->num_rows > 0) {
    // output data of each row
    $count=1;
    while($row = $result2->fetch_assoc()) {
      $unavailable[$count]=$row['DriverID'];
      $count++;
    }

} 
     //add booking details in session
    $_SESSION['date']=$date;
    $_SESSION['pickup']=$pickup;
    $_SESSION['drop']=$drop;
    $_SESSION['time']=$time;
    $_SESSION['car']=$car;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Results</title>
    <link rel="stylesheet" href="css/result.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@300&display=swap" rel="stylesheet">
  </head>


  <body>

      <h2>Select Your Cab</h2>
      
      <div class="container">  <h3>Cabs Available </h3>
      <table class="table caption-top">
        <caption>List of Drivers</caption>
          <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Driver-ID</th>
          <th scope="col">Name</th>
          <th scope="col">Booking Slot</th>
          <th scope="col">Car type</th>
       </tr>
        </thead>

        <!-- below column shows available drivers who are free and serve at your location-->
        <?php 
        $count=1;

        while($row = $result->fetch_assoc()) {
          if(empty(array_search($row["ID"],$unavailable))){
        ?>

      <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td><?php echo $row["ID"]; ?></td>
        <td><?php echo $row["Name"]; ?></td>
        <td><?php echo $row['StartingTime'].' - '.$row['EndingTime']; ?></td>
        <td><?php echo $row["Car"]; ?></td>
      </tr>

        <?php
          $count=$count+1;
          }
         }
        ?>

          <!-- input the driverID and send the info to mail.php-->
        <form class="row row-cols-lg-auto g-3 align-items-center" action= "mail.php" method="POST"
                                    role="form">
            <div class="col-12">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Enter Driver-Id</label>
              
              <div class="input-group">
                <div class="input-group-text">#</div>

                <input type="number" name="DriverID" class="form-control"   placeholder="Enter Driver-Id">  

              </div>
            </div>
                
                    
            <div class="col-12">
              <button type="submit" class="btn btn-success">Book Now</button>
            </div>
          </form> <br>

      </div>
      
      

     

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
