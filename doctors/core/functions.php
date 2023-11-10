<?php
if(session_status() === PHP_SESSION_NONE) session_start();
include('../Admin/config/dbcon.php');
function getDoctors($major_id){
    global $con;
    $query = "SELECT * FROM `doctors` WHERE `major_id` = '$major_id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getMajor($major_id){
    global $con;
    $query = "SELECT `name` FROM `major` WHERE `id` = '$major_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getByID($table,$id) {
    global $con;
    $query = "SELECT * FROM `$table` WHERE `id` = '$id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}