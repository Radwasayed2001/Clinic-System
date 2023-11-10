<?php

include('core/functions.php');
if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    session_destroy();
    redirect('index.php');
    exit();
}else {
    redirect('index.php');
    exit();
}