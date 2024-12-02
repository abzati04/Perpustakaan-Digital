<?php
session_start();
include('db/koneksi.php');

// Cek apakah data yang diperlukan tersedia
if (isset($_POST['idbuku']) && isset($_POST['nim'])) {
    $idbuku = $_POST['idbuku'];
    $nim = $_POST['nim'];

    // Mulai transaksi untuk menjaga konsistensi data
    mysqli_begin_transaction($db);

    try {
        // 1. Update status peminjaman di tabel `pinjam`
        $updatePinjam = mysqli_query($db, "UPDATE pinjam SET status = 'Dikembalikan' 
                                           WHERE idbuku = '$idbuku' AND nim = '$nim' AND status = 'Dipinjam'");
        if (!$updatePinjam || mysqli_affected_rows($db) == 0) {
            throw new Exception("Tidak ada peminjaman yang sesuai untuk dikembalikan.");
        }

        // 2. Update stok buku di tabel `buku` (tambahkan stok 1 untuk setiap pengembalian)
        $updateBuku = mysqli_query($db, "UPDATE buku SET banyak = banyak + 1 WHERE idbuku = '$idbuku'");
        if (!$updateBuku) {
            throw new Exception("Gagal memperbarui stok buku. MySQL Error: " . mysqli_error($db));
        }

        // Commit transaksi jika semua query berhasil
        mysqli_commit($db);

        // Redirect ke halaman dashboard user dengan pesan sukses
        header("Location: dashboard_user.php?pesan=sukses_kembali");
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        mysqli_rollback($db);
        echo "Error: " . $e->getMessage();
        exit; // Hentikan eksekusi
    }
} else {
    // Jika data tidak lengkap
    die("Error: Data tidak lengkap. ID Buku atau NIM tidak ditemukan.");
}
