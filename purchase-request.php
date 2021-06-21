<?php
session_start();
include_once 'database.php';
if(isset($_POST['save2']))
{	 
	if($_SESSION['plogin']==false){
		header("Refresh: 0; url= login.php");
		echo "<script>alert('Login to place your request...')</script>";
		exit();
	}
    $reqid=$_SESSION['pid'];
	$bloodtype = $_POST['reqbloodtype'];
    $bloodgroup=$_POST['reqbloodgroup'];
    $date=$_POST['reqdate'];
    $reason=$_POST['reqreason'];
	$amount=$_POST['reqamount'];
    //echo $date;
    //echo $reqid,$reason,$bloodgroup,$bloodtype ;
   
	$query = oci_parse($conn, "declare
    a nvarchar2(50);
    
    begin
    create_request (a,'PENDING','$bloodgroup','$bloodtype','$reason',to_date('$date','yyyy-mm-dd'),'$amount','null','','$reqid');
    end;");
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
if(isset($_POST['save1']))
{	 
	if($_SESSION['plogin']==false){
		header("Refresh: 0; url= login.php");
		echo "<script>alert('Login to place your request...')</script>";
		exit();
	}
    $reqid=$_SESSION['pid'];
	$bloodtype = $_POST['reqbloodtype'];
    $bloodgroup=$_POST['reqbloodgroup'];
    $date=$_POST['reqdate'];
    $reason=$_POST['reqreason'];
	$amount=$_POST['reqamount'];
    //echo $date;
    //echo $reqid,$reason,$bloodgroup,$bloodtype ;
   
	$query = oci_parse($conn, "declare
    a nvarchar2(50);
    
    begin
    create_request (a,'PENDING','$bloodgroup','$bloodtype','$reason',to_date('$date','yyyy-mm-dd'),'$amount','null','','$reqid');
    end;");
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
?>