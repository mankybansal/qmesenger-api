<?php
	// db connections
	include '../dbcon.php';
	global $conn;

	session_start();
	$email=$_GET['username'];
	$query="SELECT name FROM users WHERE user_email= '$email'";
	$result=mysqli_query($conn,$query);
	if($result){
	$row=mysqli_fetch_assoc($result);
	$op=$row['name'];
	echo $op;
}
?>
