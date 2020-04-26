<?php
require 'functions.php';

//cek button submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {
//cek data berjaya ditambah atau tidak
  if(daftar_capjari($_POST)>0){
    echo "
        <script>
          alert('Pendaftaran Data Cap Jari Berjaya!');
          document.location.href='5.PendaftaranCapJari.php';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('Pendaftaran Data Cap Jari Gagal');
          document.location.href='5.PendaftaranCapJari.phpp';
        </script>
    ";
  }
}

// if (isset($_POST["senaraiPelajar"])) {
//   janaSenaraiPelajar($_POST);
// }



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
    <title>Penjanaan Kehadiran Peperiksaan</title>

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
    <div class="wrapper" style="padding: 40px;width: 900px"> 
      <div class="card card-5" align="center">
          <div class="card-heading">
            <h1 class="title">PENDAFTARAN CAP JARI PELAJAR <h1>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="form-row">
                <div class="name">Nama Program</div>
                <div class="value">
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search" style="width: 450px">
                          <select name="NamaProgram" required>
                            <option disabled selected value="">Pilih Program</option>
                              <?php
                                global $conn;
                                $sql = "SELECT NamaProgram FROM program";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                    echo'<option value="'.$row["NamaProgram"].'">'.$row["NamaProgram"].'</option>';
                                  }
                                }
                              ?>
                            </select>
                          <div class="select-dropdown"></div>
                        </div>
                    </div>
                </div>
              </div>
              <button type="submit" class="tutup btn btn--radius-2 btn--green" nama="senaraiPelajar">Cari</button>
            </form>
            <div>
            
              

            <?php
              if (isset($_POST["NamaProgram"])) {
                $pelajar_namaprogram=htmlspecialchars($_POST["NamaProgram"]);
                $sql = "SELECT NoMatrik,NamaPelajar,Fakulti FROM pelajar WHERE NamaProgram='".$pelajar_namaprogram."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo 
                    '
                    <div class="value" style="margin: 40px 0px">
                      <div class="input-group">
                        <input id="cariPelajar" class="input--style-5" type="text" name="cariPelajar" placeholder="Carian..." style="width: 650px;">
                      </div>
                    </div>

                    <form id="kemaskiniDataPelajar" method="get">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">NoMatrik</th>
                          <th scope="col">NamaPelajar</th>
                          <th scope="col">Fakulti</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="paparPelajar">';
                  while($row = mysqli_fetch_assoc($result)) {
                      echo'
                      <tr>
                        <td>'.$row["NoMatrik"].'</td>
                        <td>'.$row["NamaPelajar"].'</td>
                        <td>'.$row["Fakulti"].'</td>
                        <td><button class="btn btn--radius-2 btn--blue" type="submit" name="daftarCapJari" >Daftar Cap Jari</button></td>
                      </tr>
                      ';
                  }
                  echo '</tbody>
                  </table>
                  </form>';
                }
              }

            ?>
            </div>
          </div>
      </div>
    </div>
    <script>
        $(document).ready(function(){
          $("#cariPelajar").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#paparPelajar tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
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