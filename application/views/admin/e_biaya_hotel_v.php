<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/master/update_biaya_hotel/'.$hasil->id_biaya_hotel) ?>" method="post">
		<div class="form-group">
				<label class="text-info">PROVINSI</label>
				<select class="form-control" name="id_provinsi">
					<option value="<?php echo $hasil->id_provinsi ?>">--<?php echo $this->Admin_m->detail_data_order('master_provinsi','id_provinsi',$hasil->id_provinsi)->nm_provinsi; ?>--</option>
					<?php foreach ($provinsi as $data): ?>
						<option value="<?php echo $data->id_provinsi ?>"><?php echo $data->nm_provinsi; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		<div class="form-group">
				<label>JABATAN</label>
				<select class="form-control" name="id_jabatan">
					<option value="<?php echo @$hasil->id_jabatan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil->id_jabatan)->nama_jabatan; ?>--</option>
					<?php foreach ($jabatan as $data): ?>
						<option value="<?php echo $data->id_jabatan ?>"><?php echo $data->nama_jabatan; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		<div class="form-group">
			<label for="level">BIAYA</label>
			<input type="hidden" name="biaya" value="<?php echo $hasil->biaya ?>">
			<input type="text" class="form-control" id="biaya" name="biaya" aria-describedby="biaya" placeholder="level" value="<?php echo $hasil->biaya ?>">
			<small id="level" class="form-text text-muted">Hanya dapat menggunakan Angka, Selain itu tidak di izinkan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Ubah data</button>
	</form>
</div>