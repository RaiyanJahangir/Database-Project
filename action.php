<?php
    include_once 'database.php';
    include_once 'session.php';

if(isset($_POST['req_cancel']))
{
    $id=$_POST['donar_id'];
    $query = oci_parse($conn,"Update donation_request set req_state='CANCELED' where req_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation_req_check.php');
        echo "<script>alert('Request canceled...')</script>";
    }
    else
    {
        header('location:donation_req_check.php');
        echo "<script>alert('Update error...')</script>";
    }
}

?>