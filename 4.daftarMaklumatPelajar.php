<?php
require 'functions.php';
require 'updateDatabase.php';
$NoMatrikIndicator = '';
//cek button submit sudah ditekan atau belum
// if (isset($_POST["daftarPelajar"])) {
// //cek data berjaya ditambah atau tidak
//     if ((empty($_POST["NoKp"])&&empty($_POST["NoPas"]))||(!empty($_POST["NoKp"])&&!empty($_POST["NoPas"]))){
//     // echo "
//     //     <script>
//     //       alert('Sila masukkan Kad Pengenalan atau No Passport');
//     //       document.location.href='4.daftarMaklumatPelajar.php';
//     //     </script>
//     // ";
//     }else if (semak_nomatrik($_POST)){
//         //daftar_pelajar($_POST);
//         //daftar_kursusPelajar($_POST);
//         // echo "
//         // <script>
//         //   alert('Pendaftaran Pelajar Berjaya!');
//         //   document.location.href='4.daftarMaklumatPelajar.php';
//         // </script>
//         // ";
//     } else {
//     // echo "
//     //     <script>
//     //       alert('Pendaftaran gagal. Rekod telah wujud.');
//     //       document.location.href='4.daftarMaklumatPelajar.php';
//     //     </script>
//     // ";
//     }
// }

if(isset($_GET['simpanDataPelajar'])){
  updatePelajar($_GET);
}
if(isset($_GET['padamDataPelajar'])){
  padamDataPelajar($_GET['padamDataPelajar']);
}
// if(isset($_GET['padamKursusPelajar'])){
//   echo "
//   <script>
//     alert('Kursus Pelajar berjaya dipadam!');
//     document.location.href='4.daftarMaklumatPelajar.php';
//   </script>
//   ";
//   global $conn;
//   $query = "DELETE FROM kursuspelajar WHERE NamaKursus='".$_GET['padamKursusPelajar']."'" ;
//   mysqli_query($conn,$query) or die(mysqli_error($conn));
//   echo "
//   <script>
//     alert('Kursus Pelajar berjaya dipadam!');
//     document.location.href='4.daftarMaklumatPelajar.php';
//   </script>
//   ";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kehadiran Peperiksaan</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <h1 class="title">Pendaftaran Maklumat Pelajar <h1>
                </div>
                <div class="card-body">
                    <form id="pelajar" method="POST">
                    <div class="form-row">
                            <div class="name">No Matrik</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="NoMatrik" style="width: 415px" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="NamaPelajar" style="width: 415px" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Kad Pengenalan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="integer" name="NoKp" style="width: 415px">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Passport</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="NoPas" style="width: 415px">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Program</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px">
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
                        <div class="form-row">
                            <div class="name">Fakulti</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px">
                                        <select name="Fakulti" required>
                                            <option disabled selected value="">Pilih Fakulti</option>
                                        <?php
                                            global $conn;
                                            $sql = "SELECT Fakulti FROM program";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo'<option value="'.$row["Fakulti"].'">'.$row["Fakulti"].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="name">Nama Pensyarah</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px">
                                        <select name="NamaPensyarah">
                                            <option disabled="disabled" selected="selected">Pilih nama pensyarah</option>
                                        <?php
                                            // global $conn;
                                            // $sql = "SELECT NamaPensyarah FROM pensyarah";
                                            // $result = mysqli_query($conn, $sql);
                                            // if (mysqli_num_rows($result) > 0) {
                                            //     while($row = mysqli_fetch_assoc($result)) {
                                            //         echo'<option value="'.$row["NamaPensyarah"].'">'.$row["NamaPensyarah"].'</option>';
                                            //     }
                                            // }
                                        ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="name">Tahun Pengajian</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search" style="width: 415px">
                                        <select name="TahunPengajian" required>
                                            <option disabled selected value="">Pilih Tahun Dan Semester</option>
                                            <option value="Tahun1 Semester1">Tahun 1 Semester 1</option>
                                            <option value="Tahun1 Semester2">Tahun 1 Semester 2</option>
                                            <option value="Tahun2 Semester1">Tahun 2 Semester 1</option>
                                            <option value="Tahun2 Semester2">Tahun 2 Semester 2</option>
                                            <option value="Tahun3 Semester1">Tahun 3 Semester 1</option>
                                            <option value="Tahun3 Semester2">Tahun 3 Semester 2</option>
                                            <option value="Tahun4 Semester1">Tahun 4 Semester 1</option>
                                            <option value="Tahun4 Semester2">Tahun 4 Semester 2</option>
                                            <option value="Extend">Extend</option>1
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <button type="button" class="btn btn--radius-2 btn--green" data-toggle="modal" data-target="#pelajarModal">Lihat Maklumat Pelajar</button>
                        <button type="submit" class="btn btn--radius-2 btn--blue" name="daftarPelajar" >Daftar Kursus Pelajar</button>
            </form>
            </div>
        </div>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="daftarKursusModal" method="POST">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form method="POST" id="kursusPelajar">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Daftar Kursus Pelajar</h4>
      </div>
      <div>
      <div class="modal-body">
                        <div class="container" style="width: 700px;padding: 20px;">
                            <div class="table-responsive">
                                <span id="error"></span>
                                <table class="table table-bordered" id="item_table">
                                <tr>
                                <th>Pilih Kursus</th>
                                <th>Pilih Seksyen</th>
                                <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                                </tr>
                                </table>
                            </div>
                        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn--radius-2 btn--blue" >Simpan Data</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="pelajarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width:1300px">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Pelajar</h4>
      </div>
      <div class="modal-body" align="center">


        <?php
            global $conn;
            $sql = "SELECT NoMatrik,NamaPelajar,NoKp,NoPas,NamaProgram,Fakulti,TahunPengajian FROM pelajar";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              echo 
                '
                    <div class="value" style="margin: 20px 0px" >
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
                      <th scope="col">NoKp</th>
                      <th scope="col">NoPas</th>
                      <th scope="col">NamaProgram</th>
                      <th scope="col">Fakulti</th>
                      <th scope="col">TahunPengajian</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody id="paparPelajar">';
              while($row = mysqli_fetch_assoc($result)) {
                  echo'
                  <tr>
                    <td>'.$row["NoMatrik"].'</td>
                    <td>'.$row["NamaPelajar"].'</td>
                    <td>'.$row["NoKp"].'</td>
                    <td>'.$row["NoPas"].'</td>
                    <td>'.$row["NamaProgram"].'</td>
                    <td>'.$row["Fakulti"].'</td>
                    <td>'.$row["TahunPengajian"].'</td>
                    <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#pelajarFormModal" onclick="getPelajarIndicator(\''.$row["NoMatrik"].'\',\''.$row["NamaPelajar"].'\',\''.$row["NoKp"].'\',\''.$row["NoPas"].'\',\''.$row["NamaProgram"].'\',\''.$row["Fakulti"].'\',\''.$row["TahunPengajian"].'\')">Kemaskini</button></td>
                    <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataPelajar" value="'.$row["NoMatrik"].'">Padam</button></td>
                    <td><button type="button" class="btn btn--radius-2 btn--blue lihatKursusPelajar" data-toggle="modal" data-dismiss="modal" data-target="#kursusPelajarModal" value="'.$row["NoMatrik"].'" onclick="getPelajarNoMatrik(\''.$row["NoMatrik"].'\')">Lihat Kursus Pelajar</button></td>
                  </tr>
                  ';
              }
              echo '</tbody>
              </table>
              </form>';
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kursusPelajarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Kursus Pelajar</h4>
      </div>
      <div class="modal-body">
        <div id="paparKursusPelajar">
        </div>
        <div align="center">
                      <button type="button" id="tambahKursus" class="btn btn--radius-2 btn--blue">Tambah Kursus</button>
                      <div id="kandunganJadual" style="display:none;">
                        <form method="POST" id="tambahKursusPelajar">
                        <div class="container" style="width: 700px;padding: 20px;">
                            <div class="table-responsive">
                                <span id="error"></span>
                                <table class="table table-bordered" id="jadual">
                                <tr>
                                <th>Pilih Kursus</th>
                                <th>Pilih Seksyen</th>
                                <th><button type="button" name="tambah" class="btn btn-success btn-sm tambah"><span class="glyphicon glyphicon-plus"></span></button></th>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <input class="input--style-5" type="text" id="simpanTambahKursus" name="simpanTambahKursus" style="width: 415px" hidden>
                        <button type="submit"  class="btn btn--radius-2 btn--blue" >Simpan</button>
                        </form>
                      </div>
                      
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal" data-toggle="modal" data-target="#pelajarModal">Kembali</button>
        <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
