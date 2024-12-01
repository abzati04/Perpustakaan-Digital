<?php
	include('templates/header.php');
	include('templates/sidebar.php');
?>
  
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heanding -->
	<div class="d-sm-flex align-items-center juustify-content-between mb-4">
		<?php
			include'db/koneksi.php';
			$nama = mysqli_query($db,"select*from user");
			while($n = mysqli_fetch_array($nama)){
		?>

		<h1 class="h3 mb-0 text-gray-800">Selamat Datang <b><?=$n['nama'];?></b></h1>
			<?php
				}
			?>
	</div>

<!-- Content Row -->
	<div class="row">
		<?php
			include'db/koneksi.php';
			$sql1=mysqli_query($db,"SELECT * FROM anggota");
			$sql2=mysqli_query($db,"SELECT * FROM buku");
			$sql3=mysqli_query($db,"SELECT * FROM pinjam");
		?>

<!-- Jumlah Anggota -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Anggota</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php $jagt = $jagt=mysqli_num_rows($sql1); echo $jagt;?></div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-hard-hat fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div> 

<!-- Jumlah Buku -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Buku</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php $jumlah2 = array(); 
								while($r2 = mysqli_fetch_array($sql2))
								{$jumlah2[]=$r2['banyak'];}$jumlahnya2 = array_sum($jumlah2);echo"$jumlahnya2";
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-tshirt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

<!-- Jumlah  -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
							Kosong</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								kosong
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-socks fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

<!-- jumlah dipinjam -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Buku Dipinjam</div>
							<?php
								include('db/koneksi.php');
								$data = mysqli_query($db,"SELECT * from pinjam WHERE status='Dipinjam'");
								$data1 = mysqli_query($db,"SELECT * from pinjam WHERE status='Dikembalikan'");
								$d = $d=mysqli_num_rows($data);
								$d2 = $d2 = mysqli_num_rows($data1);
								$total = $d - $d2;
							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total;?></div>
								
						</div>
						<div class="col-auto">
							<i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Content Row -->
	<div class="row">

<!-- Content Column -->
		<div class="col-lg-12 mb-4">

<!-- Data Tables Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Daftar Peminjam Buku</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> 
							<thead align="center" class="bg-primary" style="color:white">
								<tr>
									<th>ID</th>
									<th>NIM</th>
									<th>Judul</th>
									<th>Tanggal</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody align="center">
								<?php
									include('db/koneksi.php');
									$no=1;
									$dataa= mysqli_query($db,"select * from pinjam WHERE status='Dipinjam'");
									while($d=mysqli_fetch_array($dataa)) {
										echo "<tr>";
											echo "<td>".$d[0]."</td>";
											echo "<td>".$d[1]."</td>";
											echo "<td>".$d[2]."</td>";
											echo "<td>".$d[3]."</td>";
											echo "<td>".$d[4]."</td>";
								
											
								
									}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('templates/Footer.php');
?>
