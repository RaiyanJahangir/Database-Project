<?php
include "session.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Medic | Medical HTML Template</title>
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->

  

<!--header top-->
<div class="header-top">
      <div class="container clearfix">
            <div class="top-left">
                  <h6>Opening Hours : Saturday to Tuesday - 8am to 10pm</h6>
            </div>
            <div class="top-right">
                  <ul class="social-links">
                        <li>
                              <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                        </li>
                  </ul>
            </div>
      </div>
</div>
<!--header top-->

<!--Header Upper-->
<section class="header-uper">
      <div class="container clearfix">
            <div class="logo">
                  <figure>
                       
                              <img src="images/logo.png" alt="" width="130">
                        
                  </figure>
            </div>
            <div class="right-side">
                  <ul class="contact-info">
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-envelope-o"></i>
                              </div>
                              <strong>Email</strong>
                              <br>
                              <a href="#">
                                    <span>admin@gmail.com</span>
                              </a>
                        </li>
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                              </div>
                              <strong>Call Now</strong>
                              <br>
                              <span>0172402xxxx</span>
                        </li>
                  </ul>
                  <?php error_reporting(0); 
                  if($_SESSION['plogin'] == true || $_SESSION['ologin']==true) : ?>
                        
                  <div class="link-btn">
                  <a href="logout.php" class="btn-style-one">Log out</a> 
                  </div>
                  <?php elseif($_SESSION['plogin'] == false ) : ?>
                  <div class="link-btn">
                  <a href="login.php" class="btn-style-one">Log in</a> 
                  </div>
                  <?php elseif($_SESSION['plogin'] == "" ) : ?>
                  <div class="link-btn">
                  <a href="login.php" class="btn-style-one">Log in</a> 
                  </div>
                  <?php endif; ?>
            </div>
      </div>
</section>
<!--Header Upper-->


<!--Main Header-->
<nav class="navbar navbar-default">
      <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                        <li class="active">
                              <a href="index.php">Home</a>
                        </li>
                        <?php if($_SESSION['ologin']==false) :?>
                        <li>
                              <a href="donate.php">Donate Blood</a>
                        </li>
                        <?php endif;?>
                        <li>
                              <a href="patientoption.php">Purchase Blood</a>
                        </li>
                        <li>
                              <a href="blood_list.php">Check Available Blood</a>
                        </li>
                        <li>
                              <a href="contact.html">Contacts</a>
                        </li>
                        <?php if($_SESSION['plogin'] == false) : ?>
                        <li>
                             <!-- <a href="admin/login.php">Admin</a>-->
                        </li>
                        <?php else : ?>
                        <li>
                              <a href="profile.php"><img style="cursor: pointer;padding: 0px 0px;" class="signinicon" src="images/sign in/2.png" alt=""
                                width="40">
                              <?php echo $_SESSION['pemail'] ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($_SESSION['ologin'] == false) : ?>
                        <li>
                             <!-- <a href="admin/login.php">Admin</a>-->
                        </li>
                        <?php else : ?>
                        <li>
                              <a href="organization_profile.php"><img style="cursor: pointer;padding: 0px 0px;" class="signinicon" src="images/sign in/2.png" alt=""
                                width="40">
                              <?php echo $_SESSION['oemail'] ?></a>
                        </li>
                        <?php endif; ?>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
<!--End Main Header -->