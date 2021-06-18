<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
    $nam=$_POST['organization-name'];
    $email=$_POST['organization-email'];
    $phn_no=$_POST['organization-phone'];
    $address_street=$_POST['organization-street'];
    $address_branch=$_POST['organization-branch'];
    $address_postal=$_POST['organization-postal'];
    $address_city=$_POST['organization-city'];
    $pass=$_POST['password'];
	$query = oci_parse($conn, "INSERT INTO organization(org_name,org_email,org_phn,org_street,org_postal,org_branch,org_city,pass) values ('$nam','$email','$phn_no','$address_street','$address_branch','$address_postal','$address_city','$pass')");
	$result = oci_execute($query);
	if ($result) {
				echo "Registered successfully !";
				//include 'login.php';
				header("Location: login.php");
				exit();
	}
	else{
		echo "Error !";
		header("Location: login.php");
				exit();
	}
}
?>