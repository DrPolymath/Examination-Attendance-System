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

    $sql = "SELECT NamaKursus,Seksyen FROM kursuspelajar WHERE NoMatrik='".$_POST["NoMatrik"]."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo 
        '<div align="center" style="padding-bottom: 20px; font-weight:bold;">
            <h2>'.$_POST["NoMatrik"].'</h2>
        </div>

        <form method="get" id="padamKursusPelajar">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Nama Kursus</th>
                <th scope="col">Sekyen</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>';
        while($row = mysqli_fetch_assoc($result)) {
            echo'
            <tr>
            <td>'.$row["NamaKursus"].'</td>
            <td>'.$row["Seksyen"].'</td>
            <td><button class="btn btn--radius-2 btn--green" type="button" id="kemaskiniKursusPelajarIndicator" name="kemaskiniKursusPelajarIndicator" value="NoMatrik='.$_POST["NoMatrik"].'&NamaKursus='.$row["NamaKursus"].'&Seksyen='.$row["Seksyen"].'">Kemaskini</button></td>
            <td><button class="btn btn--radius-2 btn--red" type="button" id="padamKursusPelajarIndicator" name="padamKursusPelajarIndicator" value="NoMatrik='.$_POST["NoMatrik"].'&NamaKursus='.$row["NamaKursus"].'">Padam</button></td>
            </tr>
            ';
        }
        echo "</tbody>
        </table>
        <input class='input--style-5' type='text' style='width: 415px' hidden>
        </form>
        <script>
        $('#padamKursusPelajarIndicator').on('click', function(e){
            event.preventDefault();
            $.ajax({
                type: 'GET',
                url: 'padamKursusPelajar.php',
                data: $(this).val(),
                success: function(data){
                    alert('Kursus Pelajar berjaya dipadam!');
                    document.location.href='4.daftarMaklumatPelajar.php';
                }
            });
        });

        $('#kemaskiniKursusPelajarIndicator').on('click', function(e){
            event.preventDefault();
            var newVal = $(this).val();
            var newValue = newVal.split(/[^a-zA-Z0-9 :s]/g);
            document.getElementById('NoMatrikPelajarKursus').value = newValue[1];
            document.getElementById('NamaKursusPelajarBaru').value = newValue[3];
            document.getElementById('SeksyenPelajarBaru').value = newValue[5];
            $('#kursusPelajarFormModal').modal('show');
        });

        $('#kemaskiniKursusPelajar').on('submit', function(e){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: 'GET',
                url: 'updateDatabase.php',
                data: form_data,
                success: function(data){
                    alert('Kursus Pelajar Berjaya Dikemaskini!');
                    document.location.href='4.daftarMaklumatPelajar.php';
                }
            });
        });
        </script>
        ";
        echo'
        <div class="modal fade" id="kursusPelajarFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kemaskini Tempat</h4>
                </div>
                <div class="modal-body" id="dataKursusPelajar">
                    
                <form method="GET" id="kemaskiniKursusPelajar">
                    <div class="card-body" align="center">
                        <div class="form-row">
                            <div class="name">No Matrik</div>
                            <div class="value">
                            <div class="input-group">
                                <input id="NoMatrikPelajarKursus" class="input--style-5" type="text" name="NoMatrikPelajarKursus"  required style="width: 400px" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Kursus</div>
                            <div class="value">
                            <div class="input-group">
                                <input id="NamaKursusPelajarBaru" class="input--style-5" type="text" name="NamaKursusPelajarBaru"  required style="width: 400px">
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Seksyen</div>
                            <div class="value">
                            <div class="input-group">
                                <input id="SeksyenPelajarBaru" class="input--style-5" type="text" name="SeksyenPelajarBaru" required style="width: 400px">
                            </div>
                            </div>
                        </div>
                        <td><button id="simpanDataKursusPelajar" class="btn btn--radius-2 btn--green" type="submit" name="simpanDataKursusPelajar" >Simpan</button></td>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="tutup btn btn--radius-2 btn--blue" data-dismiss="modal">Batal</button>
                </div>
                </div>
            </div>
        </div>
        ';
    }
?>
