<?php
$no = 1;
foreach ($fiksis as $f) {
	$this->db->where('kode_buku',$f->kode_buku);
	$this->db->where('status','1');
	$jumlahPinjam = $this->db->count_all_results('detail');
	$jumlah_buku_now = $f->jumlah_buku - $jumlahPinjam;
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $f->kode_buku  ?></td>
		<td><?= $f->judul_buku ?></td>
		<td><?=
			$jumlah_buku_now
			?></td>
		<td>
			<a href="<?= site_url("buku/detailFiksi/$f->kode_buku") ?>" class="btn btn-info btn-sm">
				<i class='bx bxs-detail'></i>
			</a>
			<a href="<?= site_url("buku/ubahFiksi/$f->kode_buku") ?>" class="btn btn-warning btn-sm">
				<i class="bx bxs-edit"></i>
			</a>
			<?php
			$this->db->where('kode_buku',$f->kode_buku);
			$borrowed = $this->db->get('detail')->result_array();
			if (count($borrowed) != 0){
				?>
				<a href="#" data-id="<?= $f->kode_buku ?>" class="btn btn-danger btn-sm btn-delete-buku disabled">
					<i class="bx bxs-trash"></i>
				</a>
				<?php
			}else{
				?>
				<a href="#" data-id="<?= $f->kode_buku ?>" class="btn btn-danger btn-sm btn-delete-buku">
					<i class="bx bxs-trash"></i>
				</a>
				<?php
			}
			?>

		</td>
	</tr>
	<?php
}
?>
