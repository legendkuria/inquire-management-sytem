<?php
session_start();
error_reporting(0);
include('include/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COD| Closed Inquiries</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
		var popUpWin = 0;

		function popUpWindow(URLStr, left, top, width, height) {
			if (popUpWin) {
				if (!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 500 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
		}
	</script>
	<style>
    .navbar {
        position: static !important;
    }

    .navbar .container {
        width: auto;
    }

    .navbar .navbar-inner {
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
        padding-left: 30px;
    }

    .navbar .nav>li>a {
        padding: 20px 15px;
        font-weight: bold;
        color: antiquewhite;
    }
    </style>
</head>

<body>
	<?php include('include/header.php'); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('include/sidebar.php'); ?>
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Closed inquiries</h3>
							</div>
							<div class="module-body table">



								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
									<thead>
										<tr>
											<th>inquiryNo</th>
											<th> Name</th>
											<th>Registration number</th>
											<th>Reg Date</th>
											<th>Status</th>

											<th>Action</th>


										</tr>
									</thead>

									<tbody>
										<?php
										$st = 'closed';
										$query = mysqli_query($con, "select inquiries.*,register.regno as registration, register.fullname as name from inquiries join register on register.id=inquiries.userid where inquiries.status='$st'");
										while ($row = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo htmlentities($row['inquirynumber']); ?></td>
												<td><?php echo htmlentities($row['name']); ?></td>
												<td><?php echo htmlentities($row['registration']); ?></td>
												<td><?php echo htmlentities($row['regDate']); ?></td>

												<td><button type="button" class="btn btn-success">Closed</button></td>

												<td> <a href="inquiry-details.php?cid=<?php echo htmlentities($row['inquirynumber']); ?>"> View Details</a>
												</td>
											</tr>

										<?php  } ?>
									</tbody>
								</table>
							</div>
						</div>



					</div>
					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->
	</div>
	<!--/.wrapper-->

	<?php include('include/footer.php'); ?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		});
	</script>
</body>