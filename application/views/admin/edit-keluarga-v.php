<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_keluarga/'.$hasil->id_pegawai.'/'.$detail->id_data_keluarga) ?>" method="post">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="text-info" for="nama_anggota_keluarga">NAMA ANGGOTA KELUARGA</label>
					<input type="text" class="form-control" id="nama_anggota_keluarga" name="nama_anggota_keluarga" placeholder="NAMA LENGKAP TANPA GELAR" value="<?php echo $detail->nama_anggota_keluarga?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_lahir">TANGGAL LAHIR</label>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_lahir,8,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_lahir,5,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_lahir,0,4)?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="text-info" for="status_keluarga">HUBUNGAN KELUARGA</label>
					<select class="form-control" name="status_keluarga">
						<option value="<?php echo $detail->status_keluarga ?>">--<?php echo @$this->Admin_m->detail_data_order('master_status_dalam_keluarga','id',$detail->status_keluarga)->status_keluarga; ?>--</option>
						<?php foreach ($stat_keluarga as $data): ?>
							<option value="<?php echo $data->id; ?>"><?php echo $data->status_keluarga ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="status_kawin">STATUS KAWIN</label>
					<select class="form-control" name="status_kawin">
						<option value="<?php echo $detail->status_kawin ?>">--<?php echo @$this->Admin_m->detail_data_order('master_status_kawin','id',$detail->status_kawin)->status_kawin; ?>--</option>
						<?php foreach ($stat_kawin as $data): ?>
							<option value="<?php echo $data->id; ?>"><?php echo $data->status_kawin ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_nikah">TANGGAL NIKAH</label>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" id="tanggal_nikah" name="tanggal_nikah_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_nikah,8,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_nikah" name="tanggal_nikah_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_nikah,5,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_nikah" name="tanggal_nikah_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_nikah,0,4)?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_cerai_meninggal">TANGGAL CERAI MENINGGAL</label>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" id="tanggal_cerai_meninggal" name="tanggal_cerai_meninggal_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_cerai_meninggal,8,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_cerai_meninggal" name="tanggal_cerai_meninggal_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_cerai_meninggal,5,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tanggal_cerai_meninggal" name="tanggal_cerai_meninggal_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_cerai_meninggal,0,4)?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="text-info" for="pekerjaan">PEKERJAAN</label>
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="PEKERJAAN" value="<?php echo $detail->pekerjaan?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="pekerjaan">NO KARTU SUAMI/ISTRI</label>
					<input type="text" class="form-control" id="no_kartu" name="no_kartu" placeholder="NO KARTU SUAMI/ISTRI" value="<?php echo $detail->no_kartu?>">
				</div>
			</div>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
	</form>
</div>