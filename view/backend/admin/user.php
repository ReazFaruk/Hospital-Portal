<?php include "header.php"; 
include "../../../model/funtion.php";
if (isset($_GET['id'])) {
    if (users_Delete("users", $_GET['id'])) {
        echo "delete ok";
    } else {
        echo "delete error";
    }
}
?>
<!-- Button trigger modal -->
<div class="row pt-4 pb-4">
<div class="col-md-6">
<h4><storng>Users</storng> </h4>
</div>
</div>
<!-- <img src="" alt=""> -->
<table id="example" class="display " style="width:100%; background-color: #98d7e6;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
        <?php
                $rows = get_all_users();
                if($rows>0){
                foreach ($rows as $row) {
                ?>
            <tr>
                <td><?php echo $row['name'];?> </td>
                <td><?php echo $row['email'];?> </td>
                <td><?php echo $row['phone'];?> </td>
                <td><a href="?id=<?php echo $row['user_id'];?>" class="btn btn-danger" >Delete</a> </td>
            </tr>
            <?php }
         } ?>
        </tbody>
    </table>
    </div>
    </body>
    </html>
<?php 
include "script.php"; ?>
