<?php
session_start();
if(isset($_SESSION['loginErr']))
    echo $_SESSION['loginErr'];
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
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#6f7a85;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="font-size:25px;font-family:'Source Sans Pro', sans-serif;color:white;"><strong>&nbsp;</strong><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"><strong>&nbsp;SNEAKS</strong></a><button class="navbar-toggler"
                data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav"></ul>
            </div>
        </div>
    </nav>
    <div class="login-clean">
        <form method="post" action="loginverify.php" style="background-color:#424949  ;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-social-html5-outline" style="color:white;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" role="button" style="background-color:#FBFCFC;color:#424949;"><strong>LOG IN</strong></button></div><a href="signup.html" class="forgot"><span style="text-decoration: underline;">Don't yet have an account? Sign Up here.</span></a>
            <a
                class="forgot"><span style="text-decoration: underline;">Forgot your email or password?</span></a>
        </form>
    </div>
    <div class="footer-clean" style="background-color:#424949;color:#FBFCFC;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="font-size:20px;font-family:'Source Sans Pro', sans-serif;">ABOUT US</h3>
                        <ul>
                            <li style="font-size:15px;">Company</li>
                            <li style="font-size:15px;">Shipping Information</li>
                            <li style="font-size:15px;"><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="font-size:20px;font-family:'Source Sans Pro', sans-serif;">CONTACT US</h3>
                        <ul>
                            <li><a href="#" style="font-size:15px;">España Blvd, Sampaloc, Manila</a></li>
                            <li><a href="#" style="font-size:15px;">406 1611</a></li>
                            <li><a href="#">sneaks.ph@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright"
                            style="font-size:15px;font-family:'Source Sans Pro';">SNEAKS © 2018</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>