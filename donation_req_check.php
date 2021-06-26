<?php
include "navbar.php";
$_SESSION['profile']=1;
$_SESSION['login']=0;
$_SESSION['donate']=0;
include "header-small.php";
include "database.php";
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/prof-dis.css" rel="stylesheet">
<link href="css/request.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1><?php echo strtoupper($_SESSION['pname']); ?></h1>
              <p style="color:white;"><?php echo $_SESSION['pemail']; 
              ?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a href="donation_req_check.php"> <i class="fa fa-edit"></i> Donation Request Check</a></li>
              <li><a href="purchasetable.php"> <i class="fa fa-edit"></i> Purchase Request</a></li>
          </ul>
      </div>
  </div>
<div class="profile-info col-md-9">
    <div>
        <h1 style="text-align: center;color: rgb(0, 162, 255);">Donation request and performed tests</h1>
        <br>
        <br>
    </div>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Donation Id</th>
                    <th>Blood Type</th>
                    <th>Event</th>
                    <th>Request State</th>
                    <th>Test Result</th>
                    <th>Request Cancel</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    //error_reporting(0);
                    $id=$_SESSION['pid'];
                    $stid = oci_parse($conn, "select d.req_id ,d.req_type,d.req_event,d.req_state,et.state 
from donation_request d,person p  , eligibility e left outer join eligibility_test et on  e.eligibility_test_id=et.test_id
where p.person_id='$id' and e.eligibility_request_id=d.req_id 
and p.person_id=e.eligibility_person_id  ");
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    ?><tr><td><?php echo $row[0] ?></td><?php
                    ?><td><?php echo $row[1] ?></td><?php
                    ?><td><?php echo $row[2] ?></td><?php
                    ?><td><?php echo $row[3] ?></td><?php
                    ?><td><?php echo $row[4] ?></td>
                    <?php if($row[3] == "DECLINE" ||  $row[3] == "DONATED" || $row[3] == "CANCELED" 
                    || $row[4]=="NOT PASSED" ||  $row[3] == "NOT DONATED") : ?>
                    <td>
                        <form action="action.php" method="post">
                        <input type="hidden" name="donar_id" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="req_cancel" class="btn btn-info" disabled>Cancel Request</button>
                        </form>
                    </td></tr>
                    <?php else : ?>
                    <td>
                        <form action="action.php" method="post">
                        <input type="hidden" name="donar_id" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="req_cancel" class="btn btn-info">Cancel Request</button>
                        </form>
                    </td></tr>
                    <?php endif; ?>
                    <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>
<?php
include "footer.php";
?>