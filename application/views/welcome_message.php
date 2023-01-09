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
	<meta charset="utf-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
	/>
	<title>Form Tambah Buku</title>
	<meta name="description" content="" />
	<link rel="icon" type="image/x-icon" href="<?php base_url();?>/assets/img/favicon/favicon.ico" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet"
	/>
	<link rel="stylesheet" href="<?php base_url();?>/assets/vendor/fonts/boxicons.css" />
	<link rel="stylesheet" href="<?php base_url();?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?php base_url();?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?php base_url();?>/assets/css/demo.css" />
	<link rel="stylesheet" href="<?php base_url();?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<script src="<?php base_url();?>/assets/vendor/js/helpers.js"></script>
	<script src="<?php base_url();?>/assets/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<!-- Menu -->

		<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
			<div class="app-brand demo">
				<span class="app-brand-text text-center menu-text fw-bolder ms-xl-auto">Sistem Informasi<br>Perpustakaan</span>
				<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
					<i class="bx bx-chevron-left bx-sm align-middle"></i>
				</a>
			</div>

			<div class="menu-inner-shadow"></div>

			<ul class="menu-inner py-1">
				<!-- Dashboard -->
				<li class="menu-item">
					<a href="#" class="menu-link">
						<i class="menu-icon tf-icons bx bx-home-circle"></i>
						<div data-i18n="Analytics">Dashboard</div>
					</a>
				</li>
				<!-- Layouts -->
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-layout"></i>
						<div data-i18n="Layouts">Data</div>
					</a>

					<ul class="menu-sub">
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Without menu">Anggota</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Without navbar">Buku</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Container">Transaksi</div>
							</a>
						</li>
					</ul>
				</li>
				<!-- Forms & Tables -->
				<li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
				<!-- Forms -->
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-detail"></i>
						<div data-i18n="Form Elements">Form Elements</div>
					</a>
					<ul class="menu-sub">
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Basic Inputs">Basic Inputs</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Input groups">Input groups</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-item active open">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-detail"></i>
						<div data-i18n="Form Layouts">Form Layouts</div>
					</a>
					<ul class="menu-sub">
						<li class="menu-item active">
							<a href="#" class="menu-link">
								<div data-i18n="Vertical Form">Vertical Form</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link">
								<div data-i18n="Horizontal Form">Horizontal Form</div>
							</a>
						</li>
					</ul>
				</li>
				<!-- Tables -->
				<li class="menu-item">
					<a href="#" class="menu-link">
						<i class="menu-icon tf-icons bx bx-table"></i>
						<div data-i18n="Tables">Tables</div>
					</a>
				</li>
			</ul>
		</aside>
		<div class="layout-page">

			<!-- Content wrapper -->
			<div class="content-wrapper">
				<!-- Content -->

				<div class="container-xxl flex-grow-1 container-p-y">
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Buku</h4>

					<!-- Basic Layout -->
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Buku</h5>
								</div>
								<div class="card-body">
									<form id="form-tambah-buku" method="post" action="#" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input required type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Buku</label>
											<input required type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang</label>
											<input required type="text" class="form-control" name="pengarang_buku" placeholder="Masukkan Pengarang Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Penerbit</label>
											<input required type="text" class="form-control" name="penerbit_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tahun Terbit</label>
											<input required type="text" class="form-control" name="tahun_buku" placeholder="Masukkan Tahun Terbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal</label>
											<input required type="text" class="form-control" name="sumber_buku" placeholder="Masukkan Sumber Asal Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah Buku</label>
											<input required type="text" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" />
										</div>
									</form>
								</div>
								<div class="card-footer">
									<button type="button" id="btn-save-buku" class="btn btn-success btn-sm">
										<i class="fa fa-save"></i>Simpan
									</button>
									<a href="#" class="btn btn-primary btn-sm">
										<i class="fa fa-reply"></i>Kembali
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php base_url();?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php base_url();?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?php base_url();?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?php base_url();?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php base_url();?>/assets/vendor/js/menu.js"></script>
<script src="<?php base_url();?>/assets/js/main.js"></script>
</body>
</html>
