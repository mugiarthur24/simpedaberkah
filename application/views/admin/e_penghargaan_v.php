<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_penghargaan/'.$hasil->id_penghargaan) ?>" method="post">
		<div class="form-group">
			<label for="nama_penghargaan">Nama Penghargaan</label>
			<input type="text" class="form-control" id="nama_penghargaan" name="nama_penghargaan" aria-describedby="nama_penghargaan" placeholder="Nama Penghargaan" value="<?php echo $hasil->nama_penghargaan ?>">
			<small id="nama_penghargaan" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>