<?php
include("db/koneksi.php");

$nim=$_POST["nim"];
$nama=$_POST["nama"];
$jk=$_POST["jk"];
$alamat=$_POST["alamat"];
$password=$_POST["password"];




$query="INSERT INTO `anggota` (`nim`, `nama`, `jk`, `alamat`, `password`) VALUES ('$nim', '$nama', '$jk', '$alamat', '$password')";
if (mysqli_query($db, $query)) {

#credirect ke page index
header("location:login_user.php");
// echo "login berhasil";
}
else {
echo "ERROR, data gagal diinput". mysqli_error($db);
}
?>