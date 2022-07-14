<?php 
 //connect to mysql server
include ('connect.php');

//get name, password, e-mail  passed from client

	$name = $_POST['username'];
	$pwd = $_POST['password'];
	$Cpwd = $_POST['confirm-password'];
	$email = $_POST['email'];
	$count = 0;
    //validate the name
    $msg="Enter the required information";
	if (empty($name)) {
        $msg="Please fill in your name";
        #mysqli_close($DBConnect);
        #exit();
           } else {
       # $name = $_POST['name'];
        ++$count;
        }
    //validate email
    if (empty($email)) {
        $msg="Please fill in a valid e-mail address.<br>";
        #mysqli_close($DBConnect);
        #exit();
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == true)   {
            //access data in database
            $SQLstring = "SELECT Email from customer where Email = '$email';";
            $queryResult = @mysqli_query($DBConnect, $SQLstring)
            Or die ("<p>1.Unable to query the table.</p>"."<p>Error code ".mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";		
            if (mysqli_num_rows($queryResult) !== 0)
                    { --$count;
                    $msg="This email is already registered. Please use another email address.<br>";
                    #mysqli_close($DBConnect);
                    #exit();
                    } else {
                    $email=strtolower($_POST['email']);
                    ++$count;
                    }
        } else { 
        $msg="Please fill in a valid e-mail address.<br>";
        #mysqli_close($DBConnect);
        #exit();
        }
    //validate password
        if (strlen($pwd)<8) {
            #echo "Please enter password with length atleast 8.<br>";
            $msg="Please enter password with length atleast 8";
            #mysqli_close($DBConnect);
            #exit();
        }
        elseif ($pwd !== $Cpwd) {
        $msg="The passwords do not match. Please enter again.<br>";
        #mysqli_close($DBConnect);
        #exit();
        } else {
          #  $pwd = $_POST['Cpwd'];
            ++$count;
        }
        
//write to database of customer table
if ($count == 3) {
$query = "INSERT INTO customer ( Name, password,  email ) VALUES  ('$name','$pwd','$email');";
$result= @mysqli_query($DBConnect,$query)
Or die ("<p>2.Unable to query the table.</p>"."<p>Error code ".mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect). "</p>");
				
	if (mysqli_affected_rows($DBConnect) == 1) {
        $msg= "Thank you. The registration is now complete."; 
         }
        }     
    
    mysqli_close($DBConnect);
    
    header('Location: form.php?beta='.$msg);
#}
?>