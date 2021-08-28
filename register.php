<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheba Hospital</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <script src="asset/bootstrap/js/jquery.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #80E0F2 ;">
<div class="container">
<div class="row justify-content-center">
		<?php
			error_reporting(0);
            $errMSG = $_GET['mgs'];
			if (isset($errMSG)) 
			{
			?>
				<div class="col-lg-4 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $errMSG; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php
			}
		?>
	</div>
<div class="row d-flex justify-content-center">
<a class="d-flex justify-content-center" href="index.php"><img src="asset/image/logo.png" style="width:150px;height:100px" alt=""></a> 
</div>
<form action="controler/controller.php" method="post">
    <div class="row">
        <div class="col-md-6 mx-auto rounded p-6" style="background-color: #ECFAFD ;">
            <br>
            <div class="form-group p-2">
                <label for="">Name </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your name" require />
            </div>
            <div class="form-group p-2">
                <label for="">Email </label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email" require />
            </div>
            <div class="form-group p-2">
                <label for="">Phone </label>
                <input type="text" class="form-control" name="phone" placeholder="Enter Your Email" require />
            </div>
            <div class="form-group p-2">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Your Password" require />
            </div>
            <div class="form-group p-2">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Enter Your Confirm Password" require />
            </div>
            <div class="form-group p-2">
                <br>
                <button type="submit" name="register" class=" form-control btn btn-primary"> Register </button>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="login.php" style="text-decoration: none;">Log In here... </a>
            </div>

            <br>
            <br>
        </div>
    </div>
</form>
<br>
<div class="d-flex justify-content-center">
    <a href="#">For Emergency cabin Booking, click here...<br><br></a>
</div>

<?php
include "footer.php";
?>