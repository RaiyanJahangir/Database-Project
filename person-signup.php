<section class="section contact">
    <!-- container start -->
    <div class="container">
        <div class="row">
            
            <div class="col-md-12" >
                <div class="contact-form">
                    <div class="section-title">
                        <h3 style="text-align: center;">Person <span>Sign Up</span></h3>
                    </div>
                    <br>
                    <br>
                    <!-- contact form start -->
                    <form action="person-signup-process.php" class="row" method="post">
                        <!-- name -->
                        <div class="col-md-6">
                            <label for="exampleSelect1">Name</label>
                            <input type="text" name="pername" class="form-control main" placeholder="Name" required>
                        </div>
                        <!-- email -->
                        <div class="col-md-6">
                            <label for="exampleSelect1">Email</label>
                            <input type="email" name="peremail" class="form-control main" placeholder="Email" required>
                        </div>
                        <!--height-->
                        <div class="col-md-6">
                            <label for="exampleSelect1">Height(cm)</label>
                            <input style="padding-top: 2%;height: 4%;" type="text" name="perheight" class="form-control main" placeholder="Height(cm)" required>
                        </div>

                        <!--height-->
                        <div class="col-md-6">
                            <label for="exampleSelect1">Weight(cm)</label>
                            <input style="padding-top: 2%;height: 4%;" type="text" name="perweight" class="form-control main" placeholder="Weight(kg)" required>
                        </div>
                        <!-- phone -->
                        <div class="col-md-12">
                            <label for="exampleSelect1">Birth Certificate Number</label>
                            <input type="text" name="perbirthcert"class="form-control main" placeholder="Birth Certificate Number" required>
                        </div>

                        <!-- phone -->
                        <div class="col-md-12">
                            <label for="exampleSelect1">Phone Number</label>
                            <input type="text" name="perphonenumber"class="form-control main" placeholder="Phone" required>
                        </div>
                        <!--blood group-->
                        
                          <div class="col-md-12">
                            <label for="exampleSelect1">Blood Group</label>
                            <br>
                            <select style="height: 40px; width:1135px; background-line:rgb(206, 22, 22) ;" name="perbloodgroup" >
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
                          <div class="col-md-12">
                              <label for="example-date-input" class="col-2 col-form-label" placeholder="Date Of Birth">Date of Birth</label>
                              <input class="form-control" name="perdob" type="date" value="2021-05-25" id="example-date-input">
                          </div>
                          <!--gender-->
                          <fieldset class="form-group" style="padding-left: 2%;">
                            <label>Gender</label>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pergender" id="optionsRadios1" value="Male" checked>
                                Male
                              </label>
                            
                            
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="pergender" id="optionsRadios2" value="Female">
                                Female
                              </label>
                            </div>
                          </fieldset>
                     <!--patient previous history-->
                    <div class="col-md-12">
                        <label for="exampleTextarea">Previous history</label>
                        <textarea class="form-control" name="perprevioushistory" id="exampleTextarea" rows="3" placeholder="Previous History"></textarea>
                    </div>
                    <!--any chronic disease-->
                    <div class="col-md-12">
                        <label for="exampleTextarea">Any chronic disease</label>
                        <textarea class="form-control" name="perchronicdisease" id="exampleTextarea" rows="3" placeholder="Chronic Disease"></textarea>
                      </div>
                    <!-- Job -->
                    <div class="col-md-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                                <label for="exampleSelect1">Profession</label>
                            </span>
                        </div>
                            <input type="text" name="perjobtitle"class="form-control main" placeholder="Profession" required>
                    </div>
                    <!--address-->
                    <div class="col-md-6">
                        <label for="exampleSelect1">Apartment</label>
                        <input type="text" name="perapartment" class="form-control main" placeholder="Apartment" required>
                    </div>
                    <!-- street-->
                    <div class="col-md-6">
                        <label for="exampleSelect1">street</label>
                        <input type="text" name="perstreet" style="padding-top: 2%; height: 5%;"class="form-control main" placeholder="Street" required>
                    </div>
                    <!--city-->
                    <div class="col-md-6">
                        <label for="exampleSelect1">City</label>
                        <input style="padding-top: 2%; height: 5%;" name="percity" type="text"class="form-control main" placeholder="City" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleSelect1">Postal</label>
                        <input style="padding-top: 2%; height: 5%;" type="text" name="perportal" class="form-control main" placeholder="Postal" required>
                    </div>

                    <!-- Password -->
                    <div class="col-md-12">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock text-muted"></i>
                            <label for="exampleSelect1">Password </label>
                        </span>
                        <input type="password" id="pass" class="form-control main" name="perpassword" id="myInput" required>
                        <!--<input type="checkbox" onclick="myFunction()"> show pass-->
                    </div>
                    <div class="col-md-12">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock text-muted"></i> 
                            <label for="exampleSelect1">Password Confirmation</label>
                        </span>
                        <input type="password" id="confirmpass" class="form-control main" name="perconfirmpassword" id="myInput" required>
                    </div>
                    <!-- Password Confirmation -->
                        <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0" style="padding-top: 5%;">
                        <a href="#" class="btn btn-primary btn-block py-2" style="background-color:#fa4141;">
                            <!--<span class="font-weight-bold" name="save" >Create your account</span>-->
                            <input style="color:white; background-color: #fa4141; border: 0ch;" class="button" type="submit" name="save" value="Create your Account">
                        </a>
                    </div>
                    </form>
                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="person-login.php" class="text-primary ml-2" style="color: red;">Login</a></p>
                    </div>
                    </form>
                    <!-- contact form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>

<script>
            var x = document.getElementById("pass");
            var y = document.getElementById("confirmpass");
        function action(){
            if(x.value!=y.value){alert("Wrong pass entry"); return false;}
            return true;
        }
</script>