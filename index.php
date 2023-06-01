<?php require_once 'includes/connect.php'; 
	redirectTo('login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Insert Data</title>
	<!-- css links -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

	
<h2 class="bg-secondary text-white text-center p-3">Members Management</h2>

	<div class="container mb-0 pb-0 d-flex justify-content-between align-items-center">
		<?php 
			$total_mem = mysqli_query($conn,"SELECT * FROM members ORDER BY id DESC");
			$total_families = mysqli_num_rows($total_mem);
			$t_mem = 0;
			while($total = mysqli_fetch_assoc($total_mem)){
				$num = $total['members'];
				$t_mem += intval($num);
			}
			$val_invt = mysqli_query($conn,"SELECT * FROM members WHERE invitation = 'Special' ");
			$total_valima_invite = mysqli_num_rows($val_invt);
			$all_invt = mysqli_query($conn,"SELECT * FROM members WHERE invitation = 'All' ");
			$total_all_invite = mysqli_num_rows($all_invt);

		?>
		<h4 class="text-primary font-weight-bold">Total Families : <span class="total_mem"><?= $total_families; ?></span></h4>
		<h4 class="text-primary font-weight-bold">Total Members : <span class="total_mem"><?= $t_mem; ?></span></h4>
		<h4 class="text-primary font-weight-bold">Special Invitation : <span class="total_mem"><?= $total_valima_invite; ?></span></h4>
		<h4 class="text-primary font-weight-bold">All Invitation : <span class="total_mem"><?= $total_all_invite; ?></span></h4>
	</div>
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-md-4 memberloyee_form">
				<form id="data-form" class="form member_form">
					<div class="form-group">
						<label for="name">Name :</label>
						<input type="text" name="name" class="form-control mem_name_input" required>
					</div>
					<div class="form-group">
						<label for="name">Members :</label>
						<input type="number" name="members" class="form-control members_input" required>
					</div>
					<div class="form-group">
						<label for="name">Select Invitation :</label>
						<select name="invitation" class="form-control address_selectBox" required>
							<option value="All">All</option>
							<option value="Special">Special</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Select Residence :</label>
						<select name="address" class="form-control address_selectBox" required>
							<option value="Lahore">Lahore</option>
							<option value="Faisalabad">Faisalabad</option>
							<option value="Multan">Multan</option>
							<option value="Alipur">Alipur</option>
							<option value="Bahawalpur">Bahawalpur</option>
						</select>
					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-success form-control mt-3">
				</form>
			</div>

				<div class="col-md-8 table-responsive">
					<table class="table table-sm table-striped table-bordered text-center">
					<thead>
						<tr class="bg-primary text-white">
							<th>Id</th>
							<th>Name</th>
							<th>Members</th>
							<th>Invitation</th>
							<th>Address</th>
							<th>Invite</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$count = 1;
							$members = select("SELECT * FROM members");
							foreach ($members as $member) {
						?>
						<tr>
							<td class="count"><?= $count; ?></td>
							<td><?= $member['name']; ?></td>
							<td><?= $member['members']; ?></td>
							<td><?= $member['invitation']; ?></td>
							<td><?= $member['address']; ?></td>
							<td>
								<?php if($member['invite'] == 0){ ?>
								<span class="badge badge-warning">Pending</span>
								<?php }else{ ?>
								<span class="badge badge-success">Sent</span>
								<?php } ?>
							</td>
							<td>
								<?php if($member['invite'] == 0){ ?>
								<button class="btn btn-success check_btn" data-id="<?= $member['id']; ?>">
									<i class="fa fa-check"></i>
								</button>
								<?php } ?>
								<button class="btn btn-danger delete_btn" data-id="<?= $member['id']; ?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
					<?php $count++; } ?>
					</tbody>
				</table>
				</div>


		</div>
		</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/home.js"></script>
</body>
</html>