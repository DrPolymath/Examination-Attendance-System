<?php
require 'functions.php';

//cek button submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {
//cek data berjaya ditambah atau tidak
  if(penjanaan_kehadiran($_POST)>0){
    echo "
        <script>
          alert('Kemasukan Dibenarkan!');
          document.location.href='7.PenjanaanKehadiran.php';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('Penjanaan Data Cap Jari Gagal');
          document.location.href='7.PenjanaanKehadiran.php';
        </script>
    ";
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
            
}
        
    </style>
     <?php require 'nav.php'; ?>
    <div class="wrapper" style="padding: 40px;width: 1100px"> 
       
           <div class="card card-5">
                <div class="card-heading">
                    <h1 class="title">PENJANAAN KEHADIRAN PEPERIKSAAN PELAJAR </h1>
                </div>
               <div class="card-body">
                   <?php
                    janaJadualPeperiksaanKehadiran();
                   ?>
               </div>
           </div>
    </div>
    
    <div class="modal fade" id="SenaraiPelajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
    <form id="AttendanceForm" method="POST">
      <div class="modal-header">
        <h4 class="modal-title">Senarai Pelajar Terlibat</h4>
      </div>
      <div id="listPelajar" class="modal-body">
        
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn--radius-2 btn--blue" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn--radius-2 btn--blue" name="HantarKehadiran" >Hantar Kehadiran</button>
      </div>
      </form>
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
    
<script>
function janaSenaraiPelajar(JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa){
    $.ajax({
        type: "POST",
        url: "janaSenaraiPelajar.php",
        data: "JenisPeperiksaan=" + JenisPeperiksaan + "&Kursus=" + Kursus,
        success: function(data){
            $('#listPelajar').html(data);
        }
    });
}

  $('#AttendanceForm').on('submit', function(e){
    e.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "rekodKehadiran.php",
        data: form_data,
        success: function(data){
          if(data=="success"){
            alert("Rekod Kehadiran berjaya disimpan!")
            document.location.href='7.PenjanaanKehadiran.php';
          } else {
            alert("Sila tanda kesemuaan kehadiran pelajar!")
          }
        }
    });
    return false;
  });

</script>

</body>

</html>
<!-- end document-->