<?php
session_start();
$newid=$_SESSION['pid'];
$id=$_SESSION[$_SESSION['pid']];
$_SESSION['plogin'] = false;
$_SESSION['ologin']=false;
$_SESSION[$newid]=$id;

header("Location: index.php");

?>