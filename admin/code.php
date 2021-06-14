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
    header('Location:login.php');
}


?>