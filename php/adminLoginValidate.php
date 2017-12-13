<?php  
	session_start();
	require 'dbConnect.php';
	$conn=dbCon();
	$stmt = $conn->prepare("SELECT firstName,middleName,lastName,email,userName,password,mobilenumber1 from admin WHERE username = ? && password = ?");
	$stmt->bind_param("ss",$username,$password);
	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt->execute();
	$stmt->bind_result($firstname,$middlename,$lastname,$email,$userName,$password,$contactnumber);
	$stmt->store_result();
	if ($stmt->num_rows==0) {
		echo "<script type='text/javascript'> window.location.href='index.php';alert('No login with these details \nPlease Signup or try Login again......'); </script>";
	}
	else{
		while($stmt->fetch()){
			$_SESSION['username']=$username;
			$_SESSION['firstname']=$firstname;
			$_SESSION['middlename'] = $middlename;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['email'] = $email;
			$_SESSION['contactnumber1'] = $contactnumber;
			$_SESSION['type'] = 'admin';
			echo "in";
			echo "<script>
			alert('Login successful');
            window.location.href='adminDashboard.php'</script>";
		}

	}
	$stmt->close();
	$conn->close();
?>