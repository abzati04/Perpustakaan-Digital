<!-- Begin Page Content -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perpustakaan</title>

    <!-- Custom fonts and styles -->
    <link href="assets/vendor/fontawesome-free/ess/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">
            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="container d-flex justify-content-between">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center" class="bg-primary" style="color:white">
                                <tr>
                                    <th>No</th>
                                    <th>ID Buku</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Banyak</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php
                                include 'db/koneksi.php';
                                $no = 1;
                                $dataa = mysqli_query($db, "SELECT * FROM buku");
                                while ($d = mysqli_fetch_array($dataa)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['idbuku']; ?></td>
                                        <td><?= $d['judul']; ?></td>
                                        <td><?= $d['penulis']; ?></td>
                                        <td><?= $d['banyak']; ?></td>
                                    </tr>

                                    <!-- Edit Modal -->
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <Footer class="sticky-footer bg-white">
	<div class="container my-auto">
	<div class="copyright text-center my-auto">
		<span>Copyright &copy; Perpustakaan Umum</span>
	</div>
	</div>
</footer>
</body>
</html>