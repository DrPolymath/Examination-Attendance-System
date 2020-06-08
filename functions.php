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

function verikasi_kod($data)
{
  global $conn;
  $staff_verifikasi=htmlspecialchars($data["Verifikasi"]);
  $sql = "SELECT Verifikasi FROM pentadbir LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if ($row["Verifikasi"]==$staff_verifikasi){
    return true;
  } else {
    return false;
  }    
}

function semak_idstaff($data)
{
  global $conn;
  $staff_id=htmlspecialchars($data["Idstaff"]);
  $sql = "SELECT Idstaff FROM pentadbir";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["Idstaff"] == $staff_id){
          return false;
        }
    }
    return true;
  } else {
    return true;
  }  
}

function daftar_pentadbir($data){
  global $conn;
  $staff_name=htmlspecialchars($data["NamaStaff"]);
  $staff_id=htmlspecialchars($data["Idstaff"]);
  $staff_nokp=htmlspecialchars($data["NoKp"]);
  $staff_nopas=htmlspecialchars($data["NoPas"]);
  $staff_katalaluan=htmlspecialchars($data["KataLaluan"]);
  $staff_sahkatalaluan=htmlspecialchars($data["SahkanKataLaluan"]);
  $staff_jabatan=htmlspecialchars($data["Jabatan"]);
  $staff_fakulti=htmlspecialchars($data["Fakulti"]);
  $staff_verifikasi=htmlspecialchars($data["Verifikasi"]);
 
  $query="INSERT INTO pentadbir(NamaStaff,Idstaff,NoKp,NoPas,KataLaluan,Jabatan,Fakulti,Verifikasi)
  VALUES
  ('$staff_name','$staff_id','$staff_nokp','$staff_nopas','$staff_katalaluan','$staff_jabatan','$staff_fakulti','$staff_verifikasi')
  ";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
}

//                                                                     PROGRAM

function daftar_program($data){
  global $conn;
  $maklumat_namaprogram=htmlspecialchars($data["NamaProgram"]);
  $maklumat_fakulti=htmlspecialchars($data["Fakulti"]);
  
  
  $query="INSERT INTO program(NamaProgram,Fakulti)
  VALUES
  ('$maklumat_namaprogram','$maklumat_fakulti')";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function semak_program($data)
{
  global $conn;
  $maklumat_namaprogram=htmlspecialchars($data["NamaProgram"]);
  $maklumat_fakulti=htmlspecialchars($data["Fakulti"]);
  $sql = "SELECT NamaProgram, Fakulti FROM program";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if(($row["NamaProgram"] == $maklumat_namaprogram)&&($row["Fakulti"] == $maklumat_fakulti)){
        return false;
      }
    }
    return true;
  } else {
    return true;
  }
}

function janaJadualProgram()
{
  global $conn;
  $sql = "SELECT NamaProgram, Fakulti FROM program";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form id="kemaskiniDataProgram" method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Program</th>
            <th scope="col">Fakulti</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["NamaProgram"].'</td>
          <td>'.$row["Fakulti"].'</td>
          <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#programFormModal" onclick="getProgramIndicator(\''.$row["NamaProgram"].'\',\''.$row["Fakulti"].'\')">Kemaskini</button></td>
          <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataProgram" value="'.$row["NamaProgram"].'">Padam</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}

function padamDataProgram($NamaProgram){
  global $conn;
  $query = "DELETE FROM program WHERE NamaProgram='$NamaProgram'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat Program berjaya dipadam!');
    document.location.href='3.PengisianMaklumat.php';
  </script>
  ";
}

//                                                                     KURSUS

function daftar_kursus($data){
  global $conn;
  $maklumat_kodkursus=htmlspecialchars($data["KodKursus"]);
  $maklumat_namakursus=htmlspecialchars($data["NamaKursus"]);
  $maklumat_seksyen=htmlspecialchars($data["Seksyen"]);
  
  $query="INSERT INTO kursus(KodKursus,NamaKursus,JumlahSeksyen)
  VALUES
  ('$maklumat_kodkursus','$maklumat_namakursus','$maklumat_seksyen')";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}



function semak_kursus($data)
{
  global $conn;
  $maklumat_kodkursus=htmlspecialchars($data["KodKursus"]);
  $maklumat_namakursus=htmlspecialchars($data["NamaKursus"]);
  $maklumat_seksyen=htmlspecialchars($data["Seksyen"]);
  $sql = "SELECT KodKursus, NamaKursus, JumlahSeksyen FROM kursus";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if(($row["KodKursus"] == $maklumat_kodkursus)&&($row["NamaKursus"] == $maklumat_namakursus)&&($row["JumlahSeksyen"] == $maklumat_seksyen)){
        return false;
      }
    }
    return true;
  } else {
    return true;
  }  
}

