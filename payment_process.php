<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 

    //$id = oci_insert_id($conn);

	//$sqlm="create sequence person_id_seq increment by 1;";
	//$id="person_id_seq.nextval";
	//static $num;
	

	//$taka= $_POST['taka'];
	$taka= $_POST['a'];
	$date= $_POST['paydate'];
	$requestid=$_POST['reqbillid'];
	$reqid=$_POST['reqsid'];
	//echo $reqid;
	//echo $date;

	//echo $requestid;
	
	//$_SESSION[$_SESSION['pid']]=$maxid;
	

    //echo $taka;
	
	
	//echo $birth;
	//echo $dob;

	//echo $num;
	//echo $sqlm;

	$query = oci_parse($conn,"declare
	a nvarchar2(64);
	b nvarchar2(64);
	begin
	create_billing(a,'$taka',to_date('$date','yyyy-mm-dd'),b,'$requestid');
	end;");
	
	
	$query_run = oci_execute($query);

	$query_string="select count(purchase_person_id)
	               from purchase_Request
	               where purchase_billing_id is not null and purchase_person_id='$reqid'";
	$query=oci_parse($conn,$query_string);
	$query_run = oci_execute($query);
				   
	//echo $query_string; 
	$row=oci_fetch_array($query);
	$noofblood= $row['COUNT(PURCHASE_PERSON_ID)']+1;
	//echo $noofblood;
	
	$query_string="update person set person_no_of_purchase='$noofblood'
	                where person_id='$reqid'";
			   
	$query=oci_parse($conn,$query_string);
	$query_run = oci_execute($query);
							  
    

	if ($query_run) {
				//include_once 'payment_process.php';
				include_once 'purchasetable.php';
				echo "<script>alert('Payment done Successfully !')</script>";
				exit();
	}
	else{
		echo "Error !";
				exit();
	}
}
?>