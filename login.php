<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');

    if(!isset($_SESSION['loginErr'])){
        $_SESSION['loginErr'] = "";
    }
    if(isset($_POST['submit'])){
        if(login($_POST['email'], $_POST['password'])){
            header("Location: index.php");
        }
        else{
            header("Location: login.php");
        }
    }   
    
    if(isset($_SESSION['id'])){
        //$_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
        $_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
    }
    else{
        $_SESSION['nameinnav'] = "LOG IN";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sneaks PH</title>
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
    <div class="container" style="width: 35%; margin: 50px; text-align: left; margin-top: 150px;">
        <div class="panel" style="margin: 20px; padding: 20px; opacity: 1; background-color: #fff; box-shadow: 0px 1px 1px 0px grey; ">
                <h3 class="panel-title" style="display: inline; font-size:30px;font-family: Roboto;">LOG IN</h3>
                <div class="row" style="padding-top: 15px;">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST">
                            <fieldset>
                                <p style="font-family: Roboto">Email Address*</p>
                                <input name="email" type="email" placeholder="Please enter your email" class="form-inputs input-md">
                                <div class="spacing">
                                <p style="font-family: Roboto">Password*</p>
                                <input name="password" type="password" placeholder="Please enter your password" class="form-inputs input-md">
                                <div class="spacing" style="text-align: right"><a href="#"><small> Forgot Password?</small></a><br/></div>
                                <button type="submit" name="submit" class="btn btn-info btn-sm pull-right">Sign In</button>
                            </fieldset>
                        </form>
                        <center><p style="font-family: Roboto;">Not a member? <a href="signup.php">Sign up now!</a></p></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center>
    <?php footer();?>
</body>

</html>