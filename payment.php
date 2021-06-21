<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    include_once 'database.php';
    include "navbar.php";
    $_SESSION['login']=0;
    $_SESSION['billing']=1;
    $_SESSION['donate']=0;
    $_SESSION['profile']=0;
    $_SESSION['plogin'] = false;
    include "header-small.php";
    ?>
<!--==================================
        =            Contact Form            =
        ===================================-->
        <section class="section contact">
            <!-- container start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <?php
                    $reqid=$_SESSION['pid'];
                   //echo $reqid;
                   $id=$_POST['buy_id'];
                   $requestid=$_POST['buy_request_id'];
                   
                   $blood=$_POST['buy_blood'];
                   $type=$_POST['buy_type'];
                   
                   $amounts="select blood_prize from product_amount where blood_type='".$type."'";
                   $query=oci_parse($conn,$amounts);
                   $query_run=oci_execute($query);
                   $row=oci_fetch_array($query);
                   $amount=$row['BLOOD_PRIZE'];
                   
                   
                 $quantitys="select count(blood_bank_blood_bag_id)
                            from blood_bank
                              where blood_request_id='".$requestid."'";
                   $query=oci_parse($conn,$quantitys);
                   $query_run=oci_execute($query);
                 
                  $row=oci_fetch_array($query);
                  $quantity=$row['COUNT(BLOOD_BANK_BLOOD_BAG_ID)'];
                   
                    $total=$quantity*$amount;
                   
                      
                   
                    ?>
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="profile.php" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body" >
                <form class="form-horizontal" method="post" action="payment_process.php">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="images/blood.png" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><h5><b>Blood Group: </b><?php echo $blood; ?></h5></div>
                                    <div class="col-xs-12"><h5><b>Blood type: </b><?php echo $type; ?></h5></div>
                                    <div class="col-xs-12" name="quantity"><samll><b>Quantity: </b><span><?php echo $quantity; ?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                <div class="col-xs-12"><small><b>Taka :  </b><span><?php echo $total; ?></span></small></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            
                            
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><b>Taka :  </b><span><?php echo $total; ?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><b>Taka :  </b><span><?php echo $total; ?></span></div>
                                    <!--<div name="taka" type="text" value="1500" class="pull-right"><span>TK</span><span>1500.00</span></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Request ID:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="reqbillid" value="<?php echo $requestid;?>" readonly  /></div>
                                
                                <div class="col-md-12"><input type="hidden" class="form-control" name="a" value="<?php echo $total;?>"  /></div>
                                <div class="col-md-12"><input type="hidden" class="form-control" name="reqsid" value="<?php echo $id;?>"  /></div>


                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Payment Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control" placeholder="PRocess of payment">
                                        <option value="5">CASH</option>
                                        <!--<option value="6">MasterCard</option>-->
                                        <!--<option value="7">American Express</option>-->
                                        <!--<option value="8">Discover</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Price for per bag</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="" value="<?php echo $amount?>" /></div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Total Amount Paid :</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control"value="<?php echo $total;?>"  /></div>
                                
                            </div>
                            
                            <div class="col-md-12">
                              <label for="example-date-input" class="col-2 col-form-label" placeholder="Date Of Birth">Date of Payment</label>
                              <input class="form-control" name="paydate" type="date" value="2021-06-21" id="example-date-input">
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                </div>
                                
                                
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-12">
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="save" class="btn btn-primary btn-submit-fix">Pay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
                        
                    </div>
                    
                </div>
            </div>
            <!-- container end -->
        </section>
        <!--====  End of Contact Form  ====-->
            <?php
    include "footer.php"
    ?>
</body>
</html>