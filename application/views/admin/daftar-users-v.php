<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-left">
			<h5 class="text-info">Daftar Users</h5><hr/>
		</div>
		<div class="media-body"></div>
		<div class="media-right"><button class="btn btn-success" data-toggle="modal" data-target="#addobat"><i class="fas fa-user-plus"> </i> Tambah User</button></div>
	</div>
	<table class="w-100" border="1">
		<tr class="table-info">
			<td class="p-1 text-center">NO</td>
			<td class="p-1">NAMA</td>
			<td class="p-1">USERNAME</td>
			<td class="p-1">EMAIL</td>
			<td class="p-1">LEVEL</td>
			<td class="p-1 text-center" colspan="2"></td>
		</tr>
		<?php $no=1 ?>
		<?php foreach ($hasil as $data): ?>
			<tr>
				<td class="p-1 text-center"><?php echo $no; ?></td>
				<td class="p-1"><?php echo $data->first_name; ?></td>
				<td class="p-1"><?php echo $data->username; ?></td>
				<td class="p-1"><?php echo $data->email; ?></td>
				<td class="p-1"></td>
				<td class="p-1 text-center"><a class="text-info" href="<?php echo base_url('index.php/admin/users/edit/'.$data->id) ?>">Edit</a></td>
				<td class="p-1 text-center"><a class="text-danger" href="<?php echo base_url('index.php/admin/users/delete/'.$data->id) ?>">Hapus</a></td>
			</tr>
			<?php $no++ ?>
		<?php endforeach ?>
	</table>
</div>
<!-- Modal -->
<div class="modal fade" id="addobat" tabindex="-1" role="dialog" aria-labelledby="addobat" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addobat">Tambah Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/users/proses_create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="first_name">Nama Depan</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan" required>
								<small id="first_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="last_name">Nama Belakang</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
								<small id="last_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username, John, eka234 dll" required>
						<small id="username" class="form-text text-muted">hanya dapat menggunakan gabungan angka dan huruf dan tanpa spasi</small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="jhon@gmail.com" required>
						<small id="email" class="form-text text-muted">Gunakan penulisan email yang benar</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="*******" required>
						<small id="password" class="form-text text-muted">Minimal 8 karakter atau lebih menggunakan kombinasi huruf dan angka</small>
					</div>
					<div class="form-group">
						<label for="repassword">Ulangi Password</label>
						<input type="password" class="form-control" name="repassword" id="repassword" placeholder="*******" required>
						<small id="repassword" class="form-text text-muted">Masukan ulang password anda diatas</small>
					</div>
					<div class="form-group" style="margin-top: 30px;">
						<label class="control-label">Groups</label><br/>
						<?php foreach ($groups as $gg): ?>
							<?php if ($gg->id=='3'): ?>
								<input type="checkbox" name="groups" value="<?php echo $gg->id; ?>" checked> <?php echo $gg->name; ?>
							<?php else: ?>
								<input type="checkbox" name="groups[]" value="<?php echo $gg->id; ?>"> <?php echo $gg->name; ?>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>