<!DOCTYPE html>
<html
	lang="en"
	class="light-style layout-menu-fixed"
	dir="ltr"
	data-theme="theme-default"
	data-assets-path="../assets/"
	data-template="vertical-menu-template-free"
>
<head>
	<?php $this->load->view('layout/header'); ?>
</head>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<?php $this->load->view('layout/menu'); ?>
		<div class="layout-page">
			<?php $this->load->view('layout/navbar'); ?>
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<div class="card">
						<div class="card-header">
							<div class="mb-3 d-flex justify-content-between">
								<h1>Data User</h1>
							</div>
							<div class="mb-3 d-flex justify-content-between">
								<div class="button-wrapper">
									<a href="<?= site_url('user/tambah') ?>" class="btn btn-primary">
										<i class='bx bxs-user-plus d-block d-sm-none'></i>
										<span class="d-none d-sm-block">
												<i class='bx bxs-user-plus'></i>
												Tambah User
											</span>
									</a>
								</div>
							</div>

						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="datatransaksi" class="table-border-bottom-0">
								<?php $this->load->view("content/dataUser",$users) ?>
								</tbody>
							</table>
						</div>
						<div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalCenterTitle">Anda Yakin Ingin Hapus User Ini?</h5>
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
										<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
									</div>
								</div>
							</div>
						</div>
						<form id="form-delete" method="post" action="<?= site_url('user/delete') ?>">
						</form>

						<div class="modal fade" id="modal-confirm-reset" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalCenterTitle">Anda Yakin Ingin Reset Password User Ini?</h5>
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
											Batal
										</button>
										<button type="button" class="btn btn-danger" id="btn-reset">Reset</button>
									</div>
								</div>
							</div>
						</div>
						<form id="form-reset" method="post" action="<?= site_url('user/reset') ?>">
						</form>
					</div>
				</div>
				<?php $this->load->view('layout/footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idAnggota = 0
		$(".btn-delete-user").on("click", function() {
			idAnggota = $(this).data("id");
			console.log(idAnggota);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "username")
				.val(idAnggota);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})

	$(function() {
		let idAnggota = 0
		$(".btn-reset-user").on("click", function() {
			idAnggota = $(this).data("id");
			console.log(idAnggota);
			$("#modal-confirm-reset").modal('show');
		});
		$("#btn-reset").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "username")
				.val(idAnggota);
			let formDelete = $("#form-reset");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-reset").modal('hide');
		});
	})
</script>
