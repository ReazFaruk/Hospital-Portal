<?php
 
 $DB_HOST = "localhost";
 $DB_USER = "root";
 $DB_PASS = "";
 $DB_NAME = "sheba";

  $DB_con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// if($DB_con){

//     echo "succes";
// }
 if ($DB_con->connect_errno){
     die("Error! ->".$DB_con->connect_errno);
 }
 ?>