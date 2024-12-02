<?php
session_start(); // Memulai sesi
include('templates_user/header.php');
include('templates_user/sidebar.php');
include('db/koneksi.php');
include('peminjaman.php'); // Include file class Peminjaman

// Cek apakah pengguna sudah login
if (!isset($_SESSION['nim'])) {
    header("Location: login_user.php");
    exit();
}

// Inisialisasi kelas Peminjaman
$nim = $_SESSION['nim'];
$peminjaman = new Peminjaman($db);
$anggota = $peminjaman->getAnggota($nim);
$jumlahDipinjam = $peminjaman->getJumlahDipinjam($nim);
$daftarBuku = $peminjaman->getDaftarBuku();
$daftarPeminjaman = $peminjaman->getDaftarPeminjaman($nim);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang <b><?= $anggota['nama']; ?></b></h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Jumlah Buku Dipinjam -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Buku Dipinjam</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahDipinjam; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Peminjaman Buku -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman Buku</h6>
            </div>
            <div class="card-body">
                <form action="proses_pinjam.php" method="GET">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <select name="idbuku" class="form-control" required>
                            <option value="">Pilih Buku</option>
                            <?php
                            while ($b = mysqli_fetch_array($daftarBuku)) {
                                echo "<option value='" . $b['idbuku'] . "'>" . $b['judul'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Buku</label>
                        <input type="number" name="banyak" class="form-control" min="1" value="1" required>
                    </div>
                    <input type="hidden" name="nim" value="<?= $nim; ?>">
                    <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Daftar Peminjaman -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center" class="bg-primary" style="color:white">
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                            while ($d = mysqli_fetch_array($daftarPeminjaman)) {
                                echo "<tr>";
                                echo "<td>" . $d['judul'] . "</td>";
                                echo "<td>" . $d['tanggalpinjam'] . "</td>";
                                echo "<td>" . $d['status'] . "</td>";
                                echo "<td>
                                    <form action='kembalikanbuku_user.php' method='POST'>
                                        <input type='hidden' name='idbuku' value='" . $d['idbuku'] . "'>
                                        <input type='hidden' name='nim' value='$nim'>
                                        <button type='submit' class='btn btn-danger'>Kembalikan</button>
                                    </form>
                                  </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('templates_user/footer.php'); ?>
