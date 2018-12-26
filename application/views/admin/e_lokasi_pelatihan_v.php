<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_lokasi_pelatihan/'.$hasil->id_lokasi_pelatihan) ?>" method="post">
		<div class="form-group">
			<label for="nama_lokasi">Nama Lokasi</label>
			<input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" aria-describedby="nama_lokasi" placeholder="Nama Lokasi" value="<?php echo $hasil->nama_lokasi ?>">
			<small id="nama_lokasi" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>