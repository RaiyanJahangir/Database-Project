<?php
include "navbar.php";
$_SESSION['profile']=1;
$_SESSION['login']=0;
$_SESSION['donate']=0;
include "header-small.php";
include "database.php";



?>
<br><br>
<h1 style="text-align:center; color:black;"> EDIT YOUR PROFILE</h1><br>
<?php
if(isset($_POST['edit_org_btn']))

$id=$_SESSION['oid'];

$query=oci_parse($conn,"select * from organization where org_id='$id'");
oci_execute($query);
$row=oci_fetch_array($query,OCI_BOTH);
{
      ?>

<div class="modal-body" style="margin-left:20%; margin-right:20%; margin-top:2%; margin-bottom:10%;border: 2px solid black; padding-left:2%; padding-right:2%;background-color:tomato;border-radius: 13px; ">

        <form action="update_profile.php" method="POST" >
          <input type="hidden" name="edit_id" value="<?php echo $row['ORG_ID']; ?>">
          <div class="form-group">
              <label style=" color:black;" > Username </label>
              <input  readonly type="text"  name="edit_username" value="<?php echo $row['ORG_NAME']; ?>" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
              <label style=" color:black;" >Email</label>
              <input type="email" name="edit_email" value="<?php echo $row['ORG_EMAIL'];?>"  class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
              <label style=" color:black;" >Password</label>
              <input type="text" name="edit_password" value="<?php echo $row['ORG_PASS'];?>"  class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
              <label style=" color:black;" >Branch:</label>
              <input type="text" name="edit_branch" value="<?php echo $row['ORG_BRANCH']; ?>"  class="form-control" placeholder="Enter Branch">
          </div>
          <div class="form-group">
              <label style=" color:black;" >Street</label>
              <input type="text" name="edit_street" value="<?php echo $row['ORG_STREET']; ?>"  class="form-control" placeholder="Enter Street">
          </div>
          <div class="form-group">
              <label style=" color:black;" >City</label>
              <input  type="text" name="edit_city" value="<?php echo $row['ORG_CITY']; ?>"  class="form-control" placeholder="Enter City">
          </div>
          <div class="form-group">
              <label style=" color:black;" >Postal</label>
              <input  type="text" name="edit_postal" value="<?php echo $row['ORG_POSTAL']; ?>"  class="form-control" placeholder="Enter Postal Code">
          </div>

          <a href="organization_profile.php" class="btn btn-danger">CANCEL</a>
          <button type="submit" name="update_org_btn" class="btn btn-primary"> Update </button>
        </form>  
        </div>



<?php
     
}


?>

<?php
include "footer.php";
?>