function getPelajarIndicator(NoMatrik,NamaPelajar,NoKp,NoPas,NamaProgram,Fakulti,TahunPengajian){
  document.getElementById("NoMatrikBaru").value = NoMatrik;
  document.getElementById("NamaPelajarBaru").value = NamaPelajar;
  document.getElementById("NoKpBaru").value = NoKp;
  document.getElementById("NoPasBaru").value = NoPas;
  document.getElementById("NamaProgramBaru").value = NamaProgram;
  document.getElementById("FakultiBaru").value = Fakulti;
  document.getElementById("TahunPengajianBaru").value = TahunPengajian;
  document.getElementById("simpanDataPelajar").value = NoMatrik; 
}

function getPelajarNoMatrik(NoMatrik){
  document.getElementById("simpanTambahKursus").value = NoMatrik;
}
</script>

<div class="modal fade" id="pelajarFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kemaskini Pelajar</h4>
      </div>
      <div class="modal-body" id="dataPelajar">
        
      <form method="GET">
        <div class="card-body" align="center">
               <div class="form-row">
                 <div class="name">No Matrik</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NoMatrikBaru" class="input--style-5" type="text" name="NoMatrikBaru"  required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Nama Pelajar</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaPelajarBaru" class="input--style-5" type="text" name="NamaPelajarBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Kad Pengenalan</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NoKpBaru" class="input--style-5" type="text" name="NoKpBaru" style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Passport</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NoPasBaru" class="input--style-5" type="text" name="NoPasBaru" style="width: 400px">
                   </div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="name">Nama Program</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="NamaProgramBaru" class="input--style-5" type="text" name="NamaProgramBaru" required style="width: 400px">
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
               <div class="form-row">
                 <div class="name">Tahun Pengajian</div>
                 <div class="value">
                   <div class="input-group">
                       <input id="TahunPengajianBaru" class="input--style-5" type="text" name="TahunPengajianBaru" required style="width: 400px">
                   </div>
                 </div>
               </div>
               <td><button id="simpanDataPelajar" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataPelajar" >Simpan</button></td>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- Jquery JS-->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

