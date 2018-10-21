<?php
include('conn.php');
$data = get();
echo"<table border='1' align='center'>";
echo"<th>Nama</th><th>NIM</th><th>Tanggal</th><th>Jenis Kelamin</th><th>Prodi</th><th>Fakultas</th><th>Asal</th><th>Moto</th>";
foreach($data as $dat){
		echo "<tr><td>".$dat['nama']."</td><td>".$dat['nim']."</td>".
		"<td>".$dat['tanggal']."</td>"."<td>".$dat['jk']."</td>"."<td>".$dat['prodi']."</td>".
		"<td>".$dat['fakultas']."</td>"."<td>".$dat['asal']."</td>"."<td>".$dat['moto']."</td>";

}
echo"<tr><td colspan='4' align='center'><a href='1.php'>Registrasi</a></td><td colspan='4' align='center'><a href='2.php'>Cari Data</a></td>";
echo"</table>";











?>