<?php

    require_once 'dataconfig.php';
    
    if (!isset($_GET["q"])) {
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }

    
    header('Content-Type: application/json');
    $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']);
    $email = mysqli_real_escape_string($connect, $_GET["q"]);

    $ris = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'") or die(mysqli_error($connect));

    echo json_encode(array('exists' => mysqli_num_rows($ris) > 0 ? true : false));

    mysqli_close($conn);
?>