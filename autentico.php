<?php

    require_once 'dataconfig.php';
    session_start();

    function autenticazione() {
        if(isset($_SESSION['_ugora_username'])) {
            return $_SESSION['_ugora_username'];
        } else
            return 0;
    }
?>