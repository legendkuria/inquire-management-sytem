<?php
session_start();
include('include/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Details</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                                <h3>Inquiry Details</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped	 display" width="100%">

                                    <tbody>

                                        <?php $st = 'closed';
											$query = mysqli_query($con, "select inquiries.*,register.fullname as name,register.regno as reg, category.categoryname as catname from inquiries join register on register.id=inquiries.userid join category on category.id=inquiries.category where inquiries.inquirynumber='" . $_GET['cid'] . "'");
											while ($row = mysqli_fetch_array($query)) {

											?>
                                        <tr>
                                            <td><b>inquiryno</b></td>
                                            <td><?php echo htmlentities($row['inquirynumber']); ?></td>
                                            <td><b>inquirername</b></td>
                                            <td> <?php echo htmlentities($row['name']); ?></td>
                                            <td><b>regno</b></td>
                                            <td><?php echo htmlentities($row['reg']); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>regdate </b></td>
                                            <td><?php echo htmlentities($row['regDate']); ?></td>

                                        </tr>

                                        <tr>
                                            <td><b>Category </b></td>
                                            <td><?php echo htmlentities($row['catname']); ?></td>

                                        </tr>

                                        <tr>
                                            <td><b>Inquiry Details </b></td>

                                            <td colspan="5"> <?php echo htmlentities($row['inquirydetails']); ?></td>

                                        </tr>

                                        </tr>
                                        <tr>
                                            <td><b>File(if any) </b></td>

                                            <td colspan="5"> <?php $cfile = $row['inquiryfile'];
																		if ($cfile == "" || $cfile == "NULL") {
																			echo "File NA";
																		} else { ?>
                                                <a href="../student/inquirydocs/<?php echo htmlentities($row['inquiryfile']); ?>"
                                                    target="_blank"> View File</a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Final Status</b></td>

                                            <td colspan="5"><?php if ($row['status'] == "") {
																		echo "Not yet processed";
																	} else {
																		echo htmlentities($row['status']);
																	} ?></td>

                                        </tr>

                                        <?php $ret = mysqli_query($con, "select inquiryremark.remark as remark,inquiryremark.status as sstatus,inquiryremark.remarkDate as rdate from inquiryremark join inquiries on inquiries.inquirynumber=inquiryremark.inquirynumber where inquiryremark.inquirynumber='" . $_GET['cid'] . "'");
												while ($rw = mysqli_fetch_array($ret)) {
												?>
                                        <tr>
                                            <td><b>Remark</b></td>
                                            <td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date
                                                    :</b><?php echo  htmlentities($rw['rdate']); ?></td>
                                        </tr>

                                        <tr>
                                            <td><b>Status</b></td>
                                            <td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
                                        </tr>
                                        <?php } ?>





                                        <tr>
                                            <td><b>Action</b></td>

                                            <td>
                                                <?php if ($row['status'] == "closed") {
														} else { ?>
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('http://localhost/IMS/Admin/update-inquiry.php?cid=<?php echo htmlentities($row['inquirynumber']); ?>');"
                                                    title="Update order">
                                                    <button type="button" class="btn btn-primary">Take Action</button>
                                            </td>
                                            <td colspan="3">
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('http://localhost/IMS/Admin/foward.php?cid=<?php echo htmlentities($row['inquirynumber']); ?>');"
                                                    title="Update order">
                                                    <button type="button" class="btn btn-primary">foward to</button></a>
                                            </td>
                                            </a><?php } ?></td>
                                            <td colspan="4">
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('http://localhost/IMS/Admin/userprofile.php?uid=<?php echo htmlentities($row['userid']); ?>');"
                                                    title="Update order">
                                                    <button type="button" class="btn btn-primary">View User
                                                        Detials</button></a>
                                            </td>


                                        </tr>
                                        <?php  } ?>

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