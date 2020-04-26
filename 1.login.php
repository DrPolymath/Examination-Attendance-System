<?php
require 'functions.php';

if (isset($_POST["login"])) {
$staff_id = $_POST['Idstaff'];
$staff_katalaluan = $_POST['KataLaluan'];
    
	
    	$SQL = "SELECT * FROM pentadbir WHERE Idstaff = '$staff_id' LIMIT 1";
    	$result = mysqli_query($conn,$SQL); 
		
        if(mysqli_num_rows($result) === 1){ // CATCH/FETCH RESULT
                
                $sql1 = "SELECT * FROM pentadbir WHERE KataLaluan = '$staff_katalaluan' LIMIT 1";  
                $result1 = mysqli_query($conn,$sql1); // RUN SQL STATEMENT
            
                if(mysqli_num_rows($result1) === 1) { // CATCH/FETCH RESULT
                    $_SESSION['ID'] = $staff_id;
                    header("Location:6.PenetapanPeperiksaan.php");
                }
            
                else{
                    //include "login.php";
                    echo "<br/><center>ID Staff Salah or PASSWORD.</center>";
                    
                }
        }
    
        else{
            //include "login.php";
            echo "<br/><center>Invalid ADMIN ID or PASSWORD.</center>";
        }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log Masuk</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/TTA_library.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100">
						<i class="z"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Daftar Masuk SKPMBCJ
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="Idstaff" placeholder="ID Pentadbir">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="KataLaluan" placeholder="Katalaluan">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Daftar Masuk
						</button>
					</div>
					<div align="center">
						<a class="nav-link" href="2.daftarpentadbir.php" style="color: white;">Buka Akaun</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>