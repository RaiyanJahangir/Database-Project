<?php
    include_once '../database.php';
    include_once '../session.php';
if(isset($_POST['app']))
{
    $id=$_POST['approve_id'];
    $query = oci_parse($conn,"Update donation_request set req_state='APPROVED' where req_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Invitation Approved...')</script>";
    }
    else
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Update error...')</script>";
    }
}
if(isset($_POST['dec']))
{
    $id=$_POST['decline_id'];
    $query = oci_parse($conn,"Update donation_request set req_state='DECLINE' where req_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Invitation Declined...')</script>";
    }
    else
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Update error...')</script>";
    }
}
if(isset($_POST['not_donated_btn']))
{
    $id=$_POST['donar_id'];
    $query = oci_parse($conn,"Update donation_request set req_state='NOT DONATED' where req_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Invitation Declined...')</script>";
    }
    else
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Update error...')</script>";
    }
}
if(isset($_POST['test']))
{
    //error_reporting(0);
    $hepb=$_POST['hepb'];
    $hepc=$_POST['hepc'];
    $hiv=$_POST['hiv'];
    $syp=$_POST['syp'];
    if(!$_POST['wb'])$wb=null;
    else $wb=$_POST['wb'];
    if(!$_POST['plasma'])$plasma=null;
    else $plasma=$_POST['plasma'];
    if(!$_POST['wbc'])$wbc=null;
    else $wbc=$_POST['wbc'];
    if(!$_POST['rbc'])$rbc=null;
    else $rbc=$_POST['rbc'];
    if(!$_POST['pl'])$pl=null;
    else $pl=$_POST['pl'];
    if(!$_POST['cryo'])$cryo=null;
    else $cryo=$_POST['cryo'];
    if($_POST['lod']=='none')$lod=null;
    else $lod=$_POST['lod'];
    echo $did=$_POST['did'];
    $status=$_POST['status'];
    echo $mid=$_SESSION['mid'];
    $query = oci_parse($conn,
    "declare
    a date;
    b nvarchar2(50);
    begin
    eligibility_test_table_update(a,'$did',b,'$hepb','$hepc','$hiv','$syp','$wb','$plasma','$wbc','$rbc',
    '$pl','$cryo','$status','$lod','$mid');
    end;");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Invitation Approved...')</script>";
    }
    else
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Update error...')</script>";
    }
}
if(isset($_POST['donated_btn'])){
    echo $pid=$_POST['person_id'];
    echo $did=$_POST['donar_id'];
    echo $bgroup=$_POST['bg_id'];
    echo $type=$_POST['bt_id'];
    echo $event=$_POST['event_id'];
    $query = oci_parse($conn,
    "declare
    a nvarchar2(50);
    b nvarchar2(50);
    c date;
    d number;
    e date;
    f nvarchar2(50);
    g nvarchar2(50);
    begin
    create_blood_bag(a,'$pid','$bgroup','$type',c,d,e,'$event',f,g,'$did');
    end;");
    $query_run = oci_execute($query);
    if($query_run)
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Invitation Approved...')</script>";
    }
    else
    {
        header('location:donation-pending-request.php');
        echo "<script>alert('Update error...')</script>";
    }
}
?>