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
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<?php $this->load->view('layout/menu'); ?>
		<div class="layout-page">
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Perpanjang Masa Peminjaman</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-buku" method="post" action="<?= site_url('transaksi/updateDetail') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require readonly value="<?= $detail->kode_buku?>" type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Buku</label>
											<input require readonly value="<?= $detail->judul_buku?>" type="text" class="form-control" name="judul_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tanggal Pinjam</label>
											<input require value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" name="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" />
										</div>
										<input require type="hidden" value="<?= $detail->kode_detail?>" class="form-control" name="kode_detail" />
										<input require type="hidden" value="<?= $detail->kode_transaksi?>" class="form-control" name="kode_transaksi" />
									</form>
									<button type="button" id="btn-save-buku" class="btn btn-success ">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('transaksi/detail/'. $detail->kode_transaksi) ?>" class="btn btn-primary ">
										<i class="bx bxs-share"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
</div>
<script>
	$(function (){
		$("#btn-save-buku").on("click", function() {
			let validate = $("#form-tambah-buku").valid()
			if (validate) {
				$("#form-tambah-buku").submit()
			}
		})
		$("#form-tambah-buku").validates({
			rules: {
				kode_buku: {
					digits: true
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			}
		})
	})
</script>
</body>
</html>
