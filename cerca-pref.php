<?php 

    require_once 'autentico.php';
    if (!$user = autenticazione()){
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }
   
    $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']);
    $user = mysqli_real_escape_string($connect, $user);

    $res = mysqli_query($connect, "SELECT arance from preferiti where user='$user'") or die(mysqli_error($connect));
    
    $ar = array();
    while($entry = mysqli_fetch_assoc($res)) {
        $ar[] = $entry;
    }
    mysqli_free_result($res);
    mysqli_close($connect);
    echo json_encode($ar);


?>