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
								<h1>Data Transaksi Fiksi</h1>
							</div>
							<div class="mb-3 d-flex justify-content-between">
								<div class="button-wrapper">
									<a href="<?= site_url('transaksi/tambah') ?>" class="btn btn-primary">
										<i class='bx bxs-cart-add d-block d-sm-none'></i>
										<span class="d-none d-sm-block">
												<i class='bx bxs-cart-add'></i>
												Tambah Transaksi
											</span>
									</a>
								</div>
								<form class="d-flex" onsubmit="return false">
									<input class="form-control me-2" onkeyup="cariTransaksi()" type="text" id="searchinput" placeholder="Cari..." aria-label="Search" />
								</form>
							</div>
							<div class="mb-3 d-flex justify-content-center demo-inline-spacing">
								<a href="<?= site_url('transaksi') ?>" class="btn rounded-pill btn-outline-dark">
									Semua
								</a>

								<a href="<?= site_url('transaksi/active') ?>" class="btn rounded-pill btn-outline-dark active">
									Aktif
								</a>
								<a href="<?= site_url('transaksi/selesai') ?>" class="btn rounded-pill btn-outline-dark">
									Selesai
								</a>
							</div>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped" id="myTable">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Peminjam</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="datatransaksi" class="table-border-bottom-0">
								<?php $this->load->view("content/transaksi/ajax/datatransaksi",$transaksis) ?>
								</tbody>
							</table>
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

	function cariTransaksi()
	{
		// Declare variables
		var input, filter, table, tr, i, j, column_length, count_td;
		column_length = document.getElementById('myTable').rows[0].cells.length;
		input = document.getElementById("searchinput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 1; i < tr.length; i++) { // except first(heading) row
			count_td = 0;
			for(j = 1; j < column_length-1; j++){ // except first column
				td = tr[i].getElementsByTagName("td")[j];
				/* ADD columns here that you want you to filter to be used on */
				if (td) {
					if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {
						count_td++;
					}
				}
			}
			if(count_td > 0){
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}

</script>
