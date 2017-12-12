<?php  
	session_start();
	$username=$_POST['username'];
	$password = $_POST['password'];
	if($username=='adminOfEBS' && $password == 'IAmYou'){
		$_SESSION['username']=$username;
		$_SESSION['type']='admin';
		echo "<script>alert('Welcome admin !!! .');window.location.href='adminDashboard.php';</script>";
	}
?>