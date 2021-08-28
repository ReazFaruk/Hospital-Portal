<?php 
include "header.php";
include "model/funtion.php";
 ?>


<div class="row">
<div class="col-md-12" >
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="position: relative;
  font-family: Arial;">
      <img src="asset/image/banner.jpg" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
      <?php if(isset($_SESSION['user_id'])){?>
<button type="button" style="position: absolute;
bottom: 280px;
right: 650px;
color: white;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appointment">
Take An Appointment 
</button>
<?php }else{?>
  <a href="login.php" style="position: absolute;
  bottom: 280px;
  right: 650px;
  color: white;" class="btn btn-danger" >
Take An Appointment 
</a>
<?php } ?>
    </div>
    <div class="carousel-item" style="position: relative;
  font-family: Arial;">
      <img src="asset/image/slider-01.png" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
      <?php if(isset($_SESSION['user_id'])){?>
<button type="button" style="position: absolute;
bottom: 280px;
right: 650px;
color: white;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appointment">
Take An Appointment 
</button>
<?php }else{?>
  <a href="login.php" style="position: absolute;
  bottom: 280px;
  right: 650px;
  color: white;" class="btn btn-danger" >
Take An Appointment 
</a>
<?php } ?>
    </div>
    <div class="carousel-item" style="position: relative;
  font-family: Arial;">
      <img src="asset/image/slider-02.png" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
      <?php if(isset($_SESSION['user_id'])){?>
<button type="button" style="position: absolute;
bottom: 280px;
right: 650px;
color: white;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appointment">
Take An Appointment 
</button>
<?php }else{?>
  <a href="login.php" style="position: absolute;
  bottom: 280px;
  right: 650px;
  color: white;" class="btn btn-danger" >
Take An Appointment 
</a>
<?php } ?>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> Take An Appointment </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controler/controller.php" method="post">
      <div class="modal-body" style="background:linear-gradient(90deg, #a1c4fd 0%,#c2e9fb 100% );">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="patient_name" placeholder="Enter Patient Name ">
        </div>
     
        <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" name="patient_phone" placeholder="Enter Employee Phone ">
        </div>
        <div class="form-group">
        <label for="employee_id">Available Doctor</label>
        <select name="employee_id" class="form-control" id="">
        <option selected>Select Doctor</option>
        <?php
                $rows = get_all_doctor();
                if($rows>0){
                foreach ($rows as $row) {  
                ?>
        <option value="<?php echo $row['employee_id'];?>"><?php echo $row['employee_name'];?></option>
<?php }}?>
        </select>
        <input type="hidden" value="1" name="appointment_status">
        <input type="hidden" value="<?= $_SESSION['user_id']; ?>" name="user_id">
        <div class="form-group">
        <label for="appointment_info">Describe Patient Problem</label>
        <textarea name="appointment_info" class="form-control" id="" cols="10" rows="4" placeholder="Enter Describe Patient Problem"></textarea>
        </div>
        <div class="form-group">
        <label for="patient_type">Select Patient Status</label>
          <select name="patient_type" id="" class="form-control">
            <option selected> Select Patient Status</option>
            <option value="1"> Normal Patient</option>
            <option value="2"> Emergency Patient</option>
          </select>
        </div>
        <div class="form-group">
        <label for="patient_bill_status">Payment</label>
        <select name="patient_bill_status" class="form-control" id="">
          <option selected>Select Your Payment</option>
          <option value="0">Bkash</option>
          <option value="1">Rocket</option>
          <option value="2">Credit Card</option>
          <option value="3">Dedit Card</option>
        </select>
        </div>      
        </div>
      </div>
      <div class="modal-footer" style="background:linear-gradient(90deg, #89f7fe 0%,#66a6ff 100% );">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="appointment" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>