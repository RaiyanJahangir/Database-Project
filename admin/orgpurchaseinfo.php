<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="personusername" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="personemail" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="personpassword" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="personconfirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="personregisterbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Person Profile 
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Person Profile 
            </button>-->
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



$query=oci_parse($connection,"select * from purchase_request where purchase_org_id is not null");
$query_run=oci_execute($query);



?>
  

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> Organization ID </th>
            <th> Request ID </th>
            <th>Blood Group </th>
            <th>Blood type</th>
            <th>Amount </th>
            <th>Reason </th>
            <th>Status </th>
            <th>Verdict </th>
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

                <td><?php  echo $row['PURCHASE_ORG_ID']; ?></td>

                <td><?php  echo $row['PURCHASE_REQUEST_ID']; ?></td>

                <td><?php  echo $row['PURCHASE_BLOOD_GROUP']; ?></td>

                 <td><?php  echo $row['PURCHASE_BLOOD_TYPE']; ?></td> 

                <td><?php  echo $row['PURCHASE_DESIRED_PRODUCT']; ?></td>      

                 <td><?php  echo $row['PURCHASE_REASON']; ?></td>

                  <td><?php  echo $row['PURCHASE_REQUEST_STATUS']; ?></td>
            

            
                  <td>

                        <form action="orgbloodbank.php" method="post">
                          <input type="hidden" name="orgapproved_id" value="<?php echo $row['PURCHASE_REQUEST_ID']; ?>">

                           <button  type="submit" name="orgapproved_btn" class="btn btn-success"  <?php
                                        

                                        if($row['PURCHASE_REQUEST_STATUS']=='ACCEPTED' || $row['PURCHASE_REQUEST_STATUS']=='DECLINED')
                                        {
                                          echo "disabled";
                                        }


                                       
                                          
                                        ?>>  APPROVED</button>
                                    

                        </form>
                        <form action="code.php" method="post">
                           <input type="hidden" name="orgdeclined_id" value="<?php echo $row['PURCHASE_REQUEST_ID']; ?>">

                           <button type="submit" name="orgdeclined_btn" class="btn btn-danger"  <?php
                                        

                                        if($row['PURCHASE_REQUEST_STATUS']=='ACCEPTED' || $row['PURCHASE_REQUEST_STATUS']=='DECLINED')
                                        {
                                          echo "disabled";
                                        }


                                       
                                          
                                        ?>> DECLINED </button>

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