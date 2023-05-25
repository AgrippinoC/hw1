<?php

    require_once 'autentico.php';
    $userid = autenticazione();
    if (!$userid){
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }
	echo $userid;
    save();

    function save() {
	global $dataconfig, $userid;
        $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']);
        $user = mysqli_real_escape_string($connect, $userid);
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	echo $user;
	$query = "SELECT * FROM preferiti WHERE user = '$user' AND arance = '$title'";
        $ris = mysqli_query($connect, $query) or die(mysqli_error($connect));
        if(mysqli_num_rows($ris) > 0) {
            echo json_encode(array('ok' => true));
            exit;
	}
        $query = "INSERT INTO preferiti(user, arance) VALUES('$user','$title')";
        error_log($query);

        if(mysqli_query($connect, $query) or die(mysqli_error($connect))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($connect);
        echo json_encode(array('ok' => false));
    }
?>    