<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_hukuman/'.$hasil->id_hukuman) ?>" method="post">
		<div class="form-group">
			<label for="nama_hukuman">Nama Hukuman</label>
			<input type="text" class="form-control" id="nama_hukuman" name="nama_hukuman" aria-describedby="nama_hukuman" placeholder="Nama Hukuman" value="<?php echo $hasil->nama_hukuman ?>">
			<small id="nama_hukuman" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>