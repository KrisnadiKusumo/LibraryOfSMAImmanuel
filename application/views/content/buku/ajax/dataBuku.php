<?php
$no = 1;
foreach ($bukus as $b) {
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td>

			<?= $b->jenis_buku  ?>
		</td>
		<td><?= $b->kode_buku  ?></td>
		<td><?= $b->judul_buku ?></td>
		<td><?= $b->jumlah_buku ?></td>
		<td>
			<a href="<?= site_url("buku/detailBuku/$b->kode_buku") ?>" class="btn btn-info btn-sm">
				<i class='bx bxs-detail'></i>
			</a>
			<a href="<?= site_url("buku/ubahBuku/$b->kode_buku") ?>" class="btn btn-warning btn-sm">
				<i class="bx bxs-edit"></i>
			</a>
			<a href="#" data-id="<?= $b->kode_buku ?>" class="btn btn-danger btn-sm btn-delete-buku">
				<i class="bx bxs-trash"></i>
			</a>
		</td>
	</tr>
	<?php
}
?>
