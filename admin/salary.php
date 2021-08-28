<?php include "header.php";
include "../model/funtion.php";
if (isset($_GET['id'])) {
  if (salary_Delete("tbl_salary", $_GET['id'])) {
    echo "delete ok";
  } else {
    echo "delete error";
  }
}
?>
<div class="row pt-4 pb-4">
  <div class="col-md-6">
    <h4>
      <storng>Salary</storng>
    </h4>
  </div>
  <div class="col-md-6">
    <button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Salary
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
      <form action="../controler/controller.php" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
          <div class="form-group">
            <label for="name">Salary Amount</label>
            <input type="number" class="form-control" name="salary_amount" placeholder="Enter Salary Amount">
          </div>
          <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" id="employee_id">
              <option selected>Select Employee</option>
              <?php
              $rows = all_emloley();
              if ($rows > 0) {
                foreach ($rows as $row) {
              ?>
                  <option value="<?php echo $row['employee_id']; ?>"><?php echo $row['employee_name']; ?></option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="salary_subbmit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <img src="" alt=""> -->
<table id="example" class="display " style="width:100%; background-color: #98d7e6;">
  <thead>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Employee Type</th>
      <th>Salary</th>
      <th>Salary</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rows = all_salary();
    if ($rows > 0) {
      foreach ($rows as $row) {
    ?>
        <tr>

          <td style="padding: 0px;width:11%;"><img src="../asset/image/<?php echo $row['image']; ?>" class="img-thumbnail" style=" width: 100%; height: 80px;  padding:0%;" alt=""></td>
          <td><?php echo $row['employee_name']; ?> </td>
          <?php if ($row['employee_type'] == 1) { ?>
            <td> Doctor </td>
          <?php } elseif ($row['employee_type'] == 2) { ?>
            <td> Store Manege </td>
          <?php } elseif ($row['employee_type'] == 3) { ?>
            <td> Hospital Maneger</td>
          <?php } else { ?>
            <td> Accountant </td>
          <?php } ?>
          <td><?php echo $row['salary_amount']; ?> TK</td>
          <td> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['salary_id']; ?>">Edit</button><a href="?id=<?php echo $row['salary_id']; ?>" class="btn btn-danger">Delete</a> </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $row['salary_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update Salary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <?php
              $edit_salary = single_salary($row['salary_id']);
              foreach ($edit_salary as $salary) {
              ?>
                <form action="../controler/controller.php?id=<?= $salary['salary_id'] ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="">Employee Name</label>
                        <h4><?php echo $salary['employee_name']; ?></h4>
                      </div>
                      <label for="name">Salary Amount</label>
                      <input type="number" class="form-control" value="<?= $salary['salary_amount'] ?>" name="salary_amount" placeholder="Enter Salary Amount">
                    </div>

                  </div>
                  <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="salary_update" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
  <?php }
            }
          } ?>
  </tbody>
</table>
</div>
</body>

</html>
<?php
include "script.php";
?>