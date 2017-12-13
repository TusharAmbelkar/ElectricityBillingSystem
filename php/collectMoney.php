<?php
	require 'dbConnect.php';
	$conn=dbCon();
	$res=$conn->query("SELECT cashCredit FROM vendor where username =".$_POST['vUername']);
	if (!$result) {
		trigger_error('Invalid querry'.$conn->error);
	}
	else{
		if($result->num_rows==0){
			echo "<script>alert('Invalid vendor username.Please try again.')</script>"
		}
		else if($result->num_rows==1){
			$row=$result->fetch_assoc();
			$credit=$row['cashCredit'];
			if($credit<$_POST['amount']){
				echo "<script>alert('Not enough credit.Enter valid credit amount.')</script>";
			}
			else{
				$sql="UPDATE vendor SET cashCredit=".($credit-$_POST['amount'])." WHERE username=".$_POST['vUername'];
				if($conn->query($sql)==TRUE){
					$conn->query("UPDATE admin SET cashCredit=cashCredit+".($credit-$_POST['amount'])." WHERE username=".$_SESSION['username']);
					echo "<script>alert('Success!!');window.location.href='adminDashboard3.php'</script>";
				}
				else{
					echo "<script>alert('Some error occured.')</script>";
				}
			}
		}
	}
?>