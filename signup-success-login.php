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
	$query = oci_parse($conn, "declare
	a nvarchar2(50);
	begin
	create_organization(a,'$email','$address_city',$address_postal','$address_city','$address_postal','$nam','$pass');
	end;");
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