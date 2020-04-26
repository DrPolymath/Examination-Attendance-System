<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = 'psm';

// Create connection
$conn = new mysqli($host, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

function updateProgram($DataProgram){
    global $conn;
    $sql = "UPDATE program SET NamaProgram='".$DataProgram["NamaProgramBaru"]."' , Fakulti='".$DataProgram["FakultiBaru"]."' WHERE NamaProgram='".$DataProgram["simpanDataProgram"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat program berjaya dikemaskini!');
        </script>
    ";
}

function updateKursus($DataKursus){
    global $conn;
    $sql = "UPDATE kursus SET KodKursus='".$DataKursus["KodKursusBaru"]."' , NamaKursus='".$DataKursus["NamaKursusBaru"]."' , JumlahSeksyen='".$DataKursus["JumlahSeksyenBaru"]."' WHERE KodKursus='".$DataKursus["simpanDataKursus"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat kursus berjaya dikemaskini!');
        </script>
    ";
}

function updatePensyarah($DataPensyarah){
    global $conn;
    $sql = "UPDATE pensyarah SET IdPensyarah='".$DataPensyarah["IdPensyarahBaru"]."' , NamaPensyarah='".$DataPensyarah["NamaPensyarahBaru"]."' WHERE IdPensyarah='".$DataPensyarah["simpanDataPensyarah"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat pensyarah berjaya dikemaskini!');
        </script>
    ";
}

function updateTempat($DataTempat){
    global $conn;
    $sql = "UPDATE tempat SET NamaTempat='".$DataTempat["NamaTempatBaru"]."' , Kapasiti='".$DataTempat["KapasitiBaru"]."' WHERE NamaTempat='".$DataTempat["simpanDataTempat"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat tempat berjaya dikemaskini!');
        </script>
    ";
}

function updatePeperiksaan($DataPeperiksaan){
    global $conn;
    $sql = "UPDATE peperiksaan SET JenisPeperiksaan='".$DataPeperiksaan["JenisPeperiksaanBaru"]."' , Kursus='".$DataPeperiksaan["KursusBaru"]."' , NamaPensyarah='".$DataPeperiksaan["NamaPensyarahBaru"]."' , Tempat='".$DataPeperiksaan["TempatBaru"]."' , Tarikh='".$DataPeperiksaan["TarikhBaru"]."' , Masa='".$DataPeperiksaan["MasaBaru"]."' WHERE JenisPeperiksaan='".$DataPeperiksaan["simpanDataPeperiksaan"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat Peperiksaan berjaya dikemaskini!');
        </script>
    ";
}

function updatePelajar($DataPelajar){
    global $conn;
    $sql = "UPDATE pelajar SET NoMatrik='".$DataPelajar["NoMatrikBaru"]."' , NamaPelajar='".$DataPelajar["NamaPelajarBaru"]."' , NoKp='".$DataPelajar["NoKpBaru"]."' , NoPas='".$DataPelajar["NoPasBaru"]."' , NamaProgram='".$DataPelajar["NamaProgramBaru"]."' , Fakulti='".$DataPelajar["FakultiBaru"]."' , TahunPengajian='".$DataPelajar["TahunPengajianBaru"]."' WHERE NoMatrik='".$DataPelajar["simpanDataPelajar"]."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "
        <script>
          alert('Maklumat Pelajar berjaya dikemaskini!');
        </script>
    ";
}

if(isset($_GET['NoMatrikPelajarKursus'])){
    $sql = "UPDATE kursuspelajar SET NamaKursus='".$_GET['NamaKursusPelajarBaru']."' , Seksyen='".$_GET['SeksyenPelajarBaru']."'  WHERE NoMatrik='".$_GET['NoMatrikPelajarKursus']."'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
?>