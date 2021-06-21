<?php
    include_once '../database.php';
    include "navbar.php";
    include "header-small.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <div class="row" style="padding: 20px;">
            <h1 style="text-align: center;color: rgb(0, 162, 255);">Test</h1>
            <form action="check.php" method="post">
                <?php
                    if(isset($_POST['test_btn']))
                    {
                    $id=$_POST['per_id'];
                    $did=$_POST['don_id'];
                    $type=$_POST['type'];
                    }
                ?>
                <div style="padding:1% 2%;">
                    <h4 style="display: inline;padding:10px 20px;color: rgb(255,0,0);">Donation Request for : </h4>
                    <h5 style="display: inline;padding:10px 20px;color: rgb(220,20,60);">
                    <?php
                    if(isset($_POST['test_btn']))
                    {
                    echo $_POST['type'];
                    }
                    ?>
                    </h5>
                </div>
                <div style="padding:1% 2%;">
                    <h4 style="display: inline;padding:10px 20px;color: rgb(255,0,0);">Last Date of Donation : </h4>
                    <h5 style="display: inline;padding:10px 20px;color: rgb(220,20,60);">
                    <?php
                    if(isset($_POST['test_btn']))
                    {
                    include_once '../database.php';
                    $query = oci_parse($conn, "select max(blood_datedonation),trunc(sysdate)-TO_date(max(blood_datedonation), 'dd-mon-yy') 
                    from blood_bank where blood_bank_donor_id='$id' and blood_bank_blood_type='$type'");
                        oci_execute($query);
                    $row = oci_fetch_array($query, OCI_BOTH);
                    if(!$row){$row[0]="none";$row[1]="no";}
                    echo $lod=$row[0];
                    echo '('.$row[1].' days)';
                    }
                    ?>
                    </h5>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">Hepatities B : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hepb" id="optionsRadios1" value="ELIGIBLE" checked>
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="hepb" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">Hepatities C : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hepc" id="optionsRadios1" value="ELIGIBLE" checked>
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="hepc" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">HIV : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hiv" id="optionsRadios1" value="ELIGIBLE" checked>
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="hiv" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">SYPHILIES : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="syp" id="optionsRadios1" value="ELIGIBLE" checked>
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="syp" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">Whole Blood : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="wb" id="optionsRadios1" value="ELIGIBLE" >
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="wb" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">Plasma : </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="plasma" id="optionsRadios1" value="ELIGIBLE">
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="plasma" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">WBC :  </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="wbc" id="optionsRadios1" value="ELIGIBLE">
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="wbc" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">RBC :  </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rbc" id="optionsRadios1" value="ELIGIBLE">
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="rbc" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">PLATELETS :  </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pl" id="optionsRadios1" value="ELIGIBLE">
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="pl" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">CRYO :  </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cryo" id="optionsRadios1" value="ELIGIBLE">
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="cryo" id="optionsRadios2" value="NOT ELIGIBLE">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <fieldset class="form-group" style="padding-left: 2%;">
                        <h4 style="display: inline;padding:10px 20px;color: rgb(0, 162, 255);">STATUS :  </h4>
                        <div class="form-check" style="display: inline;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="PASSED" checked>
                                Eligible
                            </label>
                            <label class="form-check-label" style="padding-left: 30%;">
                                <input type="radio" class="form-check-input"  name="status" id="optionsRadios2" value="NOT PASSED">
                                Not Eligible
                              </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group text-center">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="did" value="<?php echo $did ?>">
                        <input type="hidden" name="lod" value="<?php echo $lod ?>">
                        <button type="submit" class="btn-style-one" name="test">Update Test Result</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
</body>
</html>
<?php
    include "footer.php";
?>