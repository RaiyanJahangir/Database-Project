<?php
include('security.php');


if(isset($_POST['orgappointed_btn']))
{
    $bagid=$_POST['orgappointed_id'];
    $reqbagid=$_POST['reqbagid'];
    $reqtype=$_POST['reqtype'];
    $reqgroup=$_POST['reqbloods'];
    
    
    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];
    
    echo "anika";
    $query = oci_parse($connection,"Update BLOOD_BANK set blood_request_id='$reqbagid' wherE blood_bank_blood_bag_id='$bagid'");
    $query_run = oci_execute($query);

    $query_string="select MAX(blood_bank_total_no) from blood_bank
    where blood_bank_blood_type='$reqtype' and blood_bank_blood_group='$reqgroup'";
    $query=oci_parse($connection,$query_string);
    $query_run = oci_execute($query);
    
    echo $query_string; 
    $row=oci_fetch_array($query);
    $noofblood=$row['MAX(BLOOD_BANK_TOTAL_NO)']-1;
    echo $noofblood;


    $query=oci_parse($connection,"UPDATE BLOOD_BANK SET blood_bank_total_no=$noofblood
                      where blood_bank_blood_type='$reqtype' and blood_bank_blood_group='$reqgroup'");
    $query_run = oci_execute($query);

    
    
    if($query_run)
    { 
        $_SESSION['success']='Your Data is Updated';
        header('location:orgbloodbank.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:orgbloodbank.php');
    }
}
?>