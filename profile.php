<?php
include "navbar.php";
include "database.php";

//echo $row[0];
$_SESSION['profile']=1;
$_SESSION['login']=0;
$_SESSION['donate']=0;
 $id=$_SESSION['pid'];

$query=oci_parse($conn,"select * from person where person_id='$id'");
oci_execute($query);
$row=oci_fetch_array($query,OCI_BOTH);
//echo $row[1];
include "header-small.php";


?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/prof-dis.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1><?php //echo strtoupper($_SESSION['pname']); 
              echo $row['PERSON_NAME'];
              ?></h1>
              <p><?php //echo $_SESSION['pemail']; 
              echo $row['PERSON_EMAIL'];
              ?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a href="donation_req_check.php"> <i class="fa fa-edit"></i> Donation Request Check</a></li>
              <li><form action="profile_edit.php" method="post">

                  <input type="hidden" name="edit_id" value="<?php //echo $_SESSION['pid'] 
                  echo $row['PERSON_ID']
                  ?>">

                  <button type="submit" name="edit_btn" class="btn btn-warning" style="margin-left:75px"> EDIT PROFILE</button>

                </form></i>
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
                      <p><span>Name </span>: <?php //echo $_SESSION['pname']; 
                      echo $row['PERSON_NAME'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?php //echo $_SESSION['pemail']; 
                      echo $row['PERSON_EMAIL'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birth Certificate Number </span>: <?php //echo $_SESSION['pbnum'] 
                      echo $row['PERSON_BIRTH_CERTIFICATE_NO'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Contact Number </span>: <?php //echo $_SESSION['pocc']; 
                      echo $row['PERSON_PHONENUMBER'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birthday</span>: <?php //echo $_SESSION['pdob'];
                      echo $row['PERSON_DOB'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: <?php echo   $row['PERSON_PROFESSION'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Height </span>: <?php //echo $_SESSION['phei']; 
                      echo $row['PERSON_HEIGHT'];?> (cm)</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Weight </span>: <?php //echo $_SESSION['pwei']; 
                      echo $row['PERSON_WEIGHT'];?> (kg)</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Blood Group </span>: <?php //echo $_SESSION['pbgroup'] 
                      echo $row['PERSON_BLOODGROUP'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Gender </span>: <?php //echo $_SESSION['pgender']
                      echo $row['PERSON_GENDER'] ;?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Previous History </span>: <?php //echo $_SESSION['phis']
                      echo $row['PERSON_PREVHISTORY'] ;?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Chronic Disease </span>: <?php //echo $_SESSION['pchron'] 
                      echo $row['PERSON_CHRONICDIS'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Address </span>: <?php //echo $_SESSION['papart']
                      echo $row['PERSON_APARTMENT']; ?>, <?php //echo $_SESSION['pstreet'] 
                      echo $row['PERSON_STREET'];?>, <?php //echo $_SESSION['pcity'] 
                      echo $row['PERSON_CITY'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Postal </span>: <?php //echo $_SESSION['ppostal'] 
                      echo $row['PERSON_PORTAL'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>No. of Donation </span>: 
                      <?php
		                    $query = oci_parse($conn, "select * from donation_request d,eligibility e,person p
where d.req_state='DONATED' and p.person_id='$id' and p.person_id=e.eligibility_person_id and e.eligibility_request_id=d.req_id
");
    		                oci_execute($query);
    		                echo $row = oci_fetch_all($query,$res);
		                ?>
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>No. of Purchase </span>: <?php echo $row['PERSON_NO_OF_PURCHASE'];?></p>
                  </div>
                  
              </div>
          </div>
      </div>
      <div>
    </div>
    </div>
  </div>
</div>
</div>
<?php
include "footer.php";
?>