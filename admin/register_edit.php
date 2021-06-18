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

<?php
  if(isset($_POST['edit_p_btn']))
{
    $id=$_POST['edit_id'];
    $query=oci_parse($connection,"Select * from person where person_id='$id' ");
    $query_run=oci_execute($query);
    while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

            {
        ?>
    




  <div class="modal-body">

          <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['PERSON_ID']?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['PERSON_NAME'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['PERSON_EMAIL'] ?>"  class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['PERSON_PASSWORD'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="edit_phonenumber" value="<?php echo $row['PERSON_PHONENUMBER'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Profession:</label>
                <input type="text" name="edit_profession" value="<?php echo $row['PERSON_PROFESSION'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="text" name="edit_dob" value="<?php echo $row['PERSON_DOB'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Height:</label>
                <input type="text" name="edit_height" value="<?php echo $row['PERSON_HEIGHT'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Weight:</label>
                <input type="text" name="edit_weight" value="<?php echo $row['PERSON_WEIGHT'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="text" name="edit_age" value="<?php echo $row['PERSON_AGE'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Apartment:</label>
                <input type="text" name="edit_apartment" value="<?php echo $row['PERSON_APARTMENT'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Street:</label>
                <input type="text" name="edit_street" value="<?php echo $row['PERSON_STREET'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" name="edit_city" value="<?php echo $row['PERSON_CITY'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Postal Code:</label>
                <input type="text" name="edit_portal" value="<?php echo $row['PERSON_PORTAL'] ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Birth Certificate No.:</label>
                <input type="text" name="edit_birth" value="<?php echo $row['PERSON_BIRTH_CERTIFICATE_NO'] ?>"  class="form-control" placeholder="Enter Password">
            </div>

            <a href="Person.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="update_p_btn" class="btn btn-primary"> Update </button>
          </form>  
        <?php
        }
}
?>

<?php
  if(isset($_POST['edit_event_btn']))
{
    $id=$_POST['edit_id'];
    $query=oci_parse($connection,"Select * from event where event_id='$id' ");
    $query_run=oci_execute($query);
    while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

            {
        ?>
    




  <div class="modal-body">

          <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['EVENT_ID']?>">
            <div class="form-group">
                <label> Event Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['EVENT_NAME'] ?>" class="form-control" placeholder="Enter Event Name">
            </div>
            <div class="form-group">
                <label>Event Location</label>
                <input type="text" name="edit_location" value="<?php echo $row['EVENT_LOCATION'] ?>"  class="form-control" placeholder="Enter Event Location">
            </div>
            <div class="form-group">
                <label>Event Start Date</label>
                <input type="text" name="edit_starttime" value="<?php echo $row['EVENT_STARTDATE'] ?>"  class="form-control" placeholder="Enter Start Date">
            </div>
            <div class="form-group">
                <label>Event End Date</label>
                <input type="text" name="edit_endtime" value="<?php echo $row['EVENT_ENDDATE'] ?>"  class="form-control" placeholder="Enter End Date">
            </div>

            <a href="events.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="update_event_btn" class="btn btn-primary"> Update </button>
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