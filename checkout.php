<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');
    
    if(isset($_SESSION['id'])){
        if(isset($_POST['submit'])){
            $detailsarr = json_decode(getUser($_SESSION['id']), true);
            checkoutCart($_SESSION['id'], $_SESSION['totalcost'], $_POST['contact'], $_POST['email'],$_POST['paymentoption'],$_POST['address']);
        }
        else{
            
            (isset($_SESSION['id'])) ? $detailsarr = json_decode(getUser($_SESSION['id']), true) : null;
        }
        //$_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
        $_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
    }
    else{
        if(isset($_POST['checkout'])){
            $_SESSION['cartmsg']="Must login first.";
            header("Location:itemdisplay.php");
        }
        $_SESSION['nameinnav'] = "LOG IN";
    }

    

    
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Sneaks PH</title>
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

<body style="padding:0px;margin:-1px;">
    <?php navbar();?>
    <div class="container" style=" margin-top: 150px;">
        <h1 style="font-size:41px;font-family:Anton, sans-serif;padding:10px;color:#424949;"><i class="fa fa-pencil-square-o"></i>&nbsp;CHECK OUT FORM</h1>
    </div>
    <hr>
    <div class="container" style="padding-left:90px;background-color:#424949;padding-top:15px;padding-bottom:15px;width:800px;">
        <form METHOD="POST">
            <h4  style="font-size:20px;color:#FBFCFC;" align="center"><?php if(isset($_SESSION['checkmsg'])) {echo $_SESSION['checkmsg']; $_SESSION['checkmsg']="";} ?></h4>
            <h1 style="font-size:20px;color:#FBFCFC;"><strong>NAME</strong></h1><input type="text" name="name" required disabled placeholder="ex. Dela Cruz, Juan" style="width:600px;margin:5px;" value="<?=$detailsarr['U_LastName'] . ", " . $detailsarr['U_FirstName'] ?>">
            <h1 style="font-size:20px;color:#FBFCFC;"><strong>BILLING ADDRESS</strong></h1><input type="text" required name="address" placeholder="ex. Unit 7J Avida Tower 2 San Lazaro Felix Huertas St. Sta. Cruz, Manila" style="width:600px;margin:5px;" value="<?=$detailsarr['U_Address']?>">
            <h1 style="font-size:20px;color:#FBFCFC;"><strong>CONTACT NUMBER</strong></h1><input type="text" required name="contact" placeholder="ex. 09163265678" style="width:600px;margin:5px;" value="<?=$detailsarr['U_Contact']?>">
            <h1 style="font-size:20px;color:#FBFCFC;"><strong>EMAIL ADDRESS</strong></h1><input type="text" required name="email" placeholder="ex. delacruz.juan@gmail.com" style="width:600px;margin:5px;" value="<?=$detailsarr['U_Email']?>">
            <h1 style="font-size:20px;color:#FBFCFC;"><strong>METHOD OF PAYMENT</strong></h1>
            <div class="form-check" style="padding-bottom:0px;margin:5px;"><input class="form-check-input" required name="paymentoption" value="COD" checked type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color:#FBFCFC;">Cash on Delivery</label></div>
            <h1 style="font-size:20px;padding-left:190px;"><button class="btn btn-primary" type="submit" name="submit" style="background-color:#FBFCFC;width:128px;margin:5px;padding-left:50px;padding-right:170px;color:#424949;font-size:25px;"><strong>CHECK OUT</strong></button></h1>
        </form>
    </div>
    <hr>
    <div></div>
    <?php footer();?>
</body>

</html>