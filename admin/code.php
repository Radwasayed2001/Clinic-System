<?php
include('middleware/adminMiddleware.php');
include('core/myfunction.php');
if (isset($_POST['add-major-btn'])) {
    $name = mysqli_real_escape_string($con,$_POST['name']);
    if (empty(trim($name))) {
        redirect("add-major.php", "name is required");
    }
    if (empty($_FILES['image']['name'])) {
        redirect("add-major.php", "image is required");
    }
    $image = $_FILES['image']['name'];
    $path = "uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;
    $major_query = "INSERT INTO `major`(`name`, `image`) VALUES ('$name','$filename')";
    $major_query_run = mysqli_query($con, $major_query);
    if ($major_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-major.php", "Major Added Successfully");
    } else {
        redirect("add-major.php", "Something Went Wrong");
    }
}
else if (isset($_POST['update-major-btn'])){
    $id = mysqli_real_escape_string($con,$_POST['major-id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    if (empty(trim($name))) {
        redirect("add-major.php", "name is required");
    }
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $path = "uploads";
    if ($new_image == ""){
        $update_image = $old_image;
    } else {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
         $update_image = time() . '.' . $image_ext;
    }
    $update_query = "UPDATE `major` SET `name`='$name',`image`='$update_image' WHERE `id`='$id'";
    $update_query_run = mysqli_query($con,$update_query);
    if ($update_query_run){
        if ($new_image != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_image);
            if (file_exists('uploads/'.$old_image)){
                unlink("uploads/".$old_image);
            }
        }
        redirect("edit-major.php?id=$id", "Major Updated Successfully");
    } else {
        redirect("edit-major.php?id=$id", "Something went Wrong");
    }
}
else if (isset($_POST['delete-major-btn'])) {
    $id = $_POST['major_id'];
    $major_query = "SELECT * FROM `major` WHERE `id` = '$id'";
    $major_query_run = mysqli_query($con, $major_query);
        $major_data = mysqli_fetch_array($major_query_run);
        $img = $major_data['image'];
    $delete_query = "DELETE FROM `major` WHERE `id`='$id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if (mysqli_affected_rows($con)){
        if (file_exists('uploads/'.$img)){
            unlink("uploads/".$img);
        }
        echo 200;
    } else{
        echo 500;
    }
}
else if (isset($_POST['delete-booking-btn'])) {
    $id = $_POST['booking_id'];
    $booking_query = "SELECT * FROM `bookings` WHERE `id` = '$id'";
    $booking_query_run = mysqli_query($con, $booking_query);
    $booking_data = mysqli_fetch_array($booking_query_run);
    $delete_query = "DELETE FROM `bookings` WHERE `id`='$id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if (mysqli_affected_rows($con)){
        echo 200;
    } else{
        echo 500;
    }
}
else if (isset($_POST['delete-contact-btn'])) {
    $id = $_POST['contact_id'];
    $delete_query = "DELETE FROM `contact` WHERE `id`='$id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if (mysqli_affected_rows($con)){
        echo 200;
    } else{
        echo 500;
    }
}
else if (isset($_POST['delete-doctor-btn'])) {
    $id = $_POST['doctor_id'];
    $doctor_query = "SELECT * FROM `doctors` WHERE `id` = '$id'";
    $doctor_query_run = mysqli_query($con, $doctor_query);
        $doctor_data = mysqli_fetch_array($doctor_query_run);
        $img = $doctor_data['image'];
    $delete_query = "DELETE FROM `doctors` WHERE `id`='$id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if (mysqli_affected_rows($con)){
        if (file_exists('uploads/'.$img)){
            unlink("uploads/".$img);
        }
        echo 200;
    } else{
        echo 500;
    }
}
else if (isset($_POST['add-doctor-btn'])) {
    
    $major_id = $_POST['major_id'];
    $name = mysqli_real_escape_string($con,$_POST['name']);
    if (empty(trim($name))) {
        redirect("add-product.php", "name is required");
    }
    if (empty($_FILES['image']['name'])) {
        redirect("add-product.php", "image is required");
    }
    $bio = mysqli_real_escape_string($con,$_POST['bio']);
    $image = $_FILES['image']['name'];
    $path = "uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;
    $add_doctor_query = "INSERT INTO `doctors` (`name`, `image`, `bio`, `major_id`)
    VALUES ('$name', '$filename', '$bio', (SELECT `id` FROM `major` WHERE `id` = '$major_id'));
    ";
    $add_doctor_query_run = mysqli_query($con, $add_doctor_query);
    if ($add_doctor_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-doctor.php", "Doctor Added Successfully");
    } else {
        redirect("add-doctor.php", "Something Went Wrong");
    }
}
else if (isset($_POST['update-doctor-btn'])) {
    $doctor_id = $_POST['doctor_id'];
    $major_id = $_POST['major_id'];
    $name = mysqli_real_escape_string($con,$_POST['name']);
    if (empty(trim($name))) {
        redirect("add-doctor.php", "name is required");
    }
    $bio = mysqli_real_escape_string($con,$_POST['bio']);
    $new_image = $_FILES['image']['name'];
    $path = "uploads";
    $old_image = $_POST['old_image'];
    if ($new_image!="") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_image = time() . '.' . $image_ext;
    }
    else {
        $update_image = $old_image;
    }
    $update_query = "UPDATE `doctors` SET
      `major_id` = (SELECT `id` FROM `major` WHERE `id` = '$major_id'),
      `name` = '$name',
      `bio` = '$bio',
      `image` = '$update_image'
    WHERE
      `id` = '$doctor_id';
    ";
    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run){
        if ($new_image != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_image);
            if (file_exists('uploads/'.$old_image)){
                unlink("uploads/".$old_image);
            }
        }
        redirect("edit-doctor.php?id=$doctor_id", "Doctor Updated Successfully");
    } else {
        redirect("edit-doctor.php?id=$doctor_id", "Something went Wrong");
    }
}
else if (isset($_POST['update-booking-status-btn'])) {
    $booking_id = $_POST['booking_id'];
    $booking_query = "SELECT * FROM `bookings` WHERE `id`='$booking_id'";
    $booking_query_run = mysqli_query($con, $booking_query);
    $booking = mysqli_fetch_array($booking_query_run);
    $status = $booking['status'];
    $status_name = "Visible";
    if (!$status){
        $status=1;
        $status_name = "Hidden";
    }
    else{
        $status=0;
        $status_name = "Visible";
    }
    $edit_query = "UPDATE `bookings` SET `status`='$status' WHERE `id`='$booking_id'";
    $edit_query_run = mysqli_query($con, $edit_query);
    if ($edit_query_run) {
        redirect("edit-booking-status.php?id=$booking_id", "Booking Status Is $status_name Now");

    } else {
        redirect("edit-booking-status.php?id=$booking_id", "Something Went Wrong");

    }
}