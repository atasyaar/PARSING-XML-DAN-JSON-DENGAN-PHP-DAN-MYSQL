<?php
Header('Content-type: text/xml');
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "dbanggota") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');
//menampilkan data dari database, table tb_anggota
$sql = "select * from tb_anggota";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//membuat array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('anggota');
    $track->addChild('nama', $row['nama']);
    $track->addChild('email', $row['email']);
    $track->addChild('alamat', $row['alamat']);
    $track->addChild('umur', $row['umur']);
}

print($xml->asXML());
//tutup koneksi ke database
//mysqli_close($connection);
?>