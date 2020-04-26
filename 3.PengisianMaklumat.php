<?php
require 'functions.php';
require 'updateDatabase.php';
$Data="";
//cek button submit sudah ditekan atau belum
if (isset($_POST["masukkanDataProgram"])) {
//cek data berjaya ditambah atau tidak
  if(semak_program($_POST)){
    daftar_program($_POST);
    echo "
        <script>
          alert('Maklumat program berjaya dimasukkan!');
          document.location.href='3.PengisianMaklumat.php';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('Maklumat program tidak berjaya dimasukkan! Maklumat tersebut telah dimasukkan.');
          document.location.href='3.PengisianMaklumat.php';
        </script>
    ";
  }
}

if (isset($_POST["masukkanDataKursus"])) {
      if(semak_kursus($_POST)){
        daftar_kursus($_POST);
        echo "
            <script>
              alert('Maklumat kursus berjaya dimasukkan!');
              document.location.href='3.PengisianMaklumat.php';
            </script>
        ";
      }else{
        echo "
            <script>
              alert('Maklumat kursus tidak berjaya dimasukkan! Maklumat tersebut telah dimasukkan.');
              document.location.href='3.PengisianMaklumat.php';
            </script>
        ";
      }
    }

    if (isset($_POST["masukkanDataPensyarah"])) {
          if(semak_pensyarah($_POST)){
            daftar_pensyarah($_POST);
            echo "
                <script>
                  alert('Maklumat pensyarah berjaya dimasukkan!');
                  document.location.href='3.PengisianMaklumat.php';
                </script>
            ";
          }else{
            echo "
                <script>
                  alert('Maklumat pensyarah tidak berjaya dimasukkan! Maklumat tersebut telah dimasukkan.');
                  document.location.href='3.PengisianMaklumat.php';
                </script>
            ";
          }
        }

        if (isset($_POST["masukkanDataTempat"])) {
            //cek data berjaya ditambah atau tidak
              if(semak_tempat($_POST)){
                daftar_tempat($_POST);
                echo "
                    <script>
                      alert('Maklumat tempat peperiksaan berjaya dimasukkan!');
                      document.location.href='3.PengisianMaklumat.php';
                    </script>
                ";
              }else{
                echo "
                    <script>
                      alert('Maklumat tempat peperiksaan tidak berjaya dimasukkan! Maklumat tersebut telah dimasukkan.');
                      document.location.href='3.PengisianMaklumat.php';
                    </script>
                ";
              }
            }

// PADAM DATA
if(isset($_GET['padamDataProgram'])){
  padamDataProgram($_GET['padamDataProgram']);
}
if(isset($_GET['padamDataKursus'])){
  padamDataKursus($_GET['padamDataKursus']);
}
if(isset($_GET['padamDataPensyarah'])){
  padamDataPensyarah($_GET['padamDataPensyarah']);
}
if(isset($_GET['padamDataTempat'])){
  padamDataTempat($_GET['padamDataTempat']);
}

// KEMASKINI DATA
if(isset($_GET['simpanDataProgram'])){
  updateProgram($_GET);
}

if(isset($_GET['simpanDataKursus'])){
  updateKursus($_GET);
}

if(isset($_GET['simpanDataPensyarah'])){
  updatePensyarah($_GET);
}

