<?php 
    session_start();
    require_once('compiled.php');
    session_destroy();
    unset($_SESSION['nameinnav']);
    header("Location: index.php");
?>