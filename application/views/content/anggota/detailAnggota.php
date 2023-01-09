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
					<h4 class="fw-bold py-3 mb-4">Detail Anggota</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Anggota</h5>
								</div>
								<div class="card-body">
									<form id="form-update-anggota" method="post" action="<?= site_url('anggota/update') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Foto Anggota</label>
											<img
												src="<?php echo base_url() . '/foto/' . $anggota->foto_anggota ?>"
												alt="user-avatar"
												class="d-block rounded"
												height="100"
												width="100"
												id="uploadedAvatar"
											/>
										</div>
										<div class="mb-3">
											<label class="form-label">No Identitas</label>
											<input require type="" readonly value="<?= $anggota->id_anggota?>" class="form-control" name="id_anggota"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Anggota</label>
											<input require type="text" readonly value="<?= $anggota->nama_anggota?>" class="form-control" name="nama_anggota" placeholder="Masukkan Nama Anggota" />
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat Anggota</label>
											<input require type="text" readonly value="<?= $anggota->alamat_anggota?>" class="form-control" name="alamat_anggota" placeholder="Masukkan Alamat Anggota Ex: Dukuh, Desa, Kecamatan, Kabupaten." />
										</div>
										<div class="mb-3">
											<label class="form-label">No Telepon Anggota</label>
											<input require type="text" readonly value="<?= $anggota->no_telp_anggota?>" class="form-control" name="no_telp_anggota" placeholder="Masukkan No Telepon Anggota" />
										</div>
										<div class="mt-2">
											<a href="<?= site_url('anggota') ?>" class="btn btn-primary">
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
			<?php $this->load->view('layout/footer'); ?>
		</div>
		</div>
	</div>
</div>
<script>
	$(function (){
		$("#btn-update-anggota").on("click", function() {
			let validate = $("#form-update-anggota").valid()
			if (validate) {
				$("#form-update-anggota").submit()
			}
		})
		$("#form-update-anggota").validates({
			rules: {
				id_anggota: {
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
