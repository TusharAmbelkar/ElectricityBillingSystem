<?php  
	session_start();
	require 'dbConnect.php';
	$conn=dbCon();
	$stmt = $conn->prepare("SELECT firstName,middleName,lastName,mobileNumber1,mobileNumber2,email,DOB,cashCredit from vendor WHERE username = ? && password = ?");
	$stmt->bind_param("ss",$username,$password);
	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt->execute();
	$stmt->bind_result($firstname,$middlename,$lastname,$mobileNumber1,$mobileNumber2,$email,$DOB,$cashCredit);
	$stmt->store_result();
	if ($stmt->num_rows==0) {
		echo "<script type='text/javascript'>alert('No login with these details\\nPlease Signup or try Login again......');window.location.href='index.php';</script>";
	}
	else{
		while($stmt->fetch()){
			$_SESSION['username']=$username;
			//$_SESSION['vendorID']=$vendorID;
			$_SESSION['firstname']=$firstname;
			$_SESSION['middlename'] = $middlename;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['contactnumber1'] = $mobileNumber1;
			$_SESSION['contactnumber1'] = $mobileNumber2;
			$_SESSION['email'] = $email;
			$_SESSION['DOB'] = $DOB;
			$_SESSION['cashCredit'] = $cashCredit;
			$_SESSION['type'] = 'vendor';
			echo "<script>
			alert('Login successful');
            window.location.href='index.php'</script>";
		}

	}
?>