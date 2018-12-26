<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_lokasi_kerja/'.$hasil->id_lokasi_kerja) ?>" method="post">
		<div class="form-group">
			<label for="lokasi_kerja">Lokasi Kerja (SKPD)</label>
			<input type="text" class="form-control" id="lokasi_kerja" name="lokasi_kerja" aria-describedby="lokasi_kerja" placeholder="Lokasi Kerja" value="<?php echo $hasil->lokasi_kerja ?>">
			<small id="lokasi_kerja" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>