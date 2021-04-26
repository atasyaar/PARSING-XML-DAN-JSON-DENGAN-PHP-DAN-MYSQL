<?php
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "dbanggota") or die("Error " . mysqli_error($connection));
// membuka file XML
$file = simplexml_load_file("tambahanggota.xml");

$i = 1;
echo "Data Anggota telah ditambahkan!<br/>";

echo 'Data Anggota baru :<br />';
foreach ($file as $key => $value) {
    echo $i . "<br />";
    echo "nama : " . $value->nama . "<br />";
    echo "email : " . $value->email . "<br />";
    echo "alamat : " . $value->alamat . "<br />";
    echo "umur : " . $value->umur . "<br /><br />";
    $sql = "INSERT into tb_anggota(nama,email,alamat,umur) VALUES('" . $value->nama . "','" . $value->email . "','" . $value->alamat . "','" . $value->umur . "')";
    mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    $i++;
}
//tutup koneksi ke database
//mysqli_close($connection);
?>
<a href="dataanggota_xml.php">Lihat Data Anggota</a>