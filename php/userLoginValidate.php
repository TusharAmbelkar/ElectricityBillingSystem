<?php  
	session_start();
	require 'dbConnect.php';
	$conn=dbCon();
	$stmt = $conn->prepare("SELECT accountNumber,firstName,middleName,lastName,meterNumber,mobileNumber,email from user WHERE username = ? && password = ?");
	$stmt->bind_param("ss",$username,$password);
	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt->execute();
	$stmt->bind_result($accountNumber,$firstname,$middlename,$lastname,$meterNumber,$mobileNumber,$email);
	$stmt->store_result();
	if ($stmt->num_rows==0) {
		echo "<script type='text/javascript'> window.location.href='index.php';alert('No login with these details \nPlease Signup or try Login again......'); </script>";
	}
	else{
		while($stmt->fetch()){
			$_SESSION['username']=$username;
			$_SESSION['accountNumber']=$accountNumber;
			$_SESSION['firstname']=$firstname;
			$_SESSION['middlename'] = $middlename;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['meterNumber'] = $meterNumber;
			$_SESSION['mobileNumber'] = $mobileNumber;
			$_SESSION['email'] = $email;
			$_SESSION['type'] = 'user';
			echo "in";
			echo "<script>
			alert('Login successful');
            window.location.href='index.php'</script>";
		}

	}
	$stmt->close();
	$conn->close();
?>