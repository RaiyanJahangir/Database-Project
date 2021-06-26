<?php

include('includes/header.php'); 
include('includes/navbar.php'); 

//$query=oci_parse($conn,"select  blood_bank_blood_group , blood_bank_blood_type ,max(blood_bank_total_no) from blood_bank group by blood_bank_blood_group,blood_bank_blood_type order by blood_bank_blood_group");
$query=oci_parse($connection,"select * from product_view");
$query_result=oci_execute($query);
// $numrows=oci_fetch_all($query,$res);
  //echo '<h4> Total Rows:'.$numrows.'</h4>';

?>
<br><br>
<h1 style="text-align:center; color:black;"> AVAILABLE PRODUCTS</h1><br>
<section class="cta">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="cta-block"> 
              

<table class="table table-hover" style="border: 2px solid black;">
<thead>
  <tr class="bg-info">
    <th scope="col"style="text-align:center ;border: 2px solid black; background-color:Tomato; color:black;">Blood Group</th>
    <th scope="col"style="text-align:center ;border: 2px solid black; background-color:Tomato; color:black;">Blood Type</th>
    <th scope="col"style="text-align:center ;border: 2px solid black; background-color:Tomato; color:black;">Available Bags</th>
    
  </tr>
</thead>
<tbody>
<?php 
  
   while(($row = oci_fetch_array($query, OCI_BOTH)) != false){

    

?>
  <tr>
    
    <td style="text-align:center; border: 2px solid black; "><?php echo $row[0]; ?></td>
    <td style="text-align:center; border: 2px solid black; "><?php echo $row[1]; ?></td>
    <td style="text-align:center; border: 2px solid black; "><?php echo $row[2]; ?></td>
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
</section>