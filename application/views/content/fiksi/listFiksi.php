<!DOCTYPE html>
<html lang="en"
	  class="light-style layout-menu-fixed"
	  dir="ltr"
	  data-theme="theme-default"
	  data-assets-path="../assets/"
	  data-template="vertical-menu-template-free">
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
							<h1>Data Buku Fiksi</h1>
							<div class="d-flex justify-content-between">
								<div class="button-wrapper">
									<a href="<?= site_url('buku/tambahFiksi') ?>" class="btn btn-primary">
									<i class='bx bxs-book-add d-block d-sm-none'></i>
										<span class="d-none d-sm-block">
												<i class='bx bxs-book-add'></i>
												Tambah Buku
											</span>
									</a>
								</div>
								<form class="d-flex" onsubmit="return false">
									<input class="form-control me-2" onkeyup="cariFiksi()" type="text" id="searchinput" placeholder="Cari..." aria-label="Search" />
								</form>
							</div>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped" id="myTable">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Judul</th>
									<th>Jumlah</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="datafiksi" class="table-border-bottom-0">
								<?php $this->load->view("content/fiksi/ajax/dataFiksi",$fiksis) ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalCenterTitle">Anda Yakin Ingin Hapus Data Ini?</h5>
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
					<form id="form-delete" method="post" action="<?= site_url('buku/deleteFiksi') ?>">
					</form>
				</div>
			</div>
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idBuku = 0
		$(".btn-delete-buku").on("click", function() {
			idBuku = $(this).data("id");
			console.log(idBuku);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "kode_buku")
				.val(idBuku);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
<script>
	function cariFiksi()
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
