<?php
$no = 1;
foreach ($anggotas as $a) {
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $a->id_anggota  ?></td>
		<td><?= $a->nama_anggota ?></td>
		<td><?= $a->no_telp_anggota ?></td>
		<td>
			<a href="<?= site_url("anggota/detail/$a->id_anggota") ?>" class="btn btn-info btn-sm">
				<i class='bx bxs-detail'></i>
			</a>
			<a href="<?= site_url("anggota/ubah/$a->id_anggota") ?>" class="btn btn-warning btn-sm">
				<i class="bx bxs-edit"></i>
			</a>
			<?php
			$this->db->where('id_anggota',$a->id_anggota);
			$borrowed = $this->db->get('transaksi')->result_array();
			if (count($borrowed) != 0){
				?>
				<a href="#modal-confirm-delete" data-id="<?= $a->id_anggota ?>" class="btn btn-danger btn-sm btn-delete-anggota disabled">
				<i class="bx bxs-trash"></i>
			</a>
				<?php
			}else{
				?>
				<a href="#modal-confirm-delete" data-id="<?= $a->id_anggota ?>" class="btn btn-danger btn-sm btn-delete-anggota">
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
