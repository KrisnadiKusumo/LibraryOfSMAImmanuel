<nav
	class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
	id="layout-navbar"
>
	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
		<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
			<i class="bx bx-menu bx-sm"></i>
		</a>
	</div>

	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		<!-- Search -->
		<div class="navbar-nav align-items-center">
			<div class="nav-item  d-flex align-items-center">
				<i class="bx bx-calendar fs-4 lh-0"></i>
					<b>&nbsp;&nbsp;
						<span id="tanggalwaktu"></span>
					</b>
			</div>
		</div>
		<!-- /Search -->

		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<!-- User -->
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="avatar avatar-online">
						<img src="<?php base_url();?>/assets/img/avatars/admin.jpg" alt class="w-px-40 h-auto rounded-circle" />
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item" href="#">
							<div class="d-flex">
								<div class="flex-shrink-0 me-3">
									<div class="avatar avatar-online">
										<img src="<?php base_url();?>/assets/img/avatars/admin.jpg" alt class="w-px-40 h-auto rounded-circle" />
									</div>
								</div>
								<div class="flex-grow-1">
									<span class="fw-semibold d-block">SIPINTAR</span>
									<small class="text-muted text-capitalize"><?= $this->session->userdata('username') ?></small>
								</div>
							</div>
						</a>
					</li>
					<div class="dropdown-divider"></div>
					</li>
					<?php
					$user = $this->session->userdata('username');
					if ($user == 'admin'){
						?>
						<li>
						<a class="dropdown-item" href="<?= site_url("user/listUser") ?>">
							<i class="bx bx-user-circle me-2"></i>
							<span class="align-middle">List Admin</span>
						</a>
						</li>
					<?php
					}else{
					?>
						<li>
							<a class="dropdown-item" href="<?= site_url("user/ubah/$user") ?>">
								<i class="bx bx-user-circle me-2"></i>
								<span class="align-middle">Ubah Password</span>
							</a>
						</li>
					<?php
					}
					?>
					<li>
						<a class="dropdown-item btn-logout" href="#modal-logout">
							<i class="bx bx-power-off me-2"></i>
							<span class="align-middle">Log Out</span>
						</a>
					</li>
				</ul>
			</li>
			<!--/ User -->
		</ul>
	</div>
</nav>
<div class="modal fade" id="modal-logout" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCenterTitle">Anda Yakin Ingin Keluar?</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<div class="row">
				</div>
				<div class="row g-2">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					Tidak
				</button>
				<button type="button" class="btn btn-danger" id="btn-logout">Logout</button>
			</div>
		</div>
	</div>
</div>
<form id="form-logout" method="post" action="<?= site_url('login/logout') ?>">
</form>
<script>
	$(function() {
		let idAnggota = 0
		$(".btn-logout").on("click", function() {
			idAnggota = $(this).data("id");
			console.log(idAnggota);
			$("#modal-logout").modal('show');
		});
		$("#btn-logout").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_anggota")
				.val(idAnggota);
			let formDelete = $("#form-logout");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-logout").modal('hide');
		});
	})


</script>
<script>
	var tw = new Date();
	if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
	else (a=tw.getTime());
	tw.setTime(a);
	var tahun= tw.getFullYear ();
	var hari= tw.getDay ();
	var bulan= tw.getMonth ();
	var tanggal= tw.getDate ();
	var hariarray=new Array(" Minggu,"," Senin,"," Selasa,"," Rabu,"," Kamis,"," Jum'at,"," Sabtu,");
	var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
</script>
<?php $this->load->view('layout/script'); ?>
