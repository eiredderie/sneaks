<?php 
    session_start();
    require_once('constants.php');
    require_once('db_connect.php'); 
    require_once('modals.php'); 
    (!isset($_SESSION['execid'])) ? header("Location: index.php") : null;

    $displayarray = getOrders();

    if(isset($_POST['cancelOrder'])){
        cancelOrder($_POST['cancelOrder']);
        
        $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " " . "Cancelled Order " . $orderid;
        activityLog($log, $_SESSION['execid']);

        header("Location: orders.php");
    }
    else if(isset($_POST['confirmOrder'])){
        confirmOrder($_POST['confirmOrder']);

        $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " " . "Confirmed Order " . $orderid;
        activityLog($log, $_SESSION['execid']);

        header("Location: orders.php");
    }
    else if(isset($_POST['deliverOrder'])){
        deliverOrder($_POST['deliverOrder']);

        $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " " . "Updated Order " . $orderid 
                . " Status to Being Delivered";
        activityLog($log, $_SESSION['execid']);
        
        header("Location: orders.php");
    }
    else if(isset($_POST['finishOrder'])){
        finishOrder($_POST['finishOrder']);

        $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " " . "Finished Order " . $orderid 
                . " STATUS TO BEING DELIVERED";
        activityLog($log, $_SESSION['execid']);
        
        header("Location: orders.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Sneaks</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/Fixed-navbar-starting-with-transparency.css">
    <link rel="stylesheet" href="assets/css/Fixed-navbar-starting-with-transparency.css">
    <link rel="stylesheet" href="assets/css/Contact-form-simple.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/PHP-Contact-Form-dark.css">
    <link rel="stylesheet" href="assets/css/PHP-Contact-Form-dark.css">
    <link rel="stylesheet" href="assets/css/Rounded-Button.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/newstyles.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/Fixed-navbar-starting-with-transparency.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>

    <script>
        function searchTable() {
            var input, filter, found, table, tr, td, i, j;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                    found = false;
                } else if (tr[i].id != 'tableHeader') {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</head>

<body>
    <div id="wrapper" style="margin:-1px;"></div>
    <?php ($_SESSION['execacctype'] == "ADMIN") ? sidebar() : staffsidebar(); ?>
    <div class="container main toptext">
        <h1>ORDERS</h1>
            <hr>
                <form method="POST">
                    <input type="text" id="myInput" onkeyup="searchTable()" class="pull-right" placeholder="Search" style="margin-bottom: 15px;padding: 10px"> 
                    <table class="table table-striped display responsive no-wrap " width="100%" id="myTable" class="display" >
                        <thead>
                            <tr class="warning" id='tableHeader'>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th> 
                                <th scope="col">Location</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>  
                                <th scope="col"></th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if((sizeof($displayarray) > 0)){
                                    if(!isset($displayarray['Error']) || ($displayarray['Error'] != 0)){
                                        for($a = 0; $a < sizeof($displayarray); $a++){
                                            $splitone = explode('?', $displayarray[$a][3]);
                                            $quantity = 0;
                                            for ($b = 0; $b < sizeof($splitone); $b++){
                                                $splittwo = explode('@', $splitone[$b]);
                                                $quantity += $splittwo[2];
                                            }
        
                                            modalOrderDisplay($displayarray[$a][0], $displayarray[$a][7], $displayarray[$a][9], $displayarray[$a][6], 
                                                            $displayarray[$a][8], $displayarray[$a][3], $displayarray[$a][5]);
                                            echo '<tr>
                                                    <td>' . $displayarray[$a][0] . '</td>
                                                    <td>' . $displayarray[$a][7] . '</td>
                                                    <td>' . $displayarray[$a][9] . '</td>
                                                    <td>' . $quantity . '</td>
                                                    <td>PHP ' . $displayarray[$a][4] . '</td>
                                                    <td>' . $displayarray[$a][5] . '</td>
                                                    <td>
                                                        <center>
                                                            <button type="button" class="btn-warning btn" data-toggle="modal" data-target="#' . $displayarray[$a][0] . '"><font>View Order</font></button>
                                                        </center>
                                                    </td>
                                                </tr>';
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                <hr>
           </form> 
        </div>
    </div>
</body>

</html>