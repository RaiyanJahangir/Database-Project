
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
//session_start();
include "navbar.php";
include 'database.php';
$_SESSION['profile']=0;
$_SESSION['login']=0;
$_SESSION['donate']=0;
$_SESSION['buyer']=1;


//include "header-small.php";

?>
<?php
//echo "anika";
if(isset($_POST['save']))
{	 
    //echo "ashraf";
    //$id = oci_insert_id($conn);

	//$sqlm="create sequence person_id_seq increment by 1;";
	//$id="person_id_seq.nextval";
	//static $num;
	

	$name= $_POST['pername'];
	//$email= "none";
	$height= $_POST['perheight'];
    $weight= $_POST['perweight'];
	$phone= $_POST['perphonenumber'];
	$birth=$_POST['perbirthcert'];
    $blood= $_POST['perbloodgroup'];
	$dob= $_POST['perdob'];
	$gender= $_POST['pergender'];
    $history= $_POST['perprevioushistory'];
	$chronic= $_POST['perchronicdisease'];
    $job=$_POST['perjobtitle'];
    $apartment= $_POST['perapartment'];
    $street=$_POST['perstreet'];
    $city= $_POST['percity'];
	$portal= $_POST['perportal'];
    //$password="none";
	
	//echo $birth;
	//echo $dob;

	//echo $num;
	//echo $sqlm;
    //$input=oci_parse($conn,"select max(person_id) from person;");
    //echo $input;
    //$result2=oci_execute($input);
    //echo "wasif";
    $query_string="declare
    a nvarchar2(50);
    b numeric;
    begin
    create_person(a,'$name','','','$phone','$job','$height','$weight','$blood','$gender','$history','$chronic','$apartment','$street' ,'$city','$portal','$birth' , to_date('$dob','yyyy-mm-dd'),b);
    end;";
    echo $query_string;
	$query = oci_parse($conn,$query_string);
	$result = oci_execute($query);
    //echo "name";
    $input="select max(person_id) from person";
    $query=oci_parse($conn,$input);
    oci_execute($query);
    $row = oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC);
    
    $maxid=$row['MAX(PERSON_ID)'];
    echo $_SESSION['pid'];
    echo $maxid;
    $_SESSION[$_SESSION['pid']]=$maxid;
          
	//$query = oci_parse($conn, "INSERT INTO person_SIGNIN(person_name,person_email,person_height,person_weight,person_phonenumber,person_bloodgroup,person_dob,person_gender,person_prevhistory,person_chronicdis,person_profession,person_apartment,person_street,person_city,person_portal,person_password) values ('$name','$email','$height','$weight','$phone','$blood','$dob','$gender','$history','$chronic','$job','$apartment','$street','$city','$portal','$password')");
	
	
}
?>
<section class="blog-section section style-three pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3><span>Request </span>Donation</h3>
                            </div>
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
                            <input type="text" style="height: 50px; width:485px;" name="pername" value="<?php echo $maxid;?>"class="form-control main" placeholder="Patient_id" readonly>
                          </div>
                          <div class="col-md-12">
                                <label for="example-date-input" class="col-2 col-form-label"  placeholder="Quantity">Quantity</label>
                                <input class='text-center iquantity' onchange='' type='number' name="reqamount" value='1' min='1' max='50' style='color:black;'> 
                                
                           </div>
                           
                          <div class="col-md-12">
                              <label for="example-date-input" class="col-2 col-form-label" placeholder="Date Of Birth">Date</label>
                              <input class="form-control" name="reqdate" type="date" value="2021-06-22" id="example-date-input">
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
                                    <button type="submit" class="btn-style-one" name="save1">Request Admin</button>
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


<?php
/*
if(isset($_POST['save']))
{	 

    //$id = oci_insert_id($conn);

	//$sqlm="create sequence person_id_seq increment by 1;";
	//$id="person_id_seq.nextval";
	//static $num;
	

	$name= $_POST['pername'];
	//$email= "none";
	$height= $_POST['perheight'];
    $weight= $_POST['perweight'];
	$phone= $_POST['perphonenumber'];
	$birth=$_POST['perbirthcert'];
    $blood= $_POST['perbloodgroup'];
	$dob= $_POST['perdob'];
	$gender= $_POST['pergender'];
    $history= $_POST['perprevioushistory'];
	$chronic= $_POST['perchronicdisease'];
    $job=$_POST['perjobtitle'];
    $apartment= $_POST['perapartment'];
    $street=$_POST['perstreet'];
    $city= $_POST['percity'];
	$portal= $_POST['perportal'];


	$query = oci_parse($conn,"declare
a nvarchar2(50);
b numeric;
begin
create_person(a,'$name','','','$phone','$job','$height','$weight','$blood','$gender','$history','$chronic','$apartment','$street' ,'$city','$portal','$birth' , to_date('$dob','yyyy-mm-dd'),b);
end;");
	$result = oci_execute($query);
   // $query=oci_parse($conn,"select max(person_id) from person;");
    //$result2=oci_execute($query);
    //echo $input;
    //$result2=oci_execute($input);
	//$query = oci_parse($conn, "INSERT INTO person_SIGNIN(person_name,person_email,person_height,person_weight,person_phonenumber,person_bloodgroup,person_dob,person_gender,person_prevhistory,person_chronicdis,person_profession,person_apartment,person_street,person_city,person_portal,person_password) values ('$name','$email','$height','$weight','$phone','$blood','$dob','$gender','$history','$chronic','$job','$apartment','$street','$city','$portal','$password')");
	
	
}*/
?>