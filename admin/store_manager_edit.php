<?php include "header.php"; 
include "../model/funtion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
   <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Edit Store Manege</h5>
      </div>

      <form action="../controler/controller.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
      <?php
                        $rows = emloyee_edit($id);
                        foreach($rows as $row) {
                        ?>
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?php echo $row['store_maneger_name']; ?>" name="store_maneger_name" placeholder="Enter Store Maneger Name ">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" value="<?php echo $row['store_maneger_email']; ?>" name="store_maneger_email" placeholder="Enter Store Maneger Email ">
        </div>
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" value="<?php echo $row['store_maneger_phone']; ?>" name="store_maneger_phone" placeholder="Enter Store Maneger Phone ">
        </div>
        <div class="form-group">
        <label for="Address">Address</label>
        <textarea name="store_maneger_address"  class="form-control" id="" cols="10" rows="4"><?php echo $row['store_maneger_address']; ?></textarea>
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" value="<?php echo $row['store_maneger_password']; ?>" name="store_maneger_password" placeholder="Enter Store Maneger Password ">
        </div>
        <div class="form-group">
        <label for="image">Image</label>
        <img src="../asset/image/<?php echo $row['store_maneger_image']; ?>" style="width: 100px;height: 80px;" alt="">
        <input type="hidden" value="<?php echo $row['store_maneger_image']; ?>" name="images">
        <input type="file" name="image" class="form-control" />
        </div>
      <?php } ?>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="submit" name="store_maneger_update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
    <br><br><br>