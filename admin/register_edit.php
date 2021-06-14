<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Edit Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
<?php
  if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    $query=oci_parse($connection,"Select * from admin where id='$id' ");
    $query_run=oci_execute($query);
    while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

            {
        ?>
    




  <div class="modal-body">

          <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['ID']?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['USERNAME'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['EMAIL'] ?>"  class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['PASSWORD'] ?>"  class="form-control" placeholder="Enter Password">
            </div>

            <a href="register.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
          </form>  
        <?php
        }
}
?>


<?php
  if(isset($_POST['edit_mo_btn']))
{
    $id=$_POST['edit_id'];
    $query=oci_parse($connection,"Select * from medical_officer where medical_officer_id='$id' ");
    $query_run=oci_execute($query);
    while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

            {
        ?>
    




  <div class="modal-body">

          <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['MEDICAL_OFFICER_ID']?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['MEDICAL_OFFICER_NAME'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['MEDICAL_OFFICER_EMAIL'] ?>"  class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['MEDICAL_OFFICER_PASSWORD'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Contract Expiry Date</label>
                <input type="text" name="edit_contracttime" value="<?php echo $row['MEDICAL_OFFICER_CONTRACTTIME'] ?>"  class="form-control" placeholder="Enter Password">
            </div>

            <a href="CreateMedicalOfficer.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="update_mo_btn" class="btn btn-primary"> Update </button>
          </form>  
        <?php
        }
}
?>

  </div>

  </div>

</div>



</div>

<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>