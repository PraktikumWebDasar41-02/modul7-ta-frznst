<?php
include('conn.php');
session_start();
$nim=$_SESSION['nim'];
$data=cari($nim);
echo $data[0]['nama'];
	if (isset($_POST['submit'])) {
		$nama=$_POST['nama'];
		$tanggal=$_POST['tanggal'];
		$jeniskelamin =$_POST['jk'];
		$prodi=$_POST['prodi'];
		$fakultas=$_POST['fakultas'];
		$asal=$_POST['asal'];
		$moto=$_POST['moto'];
		if ($nama==""||$tanggal==""||$jeniskelamin==""||$prodi==""||$fakultas==""||$asal==""||$moto=="") {
			 echo"<script>alert('Fiel tidak boleh kosong')</script>";
		}

		else
		{

	
			if (strlen(trim($nama," "))>50) {
				 echo"<script>alert('nama tidak boleh lebih 20 karakter')</script>";
			}
	

			else{
				edit($nama,$nim,$tanggal,$jeniskelamin,$prodi,$fakultas,$asal,$moto);
                session_destroy();
                header("Refresh:0; url=3.php");
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
	<title>EDIT</title>
</head>
<body>
	<form action="" method="POST">
		<table>
<?php
$c3=[];

if($data[0]['fakultas']=="FIT"){
    $c3[1]="checked";
}
elseif($data[0]['fakultas']=="FIK"){
    $c3[2]="checked";
}
elseif($data[0]['fakultas']=="FKB"){
    $c3[3]="checked";
}
elseif($data[0]['fakultas']=="FEB"){
    $c3[4]="checked";
}
elseif($data[0]['fakultas']=="FIF"){
    $c3[5]="checked";
}
elseif($data[0]['fakultas']=="FTE"){
    $c3[6]="checked";
}
elseif($data[0]['fakultas']=="FRI"){
    $c3[7]="checked";
}

if($data[0]['prodi']=="MI"){
    $c3[8]="selected";
}
elseif($data[0]['prodi']=="TK"){
    $c3[9]="selected";
}
elseif($data[0]['prodi']=="IF"){
    $c3[10]="selected";
}

?>




			<tr><td>Masukan nama </td><td><input type="text" name="nama" value='<?php echo$data[0]['nama']?>'></td></tr>
			<tr><td>Masukan Tanggal Lahir</td><td><input type="date" name="tanggal" value='<?php echo$data[0]['tanggal']?>'></td></tr>
			
            <tr><td>Jenis Kelamin </td><td><select name="jk">
            <option value="pria">Pria</option>
			<option value="wanita">Wanita</option>
            </select></td></tr>

				<tr><td>Prodi</td><td><select name="prodi">
                <option value="MI" <?php if(isset($c3[8]))echo $c3[8]?>>Manajemen Informatika</option>
				<option value="TK" <?php if(isset($c3[9]))echo $c3[9]?>>Teknik Komputer</option>
				<option value="IF"<?php if(isset($c3[10]))echo $c3[10]?>>Informatika</option></select></td></tr>'

			<tr><td>Fakultas :</td></tr>
			<tr><td>
            <input type="radio" name="fakultas" value="FIT" <?php if(isset($c3[1]))echo $c3[1]?>>FIT</input>
            <input type="radio" name="fakultas" value="FIF" <?php if(isset($c3[5]))echo $c3[5]?>>FIF</input>
			<input type="radio" name="fakultas" value="FKB" <?php if(isset($c3[3]))echo $c3[3]?>>FKB</input
            ><input type="radio" name="fakultas" value="FEB" <?php if(isset($c3[4]))echo $c3[4]?>>FEB</input>
			<input type="radio" name="fakultas" value="FTE" <?php if(isset($c3[6]))echo $c3[6]?>>FTE</input>
            <input type="radio" name="fakultas" value="FIK"<?php if(isset($c3[2]))echo $c3[2]?>>FIK</input>
			<input type="radio" name="fakultas" value="FRI" <?php if(isset($c3[7]))echo $c3[7]?>>FRI</input>
			</td></tr>

			<tr><td>Asal</td><td><input type="text" name="asal" value='<?php echo$data[0]['asal']?>'></td></tr>
			<tr><td>Moto</td><td><textarea name="moto" rows="10" cols="20"><?php echo$data[0]['moto']?></textarea></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="submit"> </td></tr>


		
		</table>


	</form>
	
</body>
</html>

