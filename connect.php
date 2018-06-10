<?php
	//var_dump($_POST);
	$uName =$_POST["irc-name"];
	$uPass = $_POST["irc-pass"];

	$host = "localhost";
	$Name = "root";
	$password = "";
	$dbName = "dip_akadem";
	 
	// Create database connection
	$conn = new mysqli($host, $Name, $password, $dbName);
	 
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->query("SET NAMES utf8");
	$sql = "INSERT INTO ta (name, password)
			VALUES('".$uName."', '".$uPass."')";
	if($conn->query($sql) === TRUE) {
		echo "Реєстрація прошла успішно.";
	} else {
		echo "Fatal error!"
	}
	
	$conn->close();
?>