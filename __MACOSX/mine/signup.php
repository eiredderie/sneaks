<?php
session_start();
if(isset($_SESSION['signupErr']))
    echo $_SESSION['signupErr'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trial1_sneaks</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top" style="color:#b5c6d7;background-color:#6f7a85;">
        <div class="container-fluid"><a class="navbar-brand text-white" href="#" style="color:#FBFCFC;font-size:30px;font-family:sans-serif;padding:-33px;margin:0px;height:63px;"><img class="rounded-circle" src="assets/img/SHOES-logo-mono.png" width="50" height="50" style="background-size:initial;"><strong>&nbsp;SNEAKS</strong></a>
            <button
                class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1"></div>
        </div>
    </nav>
    <div class="footer-clean">
        <footer></footer>
    </div>
    <div class="register-photo">
        <div class="form-container" style="width:601px;padding:-16px;">
            <form method="post" action="signupverify.php" style="background-color:#424949;width:934px;padding:50px;">
                <h2 class="text-center" style="color:#FBFCFC;font-size:39px;"><strong>SIGN UP</strong></h2>
                <input class="form-control" type="text" name="username" placeholder="Username" style="margin-bottom:20px;" required>
                <input class="form-control" type="text" name="firstname" placeholder="First Name" style="margin-bottom:20px;" required>
                <input class="form-control" type="text" name="lastname" placeholder="Last Name" style="margin-bottom:20px;" required>
                <input class="form-control" type="text" name="middlename" placeholder="Middle Name" style="margin-bottom:20px;" required>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom:20px;" required>
                    <input class="form-control" type="text" name="contact" placeholder="Contact" style="margin-bottom:20px;" required>
                    <input class="form-control" type="text" name="address" placeholder="Address" required></div>
                <div class="form-group">
                    <div class="form-check" style="color:#FBFCFC;"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:#FBFCFC;color:#424949;"><strong>Sign Up</strong></button></div><a href="index.html" class="already" style="color:#FBFCFC;">You already have an account? Login here.</a></form>
        </div>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center" style="background-color:#424949;">
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color:#FBFCFC;">ABOUT US</h3>
                        <ul>
                            <li style="color:#FBFCFC;"><a href="#">Company</a></li>
                            <li><a href="#">Shipping Information</a></li>
                            <li><a href="#" style="color:#FBFCFC;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color:#FBFCFC;">CONTACT US</h3>
                        <ul>
                            <li style="color:#FBFCFC;"><a href="#">España Blvd, Sampaloc, Manila</a></li>
                            <li><a href="#" style="color:#FBFCFC;">406 1911</a></li>
                            <li style="color:#FBFCFC;"><a href="#">sneaks.ph@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#" style="color:#FBFCFC;"><i class="icon ion-social-instagram"></i></a>
                        <p
                            class="copyright" style="color:#FBFCFC;font-size:21px;"><strong>Sneaks © 2017</strong></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>