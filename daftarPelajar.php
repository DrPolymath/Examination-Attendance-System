<?php
     if(isset($_POST["NoMatrik"]))
     {
     $connect = new PDO("mysql:host=localhost;dbname=psm", "root", "");
     
      $query = "INSERT INTO pelajar
      (NoMatrik,NamaPelajar,NoKp,NoPas,NamaProgram,Fakulti,TahunPengajian) 
      VALUES (:NoMatrik,:NamaPelajar,:NoKp,:NoPas,:NamaProgram,:Fakulti,:TahunPengajian)
      ";
      $statement = $connect->prepare($query);
      $statement->execute(
       array(
        ':NoMatrik'       => $_POST["NoMatrik"],
        ':NamaPelajar'    => $_POST["NamaPelajar"],
        ':NoKp'          => $_POST["NoKp"],
        ':NoPas'          => $_POST["NoPas"],
        ':NamaProgram'    => $_POST["NamaProgram"],
        ':Fakulti'        => $_POST["Fakulti"],
        ':TahunPengajian' => $_POST["TahunPengajian"]
       )
      );
     
     $result = $statement->fetchAll();
     }
?>