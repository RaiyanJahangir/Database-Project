<?php
    include_once '../database.php';
    include "navbar.php";
    include "header-small.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['check_btn']))
    {
    $did=$_POST['check_id'];
    $query = oci_parse($conn, "SELECT p.person_id FROM person p,eligibility e,donation_request d
                    where p.person_id=e.eligibility_person_id and e.eligibility_request_id = '$did'");
    oci_execute($query);
    $row = oci_fetch_array($query, OCI_BOTH);
    $id=$row[0];
    $query=oci_parse($conn,"SELECT * FROM person where person_id='$id' ");
    $query_run=oci_execute($query);
    $row = oci_fetch_array($query, OCI_BOTH);
    }
    ?>
    <link href="pending-requesters-profile-check.css" rel="stylesheet">
    <br>
    <br>
    <div class="container">
    <div class="row">
        <div class="container">
    <div class="main-body">
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $row[1] ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[1] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[2] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[6] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Height</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[7] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Weight</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[8] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Blood Group</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[10] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[11] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[12] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Previous History</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[13] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Chronic Disease</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row[14] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No of Donation</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
		                <?php
		                    $query = oci_parse($conn, "select * from blood_bank where blood_bank_donor_ID='$id'");
    		                oci_execute($query);
    		                $row = oci_fetch_all($query,$res);
		                ?>
                      <?php echo $row?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <form action="check.php" method="post">
                      <input type="hidden" name="approve_id" value="<?php echo $did; ?>">
                      <button type="submit" name="app" class="btn btn-info" >Send inviation for blood donation test</button>
                      </form>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-12">
                      <form action="check.php" method="post">
                      <input type="hidden" name="decline_id" value="<?php echo $did; ?>">
                      <button type="submit" name="dec" class="btn btn-danger">Decline Invitation</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>
    <br>
    <br>
    <?php
    include "footer.php";
    ?>
</body>
</html>