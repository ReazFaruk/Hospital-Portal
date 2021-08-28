<?php include "header.php" ?>

                    <div class="modal-content">
                        <div class="modal-header" style="background:linear-gradient(90deg, #000046 0%,#1cb5e0 100% );">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: white;">  Status </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../../controler/controller.php" method="post" enctype="multipart/form-data">
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

             <!----- Model of Pending ------>