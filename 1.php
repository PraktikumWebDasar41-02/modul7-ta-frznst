<?php
//session_start();
include ('conn.php');
	if (isset($_POST['submit'])) {
		$nama=$_POST['nama'];
		$nim=$_POST['nim'];
		$tanggal=$_POST['tanggal'];
		$jeniskelamin =$_POST['jk'];
		$prodi=$_POST['prodi'];
		$fakultas=$_POST['fakultas'];
		$asal=$_POST['asal'];
		$moto=$_POST['moto'];
		if ($nama==""||$nim==""||$tanggal==""||$jeniskelamin==""||$prodi==""||$fakultas==""||$asal==""||$moto=="") {
			 echo"<script>alert('Fiel tidak boleh kosong')</script>";
		}

		else
		{

	
			if (strlen(trim($nama," "))>50) {
				 echo"<script>alert('nama tidak boleh lebih 20 karakter')</script>";
			}
			if (strlen(trim($nim," "))>10) {
				 echo"<script>alert('nim tidak boleh lebih 10 karakter')</script>";
			}


	       if(cek($nim)==false){
				 echo"<script>alert('nim sudah terdaftar')</script>";
			}
           if(is_numeric($nim)==false){
				 echo"<script>alert('nim harus angka')</script>";
			}

			else{
				insert($nama,$nim,$tanggal,$jeniskelamin,$prodi,$fakultas,$asal,$moto);
				header("Refresh:0; url=3.php");
				//$_SESSION['nim']= $nim;
				//$_SESSION['nama']= $nama;
				//mysqli_query($conn,"INSERT INTO t_jurnal1(nama,nim,email) VALUES('$nama','$nim','$email')");
				//echo"<script>alert('anda sudah terdaftar')</script>";
				
			}

			}
		


		}

	


?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTRASI</title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr><td>Masukan nama </td><td><input type="text" name="nama"></td></tr>
			<tr><td>Masukan nim </td><td><input type="text" name="nim"></td></tr>
			<tr><td>Masukan Tanggal Lahir</td><td><input type="date" name="tanggal"></td></tr>
			<tr><td>Jenis Kelamin </td><td><select name="jk"><option value="pria">Pria</option>
				<option value="wanita">Wanita</option></select></td></tr>

				<tr><td>Prodi</td><td><select name="prodi"><option value="MI" selected>Manajemen Informatika</option>
				<option value="TK">Teknik Komputer</option>
				<option value="IF">Informatika</option></select></td></tr>'

			<tr><td>Fakultas :</td></tr>
			<tr><td><input type="radio" name="fakultas" value="FIT" checked>FIT</input><input type="radio" name="fakultas" value="FIF">FIF</input>
			<input type="radio" name="fakultas" value="FKB">FKB</input><input type="radio" name="fakultas" value="FEB">FEB</input>
			<input type="radio" name="fakultas" value="FTE">FTE</input><input type="radio" name="fakultas" value="FIK">FIK</input>
			<input type="radio" name="fakultas" value="FRI">FRI</input>
			</td></tr>

			<tr><td>Asal</td><td><input type="text" name="asal"></td></tr>
			<tr><td>Moto</td><td><textarea name="moto" rows="10" cols="20"></textarea></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="submit"> </td></tr>


		
		</table>


	</form>
	
</body>
</html>

