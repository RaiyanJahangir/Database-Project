<!DOCTYPE html>
<html>
<head>
<style>
.butbox {
  width: 426px;
  margin: 35px auto;
  position: relative;
  box-shadow: 0 0 20px 9px #ff61241f;
  border-radius: 30px;
}

.togbtn {
  padding: 10px 30px;
  cursor: pointer;
  background: transparent;
  border: 0;
  outline: none;
  position: relative;
}
#bton {
  top: 0;
  left: 0;
  position: absolute;
  width: 213px;
  height: 100%;
  background: linear-gradient(to right, #ff105f, #ffad06);
  border-radius: 30px;
  transition: 0.15s;
}
</style>
</head>
<body>
    <?php
    $_SESSION['plogin'] = false;
    include "navbar.php";
    $_SESSION['signup']=1;
    include "header-small.php";
    ?>
<!-- Contact Section -->
<img style="margin: 0px auto" src="images/Organization login/1.png" class="img-responsive" alt="Appointment">
<div class="butbox">
                <div id="bton"></div>
                <button type="button" class="togbtn" onclick="person()" style="width: 200px; color: black">Register as a person</button>
                <button type="button" class="togbtn" onclick="organization()" style="width: 213px;color: black">Register from an organization</button>
            </div>
	<div id="psign" style="display: block;">
                <?php
                    include "person-signup.php"
                ?>
            </div>
            <div id="osign" style="display: none;">
                <?php
                    include "Organizationsignup.php"
                ?>
            </div>
        </div>
    </div>
<script>
            var x = document.getElementById("psign");
            var y = document.getElementById("osign");
            var z=document.getElementById("bton");
        function organization(){
            z.style.left = "+213px"
            y.style.display="block";
            x.style.display = "none";
        }
        function person() {
            z.style.left = "+0px"
            x.style.display = "block";
            y.style.display = "none";
        }
        </script>
    <?php
    include "footer.php"
    ?>
</body>
</html>