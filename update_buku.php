<?php
include('db/koneksi.php');

$id=$_GET['idbuku'];
$judul=$_GET['judul'];
$penulis=$_GET['penulis'];
$banyak=$_GET['banyak'];

//query update

$query="UPDATE buku SET judul='$judul', penulis='$penulis', banyak='$banyak' WHERE buku.idbuku='$id'";
if (mysqli_query($db, $query)) {

#credirect ke page index
header("location:databuku.php");
}
else {
echo "ERROR, data gagal diupdate". mysqli_error($db);
}
?>