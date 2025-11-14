<?php 
include '../koneksi.php';
 
$Nama = $_POST['Nama'];
$NIS = $_POST['NIS'];
$Alamat = $_POST['Alamat'];
 
mysqli_query($koneksi,"insert into siswa values(NULL,'$Nama','$NIS','$Alamat')");
 
header("location:../index.php");
 
?>