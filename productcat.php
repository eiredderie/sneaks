<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');

    $typefilter = ""; $genderfilter = "";
    if(isset($_POST['add'])){
        addToCart($_SESSION['id'],$_POST['add'],$_POST['price'],$_POST['quantity'],"9");
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
    <title>Products | Sneaks PH</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/newstyles.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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


<body style="padding:0px;">
    <?php navbar();?>
    <div class="main_con" style=" margin-top: 150px;">
        <div class="container col-sm-3" style="height: 1000px">
            <div class="choices-container" style="float: right">
                <a href="<?="productcat.php?gender=Boys&type=" . $_GET['type']?>" class="choice-name">Mens Shoes</a>
                <a href="<?="productcat.php?gender=Girls&type=" . $_GET['type']?>" class="choice-name">Womens Shoes</a>
                <a href="<?="productcat.php?gender=Kids&type=" . $_GET['type']?>" class="choice-name">Kids Shoes</a>
                <a href="<?="productcat.php?gender=Baby&type=" . $_GET['type']?>" class="choice-name">Baby Shoes</a>
            </div>
        </div>
        <div class="container" style="width: 100%;">
        <?php
            $array = array();
            if((!isset($_GET['gender'])) && (isset($_GET['type'])) ){
                if($_GET['type']=="Sneakers"||$_GET['type']=="Casual"||$_GET['type']=="Boots"||$_GET['type']=="Sandals"){
                    $array=displayType($_GET['type']);
                }
            }
            else{
                if($_GET['gender']=="Boys"||$_GET['gender']=="Girls"||$_GET['gender']=="Kids"||$_GET['gender']=="Baby"){
                    $array=displayGenderType($_GET['gender'], $_GET['type']);
                }
            }

            if((sizeof($array) != 0) && !isset($array['Error'])){
                for($i=0;$i<sizeof($array);$i++){
                    $item = viewItem($array[$i][0], $array[$i][1], $array[$i][2], $array[$i][3], $array[$i][4], 
                                        $array[$i][5], $array[$i][6], $array[$i][7], $array[$i][8], $array[$i][9]);
                    echo $item;
                }
            }
            else{
                echo "<center><h1>NO ITEMS FOUND</h1></center>";
            }
        ?>
        </div>
    </div>
    <?php footer();?>
</body>

</html>