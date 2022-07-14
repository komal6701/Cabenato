<?php

//user details in session
session_start();
$email=$_SESSION['email'];
$user=$_SESSION['user'];
$pickup=$_SESSION['pickup'];
$drop=$_SESSION['drop'];
$time=$_SESSION['time'];
$date=$_SESSION['date'];
$car=$_SESSION['car'];
//connect to mysql server
include ('connect.php');

//get driver details from result.php which we booked

    $driverID=$_POST['DriverID'];

    //checking if input driverId is same as one of the driver ID shown in the result.php
    $check=0;
    //if driver id does belong to that group of driverid it updates "$check=1"
    $sql = "SELECT * from driver where Car='$car' AND City = '$pickup' AND startingtime < CAST('$time' AS time) AND endingtime > CAST('$time' AS time) ;";
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
      $count++;}
    }

    while($row = $result->fetch_assoc()) {
        if((empty(array_search($row["ID"],$unavailable))) and ( $driverID==$row['ID'])){
                $check=1;                //updating $check to 1 if driver is free and available to serve at that city
                break;
        }
    }

    if(empty($driverID)){
        //checking if the input box in empty
        $msg="Please Enter the DriverID before Clicking-'Book Now'";
        header ("Location: home_page/Home.php?msg=".$msg);
    }elseif($check==0){
        //runs if driverID is not valid
        $msg ="Driver is already booked or do not serve at you city.Please Enter a DriverID from the shown table only.";
        header ("Location: home_page/Home.php?msg=".$msg);
    }elseif($check==1){
        //inserting the booking details into the table 'booking' into 
    $query = "INSERT INTO booking ( CustomerEmail,DriverID,Pickup,Pickup_time,Pickup_Date,Drop_Location,Car) VALUES  ('$email',$driverID,'$pickup','$time','$date','$drop','$car');";
    $result= @mysqli_query($DBConnect,$query);
    $msg="Congo! Your Cab is successfully booked. ";

    //mailing the customer their booking detail
    $to="$email";
    $sub="CAB Booking Details";
    $body="Hi $user,
    Your booking is successful.
    Cab DriverID : $driverID.
    Pickup Location : $pickup.
    Drop Location : $drop.
    Pickup Date : $date.
    Pickup Time : $time.
    Car type : $car";
    $headers = "From: 9329088988d@gmail.com";
    mail($to,$sub,$body);
    //rredirecting to home.php
    header ("Location: home_page/Home.php?msg=".$msg);
    }

?>