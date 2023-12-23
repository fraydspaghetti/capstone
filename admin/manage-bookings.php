<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['alogin'])) {
	header("location: index.php");
	exit();
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "2";
		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();
	} else {
		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			$sql = "delete from tblbooking  WHERE id=:id";
			$query = $dbh->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_STR);
			$query->execute();
		}
	}
?>

	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>SakayLLC | Admin Manage Booking </title>
		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>

	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Manage Bookings</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Bookings Info</div>
								<div class="panel-body">
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Vehicle</th>
												<th>From Date</th>
												<th>To Date</th>
												<th>Posting date</th>
												<th>Message</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>


										<tbody>

											<?php
											$sql = "SELECT tblusers.FullName, tblbrands.BrandName, tblvehicles.VehiclesTitle, tblbooking.FromDate, tblbooking.ToDate, tblbooking.message, tblbooking.VehicleId as vid, tblbooking.Status, tblbooking.PostingDate, tblbooking.id  
																FROM tblbooking 
																JOIN tblvehicles ON tblvehicles.id = tblbooking.VehicleId 
																JOIN tblusers ON tblusers.EmailId = tblbooking.userEmail 
																JOIN tblbrands ON tblvehicles.VehiclesBrand = tblbrands.id 
																ORDER BY tblbooking.PostingDate DESC";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) { ?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($result->FullName); ?></td>
														<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
														<td><?php echo date('M j, Y', strtotime($result->FromDate)); ?></td>
														<td><?php echo date('M j, Y', strtotime($result->ToDate)); ?></td>
														<td><?php echo date('M j, Y g:i:s A', strtotime($result->PostingDate)); ?></td>

														<td><?php echo htmlentities($result->message); ?></td>

														<td><?php
															$status = $result->Status;

															if ($status == 0) {
																echo htmlentities('Not Confirmed yet');
															} else if ($status == 1) {
																echo htmlentities('Confirmed');
															} else {
																echo htmlentities('Cancelled');
															}


															// Display buttons conditionally based on the status
															if ($status != 1 && $status != 2) {
																echo '<td>
            <a class="btn btn-primary" href="manage-bookings.php?aeid=' . htmlentities($result->id) . '" onclick="showConfirm(event)"> <i id="icon" class="fa fa-check"></i></a> 
            <a class="btn btn-dark" href="manage-bookings.php?eid=' . htmlentities($result->id) . '" onclick="showcancel(event)"> <i id="icon" class="fa fa-times"></i></a>
            <a class="btn btn-danger" href="manage-bookings.php?del=' . $result->id . '" onclick="showDeleteConfirmation(event)"><i id="icon" class="fa fa-trash"></i></a>
          </td>';
															} else if ($status != 2) {
																echo '<td>
            <a class="btn btn-dark" href="manage-bookings.php?eid=' . htmlentities($result->id) . '" onclick="showcancel(event)"> <i id="icon" class="fa fa-times"></i></a>
            <a class="btn btn-danger" href="manage-bookings.php?del=' . $result->id . '" onclick="showDeleteConfirmation(event)"><i id="icon" class="fa fa-trash"></i></a>
          </td>';
															} else {
																// If the status is canceled, you can choose to display some message or perform other actions
																echo '<td>
	<a class="btn btn-danger" href="manage-bookings.php?del=' . $result->id . '" onclick="showDeleteConfirmation(event)"><i id="icon" class="fa fa-trash"></i></a>
	</td>				
	';
															}
															?>


													</tr>
											<?php $cnt = $cnt + 1;
												}
											} ?>

										</tbody>
									</table>



								</div>
							</div>



						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
		<script src="alert.js"></script>

	</body>

	</html>
<?php } ?>