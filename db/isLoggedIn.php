<?php
    session_start();
    if (!isset($_SESSION["firstName"])){
        header('Location: login.php');
        exit;
    }
?>