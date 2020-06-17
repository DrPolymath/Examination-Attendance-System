<?php
    require('pdf/fpdf.php');

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

    $pdf = new FPDf('p','mm','A4');

    $pdf->AddPage();

    //Title
    $pdf->SetFont('Arial','B',20);

    $pdf->cell(190, 12, "Laporan Kehadiran Peperiksaan", 0, 1, 'C');

    $pdf->SetFont('Arial','B',20);

    $pdf->cell(190, 12, "Universiti Tun Hussein Onn Malaysia", 0, 1, 'C');

    $pdf->Ln();

    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Nama Pensyarah ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(70, 10, ": ".$_GET['NamaPensyarah'], 0, 1, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Kursus ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(70, 10, ": ".$_GET['Kursus'], 0, 1, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Jenis Peperiksaan ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(70, 10, ": ".$_GET['JenisPeperiksaan'], 0, 1, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Tempat ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(70, 10, ": ".$_GET['Tempat'], 0, 1, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Tarikh ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(30, 10, ": ".date("d F Y" , strtotime($_GET['Tarikh'])), 0, 1, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(50, 10, "Masa ", 0, 0, 'L');
    $pdf->SetFont('Arial','',12);
    $pdf->cell(20, 10, ": ".date("H i a" , strtotime($_GET['Masa'])), 0, 1, 'L');

    $pdf->SetFont('Arial','B',14);

    $pdf->Ln();

    $pdf->cell(190, 10, "Butiran Pelajar Hadir", 0, 1, 'C');
    
    $pdf->SetFont('Arial','B',12);

    $pdf->cell(40, 10, "No Matrik", 1, 0, 'C');
    $pdf->cell(110, 10, "Nama Pelajar", 1, 0, 'C');
    $pdf->cell(40, 10, "Seksyen", 1, 1, 'C');

    $pdf->SetFont('Arial','',12);

    $sql = "SELECT * FROM kehadiran WHERE StatusKehadiran='Hadir' AND Kursus='".$_GET['Kursus']."'";
    $result = $pdo->query($sql);

    while ($res = $result->fetch()) {
        $pdf->cell(40, 10, $res['NoMatrik'], 1, 0, 'C');
        $sql = "SELECT NamaPelajar FROM pelajar WHERE NoMatrik='".$res['NoMatrik']."'";
        $rows = $pdo->query($sql);
        while ($row = $rows->fetch()) {
            $pdf->cell(110, 10, $row['NamaPelajar'], 1, 0, 'C');
        }
        $sql = "SELECT Seksyen FROM kursuspelajar WHERE NoMatrik='".$res['NoMatrik']."' AND NamaKursus='".$_GET['Kursus']."'";
        $rows = $pdo->query($sql);
        while ($row = $rows->fetch()) {
            $pdf->cell(40, 10, $row['Seksyen'], 1, 1, 'C');
        }
    }

    $pdf->Ln();

    $pdf->SetFont('Arial','B',14);

    $pdf->cell(190, 10, "Butiran Pelajar Tidak Hadir", 0, 1, 'C');

    $pdf->SetFont('Arial','B',12);

    $pdf->cell(40, 10, "No Matrik", 1, 0, 'C');
    $pdf->cell(110, 10, "Nama Pelajar", 1, 0, 'C');
    $pdf->cell(40, 10, "Seksyen", 1, 1, 'C');

    $pdf->SetFont('Arial','',12);

    $sql = "SELECT * FROM kehadiran WHERE StatusKehadiran='TidakHadir' AND Kursus='".$_GET['Kursus']."'";
    $result = $pdo->query($sql);

    while ($res = $result->fetch()) {
        $pdf->cell(40, 10, $res['NoMatrik'], 1, 0, 'C');
        $sql = "SELECT NamaPelajar FROM pelajar WHERE NoMatrik='".$res['NoMatrik']."'";
        $rows = $pdo->query($sql);
        while ($row = $rows->fetch()) {
            $pdf->cell(110, 10, $row['NamaPelajar'], 1, 0, 'C');
        }
        $sql = "SELECT Seksyen FROM kursuspelajar WHERE NoMatrik='".$res['NoMatrik']."' AND NamaKursus='".$_GET['Kursus']."'";
        $rows = $pdo->query($sql);
        while ($row = $rows->fetch()) {
            $pdf->cell(40, 10, $row['Seksyen'], 1, 1, 'C');
        }
    }

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);

    $pdf->cell(110, 10, "Disahkan Oleh : ", 0, 1, 'L');

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);

    $pdf->cell(110, 10, "Nama : ", 0, 1, 'L');

    $pdf->OutPut();

    $pdo = null;

?>
 