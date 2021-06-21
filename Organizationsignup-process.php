<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
    $nam=$_POST['organization-name'];
    $email=$_POST['organization-contact'];
    $address_street=$_POST['organization-street'];
    $address_branch=$_POST['organization-branch'];
    $address_postal=$_POST['organization-postal'];
    $address_city=$_POST['organization-city'];
    $pass=$_POST['pass'];
	$cpass=$_POST['cpass'];

	if($pass===$cpass){

	

	$query = oci_parse($conn, "declare
	a nvarchar2(50);
	begin
	create_organization(a,'$email','$address_city','$address_postal','$address_city','$address_postal',
	'$nam','$pass');
	end;");
	$result = oci_execute($query);
	if ($result) {
				include 'login.php';
				echo "<script>alert('Registered successfully !')</script>";
				exit();
	}
	else{
		echo "Error !";
				exit();
	}
}
else{
	echo 'Password and Confirm password doesn\'t match';
	include 'signup.php';
	exit();
}
}
?>