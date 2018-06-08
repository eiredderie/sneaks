<?php 
    function navbar(){
    if(!isset($_SESSION['totalitems'])){
        $_SESSION['totalitems']=0;
    }
    echo'<div id="flipkart-navbar">
            <div class="container">
                <div class="row row1">
                </div>
                <div class="row row1"></div>
                <div class="row row2">
                    <div class="col-sm-2">
                        <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()"><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"></span></h2>
                        <h1 style="margin:0px;"><span class="largenav"><a href="index.php" style="color: #fff"><img src="assets/img/SHOES-logo-mono.png" width="50" height="50"><p class="logotext">SNEAKS</p></a></span></h1>
                    </div>
                    <div class="flipkart-navbar-search smallsearch col-sm-8" style="align-self:center; justify-content: center">
                        <div class="row">
                            <form method="POST" class="col-xs-12">
                                <input class="flipkart-navbar-input col-xs-11" type="text" name="searchvar" placeholder="Search for Products, Brands and more" name="">
                                <button class="flipkart-navbar-button col-xs-1" type="submit" name="loginsubmit">
                                    <svg width="15px" height="15px">
                                        <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="cart largenav push-right" style="margin-top: 6px;">
                        <a class="cart-button" href="cart.php">
                            <svg class="cart-svg "width="40" height="40">
                                <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                            </svg>
                            <a class="cart-badge">'.$_SESSION['totalitems'].'</a>
                        </a>
                    </div>';

                        if($_SESSION['nameinnav'] == "LOG IN"){
                            echo "<a class='logintext btn btn-link btn-sm pmd-btn-flat pmd-ripple-effect' href='login.php' style='font-size: 16px; margin: 5px;color: #fff;'>" . $_SESSION['nameinnav']. "</a>";
                        }
                        else{
                            echo "<a class='logintext btn btn-link btn-sm pmd-btn-flat pmd-ripple-effect dropdown-toggle' id='menu1' data-toggle='dropdown' style='font-size: 16px; margin: 5px; padding: 7px;height: 40px; width: 40px; color: #49575C;background-color: #fff; border-radius: 40px; text-align: center'>" . $_SESSION['nameinnav'] . "</a>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
                                <li role='presentation'><a role='menuitem' href='account.php' tabindex='-1' href='#'>Profile</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='orders.php'>Orders</a></li>
                                <li role='presentation' class='divider'></li>
                                <li role='presentation'><a role='menuitem' href='logout.php' tabindex='-1' href='#'>Logout</a></li>
                            </ul>";
                        }

            echo'</div>
                <div class="row row1">
                    <ul class="largenav">
                        <li class="upper-links"><a class="links" href="productcat.php?type=Casual">Casual Shoes</a></li>
                        <li class="upper-links">|</li>
                        <li class="upper-links"><a class="links" href="productcat.php?type=Sandals">Sandals</a></li>
                        <li class="upper-links">|</li>
                        <li class="upper-links"><a class="links" href="productcat.php?type=Boots">Boots</a></li>
                        <li class="upper-links">|</li>
                        <li class="upper-links"><a class="links" href="productcat.php?type=Sneakers">Sneakers</a></li>
                        <li class="upper-links">|</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="container" style="background-color: #2874f0;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
            </div>
            <a></a>
            <a></a>
            <a href="productcat.php?type=Casual">Casual Shoes</a>
            <a href="productcat.php?type=Sandals">Sandals</a>
            <a href="productcat.php?type=Boots">Boots</a>
            <a href="productcat.php?type=Sneakers">Sneakers</a>
        </div>';
    }

    function footer(){
    echo '<div class="footer-clean" style="background-color:#49575C;padding:32px;">
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
                        <div class="col-lg-3 item social">
                            <a href="#" style="background-color:#49575C;"><i class="icon ion-social-facebook facebook"></i></a>
                            <a href="#" style="background-color:#49575C;"><i class="icon ion-social-twitter twitter"></i></a>
                            <a href="#" style="background-color:#49575C;"><i class="icon ion-social-snapchat snapchat"></i></a>
                            <a href="#" style="background-color:#49575C;"><i class="icon ion-social-instagram instagram"></i></a>
                            <p class="copyright" style="color:#FBFCFC;font-size:21px;">Sneaks © 2018</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>';
    }
?>