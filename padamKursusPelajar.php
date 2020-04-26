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

    $query = "DELETE FROM kursuspelajar WHERE NoMatrik='".$_GET['NoMatrik']."' AND NamaKursus='".$_GET['NamaKursus']."'" ;
    mysqli_query($conn,$query) or die(mysqli_error($conn));
?>