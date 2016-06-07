<?php 
if(isset($_POST['name'])&&isset($_POST['email'])){
	include_once('./include/router.php');
	include_once('./include/dbcon.php');
	$name=$_POST['name'];
	$email=$_POST['email'];
		$query="INSERT INTO users VALUES('$email',default,'$name')";
		echo $query;
		$result=mysqli_query($link,$query);
		if($result){
			router('index.php');
		}else{
			echo "<script>alert('User already exists')</script>";
		}
	
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
	<title>IECSE Postman|Login</title>
</head>
<body>
	<header>
		<div class="logo-div">
			<img src="./viewable/iecse.png" height="70">		
		</div>
	</header>
	<main>
		<div class="card-register"> 
			<div class="card-header normal">
				register
			</div>
			<form action="register.php" method="post">
				<input type="textbox" class="material-input" placeholder="name" name="name">
				<input type="text" class="material-input" placeholder="email" name="email">
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