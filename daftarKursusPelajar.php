<?php

if(isset($_POST["NoMatrik"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=psm", "root", "");
 for($count = 0; $count < count($_POST["NamaKursus"]); $count++)
 {  
  $query = "INSERT INTO kursuspelajar
  (NoMatrik,NamaKursus,Seksyen) 
  VALUES (:NoMatrik,:NamaKursus,:Seksyen)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':NoMatrik'   => $_POST["NoMatrik"],
    ':NamaKursus'  => $_POST["NamaKursus"][$count], 
    ':Seksyen' => $_POST["Seksyen"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
}

if(isset($_POST["simpanTambahKursus"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=psm", "root", "");
 for($count = 0; $count < count($_POST["NamaKursus"]); $count++)
 {  
  $query = "INSERT INTO kursuspelajar
  (NoMatrik,NamaKursus,Seksyen) 
  VALUES (:NoMatrik,:NamaKursus,:Seksyen)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':NoMatrik'   => $_POST["simpanTambahKursus"],
    ':NamaKursus'  => $_POST["NamaKursus"][$count], 
    ':Seksyen' => $_POST["Seksyen"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
}

?>