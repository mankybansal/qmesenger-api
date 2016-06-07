<?php
session_start();

if(isset($_SESSION['username'])){
	include_once('./include/dbcon.php');
	if(isset($_GET['message'])){
		$username=$_SESSION['username'];
		$receiver=$_GET['receiver'];
		$message=$_GET['message'];
		$query="INSERT INTO qmessages VALUES(default,'$username','$receiver','$message',NULL,NOW(),'false','false',NULL)";
		$result=mysqli_query($link,$query);
			$query1="SELECT MAX(id) FROM qmessages";
		$result1=mysqli_query($link,$query1);
		$res=mysqli_fetch_assoc($result1);
		$di=$res['MAX(id)'];
		echo $di;
		echo $message;
			$url=str_replace(" ","%20","http://1.186.0.50:8080/process/text/$di?text=$message");
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			echo json_encode(array('status'=>true,'message_id'=>$di));

	}
	else if(isset($_POST['Submit'])){
		$username=$_SESSION['username'];
		$receiver=$_POST['receiver'];
		$targetDir=__DIR__.'/uploads';
		$targetURL="http://localhost/Q/home/api/send_message/uploads";
		$fi = new FilesystemIterator(__DIR__.'/uploads/', FilesystemIterator::SKIP_DOTS);
		$number= iterator_count($fi);
		$dot=".";
		$file=$_FILES["uploadFile"]["name"];
		$resul=explode($dot, $file);
		$ext = end($resul);
		$first = $number+1;
		$target_file= $targetDir.'/'.$first.'.'."$ext";
		$target_url=$targetURL.'/'.$first.'.'."$ext";

		move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file);
		$query="INSERT INTO qmessages VALUES(default,'$username','$receiver',NULL,'$target_file',NOW(),'false','false','$target_url')";
		$result=mysqli_query($link,$query);
		if($result){
			$ch = curl_init();
			$query="SELECT id FROM qmessages WHERE file= '$target_file' AND time_stamp=NOW()";
			$result= mysqli_query($link, $query);
			$row=mysqli_fetch_assoc($result);
			$mid=$row['id'];
			echo json_encode(array('status'=>true,'message_id'=>$mid));
			curl_setopt($ch, CURLOPT_URL, "http://1.186.0.50:8080/process/image/$mid?text=$target_file");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
		}else{
			echo json_encode(array('status'=>false,'description'=>'SQL Error'));
		}
	}else{
		echo json_encode(array('status'=>false,'description'=>'Empty Message'));
	}
}else{
	echo json_encode(array('status'=>false,'description'=>'User Not Logged in'));
}
?>
