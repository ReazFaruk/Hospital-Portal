<?php include "header.php";
include "../model/funtion.php";
if (isset($_GET['id'])) {
  if (Delete("tbl_salary", $_GET['id'])) {
    echo "delete ok";
  } else {
    echo "delete error";
  }
}
?>

<div class="row pt-4 pb-4">
  <div class="col-md-6">
    <h4>
      <storng>Medicine</storng>
    </h4>
  </div>
  <div class="col-md-6">
    <button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Medicine
    </button>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Add Salary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../controler/controller.php?id=<?= $_SESSION['employee_id'] ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
          <div class="form-group">
            <label for="name">Medicine Name</label>
            <input type="text" class="form-control" name="medicine_name" placeholder="Enter Medicine Name">
          </div>
          <div class="form-group">
            <label for="name">Medicine Brand</label>
            <input type="text" class="form-control" name="medicine_brand" placeholder="Enter Medicine Brand">
          </div>
          <div class="form-group">
            <label for="name">Medicine Buyeing Price</label>
            <input type="number" class="form-control" name="medicine_buying_price" placeholder="Enter Medicine Buyeing Price">
          </div>
          <div class="form-group">
            <label for="name">Medicine Selling Price</label>
            <input type="number" class="form-control" name="medicine_selling_price" placeholder="Enter Medicine Selling Price">
          </div>
          <div class="form-group">
            <label for="image">Medicine Image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter Medicine Selling Price">
          </div>
        </div>
        <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="medicine" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <img src="" alt=""> -->
<table id="example" class="display " style="width:100%; background-color: #98d7e6;">
  <thead>
    <tr>
      <th>Medicine Image</th>
      <th>Medicine Name</th>
      <th>Employee Name</th>
      <th>Employee Type</th>
      <th>Medicine Brand</th>
      <th>Medicine Buyeing Price</th>
      <th>Medicine Selling Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rows = all_medicine();
    if ($rows > 0) {
      foreach ($rows as $row) {
    ?>
        <tr>
          <td style="padding: 0px;width:11%;"><img src="../asset/image/<?php echo $row['image']; ?>" class="img-thumbnail" style=" width: 100%; height: 80px;  padding:0%;" alt=""></td>
          <td><?php echo $row['medicine_name']; ?> </td>
          <td><?php echo $row['employee_name']; ?> </td>
          <?php if ($row['employee_type'] == 1) { ?>
            <td> Doctor </td>
          <?php } elseif ($row['employee_type'] == 2) { ?>
            <td> Store Manege </td>
          <?php } elseif ($row['employee_type'] == 3) { ?>
            <td> Hospital Maneger</td>
          <?php } else { ?>
            <td> Accountant</td>
          <?php } ?>
          <td><?php echo $row['medicine_brand']; ?> TK</td>
          <td><?php echo $row['medicine_buying_price']; ?> TK</td>
          <td><?php echo $row['medicine_selling_price']; ?> TK</td>
          <td> <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['medicine_id']; ?>">Edit</a><a href="?id=<?php echo $row['medicine_id']; ?>" class="btn btn-danger">Delete</a> </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $row['medicine_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <?php 
              $single_medicine =single_medicine($row['medicine_id']);
              foreach($single_medicine as $single){
              ?>
              <form action="../controler/controller.php?id=<?= $_SESSION['employee_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
                  <div class="form-group">
                    <label for="name">Medicine Name</label>
                    <input type="hidden" name="medicine_id" value="<?= $single['medicine_id']?>">
                    <input type="text" class="form-control" name="medicine_name" value="<?= $single['medicine_name']?>" placeholder="Enter Medicine Name">
                    
                  </div>
                  <div class="form-group">
                    <label for="name">Medicine Brand</label>
                    <input type="text" class="form-control" name="medicine_brand" value="<?= $single['medicine_brand']?>" placeholder="Enter Medicine Brand">
                  </div>
                  <div class="form-group">
                    <label for="name">Medicine Buyeing Price</label>
                    <input type="number" class="form-control" name="medicine_buying_price"value="<?= $single['medicine_buying_price']?>" placeholder="Enter Medicine Buyeing Price">
                  </div>
                  <div class="form-group">
                    <label for="name">Medicine Selling Price</label>
                    <input type="number" class="form-control" name="medicine_selling_price"value="<?= $single['medicine_selling_price']?>" placeholder="Enter Medicine Selling Price">
                  </div>
                  <div class="form-group">
                    <br>
                    <img src="../asset/image/<?=$single['image']?>" alt="" style=" width: 100%; height: 120px;">
                    <label for="image">Medicine Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Enter Medicine Selling Price">
                  </div>
                </div>
                <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="medicine_Update" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    <?php } }
    } ?>
  </tbody>
</table>
</div>
</body>

</html>
<?php
include "script.php";
?>