<script>

$('.lihatKursusPelajar').on('click', function(event){
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "paparKursusPelajar.php",
      data:'NoMatrik='+$(this).val(),
      success: function(data){
        $("#paparKursusPelajar").html(data);
      }
    });
});

var NoMatrik = '';
$('#pelajar').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    if(jQuery('input[name="NoKp"]').val()==''&&jQuery('input[name="NoPas"]').val()==''){
        alert('Sila masukkan No Kad Pengenalan atau No Passport!');

    } else if (jQuery('input[name="NoKp"]').val()!=''&&jQuery('input[name="NoPas"]').val()!=''){
        alert('Sila masukkan No Kad Pengenalan atau No Passport SAHAJA!');
    } else {
        NoMatrik = jQuery('input[name="NoMatrik"]').val();
        $.ajax({
            type: "POST",
            url: "daftarPelajar.php",
            data: form_data,
            success: function(data){
                $('#daftarKursusModal').modal('show');
                
            }
        });
    }
});

$('#kursusPelajar').on('submit', function(e){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "daftarKursusPelajar.php",
        data:"NoMatrik="+ NoMatrik + "&" + form_data,
        success: function(data){
            alert('Pendaftaran Kursus Pelajar Berjaya!');
            document.location.href='4.daftarMaklumatPelajar.php';
        }
    });
});

$('#tambahKursusPelajar').on('submit', function(e){
    e.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "daftarKursusPelajar.php",
        data: form_data,
        success: function(data){
            alert('Penambahan Kursus Pelajar Berjaya!');
            document.location.href='4.daftarMaklumatPelajar.php';
        }
    });
});

$(document).ready(function(){
  
 $(document).on('click', '.add', function(){
  var html = '';
  html +='""';
  html += '<tr>';
  html += '<td>';
  html += '<div class="form-group">';
  html += '<select id="NamaKursus" class="form-control" name="NamaKursus[]" onChange="getSection(this.value);">';
  html += '<option disabled="disabled" selected="selected">Pilih Kursus</option>';
  html += '<?php global $conn;  $sql = "SELECT NamaKursus FROM kursus"; $result = mysqli_query($conn, $sql); if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { echo'<option value="'.$row["NamaKursus"].'">'.$row["NamaKursus"].'</option>'; } } ?>';
  html += '</select>';
  html += '</div>';
  html += '</td>';
  html += '<td>';
  html += '<div class="form-group">';
  html += '<select id="Seksyen" class="Seksyen form-control" name="Seksyen[]">';
  html += '<option disabled="disabled" selected="selected">Pilih Seksyen</option>';
  html += '</select>';
  html += '</div>';
  html += '</td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

  $("#cariPelajar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#paparPelajar tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#tambahKursus").click(function(){
    $("#kandunganJadual").slideToggle("slow");
  });

  $(document).on('click', '.tambah', function(){
    var html = '';
    html +='""';
    html += '<tr>';
    html += '<td>';
    html += '<div class="form-group">';
    html += '<select id="NamaKursus" class="form-control" name="NamaKursus[]" onChange="getSection(this.value);">';
    html += '<option disabled="disabled" selected="selected">Pilih Kursus</option>';
    html += '<?php global $conn;  $sql = "SELECT NamaKursus FROM kursus"; $result = mysqli_query($conn, $sql); if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { echo'<option value="'.$row["NamaKursus"].'">'.$row["NamaKursus"].'</option>'; } } ?>';
    html += '</select>';
    html += '</div>';
    html += '</td>';
    html += '<td>';
    html += '<div class="form-group">';
    html += '<select id="Seksyen" class="Seksyen form-control" name="Seksyen[]">';
    html += '<option disabled="disabled" selected="selected">Pilih Seksyen</option>';
    html += '</select>';
    html += '</div>';
    html += '</td>';
    html += '<td><button type="button" name="tolak" class="btn btn-danger btn-sm tolak"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
    $('#jadual').append(html);
  });
  
  $(document).on('click', '.tolak', function(){
    $(this).closest('tr').remove();
  });
});

function getSection(val){
    $.ajax({
        type: "POST",
        url: "getSection.php",
        data:'NamaKursus='+val,
        success: function(data){
            $(".Seksyen").html(data);
        }
    });
}

</script>

</body>
</html>
