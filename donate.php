<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    include "navbar.php";
$_SESSION['profile']=0;
$_SESSION['login']=0;
$_SESSION['donate']=1;
    include "header-small.php";
    ?>
<section class="blog-section section style-three pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3><span>Request </span>Donation</h3>
                            </div>
                            <form name="contact_form" class="default-form contact-form" action="donation-req-place.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <p>Type of donation</p>
                                        <div class="form-group">
                                            <select name="type">
                                                <option>WHOLE BLOOD</option>
                                                <option>PLASMA</option>
                                                <option>RBC</option>
                                                <option>PLATELETS</option>
                                                <option>CRYO</option>
                                                <option>WBC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <p>Event</p>
                                        <div class="form-group">
                                            <select name="event">
                                            <option>None</option> 
                                           <?php 
                                           include 'database.php';
                                                $query=oci_parse($conn,"select event_name from event where sysdate<event_enddate ");
                                                $query_run=oci_execute($query);
                                                while(($row = oci_fetch_array($query, OCI_BOTH)) != false)

                                                {
                                                    echo $row['EVENT_NAME'];
                                            ?>
                                                <option><?php echo $row['EVENT_NAME']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>Mention a reason for your blood donation(Optional)</p>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Your Message"></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" name="save" class="btn-style-one">Register for donation</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <?php
    include "footer.php"
    ?>
</body>
</html>