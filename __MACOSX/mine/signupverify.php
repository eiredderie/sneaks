<?php
require_once dirname(__FILE__).'/methods.php';

signup($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['email'], $_POST['password'], $_POST['contact'], $_POST['address']);



?>