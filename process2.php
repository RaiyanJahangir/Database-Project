<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	$email = $_POST['email'];
	$pass = $_POST['pass'];
    $res=0;
    //$query = oci_parse($conn, "SELECT * FROM REG");
    $stid = oci_parse($conn, 'SELECT Org_email,org_PASS FROM organization');
    oci_execute($stid);

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    // Use the uppercase column names for the associative array indices
    if($row['ORG_EMAIL']==$email && $row['ORG_PASS']==$pass)$res=1;
    //echo $row[0] . " and "   .$row['REG_EMAIL']. " are the same<br>\n";
    //echo $row[1] . " and " .  " are the same<br>\n";
    //$res=1;
    }
    if($res==1){
        echo "<script>alert('Sign in successful')</script>";
        include_once 'admin.php';
        exit();
    }
    else{
        echo "Wrong username or email";
        exit();
    }
}
?>