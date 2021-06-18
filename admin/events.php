<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Event Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Event Location</label>
                <input type="text" name="location" class="form-control" placeholder="Enter Location">
            </div>
            <!--<div class="form-group">
                <label> Event Start Date:</label>
                <input type="text" name="startdate" class="form-control" placeholder="Enter Start Time">
            </div>
            <div class="form-group">
                <label> Event End Date:</label>
                <input type="text" name="enddate" class="form-control" placeholder="Enter End Time">
            </div>-->
            <div class="form-group">
                 <label for="example-date-input"  placeholder="Start Date">Start Date</label>
                 <input class="form-control" name="startdate" type="date" value="2021-05-25" id="example-date-input">
            </div>
            <div class="form-group">
                <label for="example-date-input"  placeholder="End Date">End Date</label>
                <input class="form-control" name="enddate" type="date" value="2021-05-25" id="example-date-input">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register_event_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Events: 
    <form action="events.php" method="post">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Event 
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

//if(isset($_POST['all_events']))
//{

//$query=oci_parse($connection,"select * from event where sysdate<event_enddate");
//$query_run=oci_execute($query);
//}
//else{
  $query=oci_parse($connection,"select * from event ");
  $query_run=oci_execute($query);
//}


?>
  

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Event Name </th>
            <th>Location </th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>EDIT </th>
            <th>DELETE </th>
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

            <td><?php  echo $row['EVENT_ID']; ?></td>

            <td><?php  echo $row['EVENT_NAME']; ?></td>

            <td><?php  echo $row['EVENT_LOCATION']; ?></td>

            <td><?php  echo $row['EVENT_STARTDATE']; ?></td>

            <td><?php  echo $row['EVENT_ENDDATE']; ?></td>

            

            <td>

                <form action="register_edit.php" method="post">

                    <input type="hidden" name="edit_id" value="<?php echo $row['EVENT_ID']; ?>">

                    <button  type="submit" name="edit_event_btn" class="btn btn-success"> EDIT</button>

                </form>

            </td>

            <td>

                <form action="code.php" method="post">

                  <input type="hidden" name="delete_id" value="<?php echo $row['EVENT_ID']; ?>">

                  <button type="submit" name="delete_event_btn" class="btn btn-danger"> DELETE</button>

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