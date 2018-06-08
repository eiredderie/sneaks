<?php 
    SESSION_START();
    require_once('compiled.php');
    
    (($_SESSION['UserID'] == "") ||($_SESSION['U_FirstName'] == "") ||($_SESSION['U_LastName'] == "")) ? navigate('index.php') : null;
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trial1_sneaks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.1.0/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="padding:0px;margin:-1px;">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#6f7a85;">
        <div class="container-fluid"><a class="navbar-brand text-monospace text-white" href="home.html" style="font-size:30px;color:white;font-family:sans-serif;"><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"><strong>&nbsp;SNEAKS</strong></a><button class="navbar-toggler"
                data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" style="font-size:20px;margin:8px;color:rgba(255,255,255,0.5);"><i class="fa fa-search"></i><strong>&nbsp;Search</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-capitalize text-white-50 active d-table-cell float-right" href="home.html" style="font-size:20px;font-family:sans-serif;margin-top:8px;color:#FBFCFC;"><i class="fa fa-tags"></i><strong>&nbsp;Products</strong></a></li>
                    <li
                        class="nav-item" role="presentation"><a class="nav-link text-monospace text-white-50 d-table-cell float-right" href="cart.html" style="font-size:20px;font-family:sans-serif;margin-top:8px;"><i class="fa fa-shopping-cart"></i><strong>&nbsp;Cart</strong></a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin:0px;font-size:25px;color:rgba(255,255,255,0.5);"><i class="icon ion-android-person" style="font-size:30px;color:rgba(255,255,255,0.5);"></i><strong>&nbsp;Juan Dela Cruz</strong></a>
                            <div
                                class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="account.html"><strong>Profile</strong></a><a class="dropdown-item" role="presentation" href="index.html"><strong>Log Out</strong></a></div>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container" style="height:80px;width:959px;">
        <h1 style="font-family:Anton, sans-serif;color:#424949;padding:30px;font-size:47px;padding-right:0px;padding-left:0px;"><i class="material-icons" style="font-size:47px;">trending_up</i>&nbsp;NEW ARRIVALS</h1>
    </div>
    <div></div>
    <div class="simple-slider" style="padding-top:30px;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(assets/img/nike2.gif);padding:0px;width:1600px;padding-top:240px;"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/nmd2.gif);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="photo-gallery">
        <div class="container" style="padding-top:0px;margin:17px;">
            <div class="intro"></div>
            <div class="row photos" style="padding:0px;margin:11px;">
                <div class="col-sm-6 col-md-4 col-lg-3 item" style="padding-bottom:15px;"><a href="assets/img/Birkenstocks_Arizona.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Birkenstocks_Arizona.jpg"><label style="font-size:17px;padding-left:10px;padding-top:3px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Birkenstock Arizona Soft Slide&nbsp;</span></strong></label><label style="padding-left:20px;color:#424949;">Black/Iron/Tabacco/Gray</label><label style="font-size:17px;margin:0px;padding-right:0px;padding-left:50px;padding-top:2px;color:#424949;padding-bottom:5px;"><strong>PHP 7,622.69&nbsp;</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="birkenstock.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/1901_Merick-Derby.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/1901_Merick-Derby.jpg" style="height:302.062px;width:197px;"><label style="font-size:17px;padding-left:40px;margin:0px;padding-top:3px;color:#424949;margin-bottom:8px;"><strong><span style="text-decoration: underline;">1901 Merick Derby&nbsp;</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:50px;color:#424949;">Black/Silver/White</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:60px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 3750.00</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="merick.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/Converse_Jack-Purcell.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Converse_Jack-Purcell.jpg" style="margin:0px;padding:0px;padding-top:0px;width:207px;height:302.062px;"><label style="font-size:17px;padding-top:2px;padding-left:30px;color:#424949;"><strong><span style="text-decoration: underline;">Converse Jack Purcell</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:70px;color:#424949;">Black/White</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:57px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 3,671.54</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="converse-jack.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/Vans_Old-Skool;.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Vans_Old-Skool;.jpg" style="height:302.062px;width:197px;margin:1px;padding-left:0px;"><label style="font-size:17px;padding-top:0px;padding-left:60px;color:#424949;"><strong><span style="text-decoration: underline;">Vans Old Skool</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:70px;color:#424949;">Black/White</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:60px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 3,386.29</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="vans-oldskool.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
            </div>
        </div>
        <div class="container align-items-center align-content-center align-self-center" style="padding-top:0px;height:457px;margin:17px;">
            <div class="intro"></div>
            <div class="row photos" style="padding:0px;margin:11px;">
                <div class="col justify-content-center" style="padding-bottom:10px;"><a href="assets/img/balmain_esther-low-top.jpg"><img class="img-fluid" src="assets/img/balmain_esther-low-top.jpg" style="width:197px;"><label style="font-size:17px;padding-left:5px;padding-top:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Balmain Low Top Sneaker</span></strong></label><label style="padding-left:90px;color:#424949;">White</label><label style="font-size:17px;margin:0px;padding-right:0px;padding-left:50px;padding-top:0px;color:#424949;"><strong>PHP 39,257.28&nbsp;</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="balmain.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;height:36px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item"><a href="assets/img/prada_sock-sneaker.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/prada_sock-sneaker.jpg"><label style="font-size:17px;padding-left:40px;margin:-8px;padding-top:8px;color:#424949;"><strong><span style="text-decoration: underline;">Prada Sock Sneaker</span></strong></label><label style="font-size:15px;padding-top:10px;padding-left:70px;color:#424949;">Black/White</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:50px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 33,326.33</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="prada.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item"><a href="assets/img/Isabel_Marant-Dacken.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Isabel_Marant-Dacken.jpg" style="margin:0px;padding:10px;padding-top:37px;width:197px;height:302.062px;"><label style="font-size:17px;padding-top:0px;padding-left:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Isabel Marant Dacken Stacked Heel Bootie</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:55px;color:#424949;text-align:center;">Black/Cognac</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:43px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 31,631.77</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="isabel-marant.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item"><a href="assets/img/Tory Burch_Ashton-Open-Toe-Bootie.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Tory Burch_Ashton-Open-Toe-Bootie.jpg" style="height:302.062px;width:197px;margin:1px;padding-left:25px;"><label style="font-size:17px;padding-top:0px;padding-left:10px;text-align:center;color:#424949;"><strong><span style="text-decoration: underline;">Tory Burch Ashton Open Toe Bootie</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:73px;color:#424949;">Duststrom</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:50px;padding-top:0px;padding-bottom:5px;color:#424949;"><strong>PHP 13,488.69</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="tory-burch.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
            </div>
        </div>
        <div class="container align-items-center align-content-center align-self-center" style="padding-top:0px;height:488px;padding-bottom:20px;margin:17px;">
            <div class="intro"></div>
            <div class="row photos" style="padding:0px;margin:11px;">
                <div class="col justify-content-center" style="padding-top:10px;"><a href="assets/img/KennethCole_NewYork-Sarah-Shine-Pump.jpg"><img class="img-fluid" src="assets/img/KennethCole_NewYork-Sarah-Shine-Pump.jpg" style="width:197px;"><label style="font-size:17px;padding-left:5px;padding-top:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Kenneth Cole New York Sarah Shine Pump</span></strong></label><label style="padding-left:40px;color:#424949;">Metallic Gold/ White</label><label style="font-size:17px;margin:0px;padding-right:0px;padding-left:50px;padding-top:0px;color:#424949;"><strong>PHP 2,711.29&nbsp;</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="kenneth-cole.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item"><a href="assets/img/Toms_Mary-Jane-Sneaker.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Toms_Mary-Jane-Sneaker.jpg"><label style="font-size:17px;padding-left:20px;margin:-8px;padding-top:8px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Toms Mary Jane Sneaker</span></strong></label><label style="font-size:15px;padding-top:10px;padding-left:60px;color:#424949;text-align:center;">Rose Gold Dots&nbsp;</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:55px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 2,030.65</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="toms-mary.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item"><a href="assets/img/EDEllenDeGeneres_Korie-Chukka-Bootie.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/EDEllenDeGeneres_Korie-Chukka-Bootie.jpg" style="margin:0px;padding:10px;padding-top:37px;width:197px;height:302.062px;"><label style="font-size:17px;padding-top:0px;padding-left:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">ED Ellen De Generes Korie Chukka Bootie</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:20px;color:#424949;text-align:center;">Pink/ Black/ Camello Suede</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:48px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 3,951.15</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="ellen-degeneres.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 justify-content-center item" style="color:#424949;"><a href="assets/img/MichaelKors_Eli-Glow-Glitter-Slide-Sandal.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/MichaelKors_Eli-Glow-Glitter-Slide-Sandal.jpg" style="height:302.062px;width:197px;margin:1px;padding-left:25px;"><label style="font-size:17px;padding-top:0px;padding-left:10px;text-align:center;color:#424949;"><strong><span style="text-decoration: underline;">Michael Kors Eli Glow Glitter Slide Sandal</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:50px;color:#424949;text-align:center;">Silver/Navy/Black</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:54px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 1,694.56</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="michael-kors.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
            </div>
        </div>
        <div class="container align-items-center align-content-center align-self-center" style="padding-top:0px;margin-top:17px;margin-bottom:17px;height:581px;">
            <div class="intro"></div>
            <div class="row photos" style="padding:0px;margin:11px;">
                <div class="col"><a href="assets/img/Florsheim_Jasper.jpg"><img class="img-fluid" src="assets/img/Florsheim_Jasper.jpg" style="width:197px;"><label style="font-size:17px;padding-left:5px;padding-top:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Florsheim Jasper Venetian Jr. Loafer&nbsp;</span></strong></label><label style="padding-left:50px;color:#424949;text-align:center;">Black/Saddle Tan</label><label style="font-size:17px;margin:0px;padding-right:0px;padding-left:50px;padding-top:0px;color:#424949;"><strong>PHP 3,103.87&nbsp;</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="jasper.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/Florsheim_Studio-Alpine-Plush-Lined-Boot.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Florsheim_Studio-Alpine-Plush-Lined-Boot.jpg"><label style="font-size:17px;padding-left:0px;margin:-8px;padding-top:8px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Florsheim Studio Alpine Plush Lined Boot</span></strong></label><label style="font-size:15px;padding-top:10px;padding-left:60px;color:#424949;">Cognac/Stone</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:55px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 2,030.65</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="alpine.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/Converse_One-Star-Heather-Street-Sneaker.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/Converse_One-Star-Heather-Street-Sneaker.jpg" style="margin:0px;padding:10px;padding-top:37px;width:197px;height:302.062px;"><label style="font-size:17px;padding-top:0px;padding-left:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Converse One Star Heather Street Sneaker</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:80px;color:#424949;text-align:center;">Navy</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:48px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 2,541.84</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="one-star.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/OriginalPenguin_Dorian-Sneaker.jpg" data-lightbox="photos"><img class="img-fluid" src="assets/img/OriginalPenguin_Dorian-Sneaker.jpg" style="height:302.062px;width:197px;margin:1px;padding-left:25px;"><label style="font-size:17px;padding-top:0px;padding-left:10px;text-align:center;color:#424949;"><strong><span style="text-decoration: underline;">Orginal Penguin Dorian Sneaker</span></strong></label><label style="font-size:15px;padding-top:0px;padding-left:30px;color:#424949;text-align:center;">Grey/Blue Canvas/Tan</label><label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:50px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 1,976.99</strong></label></a>
                    <a
                        class="btn btn-outline-primary active btn-block" role="button" href="dorian.html" style="background-color:#424949;color:#FBFCFC;font-size:15px;"><strong>VIEW</strong></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-clean" style="background-color:#424949;padding:32px;margin-top:20px;">
        <footer>
            <div class="container">
                <div class="row justify-content-center" style="background-color:rgba(251,252,252,0);">
                    <div class="col-sm-4 col-md-3 item" style="padding-right:0;">
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
                            <li><a href="#" style="color:rgb(246,249,251);">España Blvd, Sampaloc, Manila</a></li>
                            <li style="color:#FBFCFC;"><a href="#">406 1611</a></li>
                            <li></li>
                        </ul><a href="#" style="color:#FBFCFC;">sneaks.ph@gmail.com</a></div>
                    <div class="col-lg-3 item social"><a href="#" style="background-color:#424949;"><i class="icon ion-social-facebook" style="background-color:#424949;color:#FBFCFC;"></i></a><a href="#" style="background-color:#424949;"><i class="icon ion-social-twitter" style="color:#FBFCFC;background-color:#424949;"></i></a>
                        <a
                            href="#" style="background-color:#424949;"><i class="icon ion-social-snapchat" style="background-color:#424949;color:#FBFCFC;"></i></a><a href="#" style="background-color:#424949;"><i class="icon ion-social-instagram" style="color:#FBFCFC;"></i></a>
                            <p class="copyright"
                                style="color:#FBFCFC;font-size:21px;">Sneaks © 2018</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>