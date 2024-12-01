<?php
include 'db/koneksi.php';

$username=mysqli_real_escape_string($db,$_POST['username']);
$password=mysqli_real_escape_string($db,$_POST['password']);

$query=mysqli_query($db,"select * from user where iduser='$username' and pass='$password'");
$cek=mysqli_num_rows($query);

if($cek > 0){

session_start();
$_SESSION['username']=$username;
$_SESSION['status'] ='login';
header("location:index.php");
} else {

header("location:login.php?pesan=gagal");
}
?>