<?php
//Include required PHPMailer files
include('includes/config.php');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {

    if (isset($_POST['submit'])) {
        $uid = $_SESSION['id'];
        $det=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM register where id=$uid"));
        $category = $_POST['category'];
        $inquirydetails= $_POST['inquirydetails'];
        $inquiryfile = $_FILES["inquiryfile"]["name"];


        move_uploaded_file($_FILES["inquiryfile"]["tmp_name"], "inquirydocs/" . $_FILES["inquiryfile"]["name"]);
        $query = mysqli_query($con, "insert into inquiries(userid,category,inquirydetails,inquiryfile) values('$uid','$category','$inquirydetails','$inquiryfile')");
        //
        $get=mysqli_fetch_array(mysqli_query($con,"SELECT * from admin where id=1"));
        $email=$get['email'];
        if($query){
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "ke734cynthiawangari@gmail.com";
//Set gmail password
	$mail->Password = "Ivygathoni7";
//Email subject
	$mail->Subject = "INQUIRY MANAGEMENT SYSTEM IT DEPARTMENT";
//Set sender email
	$mail->setFrom('ke734cynthiawangari@gmail.com','COD IT departmet');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
    $nam=$det['fullname']." ".$det['regno'];
    
	$mail->Body = "
    <h1 style='color:blue;'>Inquiry</h1><br><p>$nam has made an $category inquiry</p>";
//Add recipient
	$mail->addAddress($email,"COD");

//Finally send email
	if ( $mail->send() ) {
		$email_sent="success";
	}else{
		echo "Message could not be sent.";
	}
//Closing smtp connection
	$mail->smtpClose();
        }
        //
        $sql = mysqli_query($con, "select inquirynumber from inquiries  order by inquirynumber desc limit 1");
        while ($row = mysqli_fetch_array($sql)) {
            $inqn = $row['inquirynumber'];
        }
        $inquiryno = $inqn;
        echo '<script> alert("Your inquiry has been successfully filled and your inquiryno is  "+"' . $inquiryno . '")</script>';
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

        <title>IMS | make inquiry</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">


    </head>

    <body>

        <section id="container">
            <?php include("includes/header.php"); ?>
            <?php include("includes/sidebar.php"); ?>
            <section id="main-content">
                <section class="wrapper">
                    <h3><i class="fa fa-angle-right"></i> Register Inquiry</h3>
                    <div class="row mt">
                        <div class="col-lg-12">
                            <div class="form-panel">
                                <form class="form-horizontal style-form" method="post" name="inquiry" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                        <div class="col-sm-4">
                                            <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                                <option value="">Select Category</option>
                                                <?php $sql = mysqli_query($con, "select id,categoryname from category ");
                                                while ($rw = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?php echo htmlentities($rw['id']); ?>">
                                                        <?php echo htmlentities($rw['categoryname']); ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Inquiry Details (max 2000 words) </label>
                                        <div class="col-sm-6">
                                            <textarea name="inquirydetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Inquiry Related Doc(if any)
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="file" name="inquiryfile" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10" style="padding-left:25% ">
                                       <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

        <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


        <script src="assets/js/form-component.js"></script>


        <script>
            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });
        </script>

    </body>

    </html>
<?php } ?>