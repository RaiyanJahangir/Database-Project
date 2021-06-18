<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	$name= $_POST['pername'];
	$email= $_POST['peremail'];
	$height= $_POST['perheight'];
    $weight= $_POST['perweight'];
	$phone= $_POST['perphonenumber'];
	$birth=$_POST['perbirthcert'];
    $blood= $_POST['perbloodgroup'];
	$dob= $_POST['perdob'];
	$gender= $_POST['pergender'];
    $history= $_POST['perprevioushistory'];
	$chronic= $_POST['perchronicdisease'];
    $job=$_POST['perjobtitle'];
    $apartment= $_POST['perapartment'];
    $street=$_POST['perstreet'];
    $city= $_POST['percity'];
	$postal= $_POST['perportal'];
    $password= $_POST['perpassword'];
	$cpassword=$_POST['perconfirmpassword'];

	if($password===$cpassword){

	

	$query = oci_parse($conn,"declare
a nvarchar2(50);
b numeric;
begin
create_person(a,'$name','$email','$password','$phone','$job','$height','$weight','$blood','$gender','$history','$chronic','$apartment','$street' ,'$city','$postal','$birth' , to_date('$dob','yyyy-mm-dd'),b);
end;");

	$result = oci_execute($query);
	if ($result) {
				include_once 'login.php';
				echo "<script>alert('Data added Successfully !')</script>";
				exit();
	}
	else{
		echo "Error !";
		include_once 'signup.php';
			exit();
	}
}
else
{
	echo "Password And Confirm password doesn't match.";
	include_once 'signup.php';
	exit();
}
}
?>