<?php
$connect = mysqli_connect("localhost", "root", "", "dbanggota") or die("Error " . mysqli_error($connect));

// membuka file JSON
$filename = "tambahanggota.json";
$file = file_get_contents($filename);
$array = json_decode($file, true);

foreach ($array as $row) {
	$sql = "INSERT INTO tb_anggota(nama,email,alamat, umur) VALUES ('".$row["nama"]."', '".$row["email"]."', '".$row["alamat"]."', '".$row["umur"]."')";
	mysqli_query($connect, $sql);
}
echo "Data Anggota telah ditambahkan</br>";
echo json_encode($array, JSON_PRETTY_PRINT); 
echo "</br>";
?>

<a href="dataanggota_json.php">Lihat Data Anggota</a>