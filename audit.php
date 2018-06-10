<?php
	// переменная для сохранения результата

/*	$data='';
	// переберём массив $_POST
	foreach ($_POST as $key => $value) {
	  // добавим в переменную $data имя и значение ключа
	  $data .= $key . ' = ' . $value . '
	';
	}
	// выведим результат
	*echo $data;*/
	//var_dump($_POST);
	$uName =$_POST["name"];
	$uPass = $_POST["pass"];

/*	$host = "localhost";
	$Name = "root";
	$password = "";
	$dbName = "dip_akadem";*/
	 
	// Create database connection
	
	$conn = new mysqli("localhost", "root", "", "dip_akadem");
	 
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->query("SET NAMES utf8");
	$sql = "SELECT * FROM ta WHERE `name` = '$uName' AND `password` = '$uPass'";
	/*$sql2 = "SELECT * FROM ta WHERE `password` = '$uPass'";*/
	//print_r($conn->query($sql)->num_rows);
	/*print_r($conn->query($sql2)->num_rows);*/
	if($conn->query($sql)->num_rows == TRUE) {
		echo 1;
	}
	else {
		echo NULL;
	}
	$conn->close();
?>