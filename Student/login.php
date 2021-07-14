<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['submit'])) {
	$ret = mysqli_query($con, "SELECT * FROM register WHERE Email='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "dashboard.php"; //
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$host = $_SERVER['HTTP_HOST'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		$log = mysqli_query($con, "insert into studentlog(uid,username,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['login'] . "','$uip','$status')");
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$_SESSION['login'] = $_POST['username'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into studentlog(username,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
		$errormsg = "Invalid username or password";
		$extra = "login.php";
	}
}



if (isset($_POST['change'])) {
	$email = $_POST['email'];
	$mobileno = $_POST['mobileno'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "SELECT * FROM register WHERE Email='$email' and mobileNo='$mobileno'");
	$num = mysqli_fetch_array($query);
	if ($num > 0) {
		mysqli_query($con, "update register set password='$password' WHERE Email='$email' and mobileNo='$mobileno' ");
		$msg = "Password Changed Successfully";
	} else {
		$errormsg = "Invalid email id or Mobile no";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<title>IMS | Student Login</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<style>
		body {
    font-size: 13px;
    font-family: 'Open Sans', Arial, sans-serif;
  
 
}
		.previous {
			background-color: #FFFFF0;
			color: black;
			padding: 10px;
			border-radius: 12%;

		}
		.navbar{
			position: static !important;
		}
		.navbar .container{
    width: auto;
}
.navbar .navbar-inner{
    background: #156504;
    border-bottom: 1px solid #bbb;
    
}
.navbar .brand {
    color: antiquewhite;
    font-weight: bold;
    font-size: 20px;
    margin-right: 20px;
    padding: 20px;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
}
.navbar .nav>li>a {
    padding: 20px 15px;
    font-weight: bold;
    color: antiquewhite;
}
.navbar .nav>li>a:hover{
	color: #000;
}
	
	</style>
	<script type="text/javascript">
		function valid() {
			if (document.forgot.password.value != document.forgot.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.forgot.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body style="background-color:#EBECF0">

 <div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
				  School of CS & IT inquiry system 
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="../index.html">
						Back to home
						
						</a>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

	<!--  MAIN CONTENT -->
	<div id="login-page">
		<div class="container" style="padding-top:30px;">
		

			<form class="form-login" name="login" method="post" style="border-radius: 30px; height:450px;">
				<h2 class="form-login-heading">Login to your account</h2>
				<p style="padding-left:4%; padding-top:2%;  color:red">
					<?php if ($errormsg) {
						echo htmlentities($errormsg);
					} ?></p>

				<p style="padding-left:4%; padding-top:2%;  color:green">
					<?php if ($msg) {
						echo htmlentities($msg);
					} ?></p>
				<div class="login-wrap">
					<input type="text" class="form-control" name="username" placeholder="Email" required autofocus>
					<br>
					<input type="password" class="form-control" name="password" required placeholder="Password">
					<label class="checkbox">
						<span class="pull-right">
							<a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

						</span>
					</label>
					<button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i>
						LOGIN</button>
					<hr>
			</form>
			<div class="registration">
				<p>Don't have an account yet?<br />
					<a class="" href="register.php">
						Create your account
					</a><br><br>
				
				</p>
			</div>

		</div>

		<!-- Modal -->
		<form class="form-login" name="forgot" method="post">
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
						</div>
						<div class="modal-body">
							<p>Enter your details below to reset your password.</p>
							<input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br>
							<input type="text" name="mobileno" placeholder="Mobile No" autocomplete="off" class="form-control" required><br>
							<input type="password" class="form-control" placeholder="New Password" id="password" name="password" required><br />
							<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>


						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
							<button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<!-- modal -->
		</form>



	</div>
	</div>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>