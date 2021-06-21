<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    //include "navbar.php";
$_SESSION['profile']=0;
$_SESSION['login']=0;
$_SESSION['donate']=0;
$_SESSION['buyer']=1;
//$_SESSION['ologin'] = true;
   if($_SESSION['ologin']==true){
    //echo $_SESSION['oid'];
    $_SESSION[$_SESSION['oid']]=$_SESSION['oid'];
    //echo $_SESSION[$_SESSION['oid']];
   }
   else{
    //echo $_SESSION['pid'];
    $_SESSION[$_SESSION['pid']]=$_SESSION['pid'];
    //echo $_SESSION[$_SESSION['pid']]; 
   }
//$_SESSION['request']=1;
   // include "header-small.php";
    ?>
<section class="blog-section section style-three pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3><span>Request </span>Donation</h3>
                            </div>
                            <?php if($_SESSION['plogin']==true)

                            {
                            ?>

                            <form name="contact_form" class="default-form contact-form" action="purchase-request.php" method="post">
                        <div class="row">
                        <div class="col-md-12">
                            <label for="exampleSelect1">Blood Group</label>
                            <br>
                            <select style="height: 50px; width:485px; background-line:rgb(206, 22, 22) ;" name="reqbloodgroup" >
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="col-md-12">
                            <label for="exampleSelect1">Blood Type</label>
                            <br>
                            <select style="height: 50px; width:485px; background-line:rgb(206, 22, 22) ;" name="reqbloodtype" >
                                <option value="RBC">RBC</option>
                                <option value="PLASMA">PLASMA</option>
                                <option value="WHOLE BLOOD">WHOLE BLOOD</option>
                                <option value="CRYO">CRYO</option>
                                <option value="PLATELETS">PLATELETS</option>
                                <option value="WBC">WBC</option>
                                
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="col-md-6">
                            <label for="exampleSelect1">Patient_ID</label>
                            <input type="text" style="height: 50px; width:485px;" name="pername" value="<?php 
                                                                                                            echo $_SESSION['pid'];?>"class="form-control main" placeholder="Patient_id" readonly>
                          </div>
                          <div class="col-md-12">
                                <label for="example-date-input" class="col-2 col-form-label"  placeholder="Quantity">Quantity</label>
                                <input class='text-center iquantity' onchange='' type='number' name="reqamount" value='1' min='1' max='50' style='color:black;'> 
                                
                           </div>
                           
                          <div class="col-md-12">
                              <label for="example-date-input" class="col-2 col-form-label" placeholder="Date Of Birth">Date</label>
                              <input class="form-control" name="reqdate" type="date" value="2021-06-14" id="example-date-input">
                          </div>
                           
                            <div class="col-md-12">
                                 <label for="exampleTextarea">Reason</label>
                                 <textarea class="form-control" name="reqreason" id="exampleTextarea" rows="3" placeholder="Previous History"></textarea>
                             </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p></p>
                                    
                                </div>
                            </div>
                            
                             
                             <br>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-style-one" name="save1">Request to Admin</button>
                                </div>
                            </div>
                           
                        </div>
                    </form>
                    <?php
                    }
                    else
                    {?>
                    
                    <form name="contact_form" class="default-form contact-form" action="orgpurchase-request.php" method="post">
                        <div class="row">
                        <div class="col-md-12">
                            <label for="exampleSelect1">Blood Group</label>
                            <br>
                            <select style="height: 50px; width:485px; background-line:rgb(206, 22, 22) ;" name="reqbloodgroup" >
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="col-md-12">
                            <label for="exampleSelect1">Blood Type</label>
                            <br>
                            <select style="height: 50px; width:485px; background-line:rgb(206, 22, 22) ;" name="reqbloodtype" >
                                <option value="RBC">RBC</option>
                                <option value="PLASMA">PLASMA</option>
                                <option value="WHOLE BLOOD">WHOLE BLOOD</option>
                                <option value="CRYO">CRYO</option>
                                <option value="PLATELETS">PLATELETS</option>
                                <option value="WBC">WBC</option>
                                
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="col-md-6">
                            <label for="exampleSelect1">Patient_ID</label>
                            <input type="text" style="height: 50px; width:485px;" name="pername" value="<?php 
                                                                                                           echo $_SESSION['oid'];
                                                                                                           ?>"class="form-control main" placeholder="Patient_id" readonly>
                          </div>
                          <div class="col-md-12">
                                <label for="example-date-input" class="col-2 col-form-label"  placeholder="Quantity">Quantity</label>
                                <input class='text-center iquantity' onchange='' type='number' name="reqamount" value='1' min='1' max='50' style='color:black;'> 
                                
                           </div>
                           
                          <div class="col-md-12">
                              <label for="example-date-input" class="col-2 col-form-label" placeholder="Date Of Birth">Date</label>
                              <input class="form-control" name="reqdate" type="date" value="2021-06-23" id="example-date-input">
                          </div>
                           
                            <div class="col-md-12">
                                 <label for="exampleTextarea">Reason</label>
                                 <textarea class="form-control" name="reqreason" id="exampleTextarea" rows="3" placeholder="Previous History"></textarea>
                             </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p></p>
                                    
                                </div>
                            </div>
                            
                             
                             <br>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-style-one" name="save">Request</button>
                                </div>
                            </div>
                           
                        </div>
                    </form>
                    <?php
                    }
                    ?>

                    
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="appointment-image-holder">
                            <figure>
                                <img src="images/Donation/1.png" class="img-responsive" alt="Appointment">
                            </figure>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    
</body>
</html>