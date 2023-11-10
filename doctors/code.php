<?php
include('core/functions.php');
if (isset($_POST['add-booking-btn'])) {
    if (!isset($_SESSION['auth'])){
        header('location:../index.php');
        die();
    }
    $doctor_id = mysqli_real_escape_string($con,$_POST['doctor_id']);
    $user_id = $_SESSION['auth_user']['id'];
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $Insert_query = "INSERT INTO `bookings`(`user_id`, `doctor_id`, `date`, `name`, `phone`, `email`) VALUES ('$user_id','$doctor_id','$date','$name','$phone','$email')";
    $Insert_query_run = mysqli_query($con, $Insert_query);
    if (mysqli_affected_rows($con)) {
        $_SESSION['message'] = "Booking Added Successfully";
        header("location:doctor.php?id=$doctor_id");
        die();
    }
    else {
        $_SESSION['message'] = "Something Went Wrong";
        header("location:doctor.php?id=$doctor_id");
        die();
    }
}