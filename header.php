<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheba Hospital</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="asset/bootstrap/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="asset/bootstrap/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="asset/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="asset/bootstrap/js/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="asset/bootstrap/js/jquery.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body style="background-color: #80E0F2 ;">
<div class="container-fluid">
<div class="row p-0">
        <div class="col-md-12 p-0">
        <nav class="navbar navbar-expand-lg navbar navbar-light bg-info">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="asset/image/logo.png" alt="" width="100" height="100">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="aboutus.php">About Us</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Contact Us</a>
                            </li>
                            <?php
                    if (isset($_SESSION['user_id']))
                    {
                     ?>
                            <li class="nav-item">       
                                <a class="nav-link active" href="profile.php"><?php echo $_SESSION['name']; ?></a>
                            </li>
                            <li class="nav-item">       
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
<?php  }else{?>

                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="register.php">Register</a>
                            </li>
<?php } ?>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        </div>
        