<?php
include_once('../core/functions.php');
include_once('../core/validations.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key=>$value){
        $$key = trim(htmlentities(htmlspecialchars($value)));
        if (empty($$key)) {
            $_SESSION['error'][$key] = "$key is requied";
        }
    }
    if (minlength($name,4) && !empty($name)){
        $_SESSION['error']['name'] = "name must be greater than 4";
    }
    elseif (maxlength($name,30)){
        $_SESSION['error']['name'] = "name must be less than 20";
    }
   
    if (minlength($password,6) && !empty($password)){
        $_SESSION['error']['password'] = "password must be greater than 6";
    }
    elseif (maxlength($password,25)){
        $_SESSION['error']['password'] = "password must be less than 25";
    }
    if (!emailVal($email) && !empty($email)) {
        $_SESSION['error']['email'] = "Email Not Valid!";

    }
    
    if (!empty($_SESSION['error'])){
        if (empty($_SESSION['error']['name']))$_SESSION['name'] = $name;
        if (empty($_SESSION['error']['phone']))$_SESSION['phone'] = $phone;
        if (empty($_SESSION['error']['email']))$_SESSION['email'] = $email;
        if (empty($_SESSION['error']['password']))$_SESSION['password'] = $password;
        redirect("../register.php");
        die;
    }
    else{
        $conn = mysqli_connect("localhost", "root", "", "phpclinic");
        $Insert_query = "INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES ('$name','$email','$password','$phone')";
        $Insert_query_run = mysqli_query($conn, $Insert_query);
        if(mysqli_affected_rows($conn) !== 1) {
            $_SESSION['error']['fail'] = "Email already Exists";
            redirect('../register.php');
            die;
        }
        else {
            redirect('../login.php');
            die;
        }
    }
}