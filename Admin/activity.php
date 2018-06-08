<?php 
    session_start();
    require_once('constants.php');
    require_once('db_connect.php'); 
    require_once('modals.php'); 
    
    (!isset($_SESSION['execid'])) ? header("Location: index.php") : null;

    $displayarray = getLogs();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items | Sneaks</title>
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
    <div class="container main">
        <div class="modal fade" role="dialog" tabindex="-1" id="prod">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add a Product</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div id="contact">
                                    <div class="container" style="padding-right:15px;padding-top:5px;background-color:#f1efef;">
                                        <div class="intro"></div>
                                        <form method="post" id="contact-form" enctype="multipart/form-data">
                                            <div class="messages"></div>
                                            <div class="controls">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="form_name">Shoe Brand*</label><input class="form-control" type="text" name="brand" required="" placeholder="e.g. Nike">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label for="form_lastname">Shoe Name* </label><input class="form-control" type="text" name="name" required="" placeholder="e.g. Nike Cortex">
                                                            <div
                                                                class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="form_email">Sizes</label><input class="form-control" type="text" name="sizes" required="" placeholder="e.g. 5,6,7,8">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="form_phone">Colors</label><input class="form-control" type="text" name="colors" placeholder="e.g. Red,Light Blue,Green">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="form_email">Gender</label><input class="form-control" type="text" name="gender" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="form_email">Type</label><input class="form-control" type="text" name="type" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="form_phone">Price</label><input class="form-control" type="number" name="price">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label for="form_phone">Stock</label><input class="form-control" type="number" name="stock">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="form_message">Description* </label><input class="form-control" type="text" name="description" required="" placeholder="e.g. Comfortable shoes." rows="4">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="file" name="image" style="padding-right:140px;margin-left:141px;margin-bottom: 15px;"/>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" name="submit" type="submit">Save</button></div>
    </form>
    </div>
    </div>
    </div>
    </div>

    <div></div>
    <div class="container main toptext">
    <div class="mui-container-fluid">
        <h1>ACTIVITY LOGS</h1>
            <hr>
                <form method="POST">
                    <input type="text" id="myInput" onkeyup="searchTable()" class="pull-right" placeholder="Search" style="margin-bottom: 15px;padding: 10px"> 
                    <table class="table table-striped display responsive no-wrap " width="100%" id="myTable" class="display" >
                        <thead>
                            <tr class="warning" id='tableHeader'>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th> 
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if((sizeof($displayarray) > 0)){
                                    if(!isset($display['Error']) || $displayarray['Error'] != 0){
                                        for($a = 0; $a < sizeof($displayarray); $a++){
                                            $userdetails = getUserDetails($displayarray[$a][1]);
        
                                            echo '<tr>
                                                <td>' . $displayarray[$a][0] . '</td>
                                                <td>' . $userdetails['U_FirstName'] . " " . $userdetails['U_MiddleName'] . " " . $userdetails['U_LastName'] . '</td>
                                                <td>' . $displayarray[$a][2] . '</td>
                                                <td>' . $displayarray[$a][3] . '</td>
                                                <td>' . $displayarray[$a][4] . '</td>
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
</div>
</body>

</html>