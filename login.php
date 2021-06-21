<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    include "navbar.php";
    $_SESSION['login']=1;
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
                            <form action="Login-valid-check.php" class="row" method="post">
                                <!-- email -->
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control main" placeholder="Email" required>
                                </div >
                                <div class="col-md-12">
                                    <input class="form-control main" type="password" name="pass"  id="myInput">
                                    <span class="eye" onclick="myFunction()">
                                    <i style="display:none;" id="hidel" class="fa fa-eye"></i>
                                    <i id="hide2" class="fa fa-eye-slash"></i></span> show pass
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
        <script>
    function myFunction(){
    var x = document.getElementById("myInput") ;
    var y = document.getElementById("hide1") ;
    var z = document.getElementById("hide2") ;
    if (x.type === 'password') {
    x.type = "text";
    y.style.display = "block";
    z.style.display = "none";
    }
    else{
    x.type = "password";
    y.style.display = "none";
    z.style.display = "block";
    }
    }
</script>
</body>
</html>