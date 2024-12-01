<?php
include('db/koneksi.php');

$id=$_GET['nim'];
$nama=$_GET['nama'];
$jk=$_GET['jk'];
$alamat=$_GET['alamat'];

//query update

$query="UPDATE anggota SET nama='$nama', jk='$jk', alamat='$alamat' WHERE anggota.nim='$id'";
if (mysqli_query($db, $query)) {

#credirect ke page index
header("location:dataanggota.php");
}
else {
echo "ERROR, data gagal diupdate". mysqli_error($db);
}
?>