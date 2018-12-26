<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_eselon/'.$hasil->id_eselon) ?>" method="post">
		<div class="form-group">
			<label for="nama_eselon">Nama Eselon</label>
			<input type="text" class="form-control" id="nama_eselon" name="nama_eselon" aria-describedby="nama_eselon" placeholder="Nama Eselon" value="<?php echo $hasil->nama_eselon ?>">
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