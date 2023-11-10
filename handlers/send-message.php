<?php 
if(session_status() === PHP_SESSION_NONE) session_start();
$con = mysqli_connect("localhost", "root", "", "phpclinic");
if (isset($_POST['send_massage'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $Insert_query = "INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `message`) VALUES 
    ('$name','$email','$phone','$subject','$message')";
    $Insert_query_run = mysqli_query($con, $Insert_query);
    if (mysqli_affected_rows($con)) {
        $_SESSION['message'] = "Message Sended Successfully";
        header('location:../contact.php');
        exit();
    } else {
        $_SESSION['message'] = "Something Went Wrong!";
        header('location:../contact.php');
        exit();
    }
}else {
    header('location:../index.php');
        exit();
}