function janaJadualKursus()
{
  global $conn;
  $sql = "SELECT KodKursus,NamaKursus,JumlahSeksyen FROM kursus";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Kod Kursus</th>
            <th scope="col">Nama Kursus</th>
            <th scope="col">Jumlah Seksyen</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["KodKursus"].'</td>
          <td>'.$row["NamaKursus"].'</td>
          <td>'.$row["JumlahSeksyen"].'</td>
          <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#kursusFormModal" onclick="getKursusIndicator(\''.$row["KodKursus"].'\',\''.$row["NamaKursus"].'\',\''.$row["JumlahSeksyen"].'\')">Kemaskini</button></td>
          <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataKursus" value="'.$row["KodKursus"].'">Padam</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}
function padamDataKursus($KodKursus){
  global $conn;
  $query = "DELETE FROM kursus WHERE KodKursus='$KodKursus'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat Kursus berjaya dipadam!');
    document.location.href='3.PengisianMaklumat.php';
  </script>
  ";
}

//                                                                     PENSYARAH

function daftar_pensyarah($data){
  global $conn;
  $maklumat_idpensyarah=htmlspecialchars($data["IdPensyarah"]);
  $maklumat_namapensyarah=htmlspecialchars($data["NamaPensyarah"]);
  
  $query="INSERT INTO pensyarah(IdPensyarah,NamaPensyarah)
  VALUES
  ('$maklumat_idpensyarah','$maklumat_namapensyarah')";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function semak_pensyarah($data)
{
  global $conn;
  $maklumat_idpensyarah=htmlspecialchars($data["IdPensyarah"]);
  $maklumat_namapensyarah=htmlspecialchars($data["NamaPensyarah"]);
  $sql = "SELECT IdPensyarah, NamaPensyarah FROM pensyarah";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if(($row["IdPensyarah"] == $maklumat_idpensyarah)&&($row["NamaPensyarah"] == $maklumat_namapensyarah)){
        return false;
      }
    }
    return true;
  } else {
    return true;
  }  
}

function janaJadualPensyarah()
{
  global $conn;
  $sql = "SELECT IdPensyarah,NamaPensyarah FROM pensyarah";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Id Pensyarah</th>
            <th scope="col">Nama Pensyarah</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["IdPensyarah"].'</td>
          <td>'.$row["NamaPensyarah"].'</td>
          <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#pensyarahFormModal" onclick="getPensyarahIndicator(\''.$row["IdPensyarah"].'\',\''.$row["NamaPensyarah"].'\')">Kemaskini</button></td>
          <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataPensyarah" value="'.$row["IdPensyarah"].'">Padam</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}
function padamDataPensyarah($IdPensyarah){
  global $conn;
  $query = "DELETE FROM pensyarah WHERE IdPensyarah='$IdPensyarah'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat Pensyarah berjaya dipadam!');
    document.location.href='3.PengisianMaklumat.php';
  </script>
  ";
}

//                                                                     TEMPAT PEPERIKSAAN

function daftar_tempat($data){
  global $conn;
  $maklumat_tempat=htmlspecialchars($data["Tempat"]);
  $maklumat_kapasiti=htmlspecialchars($data["Kapasiti"]);

  $query="INSERT INTO tempat(NamaTempat,Kapasiti)
  VALUES
  ('$maklumat_tempat','$maklumat_kapasiti')";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function semak_tempat($data)
{
  global $conn;
  $maklumat_tempat=htmlspecialchars($data["Tempat"]);
  $sql = "SELECT NamaTempat FROM tempat";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if(($row["NamaTempat"] == $maklumat_tempat)){
        return false;
      }
    }
    return true;
  } else {
    return true;
  }  
}

