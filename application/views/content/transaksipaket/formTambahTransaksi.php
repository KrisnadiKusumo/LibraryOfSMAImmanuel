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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Transaksi</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-buku" method="post" action="<?= site_url('transaksi/insertPaket') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Transaksi</label>
											<input require readonly value="<?= $kode_transaksi ?>" type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Transaksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">ID Anggota</label>
											<select class="form-control" name="id_anggota">
												<option disabled value="" selected>---  Pilih Anggota  ---</option>
												<?php
												foreach ($anggotas as $a) :
													?>
													<option value="<?= $a->id_anggota ?>"><?= $a->id_anggota ?> | <?= $a->nama_anggota ?></option>
												<?php
												endforeach;
												?>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Tanggal Pinjam</label>
											<input require value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" name="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" />
										</div>
										<div class="table-responsive text-nowrap mb-3">
											<table id="list" class="table table-hover">
												<thead>
												<tr>
													<th>Kode dan Nama Buku</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
										<div class="mb-3 text-center">
											<label class="form-label">Tambah Buku? </label>
											<input id="button" class="btn btn-sm btn-outline-primary" type="button" value="Tambah" onclick="AddData()">
										</div>
									</form>
									<button type="button" id="btn-save-buku" class="btn btn-success">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('transaksi/paket') ?>" class="btn btn-outline-primary">
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

	function deleterow(el) {
		$(el).closest('tr').remove();
	}

	function AddData() {
		var rows = "";
		rows +=
			"<tr>" +
			"<td>" +

			"<select class='form-control' name='kode_buku[]'>" +
			"<option disabled value='' selected>---  Pilih Buku  ---</option>" +

			"<?php foreach ($fiksis as $f) : ?>" +
			"<option value='<?= $f->kode_buku ?>'><?= $f->kode_buku ?> | <?= $f->judul_buku ?></option>" +
			"<?php endforeach; ?>" +
			"</select>" +
			"</td>" +

			"<td>" +
			"<button class='btn btn-danger btn-sm' onclick = deleterow(this)>Hapus</button>" +
			"</td>" +
			"</tr>"
		$(rows).appendTo("#list tbody");
	}
</script>
</body>
</html>
