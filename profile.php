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
<link href="css/profile.css" rel="stylesheet">
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
              <!--<li><a href="profile_edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>-->
              <form action="profile_edit.php" method="post">

                  <input type="hidden" name="edit_id" value="<?php //echo $_SESSION['pid'] 
                  echo $row['PERSON_ID']
                  ?>">

                  <button type="submit" name="edit_btn" class="btn btn-warning" style="margin-left:75px"> EDIT PROFILE</button>

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
                  <!--<div class="bio-row">
                      <p><span>Age </span>: <?php //echo $_SESSION['page']; ?></p>
                  </div>-->
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
                      <p><span>No. of Donation </span>: <?php //echo $_SESSION['pdon'];
                      echo $row['PERSON_NO_OF_DONATION'];?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>No. of Purchase </span>: <?php echo $row['PERSON_NO_OF_PURCHASE'];?></p>
                  </div>
                  
              </div>
          </div>
      </div>
      <div>
          <div class="row">
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="red">Envato Website</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="terques">ThemeForest CMS </h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="green">VectorLab Portfolio</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="purple">Adobe Muse Template</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
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