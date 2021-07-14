<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/functions_all.php');
?>
<?php


if (isset($_POST['submit'])) {
	$state = $_POST['state'];
	$description = $_POST['description'];
	$sql = mysqli_query($con, "insert into state(stateName,stateDescription) values('$state','$description')");
	$_SESSION['msg'] = "State added Successfully !!";
}

if (isset($_GET['del'])) {
	mysqli_query($con, "delete from state where id = '" . $_GET['id'] . "'");
	$_SESSION['delmsg'] = "State deleted !!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| dashboard</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>

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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        font-family: "Poppins", sans-serif;
    }

    .col-md-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
    }

    .col,
    .col-1,
    .col-10,
    .col-11,
    .col-12,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-auto,
    .col-lg,
    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-lg-auto,
    .col-md,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-auto,
    .col-sm,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-auto,
    .col-xl,
    .col-xl-1,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-auto {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .mt-5,
    .my-5 {
        margin-top: 3rem !important;
    }

    .ml-2,
    .mx-2 {
        margin-left: .5rem !important;
        margin-top: 3rem !important;

    }

    .h4,
    h4 {
        font-size: 1.5rem;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-bottom: .5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }

    .row {

        display: flex;

        flex-wrap: wrap;
        margin-right: -15px;

    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .col-md-6 {

        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 100%;
        padding-right: 15px;
        padding-left: 15px;

    }

    .m-1 {
        margin: .25rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .text-center {
        text-align: center !important;
    }

    .h5,
    h5 {
        font-size: 1.25rem;
    }

    .text-primary {
        color: #007bff !important;
    }

    .h1,
    h1 {
        font-size: 2.5rem;
    }
    </style>
</head>

<body>

    <?php 
	 
	include('include/header.php'); 

	?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php'); ?>
                <div class="span9">
                    <div class="content">


                        <div class="module-head">
                            <h3>Dashboard</h3>
                        </div>

                        <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
                            <table>
                                <tr>
                                    <div class="row ml-2">
                                        <td >
                                            <div class="card col col-sm-6 col-md-6 col-lg-3 m-1">
                                                <div class="card-body" >
                                                    <h5 class="text-center">Total inquiries</h5>
                                                    <h1 class="text-center text-primary"><?php echo getNumOfInquiries() ?></h1>
                                                </div>

                                            </div>
                                        </td>
                                        <td colspan="">
                                            <div class="card col-6 col-sm-6 col-md-6 col-lg-2 m-1">
                                                <div class="card-body">
                                                    <h5 class="text-center">Students</h5>
                                                    <h1 class="text-center " style="color:red;"><?php echo getNumOfStudents() ?></h1>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                           <tr>
							   <td>
                            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                                <div class="card-body">
                                    <h5 class="text-center">Inquiries not processed</h5>
                                    <h1 class="text-center " style="color:orange;"><?php echo getNumOfNotProcessed() ?></h1>
                                </div>
                            </div></td>
							<td>
                            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                                <div class="card-body">
                                    <h5 class="text-center">Inquiries in progress</h5>
                                    <h1 class="text-center text-primary" ><?php echo getNumOfInProcess() ?> </h1>
                                </div>
                            </div>
							</td>
							<td>
                            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                                <div class="card-body">
                                    <h5 class="text-center">Closed inquiries</h5>
                                    <h1 class="text-center" style="color:green;"><?php echo getNumOfClosed() ?></h1>
                                </div>
                            </div>
							</td>
						   </tr>
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