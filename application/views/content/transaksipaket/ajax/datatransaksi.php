<?php
$no = 1;
if($transaksis) {
	foreach ($transaksis as $t) {
		$this->db->where('kode_transaksi',$t->kode_transaksi);
		$this->db->where('status','1');
		$borrowed  = $this->db->get('detail')->result_array();
		$this->db->where('kode_transaksi',$t->kode_transaksi);
		$this->db->where('status !=','1');
		$returned  = $this->db->get('detail')->result_array();
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $t->kode_transaksi ?></td>
			<td><?= $t->nama_anggota ?></td>
			<td>
				<span class="badge bg-label-warning me-1"><?= count($borrowed) ?> BORROWED</span>
				<span class="badge bg-label-success me-1"><?= count($returned) ?> RETURNED</span>
			</td>
			<td>
				<a href="<?= site_url("transaksi/detail/$t->kode_transaksi") ?>"
				   class="btn btn-success btn-sm">
					<i class='bx bxs-info-circle'></i> Lihat Detail
				</a>
			</td>
		</tr>
		<?php
	}
}
?>
