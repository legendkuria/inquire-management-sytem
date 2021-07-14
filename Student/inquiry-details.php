<?php session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else { ?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Dashboard">
		<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

		<title>Inquiry Details</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
	</head>

	<body>

		<section id="container">
			<?php include('includes/header.php'); ?>
			<?php include('includes/sidebar.php'); ?>
			<section id="main-content" style="padding-left:5%; color:#000">
				<section class="wrapper site-min-height">
					<h3><i class="fa fa-angle-right"></i>Inquiry Details</h3>
					<hr />

					<?php $query = mysqli_query($con, "select inquiries.*,category.categoryname as catname from inquiries join category on category.id=inquiries.category where userid='" . $_SESSION['id'] . "' and inquirynumber='" . $_GET['cid'] . "'");
					while ($row = mysqli_fetch_array($query)) { ?>
						<div class="row mt">
							<label class="col-sm-2 col-sm-2 control-label"><b>Inquiryno : </b></label>
							<div class="col-sm-4">
								<p><?php echo htmlentities($row['inquirynumber']); ?></p>
							</div>
					
						</div>
						<div class="row mt">
						<label class="col-sm-2 col-sm-2 control-label"><b>regdate:</b></label>
							<div class="col-sm-4">
								<p><?php echo htmlentities($row['regDate']); ?></p>
							</div>
						</div>


						<div class="row mt">
							<label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
							<div class="col-sm-4">
								<p><?php echo htmlentities($row['catname']); ?></p>
							</div>
							
						</div>






						<div class="row mt">

							<label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
							<div class="col-sm-4">
								<p><?php $cfile = $row['inquiryile'];
									if ($cfile == "" || $cfile == "NULL") {
										echo htmlentities("File NA");
									} else { ?>
										<a href="inquirydocs/<?php echo htmlentities($row['inquiryfile']); ?>" target='_blank'> View File</a>
									<?php } ?>

								</p>
							</div>
						</div>
						<div class="row mt">
							<label class="col-sm-2 col-sm-2 control-label"><b>inquiry Details </label>
							<div class="col-sm-10">
								<p><?php echo htmlentities($row['inquirydetails']); ?></p>
							</div>

						</div>



						<?php
						$ret = mysqli_query($con, "select inquiryremark.remark as remark,inquiryremark.status as sstatus,inquiryremark.remarkDate as rdate from inquiryremark join inquiries on inquiries.inquirynumber=inquiryremark.inquirynumber where inquiryremark.inquirynumber='" . $_GET['cid'] . "'");
						while ($rw = mysqli_fetch_array($ret)) {
						?>
							<div class="row mt">

								<label class="col-sm-2 col-sm-2 control-label"><b>Remark:</b></label>
								<div class="col-sm-10">
									<?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp; <br /><b>Remark Date: <?php echo  htmlentities($rw['rdate']); ?></b>
								</div>
							</div>
							<div class="row mt">

								<label class="col-sm-2 col-sm-2 control-label"><b>Status:</b></label>
								<div class="col-sm-10">
									<?php echo  htmlentities($rw['sstatus']); ?>
								</div>
							</div>

						<?php } ?>

						<div class="row mt">

							<label class="col-sm-2 col-sm-2 control-label"><b>Final Status :</b></label>
							<div class="col-sm-4">
								<p style="color:red"><?php

														if ($row['status'] == "NULL" || $row['status'] == "") {
															echo "Not yet processed";
														} else {
															echo htmlentities($row['status']);
														}
														?></p>
							</div>
						</div>





					<?php } ?>
				</section>
			</section><!-- /MAIN CONTENT -->
		</section>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


		<!--common script for all pages-->
		<script src="assets/js/common-scripts.js"></script>

		<!--script for this page-->

		<script>
			//custom select box

			$(function() {
				$('select.styled').customSelect();
			});
		</script>

	</body>

	</html>
<?php } ?>