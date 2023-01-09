<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<img src="<?= base_url();?>assets/img/LogoSMAIMMANUEL.png" width="55" height="55" class="d-inline-block align-top" alt="">
		<span class="app-brand-text text-center menu-text fw-bolder ms-xl-auto">SI PERPUS<br>SMA IMMANUEL</span>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>
	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item <?=$isActive1?>">
			<a href="<?= site_url('dashboard') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-dashboard"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>
		<li class="menu-item <?=$isActive2?>">
			<a href="<?= site_url('anggota') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user-detail"></i>
				<div data-i18n="Layouts">Data Anggota</div>
			</a>
		</li>
		<li class="menu-item <?=$isActive3?>">
			<a href="<?= site_url('buku/fiksi') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-book-reader"></i>
				<div data-i18n="Layouts">Data Buku Fiksi</div>
			</a>
		</li>
		<li class="menu-item <?=$isActive4?>">
			<a href="<?= site_url('buku/buku') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-book-bookmark"></i>
				<div data-i18n="Layouts">Data Buku Paket</div>
			</a>
		</li>
		<!-- Forms & Tables -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi Peminjaman</span></li>
		<!-- Tables -->
		<li class="menu-item <?=$isActive5?>">
			<a href="<?= site_url('transaksi') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-bookmark-alt-plus"></i>
				<div data-i18n="Tables">Data Transaksi Fiksi</div>
			</a>
		</li>
		<li class="menu-item <?=$isActive6?>">
			<a href="<?= site_url('transaksi/paket') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-bookmark-alt-plus"></i>
				<div data-i18n="Tables">Data Transaksi Paket</div>
			</a>
		</li>
	</ul>
	</li>
</aside>
