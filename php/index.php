<?php
	session_start();
	if(isset($_SESSION['username'])){
		if($_SESSION['type']=='admin'){
			header("Location: adminDashboard.php");
		}
		elseif ($_SESSION['type']=='vendor') {
			header("Location: vendorDashboard.php");
		}
		elseif ($_SESSION['type']=='user') {
			header("Location: userDashboard.php");
		}
	}
	else{
		//die("<script type='text/javascript'>window.href.location='index1.php'</script>");
		header("Location: index1.php");
	}
?>
