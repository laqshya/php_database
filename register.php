<?php
$servername = "localhost";
$username = "root";
$password = "";

if (empty($_POST["firstname"]) or empty($_POST["password"]) or empty($_POST["lastname"])  or empty($_POST["gender"]) or empty($_POST["Confirm_password"])) {
	echo 'one of the required field is empty';
}
else {
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
	die("connection failed:" .$conn->connect_error);
	}
	else {
	
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	if($_POST['password'] == $_POST['Confirm_password']) {

	mysqli_select_db($conn, 'register'); 

	$Firstname = test_input($_POST["firstname"]);
	$Lastname = test_input($_POST["lastname"]);
	$Password = test_input($_POST["password"]);
	$Con_Pass = test_input($_POST["Confirm_password"]);
	$Country = $_POST["country"];
	$E_mail = test_input($_POST["e-mail"]);
	if (isset($_POST['gender'])) {
	$Gender =$_POST["gender"];
	}
	$sql = "INSERT INTO `accounts` (`id`, `First_name`, `Last_name`, `Password`, `Country`, `E-mail`, `Gender`) 
	VALUES (NULL, '$Firstname', '$Lastname', '$Password', '$Country', '$E_mail', '$Gender')";

	if($conn->query($sql)) {
	echo 'registration successfull';
	}
	else {
	echo 'user cannot be added';
	}

 
 
	}
	
	else {
	echo 'passwords do not match';
	}	
	}
}
?>