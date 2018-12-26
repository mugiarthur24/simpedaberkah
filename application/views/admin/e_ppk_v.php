<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_ppk/'.$hasil->id_ppk) ?>" method="post">
		<div class="form-group">
			<label for="nama_ppk">Nama PPK</label>
			<input type="text" class="form-control" id="nama_ppk" name="nama_ppk" aria-describedby="nama_ppk" placeholder="Nama PPK" value="<?php echo $hasil->nama_ppk ?>">
			<small id="nama_ppk" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="parent_satuan_kerja">Parent Satuan Kerja</label>
			<input type="hidden" name="parent_satuan_kerja" value="<?php echo $hasil->parent_satuan_kerja ?>">
			<input type="text" class="form-control" id="parent_satuan_kerja" name="parent_satuan_kerja" aria-describedby="parent_satuan_kerja" placeholder="Parent Satuan Kerja" value="<?php echo $hasil->parent_satuan_kerja ?>">
			<small id="parent_unit" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>