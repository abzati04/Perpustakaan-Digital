<?php
class Peminjaman {
    private $db;

    // Constructor untuk menginisialisasi database
    public function __construct($db) {
        $this->db = $db;
    }

    // Method untuk mengambil data anggota berdasarkan NIM
    public function getAnggota($nim) {
        $query = mysqli_query($this->db, "SELECT * FROM anggota WHERE nim = '$nim'");
        return mysqli_fetch_array($query);
    }

    // Method untuk menghitung jumlah buku yang dipinjam
    public function getJumlahDipinjam($nim) {
        $query = mysqli_query($this->db, "SELECT * FROM pinjam WHERE nim = '$nim' AND status = 'Dipinjam'");
        return mysqli_num_rows($query);
    }

    // Method untuk mengambil daftar peminjaman buku
    public function getDaftarPeminjaman($nim) {
        $query = mysqli_query($this->db, "SELECT b.judul, p.tanggalpinjam, p.status, p.idbuku 
                                          FROM pinjam p 
                                          JOIN buku b ON p.idbuku = b.idbuku 
                                          WHERE p.nim = '$nim' AND p.status = 'Dipinjam'");
        return $query;
    }

    // Method untuk mengambil daftar buku yang tersedia
    public function getDaftarBuku() {
        $query = mysqli_query($this->db, "SELECT * FROM buku");
        return $query;
    }
}
?>
