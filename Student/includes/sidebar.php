<?php
session_start();
include('config.php');
?>
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <?php
            $sql = "select fullName from register where Email='" . $_SESSION['login'] . "' ";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            } else {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
                    <p class="centered"><a href="profile.php">

                            <img src="userimages/userimage.png" class="img-circle" width="70" height="70">
                        </a>
                    </p>

                    <h5 class="centered"><?php echo htmlentities($row['fullName']); ?></h5>
            <?php }
            } ?>

            <li class="mt">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Account Setting</span>
                </a>
                <ul class="sub">
                    <li><a href="#">Change Password</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="make-inquiry.php">
                    <i class="fa fa-book"></i>
                    <span>make inquiry</span>
                </a>
            </li>
            </li>
            <li class="sub-menu">
                <a href="inquiry-history.php">
                    <i class="fa fa-tasks"></i>
                    <span>Inquiry History</span>
                </a>

            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>