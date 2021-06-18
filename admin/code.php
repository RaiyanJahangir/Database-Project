<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    //$query=oci_parse($connection,"INSERT INTO admin (username,email,password) values ('$username','$email','$password')");
    //$query_run=oci_execute($query);

    $email_query = oci_parse($connection,"SELECT * FROM admin WHERE email='$email' ");
    $email_query_run = oci_execute($email_query);
    if(($row = oci_fetch_array($email_query, OCI_BOTH)) != false)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword && $username!="" && $email!="")
        {
            $query=oci_parse($connection,"INSERT INTO admin (username,email,password) values ('$username','$email','$password')");
            $query_run=oci_execute($query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}



if(isset($_POST['updatebtn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];

    $query = oci_parse($connection,"Update admin set username='$username',email='$email',password='$password' where id='$id'");
    $query_run = oci_execute($query);

    if($query_run)
    {
        $_SESSION['success']='Your Data is Updated';
        header('location:register.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:register.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    $query = oci_parse($connection,"Delete  from admin where id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        $_SESSION['success']='Your Data is Deleted';
        header('location:register.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Deleted';
        header('location:register.php');
    }
}

if(isset($_POST['login_btn']))
{
    $email_login=$_POST['email'];
    $password_login=$_POST['password'];

    $query=oci_parse($connection,"Select * from admin where email='$email_login' and password='$password_login'");
    $query_run=oci_execute($query);

    if(oci_fetch_all($query,$res))
    {
        $_SESSION['username']=$email_login;
        header('Location:index.php');
    }
    else
    {
        $_SESSION['status']='Email id/ Password is Invalid';
        header('Location: login.php');
    }
}

if(isset($_POST['go_back_btn']))
{
    header('Location: ../index.php');
}

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location:../login.php');
}


//Inserting new medical officer
if(isset($_POST['register_mo_btn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = oci_parse($connection,"SELECT * FROM medical_officer WHERE email='$email' ");
    $email_query_run = oci_execute($email_query);
    if(($row = oci_fetch_array($email_query, OCI_BOTH)) != false)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: CreateMedicalOfficer.php');  
    }
    else
    {
        if($password === $cpassword && $username!="" && $email!="")
        {
            $query=oci_parse($connection,"declare
            a nvarchar2(50);
            b date;
            c date;
            begin
            create_medical_officer(a,'$username',b,c,'$email','$password');
            end;");
            $query_run=oci_execute($query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Medical Officer Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: CreateMedicalOfficer.php');
            }
            else 
            {
                $_SESSION['status'] = "Medical Officer Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: CreateMedicalOfficer.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: CreateMedicalOfficer.php');  
        }
    }

}

//Deleting medical officer
if(isset($_POST['delete_mo_btn']))
{
    $id=$_POST['delete_id'];
    $query = oci_parse($connection,"Delete  from medical_officer where medical_officer_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        $_SESSION['success']='Your Data is Deleted';
        header('location: CreateMedicalOfficer.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Deleted';
        header('location: CreateMedicalOfficer.php');
    }
}

//Updating Medical Officer
if(isset($_POST['update_mo_btn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $contracttime=$_POST['edit_contracttime'];

    $query = oci_parse($connection,"Update medical_officer set medical_officer_name='$username',medical_officer_email='$email',medical_officer_password='$password',medical_officer_contracttime='$contracttime'where medical_officer_id='$id'");
    $query_run = oci_execute($query);

    if($query_run)
    {
        $_SESSION['success']='Your Data is Updated';
        header('location:CreateMedicalOfficer.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:CreateMedicalOfficer.php');
    }
}

//Person deletion
if(isset($_POST['delete_p_btn']))
{
    $id=$_POST['delete_id'];
    $query = oci_parse($connection,"Delete  from person where person_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        $_SESSION['success']='Your Data is Deleted';
        header('location: Person.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Deleted';
        header('location: Person.php');
    }
}

if(isset($_POST['update_p_btn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $phonenumber=$_POST['edit_phonenumber'];
    $profession=$_POST['edit_profession'];
    $dob=$_POST['edit_dob'];
    $height=$_POST['edit_height'];
    $weight=$_POST['edit_weight'];
    $age=$_POST['edit_age'];
    $apartment=$_POST['edit_apartment'];
    $street=$_POST['edit_street'];
    $city=$_POST['edit_city'];
    $portal=$_POST['edit_portal'];
    $birth=$_POST['edit_birth'];

    $query = oci_parse($connection,"Update person set person_name='$username',person_email='$email',person_password='$password',person_phonenumber='$phonenumber',
    person_profession='$profession',person_dob='$dob',person_height='$height',person_weight='$weight',person_age='$age',person_apartment='$apartment',person_street='$street',
    person_city='$city',person_portal='$portal',person_birth_certificate_no='$birth'
    where person_id='$id'");
    $query_run = oci_execute($query);

    if($query_run)
    {
        $_SESSION['success']='Your Data is Updated';
        header('location:Person.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:Person.php');
    }
}

//Creating a new event
if(isset($_POST['register_event_btn']))
{
    $name = $_POST['name'];
    $location = $_POST['location'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $query = oci_parse($connection,"SELECT * FROM event WHERE event_name='$name' ");
    $query_run = oci_execute($query);
    if(($row = oci_fetch_array($query, OCI_BOTH)) != false)
    {
        $_SESSION['status'] = "Name Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: Event.php');  
    }
    else
    {
        if( $name!="" && $location!="" && $startdate!="" && $enddate!="")
        {
            $query=oci_parse($connection,"declare
            a nvarchar2(50);
            begin
            create_event(a,upper('$name'),upper('$location'),to_date('$startdate','yyyy-mm-dd'),to_date('$enddate','yyyy-mm-dd'));
            end;");
            $query_run=oci_execute($query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "New Event Added";
                $_SESSION['status_code'] = "success";
                header('Location: events.php');
            }
            else 
            {
                $_SESSION['status'] = "Event Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: events.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Please fill up the all the information";
            $_SESSION['status_code'] = "warning";
            header('Location: events.php');  
        }
    }

}

//Delete event
if(isset($_POST['delete_event_btn']))
{
    $id=$_POST['delete_id'];
    $query = oci_parse($connection,"Delete  from event where event_id='$id'");
    $query_run = oci_execute($query);
    if($query_run)
    {
        $_SESSION['success']='Your Data is Deleted';
        header('location: events.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Deleted';
        header('location: events.php');
    }
}

//Updating Event
if(isset($_POST['update_event_btn']))
{
    $id=$_POST['edit_id'];
    $name=$_POST['edit_name'];
    $location=$_POST['edit_location'];
    $starttime=$_POST['edit_starttime'];
    $endtime=$_POST['edit_endtime'];

    $query = oci_parse($connection,"Update event set event_name='$name',event_location='$location',event_startdate=to_date('$starttime','dd-mon-yyyy'),event_enddate=to_date('$endtime','dd-mon-yyyy')
    where event_id='$id'");
    $query_run = oci_execute($query);

    if($query_run)
    {
        $_SESSION['success']='Your Data is Updated';
        header('location:events.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        header('location:events.php');
    }
}

?>