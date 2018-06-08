
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


    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Roboto:300,400,500,700" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/css/propeller.min.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/icons/css/google-icons.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/select2/css/select2-bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/select2/css/pmd-select2.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/datetimepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/pmd-1.1.0/components/datetimepicker/css/pmd-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://www.rakk.ph/css/styles-v2.css?version=56b7a720568f7e7e89904d13b53584b6" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body style="padding:0px;">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#6f7a85;">
        <div class="container-fluid"><a class="navbar-brand text-monospace text-white" href="home.php" style="font-size:30px;color:white;font-family:sans-serif;"><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"><strong>&nbsp;SNEAKS</strong></a><button class="navbar-toggler"
            data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-capitalize text-white-50 active d-table-cell float-right" href="home.php" style="font-size:20px;font-family:sans-serif;margin-top:8px;color:#FBFCFC;"><i class="fa fa-tags"></i><strong>&nbsp;Products</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-monospace text-white-50 d-table-cell float-right" href="cart.php" style="font-size:20px;font-family:sans-serif;margin-top:8px;"><i class="fa fa-shopping-cart"></i><strong>&nbsp;Cart</strong></a></li>
                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin:0px;font-size:25px;color:rgba(255,255,255,0.5);"><i class="icon ion-android-person" style="font-size:30px;color:rgba(255,255,255,0.5);"></i>&nbsp;<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']?></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="account.php"><strong>Profile</strong></a><a class="dropdown-item" role="presentation" href="index.html"><strong>Log Out</strong></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--
    <div class="container" style="height:80px;width:959px;">
        <h1 style="font-family:Anton, sans-serif;color:#424949;padding:30px;font-size:47px;padding-left:0px;"><i class="material-icons" style="font-size:47px;">trending_up</i>&nbsp;NEW ARRIVALS</h1>
    </div>
    <div></div>
    <div class="simple-slider" style="padding-top:30px;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(assets/img/nike2.gif);padding:0px;width:1600px;padding-top:240px;"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/nmd2.gif);"></div>
            </div>
        </div>
    </div>
    -->
    <div class="container">
        <h4 class="custom-heading-display" style="color: #0f0f0f;">Featured Products</h4>

        

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <div class="product-card-item">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-media">
                            <img src="assets/img/Boys/surprizegray.jpg" class="img-responsive product-image lazy" style="margin: 0 auto;" alt="">
                        </div>
                        <div class="pmd-card-body">
                            <div class="product-name"> Surprize Gray </div>
                            <div class="product-amount"><h2>₱ 550.00</h2></div>
                            <a class="btn btn-outline-primary active btn-block" role="button" data-toggle="modal" data-target="#1" id="view" style="background-color:#424949;color:#FBFCFC;font-size:15px;" data-toggle="modal" data-target="#modalone"><strong>VIEW</strong></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Bitter, serif;font-size:40px;"> ITEM NAME </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h4 class="modal-title" style="font-family:Anton, sans-serif;font-size:30px;margin-left:10px;"> ITEM NAME<br></h4>
                            <h4 class="modal-title" style="font-size:20px;margin:0px;margin-left:10px;padding:10px;padding-top:0px;">
                                <strong> DESCRIPTION </strong><br>
                            </h4>

                            <div class="col-md-6 column-media">
                                <img class="img-fluid" src="assets/img/Boys/surprizegray.jpg" alt="Lorem" style="width:280px;height:300px;margin-left:30px;">
                            </div>
                            <div class="col-md-6 column-text">
                                <h1 style="font-family:Bitter, serif;margin-top:10px;margin-bottom:10px;"><strong>PHP 2,541.84</strong>
                                </h1>
                                <select name="size">
                                    <option value="" selected="">Size</option>
                                    <optgroup label="Baby (Sizes Newborn - 4)"><option value="">2 M</option> <option value="">3 M</option><option value="">4 M</option></optgroup>
                                    <optgroup label="Walker (Sizes 4.5 - 7)"><option value="">5 M</option> <option value="">6 M</option><option value="">7 M</option></optgroup>
                                    <optgroup label="Toddler"> <option value="">8 M</option><option value="">9 M</option><option value="">10 M</option>  <option value="12">11 M</option><option value="13">12 M</option></optgroup>
                                    <optgroup label="Little Kid (Sizes 12.5 - 3)"><option value="14">13 M</option> <option value="">1 M</option><option value="">2 M</option><option value="">3 M</option></optgroup>
                                    <optgroup label="Big Kids (Sizes 3.5 - 7)"> <option value="">4 M</option><option value="">5 M</option><option value="">6 M</option><option value="">7 M</option></optgroup>
                                </select>
                                <input type="number" name="order" placeholder="No. of Order" style="width:98px;margin:10px;margin-left:20px;">
                                <div class="btn-toolbar"></div>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!--
    <div class="footer-clean" style="background-color:#424949;padding:32px;">
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

