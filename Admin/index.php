<?php 
    session_start();
    require_once('constants.php');
    require_once('db_connect.php'); 

    if(isset($_POST['submit'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(login($email, $password)) {
            $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " " . "Logged In";
            activityLog($log, $_SESSION['execid']); 

            header("Location: orders.php");
        }
        else{
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sneaks</title>
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
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/Fixed-navbar-starting-with-transparency.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</head>

<body class="body">
    <div class="login " style="width: 100%">
    <div class="container" style="width: 100%">
        <div class="col-lg-6 col-lg-offset-3 ">
                <div class="inner-form">
                    <form role="form" method="POST">
                        <div class="row">
                                <div class="login-text text-center">
                                    <h1>ADMIN LOGIN</h1>
                                    <p>Welcome to Sneaks Administrator Login. Unauthorized users not permitted beyond this point.</p>
                                    <?php 
                                        if(isset($_SESSION['loginErr'])){
                                            echo "<p>" . $_SESSION['loginErr'] . "</p>";
                                        } 
                                    ?>
                                </div> 
                                <br/><br/> 
                                <div class="col-lg-12">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-default pull-right">
                                        <span>LOGIN</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>   
        </div>   
    </div> 
</body>

</html>