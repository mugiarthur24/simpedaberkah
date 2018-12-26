<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_satuan_kerja/'.$hasil->id_satuan_kerja) ?>" method="post">
		<div class="form-group">
			<label for="nama_satuan_kerja">Nama Satuan Kerja</label>
			<input type="text" class="form-control" id="nama_satuan_kerja" name="nama_satuan_kerja" aria-describedby="nama_satuan_kerja" placeholder="Nama Satuan Kerja" value="<?php echo $hasil->nama_satuan_kerja ?>">
			<small id="nama_satuan_kerja" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="parent_unit">PARENT UNIT</label>
			<input type="hidden" name="parent_unit" value="<?php echo $hasil->parent_unit ?>">
			<input type="text" class="form-control" id="parent_unit" name="parent_unit" aria-describedby="parent_unit" placeholder="Paren Unit" value="<?php echo $hasil->parent_unit ?>">
			<small id="parent_unit" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>