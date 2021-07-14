<?php
include('include/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);
    $status = 1;

    if ($password == $confirmpassword) {
        $query = mysqli_query($con, "insert into admin(email,username,password) values('$email','$username','$password')");
        $msg = "Registration successfull. Now You can login !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS | Admin login</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <script>
        function valid() {
            if (document.register.password.value != document.register.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.register.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="index.html">
                    CS & IT inquiry system|COD
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">

                    <ul class="nav pull-right">

                        <li><a href="../index.html">
                                Back to home

                            </a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form class="form-vertical" name="register" method="post">
                        <div class="module-head">
                            <h3 style="margin-left:45%;">Sign UP</h3>
                        </div>
                        <p style="padding-left: 1%; color: green">
                            <?php if ($msg) {
                                echo htmlentities($msg);
                            }
                            ?>

                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="email" placeholder="Email" required= "required">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputUsername" name="username" placeholder="username" required="required"> 
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="confirmpassword" placeholder="confirmPassword" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right" name="submit" id="submit" onclick="return valid();">Register</button>
                                </div>
                                Already have an account?
                                <a class="" href="login.php">
                                    sign-in
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.wrapper-->





    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>