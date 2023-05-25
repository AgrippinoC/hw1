<?php

    require_once 'autentico.php';
    $userid = autenticazione();
    if (!$userid){
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }

    save();

    function save() {
	global $dataconfig, $userid;
        $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']);
        $user = mysqli_real_escape_string($connect, $userid);
	$comment = mysqli_real_escape_string($connect, $_POST['commento']);
	$star = $_POST['stella'];
        $query = "INSERT INTO commenti(user, commenti, stella) VALUES('$user','$comment', '$star')";
        if(mysqli_query($connect, $query) or die(mysqli_error($connect))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($connect);
        echo json_encode(array('ok' => false));
    }
?>    
