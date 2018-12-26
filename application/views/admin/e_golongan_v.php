<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_golongan/'.$hasil->id_golongan) ?>" method="post">
		<div class="form-group">
			<label for="golongan">Golongan</label>
			<input type="text" class="form-control" id="golongan" name="golongan" aria-describedby="golongan" placeholder="Golongan" value="<?php echo $hasil->golongan ?>">
			<small id="golongan" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="uraian">Uraian</label>
			<input type="hidden" name="uraian" value="<?php echo $hasil->uraian ?>">
			<input type="text" class="form-control" id="uraian" name="uraian" aria-describedby="uraian" placeholder="uraian" value="<?php echo $hasil->uraian ?>">
			<small id="uraian" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="level">Level</label>
			<input type="hidden" name="level" value="<?php echo $hasil->level ?>">
			<input type="text" class="form-control" id="level" name="level" aria-describedby="level" placeholder="level" value="<?php echo $hasil->level ?>">
			<small id="level" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>