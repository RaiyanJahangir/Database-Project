<?php
include_once '../database.php';
if(isset($_POST['check_btn']))
{	 
	$email = $_POST['email'];
	$pass = $_POST['pass'];
    $res=0;
    $stid = oci_parse($conn, 'SELECT * FROM organization');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    if($row['ORG_EMAIL']==$email && $row['ORG_PASS']==$pass){
        $res=1;
        $id=$row['ORG_ID'];
        break;
    }
    }
    if($res==1){
        session_start();
        $_SESSION['ologin'] = true;
        $_SESSION['oid'] = $id;
        $_SESSION['oemail'] = $email;
        header("Location: profile.php");
        echo "<script>alert('Sign in successful as an organization')</script>";
        exit();
    }
    $stid = oci_parse($conn, 'SELECT * FROM person');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    if($row['PERSON_EMAIL']==$email && $row['PERSON_PASSWORD']==$pass){
        $res=2;
        session_start();
        $_SESSION['pid']=$row['PERSON_ID'];
        $_SESSION['pname']=$row['PERSON_NAME'];
        $_SESSION['pnum']=$row['PERSON_PHONENUMBER'];
        $_SESSION['pocc']=$row['PERSON_PROFESSION'];
        $_SESSION['pdob']=$row['PERSON_DOB'];
        $_SESSION['phei']=$row['PERSON_HEIGHT'];
        $_SESSION['pwei']=$row['PERSON_WEIGHT'];
        $_SESSION['pbgroup']=$row['PERSON_BLOODGROUP'];
        $_SESSION['pgender']=$row['PERSON_GENDER'];
        $_SESSION['phis']=$row['PERSON_PREVHISTORY'];
        $_SESSION['pchron']=$row['PERSON_CHRONICDIS'];
        $_SESSION['pbnum']=$row['PERSON_BIRTH_CERTIFICATE_NO'];
        break;
    }
    }
    if($res==2){
        $_SESSION['plogin'] = true;
        $_SESSION['pemail'] = $email;
        $age=$row["PERSON_DOB"];
        header("Location: profile.php");
        echo "<script>alert('Sign in successful as a person')</script>";
        exit();
    }
    $stid = oci_parse($conn, 'SELECT * FROM medical_officer');
    oci_execute($stid);
    echo "yes";
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        echo $row['MEDICAL_OFFICER_EMAIL'];
    if($row['MEDICAL_OFFICER_EMAIL']==$email && $row['MEDICAL_OFFICER_PASSWORD']==$pass){
        $res=3;
        session_start();
        $_SESSION['mid']=$row['MEDICAL_OFFICER_ID'];
        break;
    }
    }
    if($res==3){
        $_SESSION['mlogin'] = true;
        $_SESSION['memail'] = $email;
        header("Location: medical-officer-dashboard.php");
        echo "<script>alert('Sign in successful as a medical officer...')</script>";
        exit();
    }
    else{
        //header("Location: login.php");
        echo "<script>alert('Wrong username or email')</script>";
        exit();
    }
}
?>