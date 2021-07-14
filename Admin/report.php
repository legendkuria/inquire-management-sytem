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
    <title>Inquiry management System</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

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
                                <h3>Reports</h3>
                            </div>

                            <div class="module-body">

                                <form class="" name="report" method="GET">
                                    Status&nbsp;
                                    <select required="" name="status">
                                        <option value="All">All</option>
                                        <option value="Transcript">Transcript</option>
                                        <option value="Exam">Exam</option>
                                        <option value="Timetable">Timetable</option>
                                    </select>
                                    From <input type="date" placeholder="yyyy-mm-dd" name="from" class="form-control">
                                    To <input type="date" placeholder="yyyy-mm-dd" name="to" class="form-control">
                                    <button type="submit" name="filter">Filter</button>

                                </form>

                            </div>


                        </div>
                        <div id="divToPrint">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RegNo</th>
                                        <th>Name</th>
                                        <th>Inquiry</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "inquiry");
                                    if (isset($_GET['from']) && isset($_GET['to'])) {
                                        $status = $_GET['status'];
                                        $from = $_GET['from'];
                                        $to = $_GET['to'];
                                        $cnt = 1;
                                        $query = "SELECT inquiries.*,register.regno as registration, register.fullname as name  from inquiries join register on register.id=inquiries.userId where categoryname= '$status' and inquiries.regDate BETWEEN '$from' AND '$to'  ";

                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {

                                            foreach ($query_run as $row) {


                                    ?>

                                                <tr>
                                                    <td><?= $cnt; ?></td>
                                                    <td><?= $row['registration']; ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['categoryname']; ?></td>
                                                    <td><?php
                                                        $status = $row['status'];
                                                        if ($status == "" or $status == "NULL") {

                                                        ?>
                                                            Not processed
                                                        <?php }
                                                        if ($status == "in process") {
                                                        ?>
                                                            in progress
                                                        <?php }
                                                        if ($status == "closed") {
                                                        ?>
                                                            closed
                                                        <?php } ?>
                                                    </td>


                                                </tr>
                                    <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>


                    </div>


                    <input type="button" value="print" class="btn btn-success" style="margin-top:20px;" onclick="PrintDiv();" />
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
    <script type="text/javascript">
        function PrintDiv() {
         
            var divToPrint = document.getElementById('divToPrint');
            var popupWin = window.open('', '_blank', 'width=800,height=500 top=25');
            popupWin.document.open();
            popupWin.document.write('<html><head><title>CS & IT Inquiry Management System</title>');
            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
    </script>

    <?php include('include/footer.php'); ?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>


</body>