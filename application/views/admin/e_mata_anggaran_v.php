<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_mata_anggaran/'.$hasil->id_mata_anggaran) ?>" method="post">
		<div class="form-group">
			<label for="mata_anggaran">KODE ANGGARAN</label>
			<input type="text" class="form-control" id="kode_anggaran" name="kode_anggaran" aria-describedby="kode_anggaran" placeholder="Kode Anggaran" value="<?php echo $hasil->kode_anggaran ?>">
			<small id="kode_anggaran" class="form-text text-muted">Hanya dapat menggunakan angka, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="mata_anggaran">MATA ANGGARAN</label>
			<input type="text" class="form-control" id="mata_anggaran" name="mata_anggaran" aria-describedby="mata_anggaran" placeholder="Mata Anggaran" value="<?php echo $hasil->mata_anggaran ?>">
			<small id="mata_anggaran" class="form-text text-muted">Hanya dapat menggunakan angka, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="tahun">TAHUN</label>
			<input type="hidden" name="tahun" value="<?php echo $hasil->tahun ?>">
			<input type="tahun" class="form-control" id="tahun" name="tahun" aria-describedby="tahun" placeholder="tahun" value="<?php echo $hasil->tahun ?>">
			<small id="tahun" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<div class="form-group">
			<label for="keterangan">KETERANGAN</label>
			<input type="hidden" name="keterangan" value="<?php echo $hasil->keterangan ?>">
			<input type="keterangan" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan" placeholder="keterangan" value="<?php echo $hasil->keterangan ?>">
			<small id="keterangan" class="form-text text-muted">Hanya dapat menggunakan Huruf, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>