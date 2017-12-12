<?php  
	function dbCon(){
		$servername = "localhost";
		$username = "root";
		$password = "tha151070031";
		$dbName = "ebs";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbName);

		// Check connection
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		}
		else{
			return $conn;
		}
	}
	 function dbClose($conn){
	 	$conn->close();
	 }	
?>