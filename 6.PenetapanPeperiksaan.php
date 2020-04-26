<?php
require 'functions.php';
require 'updateDatabase.php';

//cek button submit sudah ditekan atau belum
if (isset($_POST["tetapkanPeperiksaan"])) {
//cek data berjaya ditambah atau tidak
  if(penetapan_peperiksaan($_POST)>0){
    echo "
        <script>
          alert('Peperiksan Berjaya Detetapkan!');
          document.location.href='6.PenetapanPeperiksaan.php';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('Peperiksaan Gagal Ditetapkan');
          document.location.href='6.PenetapanPeperiksaan.php';
        </script>
    ";
  }
}
if(isset($_GET['padamDataPeperiksaan'])){
  padamDataPeperiksaan($_GET['padamDataPeperiksaan']);
}

if(isset($_GET['simpanDataPeperiksaan'])){
  updatePeperiksaan($_GET);
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
    <title>Peperiksaan</title>

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
</head>

<body>
   <style>
        body{
            background-image: url(images/TTA_library.jpg)
        }
        
    </style>
    <?php require 'nav.php'; ?>
        <div class="wrapper" style="padding: 40px;width: 800px">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Tetapan Peperiksaan</h2>
                </div>
                <div class="card-body" align="center">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Jenis Peperiksaan</div>
                            <div class="value">
                                <div class="input-group" >
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 400px">
                                        <select name="JenisPeperiksaan" required>
                                            <option disabled selected value="">Pilih Jenis</option>
                                            <option value="Kuiz">Kuiz</option>
                                            <option value="Ujian">Ujian</option>
                                            <option value="Peperiksaan Akhir">Peperiksaan Akhir</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Kursus</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 400px">
                                        <select name="NamaKursus" required>
                                            <option disabled selected value="">Pilih Kursus</option>
                                            <?php
                                            global $conn;
                                            $sql = "SELECT NamaKursus FROM Kursus";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo'<option value="'.$row["NamaKursus"].'">'.$row["NamaKursus"].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Pensyarah</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 400px">
                                        <select name="NamaPensyarah" required>
                                            <option disabled selected value="">Pilih nama pensyarah</option>
                                            <?php
                                            global $conn;
                                            $sql = "SELECT NamaPensyarah FROM pensyarah";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo'<option value="'.$row["NamaPensyarah"].'">'.$row["NamaPensyarah"].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Tempat</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 400px" >
                                        <select name="NamaTempat" required>
                                            <option disabled selected value="">Pilih Tempat</option>
                                            <?php
                                            global $conn;
                                            $sql = "SELECT NamaTempat FROM Tempat";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo'<option value="'.$row["NamaTempat"].'">'.$row["NamaTempat"].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Tarikh</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="Tarikh" required style="width: 400px" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Masa</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="time" name="Masa" required style="width: 400px" required>
                                </div>
                            </div>
                        </div>  
                        <div align="center">
                            <button class="btn btn--radius-2 btn--green" type="button" data-toggle="modal" data-target="#peperiksaanModal">Lihat Senarai Peperiksaan</button>
                            <button class="btn btn--radius-2 btn--blue" name="tetapkanPeperiksaan" type="submit">Tetapkan Peperiksaan</button>
                        </div>  <!-- tambahkan confirmation -->
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="peperiksaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Peperiksaan</h4>
      </div>
      <div class="modal-body">
        <?php
            janaJadualPeperiksaan();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="peperiksaanFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Peperiksaan</h4>
      </div>
      <div class="modal-body" id="dataPeperiksaan">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">Jenis Peperiksaan</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="JenisPeperiksaanBaru" class="input--style-5" type="text" name="JenisPeperiksaanBaru"  required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Kursus</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="KursusBaru" class="input--style-5" type="text" name="KursusBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Nama Pensyarah</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaPensyarahBaru" class="input--style-5" type="text" name="NamaPensyarahBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Tempat</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="TempatBaru" class="input--style-5" type="text" name="TempatBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Tarikh</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="TarikhBaru" class="input--style-5" type="date" name="TarikhBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Masa</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="MasaBaru" class="input--style-5" type="time" name="MasaBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <button id="simpanDataPeperiksaan" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataPeperiksaan" >Simpan</button>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#peperiksaanModal">Kembali</button>
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getPeperiksaanIndicator(JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa){
  document.getElementById("JenisPeperiksaanBaru").value = JenisPeperiksaan;
  document.getElementById("KursusBaru").value = Kursus;
  document.getElementById("NamaPensyarahBaru").value = NamaPensyarah;
  document.getElementById("TempatBaru").value = Tempat;
  document.getElementById("TarikhBaru").value = Tarikh;
  document.getElementById("MasaBaru").value = Masa;
  document.getElementById("simpanDataPeperiksaan").value = JenisPeperiksaan;
}
</script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->