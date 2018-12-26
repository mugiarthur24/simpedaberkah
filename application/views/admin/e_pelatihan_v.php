<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_pelatihan/'.$hasil->id_pelatihan) ?>" method="post">
		<div class="form-group">
			<label for="nama_pelatihan">Nama Pelatihan</label>
			<input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" aria-describedby="nama_pelatihan" placeholder="Nama Pelatihan" value="<?php echo $hasil->nama_pelatihan ?>">
			<small id="nama_ppk" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
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