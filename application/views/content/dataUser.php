<?php
$no = 1;
if($users) {
	foreach ($users as $u) {
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $u->username ?></td>
			<td>
				<?php
				if ($u->username == 'admin'){
					?>
					<a href="#" data-id="<?= $u->username ?>" class="btn btn-secondary btn-sm btn-reset-user">
						<i class="bx bx-reset"></i>
					</a>
					<?php
				}else{
					?>
					<a href="#modal-confirm-reset" data-id="<?= $u->username ?>" class="btn btn-secondary btn-sm btn-reset-user">
						<i class="bx bx-reset"></i>
					</a>
					<?php
				}
				?>

				<?php
				if ($u->username == 'admin'){
					?>
					<a href="#" data-id="<?= $u->username ?>" class="btn btn-danger btn-sm btn-delete-user disabled">
						<i class="bx bxs-trash"></i>
					</a>
					<?php
				}else{
					?>
					<a href="#modal-confirm-delete" data-id="<?= $u->username ?>" class="btn btn-danger btn-sm btn-delete-user">
						<i class="bx bxs-trash"></i>
					</a>
					<?php
				}
				?>
			</td>
		</tr>
		<?php
	}
}
?>
