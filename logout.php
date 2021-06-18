<?php
session_start();
//$_SESSION['plogin'] = false;
//$_SESSION['ologin']= false;
session_destroy();
header("Location: index.php");
?>