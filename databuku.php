<?php
include('templates/header.php'); 
include('templates/sidebar.php');
?>

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
				<div class="card-header py-3 bg-primary rounded">
					<a href="tambahbuku.php">
						<h6 class="m-0 font-weight-bold text-white">Tambah Buku</h6>
					</a>
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
								<td>
									<a href="#" class="btn btn-sm btn-outline-primary mr-2" data-toggle="modal" data-target="#editModal<?php echo $d['idbuku'];?>">
									<i class="fas fa-edit mr-1"></i>Update</a>
									<a href="hapusbuku.php?id=<?php echo $d['idbuku'];?>" class="btn btn-sm btn-outline-primary mr-2">
									<i class="fas fa-edit mr-1"></i>Delete</a>
								</td>
							</tr>

<!-- Edit Modal -->
							<div class="modal fade" id="editModal<?php echo $d['idbuku'];?>"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModallabel">Update Data Buku</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">x</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="get" action="update_buku.php">
		
													<?php
														include 'db/koneksi.php';
														$id=$d['idbuku'];
														$query_edit=mysqli_query($db,"SELECT * FROM buku WHERE idbuku='$id'");
														while($data=mysqli_fetch_array($query_edit)) {
													?>
														<input type="hidden" name="id_sg" value="<?php echo $data['idbuku'];?>"/> 
														<div class="form-group row">
															<label for="staticEmail" class="col-sm-4 col-form-label">ID Buku</label>
															<div class="col-sm-5">
																<input type="text" class="form-control" name="idbuku" id="inputwarna" value="<?=$data['idbuku'];?>" readonly>
															</div>
														</div>	
														<div class="form-group row">
															<label for="inputNama" class="col-sm-4 col-form-label">Judul</label>
															<div class="col-sm-5">
																<input type="text" class="form-control" name="judul" id="inputlayakPakai" value="<?=$data['judul'];?>">
															</div>
														</div>

														<div class="form-group row">
															<label for="inputTLayakPakai" class="col-sm-4 col-form-label">Penulis</label>
															<div class="col-sm-5">
                                                                <input type="text" class="form-control" name="penulis" id="inputTLayakPakai" value="<?=$data['penulis'];?>">
															</div>
														</div>

                                                        <div class="form-group row">
															<label for="inputTLayakPakai" class="col-sm-4 col-form-label">Banyak</label>
															<div class="col-sm-5">
																<input type="number" class="form-control" name="banyak" id="inputTLayakPakai" value="<?=$data['banyak'];?>">
															</div>
														</div>

														<div class="modal-footer">
															<button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-outline-primary">Simpan</button>
														</div>
												</form>
											</div>
										</div>
									</div>
									<?php
										}
									?>
								</div>
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
</div>

<?php
include('templates/footer.php');
?>



