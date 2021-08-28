<?php
session_start();
if(isset($_SESSION['admin_id'])){
    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_name"]);
    header("Location:login.php");
}
elseif(isset($_SESSION['employee_id'])){
    unset($_SESSION["employee_id"]);
    unset($_SESSION["employee_email"]);
    header("Location:login.php");   
}

?>