<?php
if(session_status() === PHP_SESSION_NONE) session_start();
include('Admin/config/dbcon.php');
function getAll($table) {
    global $con;
    $query = "SELECT * FROM `$table`";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getMajor($major_id){
    global $con;
    $query = "SELECT `name` FROM `major` WHERE `id` = '$major_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getDoctors($major_id){
    global $con;
    $query = "SELECT * FROM `doctors` WHERE `major_id` = '$major_id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getByID($table,$id) {
    global $con;
    $query = "SELECT * FROM `$table` WHERE `id` = '$id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function minlength($inp, $len) {
    if (strlen($inp) <= $len) {
        return true;
    }
    return false;
}
function maxlength($inp, $len) {
    if (strlen($inp) >= $len) {
        return true;
    }
    return false;
}
function redirect($path) {
    header("location:$path");
}
function isvalid($inp){
    
    if (isset($_SESSION['error'][$inp])){
        echo "is-invalid";
    }
    else if (isset($_SESSION[$inp])) {
        echo "is-valid";
    }
    else {
        echo "";
    }
    
}
function validfeedback($inp){
    
    if (isset($_SESSION['error'][$inp])){
        echo "invalid-feedback";
    }
    else if (isset($_SESSION[$inp])) {
        echo "valid-feedback";
        
    }
    else {
        echo "valid-feedback";
    }
    
}
function value($inp){
    if (isset($_SESSION['error'][$inp])){
        echo "";
    }
    else if (isset($_SESSION[$inp])) {
        echo $_SESSION[$inp];
        // unset($_SESSION[$inp]);
    }
    else {
        echo "";
    }
}