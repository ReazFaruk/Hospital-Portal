<?php

include "conect.php";

function create_user($name, $email, $phone, $password)
{

    global $DB_con;

    $sql = "INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
    $count = $DB_con->query($sql);

    return $count;
}
function update_user($id,$name,$email,$phone,$password){
	global $DB_con;
	$sql= "UPDATE users SET name = '$name', email = '$email',phone ='$phone',password = '$password' WHERE user_id=$id";
	$count = $DB_con->query($sql);

    return $count;
}
function email_check($email)
{

    global $DB_con;

    $email_check = $DB_con->query("SELECT email FROM users WHERE email = '$email' ");
    $count = $email_check->num_rows;
    return $count;
}
function password_check($password)
{
    global $DB_con;

    $passwrod_check = $DB_con->query("SELECT password FROM users WHERE password = '$password' ");
    $count = $passwrod_check->num_rows;
    return $count;
}
function create_store_maneger($store_maneger_name,$store_maneger_email,$store_maneger_phone,$store_maneger_address,$store_maneger_password,$image)
{
    global $DB_con;

    $sql = "INSERT INTO store_maneger(store_maneger_name,store_maneger_email,store_maneger_phone,store_maneger_address,store_maneger_password,store_maneger_image) 
    VALUES('$store_maneger_name','$store_maneger_email','$store_maneger_phone','$store_maneger_address','$store_maneger_password','$image')";
    $count = $DB_con->query($sql);

    return $count;
   
}
function get_all_store_maneger(){
    global $DB_con;

	$sql = "SELECT * FROM employee WHERE employee_type = 2";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function Delete($table, $id)
{
   global $DB_con;

   $sql = mysqli_query($DB_con,"DELETE FROM $table WHERE employee_id =$id ");
   if($sql){
    return true;
   }
  
    else{
        return false;
    }
  
}

function emloyee_edit($id){
    global $DB_con; 
	$sql = "SELECT * FROM employee WHERE employee_id  =$id";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows1 = [];
		$i = 0;
		while ($row1 = mysqli_fetch_assoc($result)) {
			$rows1[$i] = $row1;
			$i = $i + 1;
		}
		return $rows1;
	} else
		return false;
}
function employee_update($id,$employee_name,$employee_email,$employee_phone,$employee_address,$employee_password,$image)
{
    global $DB_con;
if($image != 0){
	$sql = "UPDATE employee SET employee_name = '$employee_name', employee_email = '$employee_email',employee_phone ='$employee_phone',employee_address = '$employee_address',employee_password= '$employee_password' ,image ='$image'  WHERE employee_id  = '$id'  ";
	$count = $DB_con->query($sql);
	return $count;
}else{
	$sql = "UPDATE employee SET employee_name = '$employee_name', employee_email = '$employee_email',employee_phone ='$employee_phone',employee_address = '$employee_address',employee_password= '$employee_password' WHERE employee_id  = '$id'  ";
	$count = $DB_con->query($sql);
	return $count;
}

   
}
function create_employee($employee_name,$employee_email,$employee_phone,$employee_type,$employee_address,$employee_password,$image)
{
	global $DB_con;

    $sql = "INSERT INTO employee(employee_name,employee_email,employee_phone,employee_type,employee_address,employee_password,image) 
    VALUES('$employee_name','$employee_email','$employee_phone','$employee_type','$employee_address','$employee_password','$image')";
    $count = $DB_con->query($sql);

    return $count;
}
function get_all_hospital_maneger(){
    global $DB_con;

	$sql = "SELECT * FROM employee WHERE employee_type = 3";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function get_all_doctor(){
    global $DB_con;

	$sql = "SELECT * FROM employee WHERE employee_type = 1";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function get_all_accountant(){
    global $DB_con;

	$sql = "SELECT * FROM employee WHERE employee_type = 4";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function get_all_users(){
    global $DB_con;

	$sql = "SELECT * FROM users";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function get_single_users($id){
    global $DB_con;

	$sql = "SELECT * FROM users WHERE user_id=$id";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function users_Delete($table, $id)
{
   global $DB_con;

   $sql = mysqli_query($DB_con,"DELETE FROM $table WHERE user_id =$id ");
   $sqls = mysqli_query($DB_con,"DELETE FROM doctor_appointment WHERE user_id =$id");
   if($sql && $sqls){
    return true;
   }
  
    else{
        return false;
    }
  
}
function salary_add($employee_id,$salary_amount){
	global $DB_con;

    $sql = "INSERT INTO tbl_salary(employee_id,salary_amount) 
    VALUES('$employee_id','$salary_amount')";
    $count = $DB_con->query($sql);

    return $count;
}
function  salary_update($id,$salary_amount){
	global $DB_con;
	$sql = "UPDATE tbl_salary SET salary_amount = '$salary_amount' WHERE salary_id= $id";
	$count = $DB_con->query($sql);

    return $count;
}
function salary_Delete($table, $id)
{
   global $DB_con;

   $sql = mysqli_query($DB_con,"DELETE FROM $table WHERE salary_id =$id ");
   if($sql){
    return true;
   }
  
    else{
        return false;
    }
  
}
function all_emloley(){
	global $DB_con;

	$sql = "SELECT * FROM employee";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function all_salary(){
	global $DB_con;
$sql = "SELECT tbl_salary.employee_id, employee.*,tbl_salary.*  FROM employee INNER JOIN tbl_salary
ON tbl_salary.employee_id=employee.employee_id";
	// $sql = "SELECT * FROM tbl_salary";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function single_salary($id)
{
	global $DB_con;
	$sql = "SELECT tbl_salary.employee_id, employee.*,tbl_salary.*  FROM employee INNER JOIN tbl_salary
	ON tbl_salary.employee_id=employee.employee_id WHERE salary_id = $id";
		$result = mysqli_query($DB_con, $sql);
		if (mysqli_num_rows($result) > 0) {
			$rows = [];
			$i = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$rows[$i] = $row;
				$i = $i + 1;
			}
			return $rows;
		} else
			return false;
}
function appointment($user_id,$patient_name,$patient_phone,$employee_id,$appointment_status, $appointment_info,$patient_type,$patient_bill_status){
	global $DB_con;

    $sql = "INSERT INTO doctor_appointment(user_id,patient_name,patient_phone,employee_id,appointment_status,appointment_info,patient_type,patient_bill_status) 
    VALUES('$user_id','$patient_name','$patient_phone','$employee_id','$appointment_status','$appointment_info','$patient_type','$patient_bill_status')";
    $count = $DB_con->query($sql);

    return $count;

}
function all_appointment($id){
	global $DB_con;
	$sql = "SELECT doctor_appointment.employee_id, employee.*,doctor_appointment.*  FROM employee INNER JOIN doctor_appointment
	ON doctor_appointment.employee_id=employee.employee_id WHERE user_id = $id";
	//$sql = "SELECT  FROM doctor_appointment 
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function admin_appointment(){
	global $DB_con;
	$sql = "SELECT employee.*,doctor_appointment.*  FROM  doctor_appointment INNER JOIN employee
	ON doctor_appointment.employee_id=employee.employee_id";
	//$sql = "SELECT  FROM doctor_appointment 
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function view_appointment($id){
	global $DB_con;
	$sql = "SELECT doctor_appointment.employee_id, employee.*,doctor_appointment.*,users.*  FROM ((doctor_appointment 
	INNER JOIN employee ON doctor_appointment.employee_id=employee.employee_id) 
	INNER JOIN users ON doctor_appointment.user_id=users.user_id) WHERE appointment_id = $id";
	//$sql = "SELECT  FROM doctor_appointment 
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function pending( $appointment_id,$appointment_status){
	global $DB_con;
	$sql = "UPDATE doctor_appointment SET appointment_status = '$appointment_status' WHERE appointment_id= $appointment_id";
	$count = $DB_con->query($sql);

    return $count;
}
function accept( $appointment_id,$appointment_status,$prescription){
	global $DB_con;
	$sql = "UPDATE doctor_appointment SET appointment_status = '$appointment_status', prescription='$prescription' WHERE appointment_id= $appointment_id";
	$count = $DB_con->query($sql);

    return $count;
}
function service($employee_id,$service_name, $service_value){
	global $DB_con;

    $sql = "INSERT INTO service(employee_id,service_name,service_value) 
    VALUES('$employee_id','$service_name','$service_value')";
    $count = $DB_con->query($sql);

    return $count;

}
function Service_update($service_id,$employee_id,$service_name,$service_value){
global $DB_con;
$sql = "UPDATE service SET employee_id='$employee_id',service_name='$service_name',service_value='$service_value' WHERE service_id=$service_id";
$count = $DB_con->query($sql);

return $count;
}
function all_service(){
	global $DB_con;
	$sql = "SELECT service.employee_id, employee.*,service.*  FROM employee INNER JOIN service
	ON service.employee_id=employee.employee_id";
	
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function single_service($id){
	global $DB_con;
	$sql = "SELECT service.employee_id, employee.*,service.*  FROM employee INNER JOIN service
	ON service.employee_id=employee.employee_id WHERE service_id = $id";
	
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function medicine($employee_id,$medicine_name,$medicine_brand,$medicine_buying_price,$medicine_selling_price,$image)
{
	global $DB_con;

    $sql = "INSERT INTO medicine(employee_id,medicine_name,medicine_brand,medicine_buying_price,medicine_selling_price,image) 
    VALUES('$employee_id','$medicine_name','$medicine_brand','$medicine_buying_price','$medicine_selling_price','$image')";
    $count = $DB_con->query($sql);
    return $count;
}
function all_medicine(){
	global $DB_con;
	$sql = "SELECT medicine.employee_id, employee.*,medicine.*  FROM employee INNER JOIN medicine
	ON medicine.employee_id=employee.employee_id";
	
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function single_medicine($id){
	global $DB_con;
	$sql = "SELECT medicine.employee_id, employee.*,medicine.*  FROM employee INNER JOIN medicine
	ON medicine.employee_id=employee.employee_id WHERE medicine_id=$id";
	
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function  Update_medicine($medicine_id,$employee_id,$medicine_name,$medicine_brand,$medicine_buying_price,$medicine_selling_price,$image){
	
    global $DB_con;
if($image != 0){
	$sql = "UPDATE medicine SET employee_id= '$employee_id', medicine_name = '$medicine_name', medicine_brand = '$medicine_brand',medicine_buying_price ='$medicine_buying_price',medicine_selling_price = '$medicine_selling_price',image ='$image'  WHERE medicine_id  = '$medicine_id'  ";
	$count = $DB_con->query($sql);
	return $count;
}else{
	$sql = "UPDATE medicine SET employee_id= '$employee_id', medicine_name = '$medicine_name', medicine_brand = '$medicine_brand',medicine_buying_price ='$medicine_buying_price',medicine_selling_price = '$medicine_selling_price' WHERE medicine_id  = '$medicine_id'  ";
	$count = $DB_con->query($sql);
	return $count;
}
}
function Delete_medicine($table,$id){
	global $DB_con;

	$sql = mysqli_query($DB_con,"DELETE FROM $table WHERE medicine_id =$id ");
	if($sql){
	 return true;
	}
   
	 else{
		 return false;
	 }
}
function Delete_service($table,$id){
	global $DB_con;

	$sql = mysqli_query($DB_con,"DELETE FROM $table WHERE service_id =$id ");
	if($sql){
	 return true;
	}
   
	 else{
		 return false;
	 }
}
function notice($employee_id,$notice_title, $notice_description){
	global $DB_con;

    $sql = "INSERT INTO notice(employee_id,notice_title,notice_description) 
    VALUES('$employee_id','$notice_title','$notice_description')";
    $count = $DB_con->query($sql);

    return $count;
}
function Notice_update($notice_id,$employee_id, $notice_title, $notice_description){
global $DB_con;

$sql = "UPDATE notice SET  employee_id=$employee_id,notice_title='$notice_title',notice_description='$notice_description' WHERE notice_id=$notice_id";
$count = $DB_con->query($sql);

    return $count;
}
function all_notice(){
	global $DB_con;

	$sql = "SELECT * FROM notice";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function edit_notice($id){
	global $DB_con;

	$sql = "SELECT * FROM notice WHERE notice_id=$id";
	$result = mysqli_query($DB_con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function Notice_Delete($table,$id){
	global $DB_con;

	$sql = mysqli_query($DB_con,"DELETE FROM $table WHERE notice_id =$id ");
	if($sql){
	 return true;
	}
   
	 else{
		 return false;
	 }
}
function employee_profile($id){
	global $DB_con;
// $sql = "SELECT employee.employee_id, employee.*,tbl_salary.*  FROM (employee INNER JOIN tbl_salary
// ON tbl_salary.employee_id=employee.employee_id) WHERE employee_id=$id ";
	 $sql = "SELECT * FROM employee WHERE employee_id=$id ";
	$result = mysqli_query($DB_con, $sql);
	if(mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}
function salarys($id){
	global $DB_con;
	 $sql = "SELECT * FROM tbl_salary WHERE employee_id=$id ";
	$result = mysqli_query($DB_con, $sql);
	if(mysqli_num_rows($result) > 0) {
		$rows = [];
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[$i] = $row;
			$i = $i + 1;
		}
		return $rows;
	} else
		return false;
}