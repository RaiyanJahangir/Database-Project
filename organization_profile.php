<?php
include "navbar.php";
include "database.php";
$_SESSION['profile']=1;
$_SESSION['login']=0;
$_SESSION['donate']=0;
include "header-small.php";
$id=$_SESSION['oid'];

$query=oci_parse($conn,"select * from organization where org_id='$id'");
oci_execute($query);
$row=oci_fetch_array($query,OCI_BOTH);
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1><?php echo $row['ORG_NAME'] ?></h1>
              <p><?php echo $row['ORG_EMAIL']
              ?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li>
              <!--<li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>-->
              <form action="org_profile_edit.php" method="post">

                  <input type="hidden" name="edit_id" value="<?php //echo $_SESSION['pid'] 
                  echo $row['ORG_ID']
                  ?>">

                  <button type="submit" name="edit_org_btn" class="btn btn-warning" style="margin-left:75px"> EDIT PROFILE</button>

                </form>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <div class="bio-graph-heading">
          Welcome to your Profile...
          <br>
          Add more information.
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>Name </span>: <?php echo $row['ORG_NAME']; ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?php echo $row['ORG_EMAIL'] ;?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>City </span>: <?php echo $row['ORG_CITY']; ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Street</span>: <?php echo $row['ORG_STREET']; ?></p>
                  </div>
                  <!--<div class="bio-row">
                      <p><span>Age </span>: <?php //echo $_SESSION['page']; ?></p>
                  </div>-->
                  <div class="bio-row">
                      <p><span>Postal</span>: <?php echo $row['ORG_POSTAL']; ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Branch </span>: <?php echo $row['ORG_BRANCH']; ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>No. of Purchase </span>: <?php echo $row['ORG_NO_OF_PURCHASE']; ?></p>
                  </div>
                  
              </div>
          </div>
      </div>
      </div>
  </div>
</div>
</div>
<?php
include "footer.php";
?>