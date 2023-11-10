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
    if (empty($_SESSION['error'])){
    $conn = mysqli_connect("localhost", "root", "", "phpclinic");
        $getData_query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $getData_query_run = mysqli_query($conn, $getData_query);
        $row = mysqli_fetch_assoc($getData_query_run);
        if (isset($row)){
            if ($row['password']===$password){
                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'id'=>$row['id'],
                    'name'=>$row['name'],
                    'email'=>$row['email'],
                ];
                if ($row['role']){
                    $_SESSION['role_as'] = 1;
                    redirect('../Admin/index.php');
                }
                else{
                    redirect('../index.php');
                    die;
                }
            }
            else {
                $_SESSION['email'] = $email; 
                $_SESSION['error']['password'] = "wrong password";
                redirect('../login.php');
                die;
            }
        }
        else{
            $_SESSION['error']['email'] = "Email Not Exists";
            redirect('../login.php');
            die;
        }
    }
    else {
        if (empty($_SESSION['error']['email']))$_SESSION['email'] = $email;
        redirect('../login.php');
        die;
    }
}