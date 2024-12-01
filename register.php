<?php
$server = "localhost";
$user="root";
$password="";
$nama_database = "perpus";
$db=mysqli_connect($server, $user, $password, $nama_database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid">

<!-- Page Heading -->
<div class="text-center align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar</h1>
</div>

<!--Content Row -->
<form method="POST" action="tambahusersave.php">
    <div class="mb-3 row">
        <label for="inputID" class="col-sm-4 col-form-label">NIM Mahasiswa</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="nim" id="inputID" required="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputNama" class="col-sm-4 col-form-label">Nama</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="nama" id="inputNama" required="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Jenis kelamin</label>
        <div class="col-sm-8">
            <select class="form-select" name="jk" id="exampleFormControlSelect1" required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputalamat" class="col-sm-4 col-form-label">Alamat</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="alamat" id="inputalamat" required="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputpassword" class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" name="password" id="inputpassword" required="">
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Batal</button>
    </div>
</form>
</div>

<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- FontAwesome -->
<script src="assets/vendor/fontawesome-free/js/all.min.js"></script>
</body>
</html>