<?php
session_start();
if (isset($_SESSION['auth'])){
unset($_SESSION['auth']);
unset($_SESSION['auth_user']);
session_destroy();
}
header('location: ../login.php');
exit();