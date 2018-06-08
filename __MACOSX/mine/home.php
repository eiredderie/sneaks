<?php
session_start();
if(isset($_SESSION['loginErr']))
    echo $_SESSION['loginErr'];
else if(isset($_SESSION['signupErr']))
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
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#6f7a85;">
        <div class="container-fluid"><a class="navbar-brand text-monospace text-white" href="#" style="font-size:25px;color:white;font-family:sans-serif;"><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"><strong>&nbsp;SNEAKS</strong></a><button class="navbar-toggler" data-toggle="collapse"
                data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="icon ion-search float-right" style="font-size:30px;color:#fbfcfc;"></i></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-capitalize text-white-50 active d-table-cell float-right" href="#trial3_sneaks" style="font-size:20px;font-family:sans-serif;margin-top:8px;color:#FBFCFC;"><strong>Products</strong></a></li>
                    <li class="nav-item"
                        role="presentation"><a class="nav-link text-monospace text-white-50 d-table-cell float-right" href="#trial4_sneaks" style="font-size:20px;font-family:sans-serif;margin-top:8px;"><strong>Orders</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white-50 d-table-cell float-right" href="index.html" style="font-size:20px;font-family:sans-serif;margin-top:8px;"><strong>Logout</strong></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:20px;">
        <h1 class="text-black-50" style="font-size:50px;font-family:fantasy;color:#424949 ;">NEW ARRIVALS</h1>
    </div>
    <div class="jumbotron" id="newarr" style="background-color:#F8F8F8;">
        <h1 class="text-left text-black-50" id="adidas"><strong><span style="text-decoration: underline;">ADIDAS PHARRELL</span></strong></h1><img src="assets/img/adidas_pharrell_new_arrival.jpg" id="adi-pharrell">
        <h3></h3>
        <h1 class="text-right text-black-50" id="adidas"><strong><span style="text-decoration: underline;">NIKE &nbsp;CORTEZ</span> &nbsp;&nbsp;</strong></h1><img src="assets/img/nike_cortez_new_arrival.jpeg" id="nike-cortez"></div>
    <div class="footer-clean" style="background-color:#424949;">
        <footer>
            <div class="container">
                <div class="row justify-content-center" style="background-color:rgba(251,252,252,0);">
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color:#FBFCFC;">ABOUT US</h3>
                        <ul>
                            <li style="color:#FBFCFC;"><a href="#">Company</a></li>
                            <li style="color:#FBFCFC;">Shipping Information</li>
                            <li style="color:#FBFCFC;">Privacy Policy</li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color:#FBFCFC;">CONTACT US</h3>
                        <ul>
                            <li><a href="#">España Blvd, Sampaloc, Manila</a></li>
                            <li style="color:#FBFCFC;"><a href="#">406 1611</a></li>
                            <li><a href="#" style="color:#FBFCFC;">sneaks.ph@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook" style="background-color:#FBFCFC;"></i></a><a href="#"><i class="icon ion-social-twitter" style="color:#FBFCFC;"></i></a><a href="#"><i class="icon ion-social-snapchat" style="background-color:#FBFCFC;"></i></a>
                        <a
                            href="#" style="background-color:#FBFCFC;"><i class="icon ion-social-instagram"></i></a>
                            <p class="copyright" style="color:#FBFCFC;font-size:21px;">Sneaks © 2018</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="displaysort.php">
            <button class="btn btn-primary" type="submit" name="sort" value="idAsc">Asc</button>
            <button class="btn btn-primary" type="submit" name="sort" value="idDes">Desc</button>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>