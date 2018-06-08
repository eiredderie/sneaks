<?php 
    session_start();
    require_once('constants.php');
    require_once('db_connect.php');  

    (!isset($_SESSION['execid'])) ? header("Location: index.php") : null;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sneaks</title>
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

</head>

<body>
    <div id="wrapper" style="margin:-1px;"></div>
    <?php sidebar(); ?>
    <div class="container main toptext">
        <h1>Hi, Admin!</h1>
        <h1></h1>
    </div>
    <section id="contact" style="padding:10px;padding-right:5px;padding-left:4px;" class="main">
        <div class="container">
            <form action="javascript:void();" method="post" id="contactForm" style="padding:15px;">
                <div class="form-row" style="margin-left:0px;margin-right:0px;padding:10px;">
                    <div class="col-md-6" style="padding-left:20px;padding-right:20px;">
                        <fieldset></fieldset>
                        <legend><i class="fa fa-info"></i>&nbsp;User Information</legend>
                        <p></p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-building"></i></td>
                                        <td>Name</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i></td>
                                        <td>Address</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-phone"></i></td>
                                        <td>Phone Number</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-envelope"></i></td>
                                        <td>Email Address</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" id="message" style="padding-right:20px;padding-left:20px;">
                        <fieldset>
                            <legend><i class="fa fa-envelope"></i>&nbsp;Message Form</legend>
                        </fieldset>
                        <div class="form-group has-feedback"><label for="from_name">Username</label><input class="form-control" type="text" name="from_name" required="" placeholder="admin" id="from_name" tabindex="-1"></div>
                        <div class="form-group has-feedback"><label for="from_email">Email</label><input class="form-control" type="email" name="from_email" required="" placeholder="admin@gmail.com" id="from_email"></div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group has-feedback"><label for="from_phone">No. of Orders.</label><input class="form-control" type="text" name="subject" placeholder="4" id="from_phone"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label for="calltime">Sizes</label><select class="form-control" name="afdeling" value="Afdeling" required="" id="calltime"><option value="Sales">Sales</option><option value="9">9</option><option value="11.5">11.5</option></select></div>
                            </div>
                        </div>
                        <div class="form-group"><label for="comments">Concern</label><textarea class="form-control" rows="5" name="Comments" placeholder="Type your concern below." id="comments"></textarea></div>
                        <div class="form-group"><button class="btn btn-primary active btn-block" type="submit" style="background-color:#303641;">Send <i class="fa fa-chevron-circle-right"></i></button></div>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>