function janaJadualTempat()
{
  global $conn;
  $sql = "SELECT NamaTempat,Kapasiti FROM tempat";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Tempat Peperiksaan</th>
            <th scope="col">Kapasiti</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["NamaTempat"].'</td>
          <td>'.$row["Kapasiti"].'</td>
          <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#tempatFormModal" onclick="getTempatIndicator(\''.$row["NamaTempat"].'\',\''.$row["Kapasiti"].'\')">Kemaskini</button></td>
          <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataTempat" value="'.$row["NamaTempat"].'">Padam</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}

function padamDataTempat($NamaTempat){
  global $conn;
  $query = "DELETE FROM tempat WHERE NamaTempat='$NamaTempat'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat tempat peperiksaan berjaya dipadam!');
    document.location.href='3.PengisianMaklumat.php';
  </script>
  ";
}

//                                                                 DAFTAR PELAJAR

function semak_nomatrik($data)
{
  global $conn;
  $pelajar_nomatrik=htmlspecialchars($data["NoMatrik"]);
  $sql = "SELECT NoMatrik FROM pelajar";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["NoMatrik"] == $pelajar_nomatrik){
          return false;
        }
    }
    return true;
  } else {
    return true;
  }  
}

// function daftar_pelajar($data){
//   global $conn;
//   $pelajar_nomatrik=htmlspecialchars($data["NoMatrik"]);
//   $pelajar_nama=htmlspecialchars($data["NamaPelajar"]);
//   $pelajar_nokp=htmlspecialchars($data["NoKp"]);
//   $pelajar_nopas=htmlspecialchars($data["NoPas"]);
//   $pelajar_namaprogram=htmlspecialchars($data["NamaProgram"]);
//   $pelajar_fakulti=htmlspecialchars($data["Fakulti"]);
//   $pelajar_tahunpengajian=htmlspecialchars($data["TahunPengajian"]);
  
//   $query="INSERT INTO pelajar(NoMatrik,NamaPelajar,NoKp,NoPas,NamaProgram,Fakulti,TahunPengajian)
//   VALUES
//   ('$pelajar_nomatrik','$pelajar_nama','$pelajar_nokp','$pelajar_nopas','$pelajar_namaprogram','$pelajar_fakulti','$pelajar_tahunpengajian')
//   ";
//   mysqli_query($conn,$query) or die(mysqli_error($conn));
//   return mysqli_affected_rows($conn);
// }


