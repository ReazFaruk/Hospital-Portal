<?php
session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION["user_id"]);
    unset($_SESSION["name"]);
    header("Location:login.php");
}
// elseif(isset($_SESSION['id'])){
//     unset($_SESSION["id"]);
//     unset($_SESSION["name"]);
//     header("Location:login.php");   
// }

?>