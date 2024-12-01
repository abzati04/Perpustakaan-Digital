<!-- Topbar --> 
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
<!-- Sidebar Toggle (Topbar)-->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
<!-- Nav Item - User Information -->
	<?php
		include 'db/koneksi.php';
		$no = 1;
		$nama = mysqli_query($db,"select * from user");
		while($n = mysqli_fetch_array($nama)) {
	?>
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-3 d-none d-lg-inline text-gray-600 large"><?php echo "Admin";?></span>
				<span class="mr-3 d-none d-lg-inline text-gray-600 large"><?php echo "/";?></span>
				<span class="mr-3 d-none d-lg-inline text-gray-600 large"><b><?=$n["nama"];?></b></span>
				<img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
			</a>
			<!-- Dropdown - User Information --> 
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#" data-toggle="modal" data-target-="#my Modal">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
				</a>
			</div>
		</li>
		<li>
			<a href="logout.php" class="btn btn-primary btn-icon-split" style="margin-top:20px;">
				<span class="text">Logout</span>
			</a>
		</li>
		<?php
			}
		?>
	</ul>
</nav>
<!-- End of Topbar -->