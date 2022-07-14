<?php
if (isset($_GET['beta'])){
    $beta=$_GET['beta'];
}else{
    $beta="Enter the registered email and password";
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="form.js"></script>
</head>

<body >
    <center><h1><b>CABENATO</b></h1></center>                            <!-- Change 1 -->
    <center> <img src="image/icon.png" alt="retry" width="175" height="175"></center>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="login.php" method="post"         
                                    role="form" style="display: block;">                         <!-- Change 2 -->
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1"   
                                            class="form-control" placeholder="Email address" value="">   <!-- Change 3 -->
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                    class="form-control btn btn-login" value="Log In">
                                                <link
                                                    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
                                                    rel="stylesheet" id="bootstrap-css">
                                                <script
                                                    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
                                                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <!--<a href="https://phpoll.com/recover" tabindex="5"       
                                                        class="forgot-password">Forgot Password?</a>     -->  <!-- Change 4 -->
                                                    <?php
                                                        //$msg =  $_GET['msg'];   
                                                        echo $beta;
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="signup.php" method="POST"
                                    role="form" style="display: none;">                             <!-- Change 5 -->
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1"
                                            class="form-control" placeholder="Username" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                            placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password"
                                            tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</body>

</html>