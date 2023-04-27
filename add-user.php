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
	<title>Add user</title>
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
		<h1>Add user</h1>
		<div class="shadow bg-white p-4 col-sm-6">
			<form method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile</label>
					<input type="tel" name="mobile" id="mobile" maxlength="10" minlength="10" class="form-control"
						required>
				</div>
				<div class="form-group">
					<button class="btn btn-success" name="save_user" type="submit">Save</button>
				</div>
			</form>
			<?php
			if (isset($_POST['success'])) {
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Success!</strong> <?php echo $_POST['success']; ?>
				</div>
				<?php
			}
			unset($_POST['success']);
			?>
			<?php
			if (isset($_POST['error'])) {
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> <?php echo $_POST['error']; ?>
				</div>
				<?php
			}
			unset($_POST['error']);
			?>
		</div>
	</div>
</body>

</html>