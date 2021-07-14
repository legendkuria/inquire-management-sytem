<div class="span3">
	<div class="sidebar">


		<ul class="widget widget-menu unstyled">
			
			<li><a href="dashboard.php"><i class="menu-icon icon-paste"></i> Dashboard</a></li>
			<li>
				<a class="collapsed" data-toggle="collapse" href="#togglePages">
					<i class="menu-icon icon-cog"></i>
					<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
					Manage inquiries
				</a>
				<ul id="togglePages" class="collapse unstyled">
					<li>
						<a href="notprocess-inquiry.php">
							<i class="icon-tasks"></i>
							inquiries not yet processed
							<?php
							$rt = mysqli_query($con, "SELECT * FROM inquiries where status is null");
							$num1 = mysqli_num_rows($rt); { ?>

								<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="inprocess-inquiry.php">
							<i class="icon-tasks"></i>
							Pending inquiries
							<?php
							$status = "in Process";
							$rt = mysqli_query($con, "SELECT * FROM inquiries where status='$status'");
							$num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="closed-inquiry.php">
							<i class="icon-inbox"></i>
							Closed inquiries
							<?php
							$status = "closed";
							$rt = mysqli_query($con, "SELECT * FROM inquiries where status='$status'");
							$num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>

						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="manage-users.php">
					<i class="menu-icon icon-group"></i>
					Manage users
				</a>
			</li>
			<li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
			<li><a href="report.php"><i class="menu-icon icon-tasks"></i>Reports </a></li>

			<li>
				<a href="logout.php">
					<i class="menu-icon icon-signout"></i>
					Logout
				</a>
			</li>
		</ul>



	</div>
	<!--/.sidebar-->
</div>
<!--/.span3-->