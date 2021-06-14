<?php
session_start();
$_SESSION['plogin'] = false;
header("Location: index.php");
?>