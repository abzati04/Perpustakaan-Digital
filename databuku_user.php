<!-- Begin Page Content -->
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
								<th width="150">Actions</th>

							</tr>
						</thead>
						<tbody align="center">

							<?php
								include'db/koneksi.php';
								$no=1;
								$dataa=mysqli_query($db, "select * from buku");
								while($d=mysqli_fetch_array($dataa)){
							?>
							<tr>
								<td><?=$no++;?></td>
								<td><?=$d['idbuku'];?></td>
								<td><?=$d['judul'];?></td>
								<td><?=$d['penulis'];?></td>
                                <td><?=$d['banyak'];?></td>
							</tr>

<!-- Edit Modal -->
							<div class="modal fade" id="editModal<?php echo $d['idbuku'];?>"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										</div>
									</div>
									<?php
										}
									?>
								</div>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


