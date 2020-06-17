<?php

    $numofNoMatrik = count($_POST['NoMatrik']);
    $numofKehadiran = count($_POST['Kehadiran']);
    try {	
        $connectionString = "mysql:host=localhost;dbname=psm";
        $databaseUsername = 'root';
        $databasePassword = '';
    
        $pdo = new PDO($connectionString, $databaseUsername, $databasePassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Database connection failed: " . $e->getMessage();
    }

    if($numofNoMatrik==$numofKehadiran){

        for($i=0;$i<$numofNoMatrik;$i++){
            
            try {
                $pdo->beginTransaction();
                $sql = "INSERT INTO kehadiran(JenisPeperiksaan,Kursus,NoMatrik,StatusKehadiran) VALUES ('".$_POST['JenisPeperiksaan']."','".$_POST['Kursus']."','".$_POST['NoMatrik'][$i]."','".$_POST['Kehadiran'][$i]."')";
                $pdo->query($sql);
                $pdo->commit();
            } catch (Exception $e) {
                $pdo->rollback();
                echo $e->getMessage();
            }

        }
        echo "success";
    } else {
        echo "failed";
    }
    $pdo = null;
?>