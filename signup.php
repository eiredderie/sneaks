<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');
    
    if(isset($_SESSION['id'])){
        //$_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
        $_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
    }
    else{
        $_SESSION['nameinnav'] = "LOG IN";
    }
    
    if(!isset($_SESSION['usernameinput'])){
        $_SESSION['usernameinput'] = "";
        $_SESSION['firstnameinput'] = "";
        $_SESSION['lastnameinput'] = "";
        $_SESSION['middlenameinput'] = "";
        $_SESSION['emailinput'] = "";
        $_SESSION['passwordinput'] = "";
        $_SESSION['contactinput'] = "";
        $_SESSION['addressinput'] = "";
    }

    if(isset($_POST['submit'])){
        $_SESSION['nameinput'] = $_POST['name'];
        $_SESSION['emailinput'] = $_POST['email'];
        $_SESSION['passwordinput1'] = $_POST['password1'];
        $_SESSION['passwordinput2'] = $_POST['password2'];

        if(signup($_SESSION['nameinput'], $_SESSION['emailinput'],$_SESSION['passwordinput1'], $_SESSION['passwordinput2'])){
            header('Location: home.php');
        }
        else{
            header('Location: signup.php');
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Sneaks PH</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.1.0/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/newstyles.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "65%";
            document.getElementById("main").style.marginLeft = "65%";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
        }
    </script>
    
</head>

<body>
    <?php navbar();?>
    <center>
    <div class="container" style="width: 65%; margin: 50px; text-align: left; margin-top: 150px;">
        <div class="panel" style="margin: 20px; padding: 20px; opacity: 1; background-color: #fff; box-shadow: 0px 1px 1px 0px grey; ">
                <h3 class="panel-title" style="display: inline; font-size:30px;font-family: Roboto;">SIGN UP</h3>
                <h4 align="center"><?php if(isset($_SESSION['signupErr'])) echo $_SESSION['signupErr']; ?></h4>
                <form class="form-horizontal" method="POST">
                <div style="width: 100%; display: inline-flex">
                
                    <div class="row" style="padding-top: 15px; width: 55%; display: inline; margin: 10px;margin-top: 0px;">
                        <div class="col-md-12">
                                <fieldset>
                                    <p style="font-family: Roboto">Email Address*</p>
                                    <input name="email" type="email" required value="<?php if(isset($_SESSION['emailinput'])) echo $_SESSION['emailinput']; ?>" placeholder="Please enter your email" class="form-inputs input-md">
                                    <div class="spacing">
                                    <p style="font-family: Roboto">Password*</p>
                                    <input name="password1" type="password" required value="<?php if(isset($_SESSION['passwordinput1'])) echo $_SESSION['passwordinput1']; ?>" placeholder="Please enter your password" class="form-inputs input-md">
                                    <div class="spacing">
                                    <p style="font-family: Roboto">Retype Password*</p>
                                    <input name="password2" type="password" required value="<?php if(isset($_SESSION['passwordinput2'])) echo $_SESSION['passwordinput2']; ?>" placeholder="Please enter your password" class="form-inputs input-md">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 15px; width: 45%; display: inline; margin: 10px;margin-top: 0px">
                        <div class="col-md-12">
                                <fieldset>
                                    <p style="font-family: Roboto">Full Name*</p>
                                    <input name="name" type="text" required value="<?php if(isset($_SESSION['nameinput'])) echo $_SESSION['nameinput']; ?>" placeholder="ex. Juan Dela Cruz" class="form-inputs input-md">
                                    <div class="spacing">
                                    <input type="checkbox" required/>
                                    <a style="font-family: Roboto; font-size: 13px;">I agree to the Terms of Service.</a>
                                    <div class="spacing">
                                    <button class="btn btn-warning btn-lg" style="width: 100%;" name="submit" value="signup">SIGN UP</button>
                                    <div class="spacing">
                                    <div class="spacing">
                                    <center>
                                        <p style="font-family: Roboto; font-size: 13px">By clicking signup, I agree to Sneaks <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
                                    </center>
                                </fieldset>
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
    </center>
    <?php footer();?>
</body>

</html>