

<!DOCTYPE html>
<html>
<head>
	<title>CARI DATA</title>
</head>
<body>
	<form action="" method="POST">
		<table>
	
			<tr><td>Cari nim </td><td><input type="text" name="nim" required></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="submit"> </td></tr>
		</table>


	</form>

</body>
</html>

<?php
include('conn.php');
session_start();
if(isset($_POST['delete'])){
	del($_POST['hapus']);
	echo"<script>alert('Data telah di hapus')</script>";
	header("Refresh:0; url=3.php");
	//echo ;
}
if(isset($_POST['edit'])){
	$_SESSION['nim']=$_POST['edt'];
	header("Refresh:0; url=4.php");
	//echo ;
}

if(isset($_POST['submit'])){
	$nim=$_POST['nim'];
	
	if(is_numeric($nim)==false){
				 echo"<script>alert('nim harus angka')</script>";
			}
			else{
	$data= cari($nim);
	if($data!=false){
		//print_r($data);

echo"<table border='1'>";
//echo"";
echo"<th>Nama</th><th>NIM</th><th>Tanggal</th><th>Jenis Kelamin</th><th>Prodi</th><th>Fakultas</th><th>Asal</th><th>Moto</th><th colspan='2'>Aksi</th>";
foreach($data as $dat){
		echo "<form action='' method='POST'><tr><td>".$dat['nama']."</td><td>".$dat['nim']."</td>".
		"<td>".$dat['tanggal']."</td>"."<td>".$dat['jk']."</td>"."<td>".$dat['prodi']."</td>".
		"<td>".$dat['fakultas']."</td>"."<td>".$dat['asal']."</td>"."<td>".$dat['moto']."</td>
		<td><input type='submit' name='delete' value='delete'><input type='submit' name='edit' value='edit'></td>
		<input type='text' name='hapus' value='$dat[nim]' hidden>
		<input type='text' name='edt' value='$dat[nim]' hidden>
		</form>";
}
//echo"";
echo"</table>";


	}
	else{
		 echo"<script>alert('Data  kosong')</script>";
	}


}
}


?>