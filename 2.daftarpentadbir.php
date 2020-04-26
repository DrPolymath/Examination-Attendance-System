<?php
require 'functions.php';
// global

//cek button submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {
//cek data berjaya ditambah atau tidak
    if ((empty($_POST["NoKp"])&&empty($_POST["NoPas"]))||(!empty($_POST["NoKp"])&&!empty($_POST["NoPas"]))){
    echo "
        <script>
          alert('Sila masukkan Kad Pengenalan atau No Passport');
          document.location.href='2.daftarpentadbir.php';
        </script>
    ";
    }elseif ($_POST["KataLaluan"]!=$_POST["SahkanKataLaluan"]){
    echo "
        <script>
          alert('Kata laluan tidak sepadan.');
          document.location.href='2.daftarpentadbir.php';
        </script>
    ";
    } else {
        if (semak_idstaff($_POST)){
            if (verikasi_kod($_POST)){
                daftar_pentadbir($_POST);
                echo "
            <script>
            alert('Pendaftaran berjaya.');
            document.location.href='2.daftarpentadbir.php';
            </script>
        ";
            } else {
                echo "
            <script>
            alert('Verikasi Kod tidak sah.');
            document.location.href='2.daftarpentadbir.php';
            </script>
        ";
            }
        } else {
            echo "
        <script>
          alert('Id Staff telah didaftarkan.');
          document.location.href='2.daftarpentadbir.php';
        </script>
    ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar Pentadbir</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main1.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</head>

<body>
    <style>
        body{
            background-image: url(images/TTA_library.jpg)
        }
    </style>
        <div class="wrapper wrapper--w790" style="padding: 40px;">
            <div class="card card-5">
                <div class="card-heading">
                    <h1 class="title">Daftar Pentadbir</h1>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="NamaStaff" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">IDStaff</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="varchar" name="Idstaff" maxlength="16" required>
                                </div>
                            </div>
                        </div>
                            <div class="form-row">
                            <div class="name">No Kad Pengenalan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="integer" name="NoKp" maxlength="12">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Passport</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="integer" name="NoPas" maxlength="10" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Katalaluan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="KataLaluan" maxlength="16" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Sahkan Katalaluan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="SahkanKataLaluan" required>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="name">Jabatan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px;">
                                        <select name="Jabatan" required>
                                            <option value="" disabled selected>Pilih Jabatan Diwakili</option>
                                            <option value="PPA">PPA</option>
                                            <option value="FPTP">JTM</option>
                                            <option value="FSKTM">FSKTM</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    </div>
                           </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fakulti</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px;">
                                        <select name="Fakulti" required>
                                            <option value="" disabled selected>Pilih Fakulti Diwakili</option>
                                            <option value="FSKTM">FSKTM</option>
                                            <option value="PPD">PPD</option>
                                            <option value="FPTP">FPTP</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    </div>
                           </div>
                        </div>
                        <div class="form-row">
                            <div class="name">ID Verifikasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Verifikasi" maxlength="16" required>
                                </div>
                            </div>
                                
                        </div>
                        
                        
                        <div class="justify-content-center" align="right">
                            <a class="btn btn--radius-2 btn--red" href="1.login.php" style="text-decoration:none;">Kembali</a>
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="daftar">Daftar</button>
                        </div><!-- tambahkan confirmation -->
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->