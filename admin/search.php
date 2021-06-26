<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//include('security.php');
?>
<section>
<div class="panel">
                  <div class="panel-body bio-graph-info">
                  <form method="post" action="search.php">
                      
                    <input type="text" name="search_id"  class="form-control main" placeholder="Search for">
                    <br>
                    <input style="color:white; background-color:blue ;" class="button" type="submit" name="search_btn" value="Search">
                    
                     
                  </form>
                      
                      
                  </div>
</div>
</section>


<?php






if(isset($_POST['search_btn']))
{
    $id=$_POST['search_id'];
   // echo $id;
    $query=oci_parse($connection,"select * from person where person_id='$id'");
    oci_execute($query);
    $row=oci_fetch_array($query,OCI_BOTH);
    error_reporting(0);
    if($row['PERSON_NAME']!="")
    {

   

?>

<div class="profile-info col-md-9">
      <div class="panel">
          <div class="bio-graph-heading">
          
          <br>
          Detail information.
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Personal Information Of <?PHP ECHO $row['PERSON_NAME']?></h1>
              <br>
              <br>
              <div class="panel">
                  <div class="panel-body bio-graph-info">
                  
                      <p><span>Name </span>: <?php //echo $_SESSION['pname']; 
                      echo $row['PERSON_NAME'];?></p>
                      
                  </div>
                  
                  <div class="bio-row">
                  
                      <p><span>Email </span>: <?php error_reporting(0); 
                     if($row['PERSON_EMAIL']=="") echo "Didnt create any account";
                     else  echo $row['PERSON_EMAIL'];?></p>
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
                      <p><span>No. of Purchase </span>: <?php echo strval($row['PERSON_NO_OF_PURCHASE']); ?></p>
                  </div>
                  <!--<div class="bio-row">
                      <p><span>No. of Donation </span>: <?php echo $row['PERSON_NO_OF_DONATION'];?>
                      <?php/*
		                    $query = oci_parse($conn, "select * from donation_request d,eligibility e,person p
                      where d.req_state='DONATED' and p.person_id='$id' and p.person_id=e.eligibility_person_id and e.eligibility_request_id=d.req_id
                         ");
    		                oci_execute($query);
    		                echo $row = oci_fetch_all($query,$res);*/
		                ?>
                      </p>
                  </div>-->
                  
                  
              </div>
          </div>
      </div>
      <div>
    </div>
    <?php
     }
     else
     {
         
         echo "NOT FOUND ANY INFORMATION UNDER THIS ID";
     }
    }
    else{
        //echo "not found";
    }

    ?>

