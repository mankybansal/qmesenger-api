<?php
	$errorFlag=0;
	session_start();
	include_once('./include/router.php');
	include_once('./include/dbcon.php');
	if(isset($_SESSION['username'])){
		router('../qmessenger/front.php');
	}
if(isset($_POST['username'])){

	$username=$_POST['username'];
	$query="SELECT * FROM users WHERE user_email='$username'";
	echo $query;
	$result=mysqli_query($link,$query);
	if($result){
		$row=mysqli_num_rows($result);
		$_SESSION['name']=$row['name'];
		$_SESSION['username']=$_POST['username'];
		echo $_SESSION['username'];
		router('../qmessenger/front.php');
	}else{
		$errorFlag=1;
	}
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
	<title>IECSE Postman | Login</title>
</head>
<body>
	<header>
		<div class="logo-div">
			<img src="../qmessenger/QLogo.png" height="70">
		</div>
	</header>
	<main>
		<div class="card">
			<div class="card-header normal">
				login
			</div>
			<form method="post" action="index.php">
				<input type="textbox" class="material-input" placeholder="email" name="username">
				<input type="submit" class="material-button" value="SUBMIT">
			</form>
		</div>
	</main>
	<footer>
		<div class="lower">
			<img src="./viewable/iecse-long.png" height="40">
		</div>
	</footer>
</body>
</html>
