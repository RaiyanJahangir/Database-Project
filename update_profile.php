<?php
include 'database.php';
if(isset($_POST['update_person_btn'])){


        echo $id=$_POST['edit_id'];
        echo $name=$_POST['edit_username'];
        echo $email=$_POST['edit_email'];
        echo $password=$_POST['edit_password'];
        echo $phn=$_POST['edit_phonenumber'];
        echo $profession=$_POST['edit_profession'];
        echo $dob=$_POST['edit_dob'];
        echo $height=$_POST['edit_height'];
        echo $weight=$_POST['edit_weight'];
        echo $age=$_POST['edit_age'];
        echo $apartment=$_POST['edit_apartment'];
        echo $street=$_POST['edit_street'];
        echo $city=$_POST['edit_city'];
        echo $postal=$_POST['edit_portal'];
        echo $birth=$_POST['edit_birth'];

        

        $query = oci_parse($conn,"Update person set person_name='$name',person_email='$email',person_password='$password',person_phonenumber='$phn',
    person_profession='$profession',person_height='$height',person_weight='$weight',person_age='$age',person_apartment='$apartment',person_street='$street',
    person_city='$city',person_portal='$postal',person_birth_certificate_no='$birth'
    where person_id='$id'");
    $query_run = oci_execute($query);

    if($query_run)
    {
        $_SESSION['success']='Your Data is Updated';
        header('location:profile.php');
        echo $_SESSION['success'];
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:profile.php');
        echo $_SESSION['status'];
    }

}

if(isset($_POST['update_org_btn'])){


     $id=$_POST['edit_id'];
     $name=$_POST['edit_username'];
     $email=$_POST['edit_email'];
     $password=$_POST['edit_password'];
     $branch=$_POST['edit_branch'];
     $street=$_POST['edit_street'];
     $city=$_POST['edit_city'];
     $postal=$_POST['edit_postal'];
 

    

    $query = oci_parse($conn,"Update organization set org_name='$name',org_email='$email',org_pass='$password',
org_branch='$branch',org_street='$street',org_city='$city',org_postal='$postal'
where org_id='$id'");
$query_run = oci_execute($query);

if($query_run)
{
    $_SESSION['success']='Your Data is Updated';
    header('location:organization_profile.php');
    echo $_SESSION['success'];
}
else
{
    $_SESSION['status']='Your Data is Not Updated';
    header('location:organization_profile.php');
    echo $_SESSION['status'];
}

}

?>