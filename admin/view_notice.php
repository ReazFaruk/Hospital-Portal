<?php include "header.php";
include "../model/funtion.php";
if (isset($_GET['id'])) {
    if (Notice_Delete("notice", $_GET['id'])) {
        echo "delete ok";
    } else {
        echo "delete error";
    }
}
?>
<div class="row pt-4 pb-4">
    <div class="col-md-6">
        <h4>
            <storng>Notice</storng>
        </h4>
    </div>
    <div class="col-md-6">
    </div>
</div>
<!-- <img src="" alt=""> -->
<table id="example1" class="display " style="width:100%; background-color: #98d7e6;">
    <thead>
        <tr>
            <th>Notice Published</th>
            <th>Notice Title</th>
            <th>Notice</th>
            <?php if($_SESSION['employee_type']==3) {?>
            <th>Action</th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
        <?php
        $rows = all_notice();
        if ($rows > 0) {
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?php echo $row['create_at']; ?></td>
                    <td><?php echo $row['notice_title']; ?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['notice_id']; ?>">
                            View
                        </button></td>
                        <?php if($_SESSION['employee_type']==3) {?>
                            <td> <a data-bs-toggle="modal" data-bs-target="#notice<?php echo $row['notice_id']; ?>" aria-current="page" class="btn btn-success">Edit</a><a href="?id=<?php echo $row['notice_id']; ?>" class="btn btn-danger">Delete</a> </td>
                            <?php }?>
                </tr>
                <!-- Modal -->
<div class="modal fade" id="notice<?php echo $row['notice_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php $edit_notic =edit_notice($row['notice_id']);
      if($edit_notic>0){
          foreach($edit_notic as $notice){?>
      <form action="../controler/controller.php?id=<?= $_SESSION['employee_id']?>" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Notice Title</label>
        <input type="hidden" value="<?= $notice['notice_id']?>" name="notice_id">
        <input type="text" class="form-control" name="notice_title" value="<?= $notice['notice_title']?>" placeholder="Enter Notice Title">
        </div>
        <div class="form-group">
        <label for="name">Notice Description</label>
        <textarea type="text" class="form-control" name="notice_description"  placeholder="Enter Notice Description"><?= $notice['notice_description']?></textarea>
        </div>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Notice_update" class="btn btn-primary">Update</button>
      </div>
      </form>
      <?php   }
      } ?>
    </div>
  </div>
</div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $row['notice_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Notice Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <form action="../controler/controller.php?id=<?= $_SESSION['employee_id'] ?>" method="post" enctype="multipart/form-data"> -->
                            <div class="modal-body">
                                <h5><?php echo $row['notice_title']; ?></h5>
                                <p><?php echo $row['notice_description']; ?></p>
                            </div>
                            <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </tbody>
</table>
</div>
</body>

</html>
<script type="text/javascript" src="../asset/bootstrap/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../asset/bootstrap/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable();
        $('#example1 tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
        });
    });
</script>