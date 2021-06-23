<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
?>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Messages
           
    </h6>
  </div>

  <div class="card-body">
  <?php



$query=oci_parse($connection,"select * from contact order by time");
$query_run=oci_execute($query);



?>
  

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Name</th>
            <th>Email </th>
            <th>Phone Number</th>
            <th>Message </th>
            <th>Message sent at </th>
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

            <td><?php  echo $row['NAME']; ?></td>

            <td><?php  echo $row['EMAIL']; ?></td>

            <td><?php  echo $row['PHONE']; ?></td>

            <td><?php  echo $row['MESSAGE']; ?></td>

            <td><?php echo $row['TIME']; ?></td>

          </tr>

          <?php

            } 

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