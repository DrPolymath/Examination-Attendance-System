<?php
require 'functions.php';

//cek button submit sudah ditekan atau belum
if (isset($_POST["daftar"])) {
//cek data berjaya ditambah atau tidak
  if(sejarah_kehadiran($_POST)>0){
    echo "
        <script>
          alert('Data Successfully Added!');
          document.location.href='daftar.php';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('Fail Insert Data');
          document.location.href='daftar.php';
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
        
    </style>
     <?php require 'nav.php'; ?>
           <div class="wrapper" style="padding: 40px;width: 1200px"> 
       
            <div class="card card-5">
                  <div class="card-heading">
                      <h1 class="title">REKOD KEHADIRAN PEPERIKSAAN PELAJAR <h1>
                  </div>
                  <div class="card-body">
                   <?php
                    janaJadualPeperiksaanKehadiranRekod();
                   ?>
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
function janaPDF(JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa){
  window.open('generatePDF.php?JenisPeperiksaan='+JenisPeperiksaan+"&Kursus="+Kursus+"&NamaPensyarah="+NamaPensyarah+"&Tempat="+Tempat+"&Tarikh="+Tarikh+"&Masa="+Masa, '_blank');
}
</script>
</body>

</html>
<!-- end document-->