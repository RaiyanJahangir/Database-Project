<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    include "header.php"
    ?>
<!--==================================
        =            Contact Form            =
        ===================================-->
        <section class="section contact">
            <!-- container start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        
                        <!-- address start -->

                        <div class="left-block" >
                            <!-- Location -->
                            <figure>
                                <img class="img-responsive" src="images/sign in/1.jpg" alt="">
                            </figure>
                            <h3 style="text-align:center;">Sign in your account</h3>
                        </div>
                        <!-- address end -->
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <!-- contact form start -->
                            <h3 style="text-align:center;">Sign In</h3>
                            <br>
                            <form action="person-login-process.php" class="row" method="post">
                                <!-- email -->
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control main" placeholder="Email" required>
                                </div >
                                <div class="col-md-12">
                                    <input type="password" name="pass" class="form-control main" id="myInput">
                                    <input type="checkbox" onclick="myFunction()"> show pass
                                </div>
                                <!-- submit button -->
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-style-one" name="save" type="submit">Sign in</button>
                                </div>
                            </form>
                            <p>Need an account?
                                <a class="btn btn-link" href="signup.php" role="button">Register</a>
                            </p>
                            <!-- contact form end -->
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