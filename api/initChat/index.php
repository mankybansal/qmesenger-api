<?php
	// db connections
	include '../dbcon.php';
	global $conn;


	// responses
	$status0 = array('status'=>'0');	// updating attr 'received' failed
	$error1 = array('status'=>'-1');	// updating attr 'received' failed
	$error2 = array('status'=>'-2');	// request parameters empty
	$data = array(); // data contains Node response

	session_start();

	// needs to be taken from the request
	$user = $_SESSION['username'];
	// check for empty
	if($user == ''){
		echo json_encode($error2);
		exit();
	}

  $qry = "SELECT * FROM qmessages WHERE sender = '$user' OR receiver = '$user' ORDER BY time_stamp ASC";

	$result = mysqli_query($conn,$qry);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			array_push($data, $row);
			$tmp = $row['time_stamp'];
			// update 'received' attribute
			$qry2 = "UPDATE qmessages SET received = 'true' WHERE receiver = '$user' AND time_stamp = '$tmp'";
			if($result2 = mysqli_query($conn,$qry2))
			{
				//success

			}
			else{
				echo json_encode($error1);
				exit();
			}
		}
		echo json_encode($data);
	}
	else
	{
		echo json_encode($status0);
	}
?>
