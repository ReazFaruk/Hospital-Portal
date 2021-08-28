<?php include "header.php"; 
include "../../../model/funtion.php";
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
<h4><storng>Service</storng> </h4>
</div>
<div class="col-md-6">
<button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add New Service 
</button>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Add New Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../../controler/controller.php?id=<?= $_SESSION['employee_id']?>" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Service Name</label>
        <input type="text" class="form-control" name="service_name" placeholder="Enter Service Name">
        </div>
        <div class="form-group">
        <label for="name">Service Value</label>
        <input type="text" class="form-control" name="service_value" placeholder="Enter Service Value">
        </div>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Service" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- <img src="" alt=""> -->
<table id="example1" class="display " style="width:100%; background-color: #98d7e6;">
        <thead>
            <tr>
                <th>Employee Image</th>
                <th>Employee Name</th>
                <th>Employee Type</th>
                <th>Service Name</th>
                <th>Service Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
        <?php
                $rows = all_service();
                if($rows>0){
                foreach ($rows as $row) {          
                ?>
            <tr>

            <td style="padding: 0px;width:11%;"><img src="../../../asset/image/<?php echo $row['image']; ?>" class="img-thumbnail" style=" width: 100%; height: 80px;  padding:0%;" alt=""></td>
                <td><?php echo $row['employee_name'];?> </td>
                <?php if($row['employee_type'] == 1){?>
                  <td> Doctor </td>
                <?php }elseif($row['employee_type'] == 2){ ?>
                  <td> Store Manege </td>
                  <?php }elseif($row['employee_type'] == 3){ ?>
                    <td> Hospital Maneger</td>
                    <?php }else { ?>
                      <td> Accountant </td>
                      <?php } ?>
                <td><?php echo $row['service_name'];?></td>
                <td><?php echo $row['service_value'];?></td>
                <td> <a href="store_manager_edit.php?id=<?php echo $row['service_id'];?>"class="btn btn-success" >Edit</a><a href="?id=<?php echo $row['service_id'];?>" class="btn btn-danger" >Delete</a> </td>
            </tr>
            <?php }
         } ?>
        </tbody>
    </table>
    </div>
    </body>
    </html>
    <script type="text/javascript" src="../../../asset/bootstrap/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../../asset/bootstrap/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
    var table = $('#example1').DataTable();
     
    $('#example1 tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    } );
} );
    </script>
