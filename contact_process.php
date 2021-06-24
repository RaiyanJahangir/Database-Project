<?php
include 'database.php';
if(isset($_POST['contact_btn'])){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];

if($name!="" && $email!="" && $phone!="" && $message!="")
{
    $query=oci_parse($conn,"insert into contact values('$name','$email','$phone','$message',sysdate)");
    $query_result=oci_execute($query);

    header('location:contact.php');
    echo 'Your message was sent';

}
else
{
    header('location:contact.php');
    echo 'Your message could not be sent';
}
}
?>