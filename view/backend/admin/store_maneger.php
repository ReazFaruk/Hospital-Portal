<?php include "header.php";
include "../../../model/funtion.php";
if (isset($_GET['id'])) {
  if (Delete("employee", $_GET['id'])) { ?>
  <div class="alert alert-danger" role="alert">
 <?= 'Delete' ?></div>
  <?php
  } else {
    echo "delete error";
  }
}
?>
<!-- Button trigger modal -->
<div class="row pt-4 pb-4">
  <div class="col-md-6">
    <h4>
      <storng>Store Maneger</storng>
    </h4>
  </div>
  <div class="col-md-6">

  </div>
</div>



<!-- <img src="" alt=""> -->
<table id="example" class="display " style="width:100%; background-color: #98d7e6;">
  <thead>
    <tr>
    <th>Image</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rows = get_all_store_maneger();
    if($rows > 0){
    foreach ($rows as $row) {
    ?>
      <tr>
        <td style="padding: 0px;width:11%;"><img src="../../../asset/image/<?php echo $row['image']; ?>" class="img-thumbnail" style=" width: 100%; height: 80px;  padding:0%;" alt=""></td>
        <td><?php echo $row['employee_name']; ?> </td>
        <td><?php echo $row['employee_email']; ?> </td>
        <td><?php echo $row['employee_phone']; ?> </td>
        <td><?php echo $row['employee_address']; ?> </td>
        <td>
          <a type="button"class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['employee_id'] ?>">Edit</a>
          <a href="?id=<?php echo $row['employee_id']; ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>

      <!-- Modal -->
<div class="modal fade" id="exampleModal<?= $row['employee_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update Store Manege</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
          $edit_rows = emloyee_edit($row['employee_id']);
          foreach($edit_rows as $edit_row) {
        ?>
      <form action="../../../controler/controller.php?id=<?=$row['employee_id']?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_name']; ?>" name="employee_name" placeholder="Enter Store Maneger Name ">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_email']; ?>" name="employee_email" placeholder="Enter Store Maneger Email ">
        </div>
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" value="<?php echo $edit_row['employee_phone']; ?>" name="employee_phone" placeholder="Enter Store Maneger Phone ">
        </div>
        <div class="form-group">
        <label for="Address">Address</label>
        <textarea name="employee_address"  class="form-control" id="" cols="10" rows="4"><?php echo $edit_row['employee_address']; ?></textarea>
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" value="<?php echo $edit_row['employee_password']; ?>" name="employee_password" placeholder="Enter Store Maneger Password ">
        </div>
        <div class="form-group">
        <label for="image">Image</label>
        <img src="../../../asset/image/<?php echo $edit_row['image']; ?>" style="width: 100px;height: 80px;" alt="">
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
    <?php } }} ?>
  </tbody>
</table>
</div>
</body>

</html>
<?php 
include "script.php";
?>