
<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$regno=$_POST['regno'];
	$mobileno=$_POST['mobileno'];
	$password=md5($_POST['password']);
	$confirmpassword=md5($_POST['confirmpassword']);
	$status=1;
	
	if($password==$confirmpassword){
	  $query=mysqli_query($con,"insert into register(fullName,Email,regNo,mobileNo,password,status) values('$fullname','$email','$regno','$mobileno','$password','$status')");
	  $msg="Registration successfull. Now You can login !";
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

    <title>IMS | Student Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
 
    <script>
	    function userAvailability() {
          $("#loaderIcon").show();
          jQuery.ajax({
          url: "check_availability.php",
          data:'email='+$("#email").val(),
          type: "POST",
          success:function(data){
          $("#user-availability-status1").html(data);
          $("#loaderIcon").hide();
          },
          error:function (){}
          });
        }

        function valid(){
           if(document.register.password.value!= document.register.confirmpassword.value){
              alert("Password and Confirm Password Field do not match  !!");
              document.register.confirmpassword.focus();
              return false;
            }
            return true;
        }
    </script>
  </head>

  <body style="background-color:#D3D3D3">
	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" name="register" method="post">
		        <h2 class="form-login-heading">Student Registration</h2>
		        <p style="padding-left: 1%; color: green">
				<?php if($msg){
                      echo htmlentities($msg);
		        		}
				?>


				</p>
		        <div class="login-wrap">
		         <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
		            <br>
		            <input type="email" class="form-control" placeholder="Email Address" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
		            <br>
					<input type="text" class="form-control" placeholder="regno" required="required" name="regno"><br >
					<input type="text" class="form-control" maxlength="10" name="mobileno" placeholder="Mobile no" required="required" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
					<input type="password" class="form-control" placeholder="confirm Password" required="required" name="confirmpassword"><br >
		            <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit" onclick="return valid();"><i class="fa fa-user"></i> Register</button>
		            <hr>
		            
		            <div class="registration" >
		                Already have an account?<br/>
		                <a class="" href="login.php">
		                   Login to your account
		                </a>
		            </div>
		
		        </div>
		
		      
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  


  </body>
</html>
