<?php
include 'db/koneksi.php';

$nim=mysqli_real_escape_string($db,$_POST['nim']);
$password=mysqli_real_escape_string($db,$_POST['password']);

$query=mysqli_query($db,"select * from anggota where nim='$nim' and password='$password'");
$cek=mysqli_num_rows($query);

if($cek > 0){

session_start();
$_SESSION['nim']=$nim;
$_SESSION['status'] ='login';
header("location:dashboard_user.php");
} else {

header("location:login_user.php?pesan=gagal");
exit();
}
?>