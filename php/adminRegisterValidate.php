<?php  
	require 'dbConnect.php';
	$conn = dbCon();
	$stmt=$conn->prepare("INSERT INTO `admin`(`firstName`, `middleName`, `lastName`, `mobileNumber1`, `mobileNumber2`, `email`,`userName`, `password`) VALUES (?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssiisss",$firstName,$middleName,$lastName,$mobileNumber1,$mobileNumber2,$email,$userName,$password);
	$firstName=$_POST['fname'];
	$middleName=$_POST['mname'];
	$lastName=$_POST['lname'];
	$mobileNumber1=$_POST['contactNumber1'];
	$mobileNumber2=$_POST['contactNumber2'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	$rpassword=$_POST['rpassword'];
	if($rpassword==$password){
		$result=$conn->query("SELECT username from admin WHERE username='".$userName."'");
		if(!$result){
			trigger_error('Invalid query '.$conn->error);
		}
		else{
			if($result->num_rows==0){
				echo "<script>alert('Acount successfully created.Please Login '); window.location.href='adminDashboard.php';</script>";		
				$stmt->execute();
				
			}
			else{
				echo "<script type='text/javascript'>alert('Alredy an acount exist with the given username.Try a different one '); window.location.href='adminDashboard5.php';</script>";		
			}
			
		}
	}
	else{
		echo "<script type='text/javascript'>alert('Password in two fields do not match'); window.location.href='adminDashboard5.php'; </script>";
	}
	$stmt->close();
	$conn->close();
?>
