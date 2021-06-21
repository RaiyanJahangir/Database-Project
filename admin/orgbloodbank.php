<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
$_SESSION['bag']=0;



if(isset($_POST['orgapproved_btn']))
{
    
    $_SESSION['reqid']=$_POST['orgapproved_id'];
    $_SESSION['bag']=1;
    $id=$_SESSION['reqid'];
    
  
    

}
    $id=$_SESSION['reqid'];
    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];
    $query_string="Update PURCHASE_REQUEST set purchase_request_status='ACCEPTED' where purchase_request_id='$id'";
    
    $query = oci_parse($connection,$query_string);
    $query_run = oci_execute($query);

    if($query_run)
    { 
        $_SESSION['success']='Your Data is Updated';
        //header('location:bloodbank.php');
    }
    else
    {
        $_SESSION['status']='Your Data is Not Updated';
        //header('location:purchaseinfo.php');
    }
  
  


  //$id=$_SESSION['reqid'];


//echo $id;


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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Person Profile 
            </button>
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



$query=oci_parse($connection,"SELECT * FROM BLOOD_BANK");
$query_run=oci_execute($query);



?>
  

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Blood Bag ID </th>
            <th> Donor ID </th>
            <th>Blood Group </th>
            <th>Blood type</th>
            <TH>Quantity</TH>
            <th>Appointed to</th>
            
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

                <td><?php  echo $row['BLOOD_BANK_BLOOD_BAG_ID']; ?></td>

                <td><?php  echo $row['BLOOD_BANK_DONOR_ID']; ?></td>

                <td><?php  echo $row['BLOOD_BANK_BLOOD_GROUP']; ?></td>

                 <td><?php  echo $row['BLOOD_BANK_BLOOD_TYPE']; ?></td> 
                 <td><?php  echo $row['BLOOD_BANK_TOTAL_NO']; ?></td> 

                <td><?php error_reporting(0); if($row['BLOOD_REQUEST_ID']=='') echo 'none';
                                else echo $row['BLOOD_REQUEST_ID'] ?></td>     

                 <!--<td><?php  echo $row['PURCHASE_REASON']; ?></td>-->

                  <!--<td><?php  echo $row['PURCHASE_REQUEST_STATUS']; ?></td>-->
            

            
                  

                        <form action="orgbloodbank-process.php" method="post">
                           <td>

                          <!--<input type="text" name="" class="form-control main" placeholder="Appointed">-->
                          <input type="hidden" name="reqbagid" value="<?php echo $id ?>" required>
                          <input type="hidden" name="reqbloods" value="<?php  echo $row['BLOOD_BANK_BLOOD_GROUP']; ?>" required>
                          <input type="hidden" name="reqtype" value="<?php  echo $row['BLOOD_BANK_BLOOD_TYPE']; ?>" required>
                          <input type="hidden" name="orgappointed_id" value="<?php echo $row['BLOOD_BANK_BLOOD_BAG_ID']; ?>" required>
                            
                          <input type="hidden" name="" value="">

                           <button  type="submit" name="orgappointed_btn" class="btn btn-success" <?php
                                        if($row['BLOOD_REQUEST_ID']!="")
                                        {
                                          echo "disabled";
                                        }

                                       
                                          
                                        ?> 
                                      
                                       
                                          
                                        > Appointed</button>
                           
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