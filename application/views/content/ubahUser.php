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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Ubah User</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-update-user" method="post" action="<?= site_url('user/update') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input require readonly value="<?= $user->username ?>" type="text" class="form-control" name="username" />
										</div>
										<div class="mb-3 form-password-toggle">
											<div class="d-flex justify-content-between">
												<label class="form-label" for="password">Password</label>
											</div>
											<div class="input-group input-group-merge">
												<input
													required
													type="password"
													id="password"
													class="form-control"
													name="password"
													placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
													aria-describedby="password"
												/>
												<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
											</div>
										</div>
									</form>
									<button type="button" id="btn-update-user" class="btn btn-success">
										<i class="bx bx-save"></i> Simpan
									</button>
									<?php
									if ($user->username == 'admin') {
										?>
										<a href="<?= site_url('user/listUser') ?>" class="btn btn-outline-primary">
											<i class="bx bxs-share"></i> Kembali
										</a>
										<?php
									}else {
										?>
										<a href="<?= site_url('dashboard') ?>" class="btn btn-outline-primary">
											<i class="bx bxs-share"></i> Kembali
										</a>
										<?php
									}
									?>

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
</body>
</html>
<script>
	$(function (){
		$("#btn-update-user").on("click", function() {
				$("#form-update-user").submit()
		})
	})
</script>
<?php $this->load->view('layout/script'); ?>
