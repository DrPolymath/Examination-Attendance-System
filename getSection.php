<?php
require 'functions.php';

if(!empty($_POST["NamaKursus"]))
{
$query =mysqli_query($conn,"SELECT JumlahSeksyen FROM kursus WHERE NamaKursus = '" . $_POST["NamaKursus"] . "' LIMIT 1");
$row = mysqli_fetch_assoc($query);
for ($x = 1; $x <= $row['JumlahSeksyen']; $x++) {
?>
<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
<?php
}
}

?>