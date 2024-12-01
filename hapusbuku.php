<?php
// koneksi database
include('db/koneksi.php');
 
// menangkap data id yang di kirim dari url
$id = $_GET["id"];
 
echo $id;
// menghapus data dari database
$query="DELETE FROM buku where idbuku='$id'";
if(mysqli_query($db, $query)) {
// mengalihkan halaman kembali ke index.php
header("location:databuku.php");
}
else {
echo "ERROR, data gagal dihapus". mysqli_error($db);
}
?>