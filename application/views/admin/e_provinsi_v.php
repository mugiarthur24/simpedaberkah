<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_provinsi/'.$hasil->id_provinsi) ?>" method="post">
		<div class="form-group">
			<label for="nm_provinsi">Nama Provinsi</label>
			<input type="text" class="form-control" id="nm_provinsi" name="nm_provinsi" aria-describedby="nm_provinsi" placeholder="Nama Provinsi" value="<?php echo $hasil->nm_provinsi ?>">
			<small id="nm_provinsi" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="level">Kode Provinsi</label>
			<input type="hidden" name="level" value="<?php echo $hasil->kode_provinsi ?>">
			<input type="kode_provinsi" class="form-control" id="kode_provinsi" name="kode_provinsi" aria-describedby="kode_provinsi" placeholder="kode_provinsi" value="<?php echo $hasil->kode_provinsi ?>">
			<small id="kode_provinsi" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>