<!DOCTYPE html>
<html>
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
					<h4 class="fw-bold py-3 mb-4">Detail Buku Paket</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Buku Paket</h5>
								</div>
								<div class="card-body">
									<form id="form-update-buku" method="post" action="<?= site_url('buku/updateBuku') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kategori Buku</label>
											<input require type="text" readonly value="<?= $buku->jenis_buku?>"  class="form-control" name="jenis_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require type="text" readonly value="<?= $buku->kode_buku?>"  class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Buku</label>
											<input require type="text" readonly value="<?= $buku->judul_buku?>" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang Buku</label>
											<input require type="text" readonly value="<?= $buku->pengarang_buku?>" class="form-control" name="pengarang_buku" placeholder="Masukkan Pengarang Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Penerbit Buku</label>
											<input require type="text" readonly value="<?= $buku->penerbit_buku?>" class="form-control" name="penerbit_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tahun Terbit</label>
											<input require type="text" readonly value="<?= $buku->thn_terbit_buku?>" class="form-control" name="thn_terbit_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Bahasa Buku</label>
											<input require type="text" readonly value="<?= $buku->bahasa_buku?>" class="form-control" name="bahasa_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Klasifikasi Buku</label>
											<input require type="text" readonly value="<?= $buku->klasifikasi_buku?>" class="form-control" name="klasifikasi_buku" placeholder="Masukkan Klasifikasi Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal Buku</label>
											<input require type="text" readonly value="<?= $buku->sumber_asal_buku?>" class="form-control" name="bahasa_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Harga Buku</label>
											<input require type="number" readonly value="<?= $buku->harga_buku?>" class="form-control" name="harga_buku" placeholder="Masukkan Harga Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah Buku</label>
											<input require type="number" readonly value="<?= $buku->jumlah_buku?>" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" />
										</div>
										<div class="mb-3">
											<a href="<?= site_url('buku/buku') ?>" class="btn btn-primary">
												<i class="bx bxs-share"></i> Kembali
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function (){
		$("#btn-update-buku").on("click", function() {
			let validate = $("#form-update-buku").valid()
			if (validate) {
				$("#form-update-buku").submit()
			}
		})
		$("#form-update-buku").validates({
			rules: {
				kode_buku: {
					digits: true
				},
				jumlah_buku: {
					digits: true
				}
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
