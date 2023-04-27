<?php 
require_once 'db.php';
$users = getUsers();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<title>Users</title>
</head>

<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-user.php">Add user</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h1>Users</h1>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(count($users) > 0)
						{
							$cnt = 0;
							foreach($users as $key => $value)
							{
								$cnt++;
								?>
								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $value['name']; ?></td>
									<td><?php echo $value['email']; ?></td>
									<td><?php echo $value['mobile']; ?></td>
									<td><?php echo $value['is_verified'] == 1 ? '<span class="badge badge-success">Verified</span>' : '<span class="badge badge-warning">Not Verified</span>'; ?></td>
								</tr>
								<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>