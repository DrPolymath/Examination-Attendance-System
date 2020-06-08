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

    $sql = "SELECT NoMatrik FROM kursuspelajar WHERE NamaKursus='".$_POST["Kursus"]."'";
    $result = mysqli_query($conn, $sql);
    $listNoMatrik = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($listNoMatrik,$row['NoMatrik']);
    }
    $lengthListNoMatrik = count($listNoMatrik);

    echo '
        <div class="py-3">
            <input id="searchFilter" class="input--style-5" type="text" style="width: 870px" placeholder="Carian">
            <input type="text" name="JenisPeperiksaan" value="'.$_POST["JenisPeperiksaan"].'" hidden>
            <input type="text" name="Kursus" value="'.$_POST["Kursus"].'" hidden>
        </div>
        <div class="py-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">No Matrik</th>
                <th scope="col">Nama</th>
                <th scope="col">Hadir</th>
                <th scope="col">Tidak Hadir</th>
            </tr>
            </thead>
            <tbody id="data">
    ';

    for($i = 0;$i < $lengthListNoMatrik;$i++){
        $sql = "SELECT NoMatrik,NamaPelajar FROM pelajar WHERE NoMatrik='".$listNoMatrik[$i]."'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo'
            <tr>
            <td>'.$row["NoMatrik"].'<input type="text" name="NoMatrik[]" value="'.$row["NoMatrik"].'" hidden></td>
            <td>'.$row["NamaPelajar"].'</td>
            <td><input class="form-check-input" type="checkbox" value="Hadir" name="Kehadiran[]"></td>
            <td><input class="form-check-input" type="checkbox" value="TidakHadir" name="Kehadiran[]"></td>
            </tr>
            ';
        }
    }
    echo "</tbody>
        </table>
        </div>";
    echo'
    <script>
    $(document).ready(function(){
        $("#searchFilter").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#data tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
    ';
?>