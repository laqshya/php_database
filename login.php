<?php
$servername = "localhost";
$username = "root";
$password = "";

if(empty($_POST["user_name"]) or empty($_POST["password"]) ) {
	echo 'one of the required field is empty';
}	
else {
	$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
	die("connection failed:" .$conn->connect_error);
}

else {

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

 mysqli_select_db($conn, 'register');

 $Firstname = test_input($_POST["user_name"]);
 $Password = test_input($_POST["password"]);
 
 
 
  $result = mysqli_query($conn, "SELECT * FROM accounts WHERE First_name = '$Firstname' AND Password = '$Password'") or die("Fail to query.".mysqli_error($conn));
  
  $row = mysqli_fetch_array($result);
  
  if($row['First_name'] == $Firstname && $row['Password'] == $Password) {
	  echo "LOGIN SUCCESSFULLY";  
  }
  else {
	  echo "Fail to log in";
  }
 
}
}
 
?>