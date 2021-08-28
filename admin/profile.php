<?php
include "header.php";
include "../model/funtion.php";
$id = $_SESSION['employee_id'];
$rows = employee_profile($id);
if($rows>0){
foreach ($rows as $row) {   ?>
<div class="d-flex justify-content-center">
   <img src="../asset/image/<?=$row['image']?>" class="img-thumbnail" style="height: 200px;weight:200px" alt="<?=$row['image']?>"> 
</div>
<div class="d-flex justify-content-center">   
   <h4><strong><br><?=$row['employee_name']?></strong></h4>
</div>
<div class="d-flex justify-content-center">   
   <h5><hr>Phone: <?=$row['employee_phone']?></h5>
</div>
<div class="d-flex justify-content-center">   
   <h5>Email: <?=$row['employee_email']?></h5>
</div>
<div class="d-flex justify-content-center">   
   <h5>Address: <?=$row['employee_address']?></h5>
</div>
 <?php 
 $salarys=salarys($row['employee_id']);
 if($salarys>0){
 foreach($salarys as $salary){?>
<div class="d-flex justify-content-center">   
   <h5>Salary Amount: <?=$salary['salary_amount']?> TK</h5>
</div>
<div class="d-flex justify-content-center">   
<a type="button"class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['employee_id'] ?>">Update</a>
</div>
<div class="modal fade" id="exampleModal<?= $row['employee_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update Your Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
          $edit_rows = emloyee_edit($row['employee_id']);
          foreach($edit_rows as $edit_row) {
        ?>
      <form action="../controler/controller.php?id=<?=$row['employee_id']?>&&profile=p_update" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_name']; ?>" name="employee_name" placeholder="Enter Doctor's Name ">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_email']; ?>" name="employee_email" placeholder="Enter Doctor's Email ">
        </div>
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_phone']; ?>" name="employee_phone" placeholder="Enter Doctor's Phone ">
        </div>
        <div class="form-group">
        <label for="Address">Address</label>
        <textarea name="employee_address"  class="form-control" id="" cols="10" rows="4"><?php echo $edit_row['employee_address']; ?></textarea>
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" value="<?php echo $edit_row['employee_password']; ?>" name="employee_password" placeholder="Enter Doctor's Password ">
        </div>
        <div class="form-group">
        <label for="image">Image</label>
        <img src="../asset/image/<?php echo $edit_row['image']; ?>" style="width: 100px;height: 80px;" alt="">
        <input type="hidden" name="employee_type" class="form-control" value="<?=$edit_row['employee_type']?>" />
        <input type="file" name="image" class="form-control" />
        </div>
        </div>
        <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="Update_employee" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
 }}
  }}}
 ?>