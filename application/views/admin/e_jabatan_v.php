<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_jabatan/'.$hasil->id_jabatan) ?>" method="post">
		<div class="form-group">
			<label for="nama_jabatan">Nama Jabatan</label>
			<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" aria-describedby="nama_jabatan" placeholder="Nama Jabatan" value="<?php echo $hasil->nama_jabatan ?>">
			<small id="nama_jabatan" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="level">Level</label>
			<input type="hidden" name="level" value="<?php echo $hasil->level ?>">
			<input type="level" class="form-control" id="level" name="level" aria-describedby="level" placeholder="Level" value="<?php echo $hasil->level ?>">
			<small id="parent_unit" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>