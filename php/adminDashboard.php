<!DOCTYPE html>
<html>
<head>
	<title>Electricity billing system</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Electricity Billing System</a>
			</div>
			<ul class="navbar-nav nav">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<h4> Who are you?</h4>
						<li>
							<a href="userLogin.php">User</a>
						</li>
						<li>
							<a href="vendorLogin.php">Vendor</a>
						</li>
						<li>
							<a href="adminLogin.php">Admin</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Register<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<h4> Who are you?</h4>
						<li>
							<a href="userRegister.php">User</a>
						</li>
						<li>
							<a href="vendorRegister.php">Vendor</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="contact.php">Contact us</a>
				</li>
			</ul>
			<ul class="navbar-nav nav navbar-right">
				<?php  
					session_start();
					if (isset($_SESSION['username'])&&isset($_SESSION['type'])) {
						$msg ="<li><a class='dropdown-toggle' data-toggle='dropdown' href='#''>Welcome ".$_SESSION['type']." ".$_SESSION['username']." <span class='caret'></span></a><ul class='dropdown-menu'><li><a href='profile.php'>Profile</a></li><li><a href='logout.php'>Logout</a></li></ul></li>";
						echo $msg;
					}
					else{
						echo "<li><a href='index.php'>Welcome</a></li>";
					}
				?>
			</ul>
		</div>
	</nav>
	<div style="width: 100%">
		<p style="text-align: center;text-shadow: 2px 1px grey;font-size: 2em; ">Admin Dashboard</p>
		<div style="width: 20%; float: left;border: 2px solid black; border-radius: 8px;height: 100%;padding: 5px;margin: 2px;" class="center-block">
			<p style="text-align: center;text-shadow: 2px 1px grey;font-size: 1.2em; ">
				Choose one
			</p>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%;height: 10%">Profile</button></a>
			<br>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%;height: 10%">Acknowledge verified</br> connection request</button></a>
			<br>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%">Acknowledge discontinuation<br> request</button></a>
			<br>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%">Collect cash from vendor</button></a>
			<br>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%">Register vendor</button></a>
			<br>
			<a href="https://www.google.com" style="width:90%;margin: auto;"><button class="btn btn-primary center-block" style="width: 80%">Add an admin</button></a>
			<br>
		</div>
		<div style="width: 75%;float:left	;border: 2px solid black; border-radius: 8px;height: 100%;padding: 5px;margin: 10px;">
			<p style="text-align: center;text-shadow: 2px 1px grey;font-size: 2em; ">
				
			</p>
			
		</div>
	</div>
</body>
</html>