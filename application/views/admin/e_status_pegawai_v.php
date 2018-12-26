<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_status_pegawai/'.$hasil->id_status_pegawai) ?>" method="post">
		<div class="form-group">
			<label for="nama_status_pegawai">Nama Status Pegawai</label>
			<input type="text" class="form-control" id="nama_status_pegawai" name="nama_status_pegawai" aria-describedby="nama_status_pegawai" placeholder="Nama Status Pegawai" value="<?php echo $hasil->nama_status ?>">
			<small id="nama_status_pegawai" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>