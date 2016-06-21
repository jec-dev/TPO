	<div class="row">
		<div class="col-lg-3">
			<div class="row well">
				<div class="well hidden-xs hidden-sm">
					<h4 class="align-center">USER INFORMATION</h4>
					<table class="table table-condensed table-hover">
						<tr>
							<td>Roll Number</td>
							<td><?php echo $_SESSION['username']; ?></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td><?php echo $_SESSION['firstName']; ?></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><?php echo $_SESSION['lastName']; ?></td>
						</tr>
						<tr>
							<td>Batch</td>
							<td><?php echo $_SESSION['batch']; ?></td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td><?php echo $_SESSION['email']; ?></td>
						</tr>
						<tr>
							<td>Current IP Address</td>
							<td><?php echo $_SERVER['REMOTE_ADDR']; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row well">
				<div class="well">
					<h4 class="align-center noshadow-heading hidden-lg hidden-md">
						<?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'].' DASHBOARD'; ?>
					</h4>
					<h4 class="align-center">QUICK LINKS</h4>
					<div class="list-group align-center">
						<a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=updateDetails">Update Details</a>
						<a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=showDetails">Show Details</a>
						<a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=uploadPhoto">Upload Photo</a>
						<a class="list-group-item " href="<?php echo $LOGIN_URL; ?>logout.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-9 well">
			<div class="well">
				<?php include_once $NOTICE_URL.'noticeboard_student.php';?>
			</div>
		</div>
	</div>