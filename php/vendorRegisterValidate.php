<?php  
	require 'dbConnect.php';
	$conn = dbCon();
	$stmt=$conn->prepare("INSERT INTO `vendor`( `firstName`, `middleName`, `lastName`, `mobileNumber1`, `mobileNumber2`, `email`, `DOB`, `username`, `password`) VALUES (?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssiissss",$firstName,$middleName,$lastName,$mobileNumber1,$mobileNumber2,$email,$DOB,$userName,$password);
	//$vendorID=$_POST['vid'];
	$firstName=$_POST['fname'];
	$middleName=$_POST['mname'];
	$lastName=$_POST['lname'];
	$DOB=$_POST['dob'];
	$mobileNumber1=$_POST['contactNumber1'];
	$mobileNumber2=$_POST['contactNumber2'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	{
		$result=$conn->query("SELECT username from vendor WHERE username='".$userName."'");
		if(!$result){
			trigger_error('Invalid query '.$conn->error);
		}
		else{
			if($result->num_rows==0){
				echo "<script>alert('Acount successfully created.');window.location.href='adminDashboard.php';;
</script>";		
				$stmt->execute();
				
			}
			else{
				echo "<script type='text/javascript'> window.location.href='userRegister.php';alert('Alredy an acount exist with the given username.Try a different one !');</script>";		
			}
			
		}
	}
	/*else{
		echo "<script type='text/javascript'> window.location.href='userRegister.php';alert('Alredy an acount exist with the given account number and/or meter number); </script>";
	}*/
	$stmt->close();
	$conn->close();
?>
