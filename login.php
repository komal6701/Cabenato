<?php 
 //connect to mysql server
include ('connect.php');

//get password and e-mail passed from client

	$email = strtolower($_POST['email']);	
	$pwd = $_POST['password'];

//check whether the user input the password and email
	if (empty($pwd) or empty($email)) {
	$msg="Please fill in your email and password.<br>";
   	} 
//validate email
   	elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == true && $pwd) {
	//access date to database and search by email
	$SQLstring = "SELECT * from customer where Email = '$email';";
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the table.</p>"."<p>Error code ".
	mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
			$row= mysqli_fetch_row($queryResult);
			if ($email !== $row[3]) { // check email whether the member is exist
			$msg="The member is not existed. Please register.<br>";
			}
			elseif ($pwd == $row[2]) { //check whether the password is matched 
				 	if ($row[4]=="Admin") { //check if the role is admin
				 	#echo "The log-in is success. You will be directed to the administration page shortly."; 
					sleep(3);	
					session_start();
					$_SESSION['user']=$row[1];
					$_SESSION['email']=$row[3];
					$name=$row[1];     //save username
					$URL="admin.php";  //admin login.. directing to admin.php
					header ("Location: $URL"); 
					exit; 
				 	} else {
					#echo "The log-in is success. You will be directed to the booking page shortly."; 
					sleep(3);	
					//save username
					session_start();
					$_SESSION['user']=$row[1];
					$_SESSION['email']=$row[3];
					$name=$row[1];
					$URL="home_page/home.php";  //successful login.. directing to home.php
					header ("Location: $URL"); 
					exit; 
					}
			} else {
			$msg= "The password is incorrect. Please try again.<br>";
		}
	} else { $msg= "Please input a valid email and try again.<br>";}
	mysqli_close($DBConnect);	
	header('Location: form.php?beta='.$msg);
?>