<?php include "header.php";
include "../model/funtion.php";
if (isset($_GET['id'])) {
    if (Delete("employee", $_GET['id'])) {
        echo "delete ok";
    } else {
        echo "delete error";
    }
}
?>
<!-- Button trigger modal -->
<div class="row pt-4 pb-4">
    <div class="col-md-6">
        <h4>
            <storng>Doctor Appointment</storng>
        </h4>
    </div>
</div>
<!-- <img src="" alt=""> -->
<table id="example1" class="display " style="width:100%; background-color: #98d7e6;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Doctors</th>
            <th>Status</th>
            <!-- <th>Action</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $rows = admin_appointment();
        if ($rows > 0) {
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?php echo $row['patient_name']; ?> </td>
                    <td><?php echo $row['patient_phone']; ?> </td>
                    <td><?php echo $row['employee_name']; ?> </td>
                    <?php if ($row['appointment_status'] == 1) { ?>
                        <td> <button class="btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#Pending<?= $row['appointment_id'] ?>">Pending</button></td>
                    <?php  } else if ($row['appointment_status'] == 2) { ?>
                        <td> <button class="btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#Accept<?= $row['appointment_id'] ?>">Accept</button></td>
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
                ?>
                <!----- Model of Pending ------>
                <div class="modal fade" id="Pending<?= $row['appointment_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Status </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../controler/controller.php?id=<?= $row['appointment_id'] ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
                                    <div class="form-group">
                                        <label for="appointment_status"> Status</label>
                                        <select name="appointment_status" class="form-control" id="appointment_status">
                                            <option selected>Select Status</option>
                                            <option value="2">Accept</option>
                                            <option value="4">Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="pendding" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!----- Model of Pending ------>
                <!----- Model of Accept ------>
                <div class="modal fade" id="Accept<?= $row['appointment_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Sheba Hospital</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../controler/controller.php?id=<?= $row['appointment_id'] ?>" method="post" enctype="multipart/form-data">
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
                                            <textarea name="prescription" class="form-control" id="" cols="10" rows="4" placeholder="Enter Prescription"></textarea>
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
                                    <button type="submit" name="accept" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!----- Model of Pending ------>
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
            // alert('You clicked on ' + data[0] + '\'s row');
        });
    });
</script>