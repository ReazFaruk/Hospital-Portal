<?php
include "header.php";
if($_SESSION['employee_type'] ==0){
  ?>
<div class="row pt-4 pb-4">
<div class="col-md-6">
<h4><storng>Employee</storng> </h4>
</div>
<div class="col-md-6">
<button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add Employee 
</button>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../controler/controller.php" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="employee_name" placeholder="Enter Employee Name ">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" name="employee_email" placeholder="Enter Employee Email ">
        </div>
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" name="employee_phone" placeholder="Enter Employee Phone ">
        </div>
        <div class="form-group">
        <label for="Phone">Employee</label>
        <select name="employee_type" class="form-control" id="">
        <option selected>Select Employee</option>
        <option value="1">Doctor</option>
        <option value="2">Store Maneger</option>
        <option value="3">Hospital Maneger</option>
        <option value="4">Accountant</option>
        </select>
      
        </div>
        <div class="form-group">
        <label for="Address">Address</label>
        <textarea name="employee_address" class="form-control" id="" cols="10" rows="4">Enter Employee Address</textarea>
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="employee_password" placeholder="Enter Employee Password ">
        </div>
        <div class="form-group">
        <label for="image">Image</label>
       <input type="file" name="image" class="form-control" data-height="300" />
        </div>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="employee_subbmit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
} 
 ?>
<div class="row">
  <?php if($_SESSION['employee_type']== 0){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    Store Maneger
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage  Store Maneger</h5>
    <p class="card-text">
    View Store Maneger.</br>
    Update Store Maneger.</br>
    Delete Store Maneger.</p>
    <a href="store_maneger.php" class="btn btn-primary">Go Store Maneger</a>
  </div>
</div>
    </div>
    <?php } if($_SESSION['employee_type']== 0 ){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    Hospital Maneger
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Hospital Maneger</h5>
    <p class="card-text">
    View Hospital Maneger.</br>
    Update Hospital Maneger.</br>
    Delete Hospital Maneger.</p>
    <a href="hospital_maneger.php" class="btn btn-primary">Go Hospital Maneger</a>
  </div>
</div>
</div>
<?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==3 ){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    Doctor
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Doctor's</h5>
    <p class="card-text">
    View Doctor's.</br>
    Update Doctor's.</br>
    Delete Doctor's.</p>
    <a href="doctor.php" class="btn btn-primary">Go Doctor Page</a>
  </div>
</div>
</div>
<?php } ?>
</div>
<div class="row">
<?php if($_SESSION['employee_type']== 0 ){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
   Accountant
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Accountant</h5>
    <p class="card-text">
    View Accountant.</br>
    Update Accountant.</br>
    Delete Accountant.</p>
    <a href="accountant.php" class="btn btn-primary">Go Accountant Page</a>
  </div>
</div>
</div>
<?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==4 ){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    User
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage User</h5>
    <p class="card-text">
    View User.</br>
    Update User.</br>
    Delete User.</p>
    <a href="user.php" class="btn btn-primary">Go User Page</a>
  </div>
</div>
</div>
<?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==3 ){?>
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    Salary
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Salary</h5>
    <p class="card-text">
    View Salary.</br>
    Update Salary.</br>
    Delete Salary.</p>
    <a href="salary.php" class="btn btn-primary">Go Salary Page</a>
  </div>
</div>
</div>
</div>
<div class="row">
<?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==1 || $_SESSION['employee_type']==3){?>
  <div class="col-md-4">
  <div class="card">
  <div class="card-header">
  Appointment
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Appointment</h5>
    <p class="card-text">
    View Appointment.</br>
    Update Appointment.</br>
    Delete Appointment.</p>
    <a href="appointment.php" class="btn btn-primary">Go Appointment Page</a>
  </div>
</div>
  </div>
  <?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==2){?>
  <div class="col-md-4">
  <div class="card">
  <div class="card-header">
  Medicine
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Medicine</h5>
    <p class="card-text">
    View Medicine.</br>
    Update Medicine.</br>
    Delete Medicine.</p>
    <a href="medicine.php" class="btn btn-primary">Go Medicine Page</a>
  </div>
</div>
  </div>
  <?php } if($_SESSION['employee_type']== 0 || $_SESSION['employee_type']==3 ){?>
  <div class="col-md-4">
  <div class="card">
  <div class="card-header">
  Service
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Service</h5>
    <p class="card-text">
    View Service.</br>
    Update Service.</br>
    Delete Service.</p>
    <a href="service.php" class="btn btn-primary">Go Service Page</a>
  </div>
</div>
  </div>
  <?php } ?>
</div>