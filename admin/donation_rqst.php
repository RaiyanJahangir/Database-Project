<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register_mo_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add User Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
  <?php

  /*if(isset($_SESSION['success']) && $_SESSION['success']!='')
  {
    echo '<h2 class="bg-primary">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['status']) && $_SESSION['status']!='')
  {
    echo '<h2 class="bg-info">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['status']);
  }*/



$query=oci_parse($connection,"select * from person");
$query_run=oci_execute($query);



?>
  

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Email </th>
            <th>Password</th>
            <th>Phone Number </th>
            <th>Profession </th>
            <th>Date of Birth </th>
            <th>Height </th>
            <th>Weight </th>
            <th>Total Donations</th>
            <th>Blood Group</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Previous History</th>
            <th>Any Chronic Disease</th>
            <th>Apartment</th>
            <th>Street</th>
            <th>City</th>
            <th>Postal</th>
            <th>Total Purchases </th>
            <th>Birth Certificate No. </th>
          </tr>
        </thead>
        <tbody>

        <?php

        //if(oci_fetch_all($query,$res)>0)        

       // {

            while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

            {

               ?>

          <tr>

            <td><?php  echo $row['PERSON_ID']; ?></td>

            <td><?php  echo $row['PERSON_NAME']; ?></td>

            <td><?php  echo $row['PERSON_EMAIL']; ?></td>

            <td><?php  echo $row['PERSON_PASSWORD']; ?></td>

            <td><?php  echo $row['PERSON_PHONENUMBER']; ?></td>

            <td><?php  echo $row['PERSON_PROFESSION']; ?></td>

            <td><?php  echo $row['PERSON_DOB']; ?></td>

            <td><?php  echo $row['PERSON_HEIGHT']; ?></td>

            <td><?php  echo $row['PERSON_WEIGHT']; ?></td>

            <td><?php  echo $row['PERSON_NO_OF_DONATION']; ?></td>

            <td><?php  echo $row['PERSON_BLOODGROUP']; ?></td>

            <td><?php  echo $row['PERSON_GENDER']; ?></td>

            <td><?php  echo $row['PERSON_AGE']; ?></td>

            <td><?php  echo $row['PERSON_PREVHISTORY']; ?></td>

            <td><?php  echo $row['PERSON_CHRONICDIS']; ?></td>

            <td><?php  echo $row['PERSON_APARTMENT']; ?></td>

            <td><?php  echo $row['PERSON_STREET']; ?></td>

            <td><?php  echo $row['PERSON_CITY']; ?></td>

            <td><?php  echo $row['PERSON_PORTAL']; ?></td>

            <td><?php  echo $row['PERSON_NO_OF_DONATION']; ?></td>

            <td><?php  echo $row['PERSON_BIRTH_CERTIFICATE_NO']; ?></td>

            <td>

                <form action="register_edit.php" method="post">

                    <input type="hidden" name="edit_id" value="<?php echo $row['PERSON_ID']; ?>">

                    <button  type="submit" name="edit_mo_btn" class="btn btn-success"> EDIT</button>

                </form>

            </td>

            <td>

                <form action="code.php" method="post">

                  <input type="hidden" name="delete_id" value="<?php echo $row['PERSON_ID']; ?>">

                  <button type="submit" name="delete_p_btn" class="btn btn-danger"> DELETE</button>

                </form>

            </td>

          </tr>

          <?php

            } 

        //}

        //else {

           // echo "No Record Found";

        //}

        ?>

        </tbody>

      </table>

   

    </div>

  </div>

</div>



</div>

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>