  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php


// #$connection = mysqli_connect("localhost","root","","adminpanel");
// $connection=oci_connect("ram","ram","localhost/XE");

// if(isset($_POST['registerbtn']))
// {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirmpassword'];

//     if($password === $confirm_password)
//     {
//         $query=oci_parse($connection,"INSERT INTO admin (username,email,password,usertype) values ('$username','$email','$password')");
//         $query_run=oci_execute($query);
    
//         if($query_run)
//         {
//             echo "done";
//             $_SESSION['success'] =  "Admin is Added Successfully";
//             header('Location: register.php');
//         }
//         else 
//         {
//             echo "not done";
//             $_SESSION['status'] =  "Admin is Not Added";
//             header('Location: register.php');
//         }
//     }
//     else 
//     {
//         echo "pass no match";
//         $_SESSION['status'] =  "Password and Confirm Password Does not Match";
//         header('Location: register.php');
//     }

// }

?>