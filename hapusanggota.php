<?php
// koneksi database
include('db/koneksi.php');
 
// menangkap data id yang di kirim dari url
$id = $_GET["nim"];
 
echo $id;
// menghapus data dari database
$query="DELETE FROM anggota where nim='$id'";
if(mysqli_query($db, $query)) {
// mengalihkan halaman kembali ke index.php
header("location:dataanggota.php");
}
else {
echo "ERROR, data gagal dihapus". mysqli_error($db);
}
?>