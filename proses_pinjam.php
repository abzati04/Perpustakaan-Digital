<?php
session_start();
include 'db/koneksi.php'; // Pastikan ini mengarah ke file koneksi database Anda

// Ambil data dari query string
$nim = $_GET['nim'];
$idbuku = $_GET['idbuku'];
$banyak = $_GET['banyak'];

// Cek apakah buku tersedia
$queryBuku = mysqli_query($db, "SELECT * FROM buku WHERE idbuku = '$idbuku'");
$buku = mysqli_fetch_array($queryBuku);

if ($buku) {
    // Misalkan kolom 'banyak' menyimpan jumlah buku yang tersedia
    if ($buku['banyak'] > 0) {
        // Cek apakah pengguna sudah meminjam buku ini
        $queryPinjam = mysqli_query($db, "SELECT * FROM pinjam WHERE nim = '$nim' AND idbuku = '$idbuku' AND status = 'Dipinjam'");
        
        if (mysqli_num_rows($queryPinjam) > 0) {
            // Jika sudah meminjam, redirect dengan status duplicate
            header("Location: dashboard_user.php?status=already_borrowed");
        } else {
            // Insert ke tabel pinjam
            $sqlPinjam = "INSERT INTO pinjam (nim, idbuku, tanggalpinjam, status) VALUES ('$nim', '$idbuku', NOW(), 'Dipinjam')";
            if (mysqli_query($db, $sqlPinjam)) {
                // Kurangi jumlah buku di tabel buku
                $newJumlah = $buku['banyak'] - 1;
                $updateBuku = mysqli_query($db, "UPDATE buku SET banyak = '$newJumlah' WHERE idbuku = '$idbuku'");

                if ($updateBuku) {
                    // Redirect kembali ke halaman peminjaman dengan status sukses
                    header("Location: dashboard_user.php?status=success");
                } else {
                    // Jika gagal update
                    echo "Gagal mengupdate jumlah buku: " . mysqli_error($db);
                    header("Location: dashboard_user.php?status=error_update");
                }
            } else {
                // Jika gagal insert
                echo "Gagal melakukan peminjaman: " . mysqli_error($db);
                header("Location: dashboard_user.php?status=error_insert");
            }
        }
    } else {
        // Jika buku tidak tersedia
        header("Location: dashboard_user.php?status=not_available");
    }
} else {
    // Jika buku tidak ditemukan
    header("Location: dashboard_user.php?status=error");
}
?>