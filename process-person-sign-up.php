<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 

    //$id = oci_insert_id($conn);

	//$sqlm="create sequence person_id_seq increment by 1;";
	//$id="person_id_seq.nextval";
	//static $num;
	$num=4;

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
	$portal= $_POST['perportal'];
    $password= $_POST['perpassword'];
	
	//echo $birth;
	//echo $dob;

	//echo $num;
	//echo $sqlm;

	$query = oci_parse($conn,"INSERT INTO PERSON(person_name,person_email,person_password,person_phonenumber,person_profession,person_height,person_weight,person_bloodgroup,person_gender,person_prevhistory,person_chronicdis,person_apartment, person_street,person_city,person_portal,person_birth_certificate_no,person_dob) 
	VALUES('$name','$email','$password','$phone','$job','$height','$weight','$blood','$gender','$history','$chronic','$apartment','$street' ,'$city','$portal','$birth' , to_date('$dob','yyyy-mm-dd') )");

	$result = oci_execute($query);
	//$query = oci_parse($conn, "INSERT INTO person_SIGNIN(person_name,person_email,person_height,person_weight,person_phonenumber,person_bloodgroup,person_dob,person_gender,person_prevhistory,person_chronicdis,person_profession,person_apartment,person_street,person_city,person_portal,person_password) values ('$name','$email','$height','$weight','$phone','$blood','$dob','$gender','$history','$chronic','$job','$apartment','$street','$city','$portal','$password')");
	
	if ($result) {
				echo "Data added Successfully !";
				//include_once 'show.php';
				include_once 'login.php';
				exit();
	}
	else{
		echo "Error !";
				exit();
	}
}
?>