<?php
session_start();
//if (isset($_GET['user'])){
    //$user=$_GET['user'];
   // $email=$_GET['email'];
    //$msg='Enter Travel Details';  }                                      // Change 7

if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
}else{
    $msg='You have logged in Successfully.';
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page</title>
    <link rel="stylesheet" href="../css/home.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@300&display=swap" rel="stylesheet">
</head>

<body>


    <nav class="navbar  fixed-top navbar-expand-lg navbar navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CABENATO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#Cars">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#price">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#adds">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">About Us</a>
                    </li>
                </ul>
            </div>
            <h6 style="color: white;margin-right: 2mm;margin-top: 2mm;">Hello <?php echo $_SESSION['user']; ?>!</h6>
            <!-- <button class="btn btn-danger" type="submit" >SignOut</button> -->
            <a href="../form.php" class="btn btn-danger" role="button">SignOut</a>
        </div>
    </nav><br> <br>
     
</div>
    <div class="firstpage">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg; ?></strong>  
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        <center>
            <h2><b>To get around a town, Book a Cab</b></h2>
            <h5>Pick from a variety of price points and categories</h5>
        </center>
        <div class="container">
            <form action= "../Result.php" method="POST"
                                    role="form">        <!-- Change 1 -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pick-Up</label>
                    <select class="form-control" name="pickup" id="exampleFormControlSelect1" required="required">
                        <option>Select Location</option>
                        <option>Banglore</option>
                        <option>Bhopal</option>
                        <option>Chennai</option>
                        <option>Chandigarh</option>
                        <option>Dhanbad</option>
                        <option>Delhi</option>
                        <option>Gandhi Nagar</option>
                        <option>Hyderabad</option>
                        <option>Indore</option>
                        <option>Kolkata</option>
                        <option>Kashmir</option>
                        <option>Mandi</option>
                        <option>Mumbai</option>
                        <option>Pune</option>
                        <option>Raipur</option>
                    </select>                   <!-- Change 2-->
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Drop</label>
                    <select class="form-control" name="drop" id="exampleFormControlSelect1">
                        <option>Select Location</option>
                        <option>Banglore</option>
                        <option>Bhopal</option>
                        <option>Chennai</option>
                        <option>Chandigarh</option>
                        <option>Dhanbad</option>
                        <option>Delhi</option>
                        <option>Gandhi Nagar</option>
                        <option>Hyderabad</option>
                        <option>Indore</option>
                        <option>Kolkata</option>
                        <option>Kashmir</option>
                        <option>Mandi</option>
                        <option>Mumbai</option>
                        <option>Pune</option>
                        <option>Raipur</option>
                    </select>
                </div>              <!-- Change 3 -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cabs</label>
                    <select class="form-control" name="car" id="exampleFormControlSelect1">

                        <option>Mini</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Luxury</option>
                    </select>
                </div>          <!-- Change 4 -->
                <div class="form-group">
                    <label for="formGroupExampleInput3"> Date</label> </label>
                    <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="DATE">
                </div>                  <!-- Change 5 -->
                <div class="form-group">
                    <label for="formGroupExampleInput4"> Time</label> </label>
                    <input type="time" name="time" class="form-control" id="formGroupExampleInput" placeholder="TIME">
                </div>              <!-- Change 6 -->
                <div class="button"><button type="submit" class="btn btn-primary">Search Cabs</button></div>



            </form>
        </div><br> <br> <br> <br> <br>
    </div>

    <!-- banners -->

    <div id="Cars"> <br>
        <center>
            <h1> Our Cars </h1>
        </center> <br>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="../image/mini.png" alt="cd" height="250px">

                    <div class="card-body">
                        <h3 class="card-text">
                            <center>Mini</center>
                        </h3>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="../image/sedan.png" alt="cd" height="250px">

                    <div class="card-body">
                        <h3 class="card-text">
                            <center>Sedan</center>
                        </h3>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="../image/suv.png" alt="cd" height="250px">

                    <div class="card-body">
                        <h3 class="card-text">
                            <center>SUV</center>
                        </h3>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <img src="../image/lux.png" alt="cd" height="250px">

                    <div class="card-body">
                        <h3 class="card-text">
                            <center>Luxury</center>
                        </h3>

                    </div>
                </div>
            </div>
        </div> <br> <br>
    </div><br>

    <div id="price">
        <center>
            <h1>Pricing</h1>
        </center>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mini</th>
                    <th scope="col">Sedan</th>
                    <th scope="col">SUV</th>
                    <th scope="col">Luxury</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">10 Rs/Km</th>
                    <td>20 Rs/Km</td>
                    <td>30 Rs/Km</td>
                    <td>100 Rs/Km</td>
                </tr>

            </tbody>
        </table>
    </div><br><br>

    <div id="adds">
        <center>
            <h1>Why ride with Us?</h1>
        </center> <br>

        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h3 class="mb-0">Cabs for all budgets</h3>

                        <p class="card-text mb-auto">We offer taxis to fit every budget, from sedans and SUVs to luxury
                            automobiles for special events.</p>

                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="../image/budget.png" alt="error" height="240" width="360">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h3 class="mb-0">Secure and Safer Rides</h3>

                        <p class="mb-auto">We have systems in place to ensure a safe travel experience, including as
                            verified drivers, an emergency alert button, and live trip tracking.</p>

                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="../image/secure1.png" alt="error" height="240" width="360">

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h3 class="mb-0">In Cab Entertainment</h3>

                        <p class="card-text mb-auto">Free Netflix lets you listen to music, watch videos, and do a lot
                            more. With our free wifi, you can stay connected even if you're travelling through places
                            with poor network coverage.</p>

                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="../image/netflix.png" alt="error" height="240" width="360">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h3 class="mb-0">Cashless Rides</h3>

                        <p class="mb-auto">Now you can travel without carrying cash. To experience hassle-free payments,
                            just pay with any e-wallet.</p>

                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="../image/cash.png" alt="error" height="240" width="360">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="footer">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">CABENATO, Inc</p>
        </footer>
    </div>













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>