function penetapan_peperiksaan($data){
  global $conn;
  $peperiksaan_jenis=htmlspecialchars($data["JenisPeperiksaan"]);
  $peperiksaan_kursus=htmlspecialchars($data["NamaKursus"]);
  $peperiksaan_namapensyarah=htmlspecialchars($data["NamaPensyarah"]); 
  $peperiksaan_tempat=htmlspecialchars($data["NamaTempat"]);
  $peperiksaan_tarikh=htmlspecialchars($data["Tarikh"]);
  $peperiksaan_masa=htmlspecialchars($data["Masa"]);
  
  $query="INSERT INTO peperiksaan(JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa)
  VALUES
  ('$peperiksaan_jenis','$peperiksaan_kursus','$peperiksaan_namapensyarah','$peperiksaan_tempat','$peperiksaan_tarikh','$peperiksaan_masa')
  ";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
function janaJadualPeperiksaan()
{
  global $conn;
  $sql = "SELECT JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa FROM peperiksaan";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">JenisPeperiksaan</th>
            <th scope="col">Kursus</th>
            <th scope="col">NamaPensyarah</th>
            <th scope="col">Tempat</th>
            <th scope="col">Tarikh</th>
            <th scope="col">Masa</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["JenisPeperiksaan"].'</td>
          <td>'.$row["Kursus"].'</td>
          <td>'.$row["NamaPensyarah"].'</td>
          <td>'.$row["Tempat"].'</td>
          <td>'.$row["Tarikh"].'</td>
          <td>'.$row["Masa"].'</td>
          <td><button class="btn btn--radius-2 btn--green" type="button" data-dismiss="modal" data-toggle="modal" data-target="#peperiksaanFormModal" onclick="getPeperiksaanIndicator(\''.$row["JenisPeperiksaan"].'\',\''.$row["Kursus"].'\',\''.$row["NamaPensyarah"].'\',\''.$row["Tempat"].'\',\''.$row["Tarikh"].'\',\''.$row["Masa"].'\')">Kemaskini</button></td>
          <td><button class="btn btn--radius-2 btn--red" type="submit" name="padamDataPeperiksaan" value="'.$row["JenisPeperiksaan"].'">Padam</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}
function janaJadualPeperiksaanKehadiran()
{
  global $conn;
  $sql = "SELECT JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa FROM peperiksaan";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">JenisPeperiksaan</th>
            <th scope="col">Kursus</th>
            <th scope="col">NamaPensyarah</th>
            <th scope="col">Tempat</th>
            <th scope="col">Tarikh</th>
            <th scope="col">Masa</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["JenisPeperiksaan"].'</td>
          <td>'.$row["Kursus"].'</td>
          <td>'.$row["NamaPensyarah"].'</td>
          <td>'.$row["Tempat"].'</td>
          <td>'.$row["Tarikh"].'</td>
          <td>'.$row["Masa"].'</td>
          <td><button class="btn btn--radius-2 btn--blue" type="button" data-toggle="modal" data-target="#SenaraiPelajar" onclick="janaSenaraiPelajar(\''.$row["JenisPeperiksaan"].'\',\''.$row["Kursus"].'\',\''.$row["NamaPensyarah"].'\',\''.$row["Tempat"].'\',\''.$row["Tarikh"].'\',\''.$row["Masa"].'\')">Jana Kehadiran</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}
function janaJadualPeperiksaanKehadiranRekod()
{
  global $conn;
  $sql = "SELECT JenisPeperiksaan,Kursus,NamaPensyarah,Tempat,Tarikh,Masa FROM peperiksaan";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo 
      '<form method="get">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">JenisPeperiksaan</th>
            <th scope="col">Kursus</th>
            <th scope="col">NamaPensyarah</th>
            <th scope="col">Tempat</th>
            <th scope="col">Tarikh</th>
            <th scope="col">Masa</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
          <td>'.$row["JenisPeperiksaan"].'</td>
          <td>'.$row["Kursus"].'</td>
          <td>'.$row["NamaPensyarah"].'</td>
          <td>'.$row["Tempat"].'</td>
          <td>'.$row["Tarikh"].'</td>
          <td>'.$row["Masa"].'</td>
          <td><button class="btn btn--radius-2 btn--blue" type="button" data-toggle="modal" data-target="#SenaraiPelajar" onclick="janaSenaraiPelajar(\''.$row["JenisPeperiksaan"].'\',\''.$row["Kursus"].'\',\''.$row["NamaPensyarah"].'\',\''.$row["Tempat"].'\',\''.$row["Tarikh"].'\',\''.$row["Masa"].'\')">Jana Laporan Kehadiran</button></td>
        </tr>
        ';
    }
    echo '</tbody>
    </table>
    </form>';
  }
}
function padamDataPeperiksaan($JenisPeperiksaan){
  global $conn;
  $query = "DELETE FROM peperiksaan WHERE JenisPeperiksaan='$JenisPeperiksaan'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat peperiksaan berjaya dipadam!');
    document.location.href='6.PenetapanPeperiksaan.php';
  </script>
  ";
}
function padamDataPelajar($NoMatrik){
  global $conn;
  $query = "DELETE FROM kursuspelajar WHERE NoMatrik='$NoMatrik'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));

  $query = "DELETE FROM pelajar WHERE NoMatrik='$NoMatrik'" ;
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo "
  <script>
    alert('Maklumat Pelajar berjaya dipadam!');
    document.location.href='4.daftarMaklumatPelajar.php';
  </script>
  ";
}

?>