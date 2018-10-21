<?php

$conn=mysqli_connect("localhost","root","","mahasiswa");


function insert($nama,$nim,$tanggal,$jeniskelamin,$prodi,$fakultas,$asal,$moto)
{
	Global $conn;
	mysqli_query($conn,"INSERT INTO profl VALUES('$nama','$nim','$tanggal','$jeniskelamin','$prodi','$fakultas','$asal','$moto')");

}
function cek($nim){
		Global $conn;
	$query=mysqli_query($conn,"SELECT * FROM profl WHERE nim='$nim'");
	$hasil=mysqli_num_rows($query);
	if ($hasil>0) {
		# code...

		return false;
	}
	else{
		return true;
	}

}

function cari($nim)
{
	# code...
	Global $conn;
	$query=mysqli_query($conn,"SELECT * FROM profl WHERE nim like '%$nim%'");
	$hasil=mysqli_num_rows($query);
	$data =[];
	if ($hasil>0) {
		# code...
		for($i=0; $i<$hasil; $i++){
			$data[$i]=mysqli_fetch_array($query);
		}
		return $data;	
	}
		
	else{
		return false;
	}
	}

	function get()
	{
		# code...
		Global $conn;
		$data=[];
		$query=mysqli_query($conn,"SELECT * FROM profl ");
		
		for($i=0; $i<mysqli_num_rows($query); $i++){
			$data[$i]=mysqli_fetch_array($query);
		}
		return $data;
	}

	function del($nim)
	{
		# code...
		Global $conn;
		mysqli_query($conn,"DELETE FROM profl WHERE nim ='$nim' ");
		

	}
	function edit($nama,$nim,$tanggal,$jk,$prodi,$fakultas,$asal,$moto)
{
    # code..
    Global $conn;
    $query=mysqli_query($conn,"UPDATE profl SET 
    nama='$nama',
    tanggal='$tanggal',
    jk='$jk',
    fakultas='$fakultas',
    prodi='$prodi',
	asal='$asal',
	moto='$moto'

	WHERE nim='$nim'");
    // $conn->query($query);
}










?>