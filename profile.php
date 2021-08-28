<?php
include "header.php";
include "model/funtion.php";
if (isset($_SESSION['user_id'])) {
?>
<div class="container">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Appointment</button>
    </li>
    <!-- <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
    </li> -->
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
<div class="col-md-6 mx-auto rounded p-6">
      <table class="table">
        <tbody>
          <?php 
          $rows = get_single_users($_SESSION['user_id']);
          if($rows>0){
            foreach($rows as $row){?>
          <tr>
            <th>Name</th>
            <td><?= $row['name']; ?></td>
          </tr>
          <tr>
            <th>Phone</th>
            <td><?= $row['phone']; ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $row['email']; ?></td>
          </tr>

        </tbody>

      </table>

      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Update  Your Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controler/controller.php?id=<?=$row['user_id']?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Doctor's Name ">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Enter Doctor's Email ">
        </div>
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" class="form-control" value="<?php echo $row['phone']; ?>" name="phone" placeholder="Enter Doctor's Phone ">
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" value="<?php echo $row['password']; ?>" name="password" placeholder="Enter Doctor's Password ">
        </div>
        </div>
        <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="Update_profile" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
 <?php }  
  }?>
</div>
    </div>
    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <table id="example" class="display " style="width:100%; background-color: #98d7e6;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Doctors</th>
            <th></th>
            <th>Status</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
          <?php

          $rows = all_appointment($_SESSION['user_id']);
          if (($rows)) {

            foreach ($rows as $row) {
          ?>
              <tr>
                <td><?php echo $row['patient_name']; ?> </td>
                <td><?php echo $row['patient_phone']; ?> </td>
                <td><?php echo $row['employee_name']; ?> </td>
                <td><?php echo $row['appointment_info']; ?> </td>
                <?php if ($row['appointment_status'] == 1) { ?>
                  <td> <button class="btn-sm btn-warning">Pending</button></td>
                <?php  } else if ($row['appointment_status'] == 2) { ?>
                  <td> <button class="btn-sm btn-info">Accept</button></td>
                <?php  } else if ($row['appointment_status'] == 3) { ?>
                  <td> <button class="btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['appointment_id'] ?>">Check Details</button></td>
                <?php  } else { ?>
                  <td> <button class="btn-sm btn-danger">Cancel</button></td>
                <?php } ?>
                <!-- <td> <a href="store_manager_edit.php?id=<?php echo $row['appointment_id']; ?>"class="btn btn-success" >Edit</a><a href="?id=<?php echo $row['appointment_id']; ?>" class="btn btn-danger" >Delete</a> </td> -->
              </tr>
              <?php
            $single_app = view_appointment($row['appointment_id']);
            if ($single_app > 0) {
                foreach ($single_app as $single) { ?>
                <!----- Model of check details ------>
                    <div class="modal fade" id="exampleModal<?= $row['appointment_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Sheba Hospital</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Date & Time : <?= $single['create_at'] ?></p>
                                                <h5>Doctor Details</h5>
                                                <p>Doctor Name: <?= $single['employee_name'] ?></p>
                                                <p>Phone : <?= $single['employee_phone'] ?></p>
                                                <p>E-mail : <?= $single['employee_email'] ?></p>
                                                <p>Address : <?= $single['employee_address'] ?></p>
                                            </div>
                                            <div class="col-md-6" style="float: right;">
                                                <p>&nbsp;</p>
                                                <h5>Patient Details</h5>
                                                <p>Patient Name: <?= $single['patient_phone'] ?></p>
                                                <p>Phone : <?= $single['phone'] ?></p>
                                                <p>E-mail : <?= $single['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mx-auto rounded p-2">
                                                <h6>Prescription</h6>
                                                <hr>
                                                <p><?= $single['prescription'] ?></p>
                                            </div>
                                            <div class="col-md-4 mx-auto rounded p-2">
                                                <h6>Patient Problem</h6>
                                                <hr>
                                                <p><?= $single['appointment_info'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="salary_subbmit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!----- Model of check details ------>
            <?php }
            }
 } ?>
        </tbody>
      </table>


    </div>
    <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.dsadsad..</div> -->
  </div>
<?php }
        } ?>

</div>
</div>
<?php
include "footer.php";
?>
<script type="text/javascript" src="asset/bootstrap/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="asset/bootstrap/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      
    });
  });
</script>