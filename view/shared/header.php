<?php
	session_start();
	include '../model/controller.php';
	// lay bien  section 
	$get_data = new Data();
	if(isset($_SESSION['name'])) {
	$value = $get_data->getNameUser($_SESSION['name']);
		$role = $value['role']; 
	}
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>Osmosis Beats- Ecothunder Website Template</title>
	<link rel="stylesheet" type="text/css" href="../css/ie9.css" />
	<link rel="stylesheet" href="../css/Style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="../images/logo.jpg" alt="Logo" /></a>
			</div>
			<div id="navigation">
				<div>
					<ul>
						<?php 
							if (isset($_SESSION['name']) && $role == 'admin') {
						?>
							<li class="selected">
								<a href="blog.php">All Blog</a>
							</li>
							<li>
								<a href="admin_account.php?id=<?php echo $value['id']; ?>">Profile</a>
							</li>  
							<li>
								<a href="admin_blog.php?id=<?php echo $value['id']; ?>">Blog</a>
							</li>
							<li>
								<a href="account.php?id=<?php echo $value['id']; ?>"><?php echo $_SESSION['name']?>(A)</a>
							</li>
							<li>
								<a href="../model/logout.php">Logout</a>
							</li>
						<?php
							} elseif (isset($_SESSION['name']) && $role == 'user') {
						?>
							<li class="selected">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="blog.php">Blog</a>
							</li>
							<li>
								<a href="contact.php">Contact</a>
							</li>
							<li>
								<a href="account.php?id=<?php echo $value['id']; ?>"><?php echo $_SESSION['name']?>(USER)</a>
							</li>
							<li>
								<a href="../model/logout.php">Logout</a>
							</li>
						<?php
							} else {
						?>
							<li class="selected">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="about.php">About</a>
							</li>
							<li>
								<a href="contact.php">Contact</a>
							</li>
							<li>
								<a href="whychoose.php">Why Choose us</a>
							</li>
							<li>
								<a href="blog.php">Blog</a>
							</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>