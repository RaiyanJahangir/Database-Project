<?php
session_start();
include_once 'database.php';
if(isset($_POST['save']))
{	 
	if($_SESSION['plogin']==false){
		header("Refresh: 0; url= login.php");
		echo "<script>alert('Login to place your request...')</script>";
		exit();
	}
	$bloodtype = $_POST['type'];
	$event = $_POST['event'];
    $message = $_POST['message'];
    $id=$_SESSION['pid'];
	$query = oci_parse($conn, "INSERT INTO donation_request(req_id,req_state,req_event,req_message) values ('$id','$bloodtype','$event','$message')");
	$result = oci_execute($query);
	if ($result) {
				header("Refresh: 0; url= index.php");
				echo "<script>alert('Request placed Successfully !')</script>";
				exit();
	}
	else{
		echo "Error !";
				exit();
	}
}
else{echo "no";}
?>