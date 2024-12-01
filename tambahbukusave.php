<?php

$idbuku=$_POST["idbuku"];
$judul=$_POST["judul"];
$penulis=$_POST["penulis"];
$banyak=$_POST["banyak"];

include("db/koneksi.php");


$query="INSERT INTO `buku` (`idbuku`, `judul`, `penulis`, `banyak`) VALUES ('$idbuku', '$judul', '$penulis', '$banyak')";
if (mysqli_query($db, $query)) {

#credirect ke page index
header("location:databuku.php");
}
else {
echo "ERROR, data gagal diinput". mysqli_error($db);
}
?>