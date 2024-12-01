<?php

$nim=$_POST["nim"];
$nama=$_POST["nama"];
$jk=$_POST["jk"];
$alamat=$_POST["alamat"];
$password=$_POST["password"];

include("db/koneksi.php");


$query="INSERT INTO `anggota` (`nim`, `nama`, `jk`, `alamat`) VALUES ('$nim', '$nama', '$jk', '$alamat')";
if (mysqli_query($db, $query)) {

#credirect ke page index
header("location:dataanggota.php");
}
else {
echo "ERROR, data gagal diinput". mysqli_error($db);
}
?>