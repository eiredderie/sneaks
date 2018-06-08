<?php
    session_start();
    require_once('compiled.php');
    require_once('constants.php');
    $string="2@1466.12@2@5?3@1466.12@5@3?";
    $strings = substr($string,0,-1);
    print_r($_SESSION['nameinput']." ".$_SESSION['emailinput']." ".$_SESSION['passwordinput1']." ".$_SESSION['passwordinput2']);
    signup($_SESSION['nameinput'], $_SESSION['emailinput'],$_SESSION['passwordinput1'], $_SESSION['passwordinput2']);
    echo $_SESSION['signupErr'];
?>