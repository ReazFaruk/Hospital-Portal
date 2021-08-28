<?php
include "../model/funtion.php";
/*------------------- Create Users --------------------*/

if (isset($_POST['register'])) {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $password = strip_tags($_POST['password']);
    $cpassword = strip_tags($_POST['cpassword']);

    if (empty($name)) {
        $errMSG = "Please Enter  name.";
        header("Location:../register.php?mgs=Please Enter  name.");
    } else if (empty($email)) {
        $errMSG = "Please Enter Your email.";
        header("Location:../register.php?mgs=Please Enter Your email.");
    } else if (empty($phone)) {
        $errMSG = "Please Enter Your Phone Number.";
        header("Location:../register.php?mgs=Please Enter Your Phone Number.");
    } else if (empty($password)) {
        $errMSG = "Please Enter Your Password.";
        header("Location:../register.php?mgs=Please Enter Your Password.");
    } else if (empty($cpassword)) {
        $errMSG = "Please Enter Your Repeat Password.";
        header("Location:../register.php?mgs=Please Enter Your Repeat Password.");
    } else if (empty($password == $cpassword)) {
        $errMSG = "password not macthing .";
        header("Location:../register.php?mgs=password not macthing .");
    } else {
        email_check($email);

        if (email_check($email) == 0) {

            if (isset($name, $email, $phone, $password)) {
                create_user($name, $email, $phone, $password);

                header("Location:../login.php?succecfully Add");
            } else {
                echo ("Error description: " . mysqli_error($DB_con));
            }
        } else {
            $errMSG = "Error! Email already used.";
            header("Location:../register.php?mgs=Error! Email already used.");
        }
    }
}
if (isset($_POST['Update_profile'])) {
    $id = $_GET['id'];
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $password = strip_tags($_POST['password']);
    if (isset($id, $name, $email, $phone, $password)) {
        update_user($id, $name, $email, $phone, $password);
        header("Location:../profile.php?succecfully Update");
    }
}
if (isset($_POST['store_maneger_subbmit'])) {
    $imagFile = $_FILES['image']['name'];
    $tmp_dir  = $_FILES['image']['tmp_name'];
    $imgSize  = $_FILES['image']['size'];

    $upload_dir = '../asset/image/'; //uploade directly

    $imgExt = strtolower(pathinfo($imagFile, PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    $image = rand(1000, 1000000) . "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 50000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $image);
        } else {
            $errMSG = "Error! Your File is very large.";
        }
    } else {
        $errMSG = "Error! Only JPEG, JPG, PNG & GIF files are allowed.";
    }
    $store_maneger_name = $_POST['store_maneger_name'];
    $store_maneger_email = $_POST['store_maneger_email'];
    $store_maneger_phone = $_POST['store_maneger_phone'];
    $store_maneger_address = $_POST['store_maneger_address'];
    $store_maneger_password = $_POST['store_maneger_password'];
    $image;

    if (isset($store_maneger_name, $store_maneger_email, $store_maneger_phone, $store_maneger_address, $store_maneger_password, $image)) {
        create_store_maneger($store_maneger_name, $store_maneger_email, $store_maneger_phone, $store_maneger_address, $store_maneger_password, $image);


        header("Location: ../../admin/store_maneger.php?succecfully Add");
    } else {
        echo ("Error description: " . mysqli_error($DB_con));
    }
}
if (isset($_POST['Update_employee'])) {


    $imagFile = $_FILES['image']['name'];

    if ($imagFile != '') {
        $tmp_dir  = $_FILES['image']['tmp_name'];
        $imgSize  = $_FILES['image']['size'];

        $upload_dir = '../asset/image/'; //uploade directly

        $imgExt = strtolower(pathinfo($imagFile, PATHINFO_EXTENSION));

        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

        $image = rand(1000, 1000000) . "." . $imgExt;

        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 500000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image);
            } else {
                $errMSG = "Error! Your File is very large.";
            }
        } else {
            $errMSG = "Error! Only JPEG, JPG, PNG & GIF files are allowed.";
        }
        $profile = $_GET['profile'];
        $id = $_GET['id'];
        $employee_name = $_POST['employee_name'];
        $employee_email = $_POST['employee_email'];
        $employee_phone = $_POST['employee_phone'];
        $employee_address = $_POST['employee_address'];
        $employee_password = $_POST['employee_password'];
        $employee_type = $_POST['employee_type'];
        $image;

        if (isset($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image)) {
            employee_update($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image);
            if ($profile == 'p_update') {
                header("Location:../admin/profile.php?succefully Update");
            } elseif ($employee_type == 1) {
                header("Location: ../admin/doctor.php?succecfully Update");
            } elseif ($employee_type == 2) {
                header("Location: ../admin/store_maneger.php?succecfully Update");
            } elseif ($employee_type == 3) {
                header("Location: ../admin/hospital_maneger.php?succecfully Update");
            } else {
                header("Location: ../admin/accountant.php?succecfully Update");
            }
        } else {
            echo ("Error description: " . mysqli_error($DB_con));
        }
    } else {
        $profile = $_GET['profile'];
        $id = $_GET['id'];
        $employee_name = $_POST['employee_name'];
        $employee_email = $_POST['employee_email'];
        $employee_phone = $_POST['employee_phone'];
        $employee_address = $_POST['employee_address'];
        $employee_password = $_POST['employee_password'];
        $employee_type = $_POST['employee_type'];
        $image = 0;

        if (isset($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image)) {
            employee_update($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image);
            if (isset($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image)) {
                employee_update($id, $employee_name, $employee_email, $employee_phone, $employee_address, $employee_password, $image);
                if ($profile == 'p_update') {
                    header("Location:../admin/profile.php?succefully Update");
                } elseif ($employee_type == 1) {
                    header("Location: ../admin/doctor.php?succecfully Update");
                } elseif ($employee_type == 2) {
                    header("Location: ../admin/store_maneger.php?succecfully Update");
                } elseif ($employee_type == 3) {
                    header("Location: ../admin/hospital_maneger.php?succecfully Update");
                } else {
                    header("Location: ../admin/accountant.php?succecfully Update");
                }
            } else {
                echo ("Error description: " . mysqli_error($DB_con));
            }
        }
    }
}
if (isset($_POST['employee_subbmit'])) {
    $imagFile = $_FILES['image']['name'];
    $tmp_dir  = $_FILES['image']['tmp_name'];
    $imgSize  = $_FILES['image']['size'];

    $upload_dir = '../asset/image/'; //uploade directly

    $imgExt = strtolower(pathinfo($imagFile, PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    $image = rand(1000, 1000000) . "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 500000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $image);
        } else {
            $errMSG = "Error! Your File is very large.";
        }
    } else {
        $errMSG = "Error! Only JPEG, JPG, PNG & GIF files are allowed.";
    }

    $employee_name = $_POST['employee_name'];
    $employee_email = $_POST['employee_email'];
    $employee_phone = $_POST['employee_phone'];
    $employee_type = $_POST['employee_type'];
    $employee_address = $_POST['employee_address'];
    $employee_password = $_POST['employee_password'];
    $image;

    if (isset($employee_name, $employee_email, $employee_phone, $employee_type, $employee_address, $employee_password, $image)) {
        create_employee($employee_name, $employee_email, $employee_phone, $employee_type, $employee_address, $employee_password, $image);

        if ($employee_type == 1) {
            header("Location: ../admin/doctor.php?succecfully Add");
        } elseif ($employee_type == 2) {
            header("Location: ../admin/store_maneger.php?succecfully Add");
        } elseif ($employee_type == 3) {
            header("Location: ../admin/hospital_maneger.php?succecfully Add");
        } else {
            header("Location: ../admin/accountant.php?succecfully Add");
        }
    } else {
        echo ("Error description: " . mysqli_error($DB_con));
    }
}
if (isset($_POST['salary_subbmit'])) {

    $employee_id = $_POST['employee_id'];
    $salary_amount = $_POST['salary_amount'];

    if (isset($employee_id, $salary_amount)) {
        salary_add($employee_id, $salary_amount);
        header("Location: ../admin/salary.php?succecfully Add");
    } else {
        echo ("Error description: " . mysqli_error($DB_con));
    }
}
if (isset($_POST['salary_update'])) {
    $id = $_GET['id'];
    $salary_amount = $_POST['salary_amount'];
    if (isset($id, $salary_amount)) {
        salary_update($id, $salary_amount);
        header("Location: ../admin/salary.php?succecfully Add");
    }
}
if (isset($_POST['appointment'])) {

    $user_id = $_POST['user_id'];
    $patient_name = $_POST['patient_name'];
    $patient_phone = $_POST['patient_phone'];
    $employee_id = $_POST['employee_id'];
    $appointment_status = $_POST['appointment_status'];
    $appointment_info = $_POST['appointment_info'];
    $patient_type     = $_POST['patient_type'];
    $patient_bill_status = $_POST['patient_bill_status'];
    if (isset($user_id, $patient_name, $patient_phone, $employee_id, $appointment_status, $appointment_info, $patient_type, $patient_bill_status)) {
        appointment($user_id, $patient_name, $patient_phone, $employee_id, $appointment_status, $appointment_info, $patient_type, $patient_bill_status);
        header("Location:../profile.php?succecfully appointment took");
    }
}
if (isset($_POST['pendding'])) {
    $appointment_id = $_GET['id'];
    $appointment_status = $_POST['appointment_status'];
    if (isset($appointment_id, $appointment_status)) {
        pending($appointment_id, $appointment_status);
        header("Location: ../admin/appointment.php?succecfully Update Status");
    }
}
if (isset($_POST['accept'])) {
    $appointment_id = $_GET['id'];
    $appointment_status = 3;
    $prescription = $_POST['prescription'];
    if (isset($appointment_id, $appointment_status, $prescription)) {
        accept($appointment_id, $appointment_status, $prescription);
        header("Location: ../admin/appointment.php?succecfully Prescription");
    }
}
if (isset($_POST['Service'])) {
    $employee_id = $_GET['id'];
    $service_name = $_POST['service_name'];
    $service_value = $_POST['service_value'];
    if (isset($employee_id, $service_name, $service_value)) {
        service($employee_id, $service_name, $service_value);
        header("Location: ../admin/service.php?succecfully add service");
    }
}
if (isset($_POST['Service_update'])) {
    $service_id = $_POST['service_id'];
    $employee_id = $_GET['id'];
    $service_name = $_POST['service_name'];
    $service_value = $_POST['service_value'];
    if (isset($service_id, $employee_id, $service_name, $service_value)) {
        Service_update($service_id, $employee_id, $service_name, $service_value);
        header("Location: ../admin/service.php?succecfully Update service");
    }
}
if (isset($_POST['medicine'])) {
    $imagFile = $_FILES['image']['name'];
    $tmp_dir  = $_FILES['image']['tmp_name'];
    $imgSize  = $_FILES['image']['size'];

    $upload_dir = '../asset/image/'; //uploade directly

    $imgExt = strtolower(pathinfo($imagFile, PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    $image = rand(1000, 1000000) . "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 500000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $image);
        } else {
            $errMSG = "Error! Your File is very large.";
        }
    } else {
        $errMSG = "Error! Only JPEG, JPG, PNG & GIF files are allowed.";
    }
    $employee_id = $_GET['id'];
    $medicine_name = $_POST['medicine_name'];
    $medicine_brand = $_POST['medicine_brand'];
    $medicine_buying_price = $_POST['medicine_buying_price'];
    $medicine_selling_price = $_POST['medicine_selling_price'];
    $image;
    if (isset($employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image)) {
        medicine($employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image);

        header("Location: ../admin/medicine.php?succecfully Add");
    } else {
        echo ("Error description: " . mysqli_error($DB_con));
    }
}
if (isset($_POST['medicine_Update'])) {
    $imagFile = $_FILES['image']['name'];
    if ($imagFile != '') {
        $tmp_dir  = $_FILES['image']['tmp_name'];
        $imgSize  = $_FILES['image']['size'];

        $upload_dir = '../asset/image/'; //uploade directly

        $imgExt = strtolower(pathinfo($imagFile, PATHINFO_EXTENSION));

        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

        $image = rand(1000, 1000000) . "." . $imgExt;

        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 500000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image);
            } else {
                $errMSG = "Error! Your File is very large.";
            }
        } else {
            $errMSG = "Error! Only JPEG, JPG, PNG & GIF files are allowed.";
        }
        $employee_id = $_GET['id'];
        $medicine_id = $_POST['medicine_id'];
        $medicine_name = $_POST['medicine_name'];
        $medicine_brand = $_POST['medicine_brand'];
        $medicine_buying_price = $_POST['medicine_buying_price'];
        $medicine_selling_price = $_POST['medicine_selling_price'];
        $image;
        if (isset($medicine_id, $employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image)) {
            Update_medicine($medicine_id, $employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image);

            header("Location: ../admin/medicine.php?succecfully Add");
        } else {
            echo ("Error description: " . mysqli_error($DB_con));
        }
    } else {
        echo $employee_id = $_GET['id'];
        echo $medicine_id = $_POST['medicine_id'];
        echo $medicine_name = $_POST['medicine_name'];
        echo $medicine_brand = $_POST['medicine_brand'];
        echo $medicine_buying_price = $_POST['medicine_buying_price'];
        echo $medicine_selling_price = $_POST['medicine_selling_price'];
        echo $image = 0;
        if (isset($medicine_id, $employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image)) {
            Update_medicine($medicine_id, $employee_id, $medicine_name, $medicine_brand, $medicine_buying_price, $medicine_selling_price, $image);

            header("Location: ../admin/medicine.php?succecfully Add");
        } else {
            echo ("Error description: " . mysqli_error($DB_con));
        }
    }
}
if (isset($_POST['Notice'])) {
    $employee_id = $_GET['id'];
    $notice_title = $_POST['notice_title'];
    $notice_description = $_POST['notice_description'];
    if (isset($employee_id, $notice_title, $notice_description)) {
        notice($employee_id, $notice_title, $notice_description);
        header("Location: ../admin/view_notice.php?succecfully add notice");
    }
}
if (isset($_POST['Notice_update'])) {
    $employee_id = $_GET['id'];
    $notice_id = $_POST['notice_id'];
    $notice_title = $_POST['notice_title'];
    $notice_description = $_POST['notice_description'];
    if (isset($notice_id,$employee_id, $notice_title, $notice_description)) {
        Notice_update($notice_id,$employee_id, $notice_title, $notice_description);
        header("Location: ../admin/view_notice.php?succecfully Update notice");
    }
}
