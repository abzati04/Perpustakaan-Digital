<?php
include('templates/header.php');
include('templates/sidebar.php');
?>

<?php
$server = "localhost";
$user="root";
$password="";
$nama_database = "perpus";
$db=mysqli_connect($server, $user, $password, $nama_database);
?>

<!--Begin Page Content-->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Form Tambah Buku</b></h1> 
</div>

<!--Content Row -->

<form method="POST" action="tambahbukusave.php">
<div class="form-group row">
<label for="staticEmail" class="col-sm-4 col-form-label">ID Buku</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="idbuku" id="inputID" required="">
</div>
</div>

<div class="form-group row">
<label for="staticEmail" class="col-sm-4 col-form-label">judul</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="judul" id="inputNama" required="">
</div>
</div>

<div class="form-group row">
<label for="staticEmail" class="col-sm-4 col-form-label">penulis</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="penulis" id="inputNama" required="">
</div>
</div>



<div class ="form-group row">
<label for="inputalamat" class="col-sm-4 col-form-label">Jumlah Buku</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="banyak" id="inputalamat" required="">
</div>
</div>


<div class="mx-auto" style="width:200px;">
<button type="submit" class="btn btn-outline-primary">Simpan</button>
<button type="reset" class="btn btn-outline-primary">Batal</button>
</div>
</form>
</div>

<?php
include('templates/footer.php');
?>
