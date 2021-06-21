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
  if(isset($_POST['edit_btn']))
{
        ?>
    




  <div class="modal-body" style="margin-left:20%; margin-right:20%; margin-top:2%; margin-bottom:10%;border: 2px solid black; padding-left:2%; padding-right:2%;background-color:tomato;border-radius: 13px;">

          <form action="update_profile.php" method="POST" >
            <input type="hidden" name="edit_id" value="<?php echo $_SESSION['pid'] ?>">
            <div class="form-group">
                <label style=" color:black;" > Username </label>
                <input  readonly type="text"  name="edit_username" value="<?php echo $_SESSION['pname']; ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Email</label>
                <input type="email" name="edit_email" value="<?php echo $_SESSION['pemail'];?>"  class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Password</label>
                <input type="text" name="edit_password" value="<?php echo $_SESSION['ppass']; ?>"  class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Phone Number:</label>
                <input type="text" name="edit_phonenumber" value="<?php echo $_SESSION['pnum']; ?>"  class="form-control" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Profession:</label>
                <input type="text" name="edit_profession" value="<?php echo $_SESSION['pocc']; ?>"  class="form-control" placeholder="Enter Profession">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Date of Birth:</label>
                <input readonly type="text" name="edit_dob" value="<?php echo $_SESSION['pdob']; ?>"  class="form-control" placeholder="Enter Date of Birth">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Blood Group</label>
                <input readonly type="text" name="edit_dob" value="<?php echo $_SESSION['pbgroup']; ?>"  class="form-control" placeholder="Enter Date of Birth">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Height(cm):</label>
                <input type="text" name="edit_height" value="<?php echo $_SESSION['phei']; ?>"  class="form-control" placeholder="Enter Height">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Weight(kg):</label>
                <input type="text" name="edit_weight" value="<?php echo $_SESSION['pwei']; ?>"  class="form-control" placeholder="Enter Weight">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Age:</label>
                <input readonly type="text" name="edit_age" value="<?php echo $_SESSION['age']; ?>"  class="form-control" placeholder="Enter Age">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Apartment:</label>
                <input type="text" name="edit_apartment" value="<?php echo $_SESSION['papart']; ?>"  class="form-control" placeholder="Enter Apartment">
            </div>
            <div class="form-group">
                <label style=" color:black;" > Street:</label>
                <input type="text" name="edit_street" value="<?php echo $_SESSION['pstreet'];?>"  class="form-control" placeholder="Enter Street">
            </div>
            <div class="form-group">
                <label style=" color:black;" >City:</label>
                <input type="text" name="edit_city" value="<?php echo $_SESSION['pcity']; ?>"  class="form-control" placeholder="Enter City">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Postal Code:</label>
                <input type="text" name="edit_portal" value="<?php echo $_SESSION['ppostal'] ?>"  class="form-control" placeholder="Enter Postal Code">
            </div>
            <div class="form-group">
                <label style=" color:black;" >Birth Certificate No.:</label>
                <input readonly type="text" name="edit_birth" value="<?php echo $_SESSION['pbnum']; ?>"  class="form-control" placeholder="Enter Birth Certificate No.">
            </div>

            <a href="profile.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="update_person_btn" class="btn btn-primary"> Update </button>
          </form>  
          </div>
        <?php
       
}


?>


<?php
include "footer.php";
?>