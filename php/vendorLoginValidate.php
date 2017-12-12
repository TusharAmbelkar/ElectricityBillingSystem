<?php  
	session_start();
	require 'dbConnect.php';
	$conn=dbCon();
	$stmt = $conn->prepare("SELECT vendorID,firstName,middleName,lastName,mobileNumber1,mobileNumber2,email from vendor WHERE username = ? && password = ?");
	$stmt->bind_param("ss",$username,$password);
	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt->execute();
	$stmt->bind_result($vendorID,$firstname,$middlename,$lastname,$mobileNumber1,$mobileNumber2,$email);
	$stmt->store_result();
	if ($stmt->num_rows==0) {
		echo "<script type='text/javascript'> window.location.href='index.php';alert('No login with these details\\nPlease Signup or try Login again......'); </script>";
	}
	else{
		while($stmt->fetch()){
			$_SESSION['username']=$username;
			$_SESSION['vendorID']=$vendorID;
			$_SESSION['firstname']=$firstname;
			$_SESSION['middlename'] = $middlename;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['meterNumber'] = $mobileNumber1;
			$_SESSION['mobileNumber'] = $mobileNumber2;
			$_SESSION['email'] = $email;
			$_SESSION['type'] = 'vendor';
			echo "<script>
			alert('Login successful');
            window.location.href='index.php'</script>";
		}

	}
?>