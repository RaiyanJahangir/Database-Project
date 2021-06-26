
<?php

include_once 'database.php';
include 'navbar.php';
include 'header-small.php';
?>

<!--End Page Title-->
<!--=================================
=            Page Slider            =
==================================-->


<div class="container">
    <div class="main-body">
<!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
              <br>
              <br>
              <h1>Request table </h1>
            <!--<ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
              <h1>Request table</h1>
            </ol>-->
          </nav>
          <!-- /Breadcrumb -->
          
</div>
</div>



</div>
   


<br>
               <br>





<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $reqid=$_SESSION['pid'];
                $query = "SELECT * FROM purchase_request
                where purchase_person_id='$reqid' order by purchase_person_id";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
                //$reqid=$_SESSION['pid'];
               //echo $reqid;

               
               // $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Person ID </th>
                            <th>  Request ID </th>
                            <th> Blood Group </th>
                            <th>Blood type </th>
                            <th>Amount</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Buy </th>
                           <!-- <th>EDIT</th>
                            <th>DELETE</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            while($row = oci_fetch_array($stid))
                            {
                        ?>
                            <tr>
                                

                                <td><?php  echo $row['PURCHASE_PERSON_ID']; ?></td>

                                <td><?php  echo $row['PURCHASE_REQUEST_ID']; ?></td>

                                <td><?php  echo $row['PURCHASE_BLOOD_GROUP']; ?></td>

                                <td><?php  echo $row['PURCHASE_BLOOD_TYPE']; ?></td>

                                <td><?php  echo $row['PURCHASE_DESIRED_PRODUCT']; ?></td>

                                <td><?php  echo $row['PURCHASE_REASON']; ?></td>

                               <td><?php  echo $row['PURCHASE_REQUEST_STATUS']; ?></td>

                                <td>
                                    <form action="payment.php" method="post">
                                        <input type="hidden" name="buy_id" value="<?php echo $row['PURCHASE_PERSON_ID']; ?>">
                                        <input type="hidden" name="buy_request_id" value="<?php echo $row['PURCHASE_REQUEST_ID']; ?>">
                                        <input type="hidden" name="buy_blood" value="<?php echo $row['PURCHASE_BLOOD_GROUP']; ?>">
                                        <input type="hidden" name="buy_type" value="<?php echo $row['PURCHASE_BLOOD_TYPE']; ?>">
                                        <input type="hidden" name="buy_amount" value="<?php echo $row['PURCHASE_DESIRED_PRODUCT']; ?>">
                                        <button type="submit" name="buy_btn" class="btn btn-success"  <?php
                                        if($row['PURCHASE_REQUEST_STATUS']!='ACCEPTED' ||$row['PURCHASE_BILLING_ID']!="")
                                        {
                                          echo "disabled";
                                        }

                                       
                                          
                                        ?>>
                                        <?php
                                        if($row['PURCHASE_REQUEST_STATUS']=='DECLINED' || $row['PURCHASE_REQUEST_STATUS']=='PENDING')
                                        {
                                          echo "buy";
                                        }
                                        elseif($row['PURCHASE_BILLING_ID']=="")
                                        {
                                          echo "buy";
                                        }
                                        else{
                                          echo "paid";
                                        }?>
                                      </button>
                                    </form>
                                </td>
                                <!--<td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>-->
                            </tr>
                        <?php
                            } 
                        
                        ?>
                    </tbody>
                </table>
                <br>
                <br>
                <br>

            </div>
        </div>
    </div>

</div>


























<!--footer-main-->
<footer class="footer-main">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="about-widget">
            <div class="footer-logo">
              <figure>
                <a href="index.html">
                  <img src="images/logo-2.png" alt="">
                </a>
              </figure>
            </div>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h6>Information</h6>
          <ul class="menu-link">
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Home</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Donate Blood</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Donor center locations</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Appointment</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Services</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>Support us</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>About us</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>Contacts</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="about-widget">
            <h6>Contact Us</h6>
            
            <ul class="location-link">
                <li class="item">
                    <i class="fa fa-map-marker"></i>
                    <p>18/F, Bir Uttam Qazi Nuruzzaman Sarak West, Panthapath, Dhaka 1205</p>
                </li>
                <li class="item">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="#">
                        <p>admin@gmail.com</p>
                    </a>
                </li>
                <li class="item">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="#">
                        <p>bloodbank.manager@yahoo.com</p>
                    </a>
                </li>
                <li class="item">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>0172402xxxx</p>
                </li>
                <li class="item">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>0172455xxxx</p>
                </li>
                <li class="item">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>0171639xxxx</p>
                </li>
            </ul>
            <ul class="list-inline social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container clearfix">
      <div class="copyright-text">
        <p>&copy; Copyright 2018. All Rights Reserved by
          <a href="index.html">Medic</a>
        </p>
      </div>
      <ul class="footer-bottom-link">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="about.html">About</a>
        </li>
        <li>
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
<!--End footer-main-->

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>

<script src="plugins/jquery.js"></script>
<script src="plugins/bootstrap.min.js"></script>
<script src="plugins/bootstrap-select.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- FancyBox -->
<script src="plugins/fancybox/jquery.fancybox.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>

<script src="plugins/validate.js"></script>
<script src="plugins/wow.js"></script>
<script src="plugins/jquery-ui.js"></script>
<script src="plugins/timePicker.js"></script>
<script src="js/script.js"></script>



</body>

</html>