if(isset($_GET['simpanDataTempat'])){
  updateTempat($_GET);
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
    <title>Sistem Kehadiran Peperiksaan</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> 
</head>

<body>
   
         <style>
        body{
            background-image: url(images/TTA_library.jpg)
            
        }
        
    </style>
    <?php require 'nav.php'; ?>
           <div class="wrapper" align="center"> 
       
           <div class="card card-5" style="width: 900px; margin: 40px;">
                <div class="card-heading">
                    <h1 class="title">Pendaftaran Maklumat <h1>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="name">Nama Program</div>
                                    <div class="value" >
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="NamaProgram" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Fakulti</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="Fakulti" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button class="btn btn--radius-2 btn--green" type="button" data-toggle="modal" data-target="#programModal">Lihat Senarai Program</button>
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="masukkanDataProgram">Masukkan Data</button>
                                </form>
                            </div>
                            <div class="col">
                                <form method="POST">
                                <div class="form-row">
                                    <div class="name">Kod Kursus</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="varchar" name="KodKursus" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Nama Kursus</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="NamaKursus" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Seksyen yang Berdaftar</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="number" name="Seksyen" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn--radius-2 btn--green" type="button" data-toggle="modal" data-target="#kursusModal">Lihat Senarai Kursus</button>
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="masukkanDataKursus">Masukkan Data</button>
                                </form>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 40px">
                            <div class="col">
                                <form method="POST">
                                <div class="form-row">
                                    <div class="name">Id Pensyarah</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="IdPensyarah" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Nama Pensyarah</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="NamaPensyarah" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn--radius-2 btn--green" type="button" data-toggle="modal" data-target="#pensyarahModal">Lihat Senarai Pensyarah</button>
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="masukkanDataPensyarah">Masukkan Data</button>
                                </form>
                            </div>
                            <div class="col">
                                <form method="POST">
                                <div class="form-row">
                                    <div class="name">Tempat Peperiksaan</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="varchar" name="Tempat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Kapasiti</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="number" name="Kapasiti" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn--radius-2 btn--green" type="button" data-toggle="modal" data-target="#tempatModal">Lihat Senarai Tempat</button>
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="masukkanDataTempat">Masukkan Data</button>
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
    
    <!-- Modal -->
<div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Program</h4>
      </div>
      <div class="modal-body">
        <?php
            janaJadualProgram();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getProgramIndicator(Program, Fakulti){
  document.getElementById("NamaProgramBaru").value = Program;
  document.getElementById("FakultiBaru").value = Fakulti;
  document.getElementById("simpanDataProgram").value = Program;
}
</script>


<div class="modal fade" id="programFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Program</h4>
      </div>
      <div class="modal-body" id="dataProgram">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">Nama Program</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaProgramBaru" class="input--style-5" type="text" name="NamaProgramBaru"  required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Fakulti</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="FakultiBaru" class="input--style-5" type="text" name="FakultiBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <td><button id="simpanDataProgram" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataProgram">Simpan</button></td>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#programModal">Kembali</button>
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kursusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Kursus</h4>
      </div>
      <div class="modal-body">
        <?php
            janaJadualKursus();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getKursusIndicator(KodKursus,NamaKursus,JumlahSeksyen){
  document.getElementById("KodKursusBaru").value = KodKursus;
  document.getElementById("NamaKursusBaru").value = NamaKursus;
  document.getElementById("JumlahSeksyenBaru").value = JumlahSeksyen;
  document.getElementById("simpanDataKursus").value = KodKursus;
}
</script>

<div class="modal fade" id="kursusFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Kursus</h4>
      </div>
      <div class="modal-body" id="dataProgram">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">Kod Kursus</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="KodKursusBaru" class="input--style-5" type="text" name="KodKursusBaru"  required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Nama Kursus</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaKursusBaru" class="input--style-5" type="text" name="NamaKursusBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Jumlah Seksyen</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="JumlahSeksyenBaru" class="input--style-5" type="text" name="JumlahSeksyenBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <td><button id="simpanDataKursus" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataKursus">Simpan</button></td>
        </div>
      </form>
      </div>
      <div class="modal-footer">
       <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#kursusModal">Kembali</button>
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pensyarahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Pensyarah</h4>
      </div>
      <div class="modal-body">
        <?php
            janaJadualPensyarah();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getPensyarahIndicator(IdPensyarah,NamaPensyarah){
  document.getElementById("IdPensyarahBaru").value = IdPensyarah;
  document.getElementById("NamaPensyarahBaru").value = NamaPensyarah;
  document.getElementById("simpanDataPensyarah").value = IdPensyarah;
}
</script>

<div class="modal fade" id="pensyarahFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Pensyarah</h4>
      </div>
      <div class="modal-body" id="dataPensyarah">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">Id Pensyarah</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="IdPensyarahBaru" class="input--style-5" type="text" name="IdPensyarahBaru"  required style="width: 400px">
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
               <td><button id="simpanDataPensyarah" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataPensyarah">Simpan</button></td>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#pensyarahModal">Kembali</button>
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tempatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Tempat Peperiksaan</h4>
      </div>
      <div class="modal-body">
        <?php
            janaJadualTempat();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getTempatIndicator(NamaTempat,Kapasiti){
  document.getElementById("NamaTempatBaru").value = NamaTempat;
  document.getElementById("KapasitiBaru").value = Kapasiti;
  document.getElementById("simpanDataTempat").value = NamaTempat;
}
</script>

<div class="modal fade" id="tempatFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Tempat</h4>
      </div>
      <div class="modal-body" id="dataTempat">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">Nama Tempat</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaTempatBaru" class="input--style-5" type="text" name="NamaTempatBaru"  required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Kapasiti</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="KapasitiBaru" class="input--style-5" type="text" name="KapasitiBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <td><button id="simpanDataTempat" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataTempat" >Simpan</button></td>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#tempatModal">Kembali</button>
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


</body>

</html>
<!-- end document-->