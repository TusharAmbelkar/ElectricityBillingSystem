<?php  
	require 'dbConnect.php';
	$conn = dbCon();
	$stmt=$conn->prepare("INSERT INTO `user`(`accountNumber`, `firstName`, `middleName`, `lastName`, `DOB`, `meterNumber`, `mobileNumber`, `email`, `username`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("issssiisss",$accountNumber,$firstName,$middleName,$lastName,$DOB,$meterNumber,$mobileNumber,$email,$userName,$password);
	$accountNumber=$_POST['accNumber'];
	$firstName=$_POST['fname'];
	$middleName=$_POST['mname'];
	$lastName=$_POST['lname'];
	$DOB=$_POST['dob'];
	$meterNumber=$_POST['meterNumber'];
	$mobileNumber=$_POST['contactNumber'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	if($conn->query("SELECT accountNumber from user WHERE accountNumber=".$accountNumber."&& meterNumber=".$meterNumber)->num_rows==0){
		$result=$conn->query("SELECT username from user WHERE username='".$userName."'");
		if(!$result){
			trigger_error('Invalid query '.$conn->error);
		}
		else{
			if($result->num_rows==0){
				echo "<script> window.location.href='userLogin.php'; \nalert('Acount successfully created.Please Login ');
</script>";		
				$stmt->execute();
				
			}
			else{
				echo "<script type='text/javascript'> window.location.href='userRegister.php';alert('Alredy an acount exist with the given username\nTry a different one !');</script>";		
			}
			
		}
	}
	else{
		echo "<script type='text/javascript'> window.location.href='userRegister.php';alert('Alredy an acount exist with the given account number and/or meter number); </script>";
	}
	$stmt->close();
	$conn->close();
?>
