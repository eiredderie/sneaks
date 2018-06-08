<?php 
    session_start();
    require_once('compiled.php');
    require_once('constants.php');
    
    $array=array();
    if(isset($_SESSION['id'])){
        $array=getOrder($_SESSION['email']);
    }
    else{
        header("Location:home.php");
    }
    
    $array=getOrder($_SESSION['email']);

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Sneaks PH</title>
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

<body style="padding:0px;margin:0px;">
    <?php navbar();?>
    <div class="container" style="margin-top: 130px;">
        <?php if(isset($array) ){?>   
            <?php
            echo '
            
        <div class="container col-sm-7 pull-left" style="margin: 15px; padding: 20px;">
        <form method="POST" action="cart.php">         
            ';
            foreach($array as $order){
            echo '
            <h3></h3>
            <div class="container choices-container" style="width: 100%;"> 
            ';

                    if(isset($_SESSION['cart']) && (sizeof($_SESSION['cart']) !=0 && !empty($_SESSION['cart']))){
                        $print = "";
                        for($a = 0 ; $a < sizeof($_SESSION['cart']); $a++){
                            $arrayitem = getItem(((int)$_SESSION['cart'][$a][0]));
                            if(isset($arrayitem)){
                                echo "<div style='width: 100%;'>
                                <center>
                                    <table style='width: 95%; margin: 10px'>
                                        <tr>
                                            <td width='70' rowspan='5'>
                                                <center>
                                                    <img src='". $arrayitem[6] . "' width='70' height='70'>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding-left: 10px; font-size: 18px'>". $arrayitem[1] . " " . $arrayitem[3] ."</td>
                                            <td style='text-align: right; font-size:20px'>
                                                <button name='delete' value='".$_SESSION['cart'][$a][0]."-".$_SESSION['cart'][$a][3]."' formaction='cart.php' style='color: #A00000;'>&#10006;</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding-left: 10px; font-size: 14px'>₱ " . $arrayitem[4] .", Quantity: " . $_SESSION['cart'][$a][2] . ", Size: ".$_SESSION['cart'][$a][3]."</td>
                                        </tr>
                                        <tr>
                                            <td style='padding-left: 10px; font-size: 14px;'>&nbsp;</td>
                                        </tr>
                                    </table>
                                </center>
                            </div>";
                            }
                            $totalcost += ($arrayitem[4] * $_SESSION['cart'][$a][2]);
                            $_SESSION['totalcost'] = $totalcost;
                            $_SESSION['totalitems'] += $_SESSION['cart'][$a][2];
                        }
                    }
                echo "
                </form>
                </div>";
                }
                ?>
        </div>
        <div class="container col-sm-4 pull-left" style="margin: 15px; margin-right: 0px; padding: 20px;">
            <h3>Order Summary</h3>
            <div class="container choices-container" style="width: 100%;padding: 5px">
                <div class="container" style="width: 100%">
                    <table style="width: 100%">
                        <tr>
                            <td style="padding: 10px; padding-left: 0px"><p style="display: inline;">Number of item(s): &nbsp;</p></td>
                            <td style="text-align: right;padding: 10px; padding-right: 0px"><p style="display: inline;"><?=$_SESSION['totalitems'] ?></p></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; padding-left: 0px"><h3 style="display: inline;">Subtotal: &nbsp;</h3></td>
                            <td style="text-align: right;padding: 10px; padding-right: 0px"><h3 style="display: inline;">₱ <?=$_SESSION['totalcost'] ?></h3></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top: 15px;padding-bottom: 15px">
                            <form method="POST" action="checkout.php">
                            <button class="btn btn-danger" style="width: 100%" name="checkout" value="checkout">PROCEED TO CHECKOUT</button>
                            </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        } 
        else{ ?>
            <center>
                <br><br>
                <h2>YOU DONT HAVE ITEMS IN YOUR CART</h2>
                <button href="index.php" class="btn btn-info" style="width: 25%;"><a style="color: #fff;font-size:21px;width:100%" href="index.php">CONTINUE SHOPPING</a></button>
                <br><br><br><br><br><br><br><br><br>
            </center>
        <?php }
        ?>
    </div><br><br><br><br><br><br><br>
    <?php footer();?>
</body>

</html>