<?php
    include 'dataconfig.php';

    session_start();
    session_destroy();

    header('Location: hw1-login.php');
?>


