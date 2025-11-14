<?php 
include '../koneksi.php';
 
$id = $_POST['id'];
$nama = $_POST['Nama'];
$nis = $_POST['NIS'];
$alamat = $_POST['Alamat'];
 
mysqli_query($koneksi,"update siswa set Nama='$nama', NIS='$nis', Alamat='$alamat' where id='$id'");

header("location:../index.php");
 
?>