<div class="align-items-center align-content-center align-self-center photo-gallery" style="margin:20px;">
        <div class="container-fluid" id="first" style="padding-top:0px;margin:0px;height:400px;width:950px;">
            <div class="row photos" style="padding:0px;margin:11px;">
    <div class="col-sm-6 col-md-4 col-lg-3 item" id="one-star">
        <div class="modal fade" role="dialog" tabindex="-1" id="modalone">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-family:Bitter, serif;font-size:40px;">CONVERSE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title" style="font-family:Anton, sans-serif;font-size:30px;margin-left:10px;">One Star Heather Street Sneaker<br></h4>
                        <h4 class="modal-title" style="font-size:20px;margin:0px;margin-left:10px;padding:10px;padding-top:0px;">
                            <strong>A chambray finish enhances the casual-chic style of this classic low-top sneaker.</strong><br>
                        </h4>
                    <div class="col">
                        <section>
                            <div class="container">
                                <div class="row row-media" style="padding-top:0px;padding-bottom:0px;">
                                    <div class="col-md-6 column-media">
                                        <img class="img-fluid" src="assets/img/One-Star.jpg" alt="Lorem" style="width:280px;height:300px;margin-left:30px;">
                                    </div>
                                    <div class="col-md-6 column-text">
                                        <h1 style="font-family:Bitter, serif;margin-top:10px;margin-bottom:10px;"><strong>PHP 2,541.84</strong>
                                        </h1>
                                        <select>
                                            <option value="" selected="">Size</option>
                                            <optgroup label="Baby (Sizes Newborn - 4)">
                                                <option value="">2 M</option>
                                                <option value="">3 M</option>
                                                <option value="">4 M</option>
                                            </optgroup>
                                            <optgroup label="Walker (Sizes 4.5 - 7)">
                                                <option value="">5 M</option>
                                                <option value="">6 M</option>
                                                <option value="">7 M</option>
                                            </optgroup>
                                            <optgroup label="Toddler">
                                                <option value="">8 M</option>
                                                <option value="">9 M</option>
                                                <option value="">10 M</option>
                                                <option value="12">11 M</option>
                                                <option value="13">12 M</option>
                                            </optgroup>
                                            <optgroup label="Little Kid (Sizes 12.5 - 3)">
                                                <option value="14">13 M</option>
                                                <option value="">1 M</option>
                                                <option value="">2 M</option>
                                                <option value="">3 M</option>
                                            </optgroup>
                                            <optgroup label="Big Kids (Sizes 3.5 - 7)">
                                                <option value="">4 M</option>
                                                <option value="">5 M</option>
                                                <option value="">6 M</option>
                                                <option value="">7 M</option>
                                            </optgroup>
                                        </select>
                                        <input type="number" name="No. of Order" placeholder="No. of Order" style="width:98px;margin:10px;margin-left:20px;">
                                        
                                        <div class="btn-toolbar"></div>
                                        <div class="form-check" style="margin:10px;margin-bottom:5px;">
                                            <input class="form-check-input" type="checkbox" id="formCheck-1" style="font-size:25px;margin-top:10px;">
                                            <label class="form-check-label" for="formCheck-1" style="font-size:25px;">Navy</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">CLOSE</button>
                        <button class="btn btn-primary" type="submit" style="background-color:#424949;"><strong>ADD TO CART</strong></button>
                    </div>
                </div>
            </div>
        </div>
            <img class="img-fluid" src="assets/img/One-Star.jpg" style="margin:0px;padding:10px;padding-top:37px;width:197px;height:210px;"><label style="font-size:17px;padding-top:0px;padding-left:0px;color:#424949;text-align:center;"><strong><span style="text-decoration: underline;">Converse One Star Heather Street Sneaker</span></strong></label>
            <label style="font-size:15px;padding-top:0px;padding-left:80px;color:#424949;text-align:center;">Navy</label>
            <label style="font-size:17px;margin:0px;padding:0px;padding-right:0px;padding-left:48px;padding-top:0px;padding-bottom:0px;color:#424949;"><strong>PHP 2,541.84</strong></label>
            <a class="btn btn-outline-primary active btn-block" role="button" href="one-star.html" id="view" style="background-color:#424949;color:#FBFCFC;font-size:15px;" data-toggle="modal" data-target="#modalone"><strong>VIEW</strong></a>
    </div>  
    </div> 
    </div> 
    </div> 
-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>