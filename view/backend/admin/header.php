<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheba Hospital</title>
    <link rel="stylesheet" href="../../../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/bootstrap/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="../../../asset/bootstrap/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../../asset/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="../../../asset/bootstrap/js/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../../asset/bootstrap/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="../../../asset/bootstrap/js/jquery.min.js"></script>
    <script src="../../../asset/bootstrap/js/jquery.min.js"></script>
</head>
<body style="background-color: #a3e3f2 ;">
<div class="container">

<div class="row p-0" >
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #98d7e6;">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="../../../asset/image/logo.png" alt="" width="100" height="100">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="view_notice.php">View Notice</a>
                            </li>
                            <?php
 if($_SESSION['employee_id']){
     if($_SESSION['employee_type'] == 3){?>
                    <li class="nav-item">
                                <a class="nav-link active" type="button" data-bs-toggle="modal" data-bs-target="#notice" aria-current="page" href="#">New Notice</a>
                            </li>
                            <?php } ?>
                            <li class="nav-item">       
                                <a class="nav-link active" href="profile.php"><?php echo $_SESSION['employee_name']; ?></a>
                            </li>
                            <li class="nav-item">       
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
<?php }else{  header("Location: login.php"); } ?>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
<!-- Modal -->
<div class="modal fade" id="notice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Add New Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../../controler/controller.php?id=<?= $_SESSION['employee_id']?>" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Notice Title</label>
        <input type="text" class="form-control" name="notice_title" placeholder="Enter Notice Title">
        </div>
        <div class="form-group">
        <label for="name">Notice Description</label>
        <textarea type="text" class="form-control" name="notice_description" placeholder="Enter Notice Description"></textarea>
        </div>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Notice" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
        </div>