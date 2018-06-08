<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');
        
    $edit=false;
    if(isset($_SESSION['id'])){
        //$_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
        if(isset($_GET['edit'])){
            if($_GET['edit']="yes"){
                $edit=true;
            }
        }
        if(isset($_POST['save'])){
            if($_GET['save']="yes"){
                updateAccount($_SESSION['id'],$_POST['name'],$_POST['email'] ,$_POST['contact'],$_POST['address']);
            }
        }
        $_SESSION['nameinnav'] = substr($_SESSION['fname'], 0, 1) . substr($_SESSION['lname'], 0, 1);
    }
    else{
        $_SESSION['nameinnav'] = "LOG IN";
    }
    
    (isset($_SESSION['id'])) ? $detailsarr = json_decode(getUser($_SESSION['id']), true) : null;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Sneaks PH</title>
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
    <?php
    if($edit==true){
    ?>
    <div class="container" style="margin-top: 150px">
        <form method="POST" action="account.php">
        <div class="container col-sm-3 accounts_cat choices-container" style="margin: 15px; height: 200px">
            <a class="choice-name">Account</a>
            <a class="choice-name">Orders</a>
            <a class="choice-name">Address Book</a>
            <a class="choice-name">Personal Information</a>
        </div>
        <div class="col-sm-8">
        <div class="accounts_details choices-container" style="display: inline-flex; margin-top: 15px; height: 200px; width: 45%">
            <h4>Personal Profile | <a href="account.php?edit=yes" class="edit_acc"><button type="submit" name="save" value="true">SAVE</button></a></h4>
            <h4 class="choice-name" style="color: #000">Name:<input name="name" type="text" value= "<?=$detailsarr['U_FirstName'] . " " . $detailsarr['U_LastName']?>"></h4>
            <h4 class="choice-name" style="color: #000">Email: <input name="email" type="email" value= "<?=$detailsarr['U_Email']?>"></h4>
            <h4 class="choice-name" style="color: #000">Contact: <input name="contact" type="text" required value= "<?=$detailsarr['U_Contact']?>"></h4>            
        </div>
        <div class="accounts_addresses choices-container pull-right" style="display: inline-flex; margin-top: 15px; margin: right: 15px;width: 50%">
            <h4>Address Book | <a href="account.php?edit=yes" class="edit_acc">EDIT</a></h4>
            <h4 class="choice-name" style="color: #000"><input name="address" type="text" value= "<?=$detailsarr['U_Address']?>"></h4>
        </div>
        <div class="accounts_addresses choices-container pull-right" style="margin-left: 15px;margin-top: 30px; margin-bottom: 70px; width: 100%">
            <h4>Recent Orders</h4>
        </div>
        </div>
        </form>
    </div>
    <?php
    }
    else{
    ?>
    <div class="container" style="margin-top: 150px">
        <div class="container col-sm-3 accounts_cat choices-container" style="margin: 15px; height: 200px">
            <a class="choice-name">Account</a>
            <a class="choice-name">Orders</a>
            <a class="choice-name">Address Book</a>
            <a class="choice-name">Personal Information</a>
        </div>
        <div class="col-sm-8">
        <div class="accounts_details choices-container" style="display: inline-flex; margin-top: 15px; height: 200px; width: 45%">
            <h4>Personal Profile | <a href="account.php?edit=yes" class="edit_acc">EDIT</a></h4>
            <h4 class="choice-name" style="color: #000">Name: <?=$detailsarr['U_FirstName'] . " " . $detailsarr['U_LastName']?></h4>
            <h4 class="choice-name" style="color: #000">Email: <?=$detailsarr['U_Email']?></h4>
            <h4 class="choice-name" style="color: #000">Contact: <?=$detailsarr['U_Contact']?></h4>              
        </div>
        <div class="accounts_addresses choices-container pull-right" style="display: inline-flex; margin-top: 15px; margin: right: 15px;width: 50%">
            <h4>Address Book | <a href="account.php?edit=yes" class="edit_acc">EDIT</a></h4>
            <h4 class="choice-name" style="color: #000"><?=$detailsarr['U_Address']?></h4>
        </div>
        <div class="accounts_addresses choices-container pull-right" style="margin-left: 15px;margin-top: 30px; margin-bottom: 70px; width: 100%">
            <h4>Recent Orders</h4>
        </div>
        </div>
    </div>

    <?php
    }
    ?>
    <?php footer();?>
</body>

</html>