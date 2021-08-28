<?php
session_start();

require_once "../../../model/conect.php";

if(isset($_POST["login"]))
{
    $email = strip_tags($_POST["email"]);
    $password = strip_tags($_POST["password"]);

    $email = $DB_con->real_escape_string($email);
    $password = $DB_con->real_escape_string($password);

    $query = $DB_con->query("SELECT * FROM employee WHERE employee_email = '$email' AND employee_password =  '$password' ");
    $rows = $query->fetch_array();

    $count = $query->num_rows;
    if( $count == 1)
    {
        $_SESSION = $rows;
        header("Location: index.php");
    }
    else
    {
        $errMSG = "Error! Incorrect User Name or Password.";
    }
    $DB_con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheba Hospital</title>
    <link rel="stylesheet" href="../../../asset/bootstrap/css/bootstrap.min.css">
    <script src="../../../asset/bootstrap/js/jquery.min.js"></script>
    <script src="../../../asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #80E0F2 ;">
<div class="container">
<div class="row justify-content-center">
		<?php
			error_reporting(0);
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
			elseif (isset($successMSG)) 
			{
			?>
				<div class="col-lg-4 col-sm-4 alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $successMSG; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php
			}
		?>
	</div>
<div class="row d-flex justify-content-center">
  <a class="d-flex justify-content-center" href="index.php"><img src="../../../asset/image/logo.png" style="width:150px;height:100px" alt=""></a> 
</div>
<form method="post">
    <div class="row">
        <div class="col-md-6 mx-auto rounded p-6" style="background-color: #ECFAFD ;">
            <br>
            <div class="form-group p-2">
                <label for="">Email </label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
            </div>
            <div class="form-group p-2">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
            </div>
            <div class="form-group p-2">
                <br>
                <button type="submit" name="login" class=" form-control btn btn-primary"> Log In </button>
            </div>
            <br>

            <br>
            <br>
        </div>
    </div>
</form>