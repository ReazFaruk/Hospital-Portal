<?php
include "header.php";
include "../../../model/funtion.php";
$id = $_SESSION['employee_id'];
$rows = employee_profile($id);
if($rows>0){
foreach ($rows as $row) {   echo $row['employee_name'];       }}
 ?>