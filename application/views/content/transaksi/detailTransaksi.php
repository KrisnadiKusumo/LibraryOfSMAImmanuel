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
							<h1>Data Buku Dipinjam</h1>
							<a href="<?= site_url('transaksi') ?>" class="btn btn-primary">
								<i class='bx bxs-share'></i>  Kembali
							</a>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Buku</th>
									<th>Nama Buku</th>
									<th>Tgl Pinjam</th>
									<th>Deadline</th>
									<th>Tgl Kembali</th>
									<th>Denda</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="table-border-bottom-0">
								<?php
								$no = 1;
								foreach ($details as $d) {


									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $d->kode_buku  ?></td>
										<td><?= $d->judul_buku ?></td>
										<td><?= $d->tgl_pinjam ?></td>
										<td><?= $d->tgl_deadline ?></td>
										<td><?= $d->tgl_kembali ?></td>
										<td>
											<?php
											if ($d->status === ''){
												$td = date_create($d->tgl_deadline);
												$k = date_create($d->tgl_kembali);
												$late = date_diff($td, $k);
												$day = $late->format("%a");
												if ($d->tgl_kembali > $d->tgl_deadline){
													$denda = $day * 200;
												}else{
													$denda = 0;
												}
											}else{
												$denda = 0;
											}
											?>
											<?= $denda ?>
										</td>
										<td>
											<?php
											if ($d->status === '1'){
												echo '<span class="badge bg-label-warning me-1">BORROWED</span>';
											}else{
												echo '<span class="badge bg-label-success me-1">RETURNED</span>';
											}
											?>
										</td>
										<td>
											<?php
											if ($d->status != ''){
												$completed = '';
											}else{
												$completed = 'disabled';
											}
											?>
											<a href="<?= site_url("transaksi/ubahDetail/$d->kode_detail") ?>" class="btn btn-warning btn-sm">
												<i class="bx bx-edit"></i>
											</a>
											<a href="#" data-id="<?= $d->kode_detail ?>" class="btn btn-success btn-sm btn-delete-detail <?=$completed?>">
												<i class="bx bx-recycle"></i>
											</a>
										</td>
									</tr>
									<?php
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalCenterTitle">Apakah Buku Ini Sudah Dikembalikan?</h5>
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
										Belum
									</button>
									<button type="button" class="btn btn-success" id="btn-delete">Sudah</button>
								</div>
							</div>
						</div>
					</div>
					<form id="form-delete" method="post" action="<?= site_url('transaksi/kembalikan/'.$d->kode_transaksi) ?>">
						<input require type="hidden" value="<?= $d->kode_detail  ?>" class="form-control" name="kode_detail" />
					</form>
				</div>
				<?php $this->load->view('layout/footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idBuku = 0
		$(".btn-delete-detail").on("click", function() {
			idBuku = $(this).data("id");
			console.log(idBuku);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "kode_detail")
				.val(idBuku);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>

