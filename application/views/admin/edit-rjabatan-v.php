<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/update_rjabatan/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_jabatan) ?>" method="post">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-info">JENIS JABATAN</label>
						<select class="form-control" name="id_jenis_jabatan">
							<option value="<?php echo @$detail->id_jenis_jabatan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$detail->id_jenis_jabatan)->nama_jenis_jabatan; ?>--</option>
							<?php foreach ($jnsjabatan as $data): ?>
								<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label class="text-info">NAMA JABATAN</label>
						<input type="text" class="form-control" id="id_jabatan" name="nm_jabatan" value="<?php echo $detail->nm_jabatan ?>" placeholder="Nama Jabatan">
					</div>
					<div class="form-group">
						<label class="text-info">ESELON</label>
						<select class="form-control" name="id_eselon">
							<option value="<?php echo $detail->id_eselon ?>">--<?php echo @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$detail->id_eselon)->nama_eselon; ?>--</option>
							<?php foreach ($eselon as $data): ?>
								<option value="<?php echo $data->id_eselon ?>"><?php echo $data->nama_eselon; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label class="text-info" for="nomor_sk">NOMOR SK</label>
						<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK" value="<?php echo $detail->nomor_sk?>">
					</div>
					<div class="form-group">
						<label class="text-info" for="tanggal_sk_rj">TANGGAL SK</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_sk_rj,8,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_sk_rj,5,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_sk_rj,0,4)?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-info" for="tmt_jabatan_rj">TMT JABATAN</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_hr" placeholder="HH" value="<?php echo substr($detail->tmt_jabatan_rj,8,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_bln" placeholder="BB" value="<?php echo substr($detail->tmt_jabatan_rj,5,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_thn" placeholder="TTTT" value="<?php echo substr($detail->tmt_jabatan_rj,0,4)?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-info" for="tmt_pelantikan_rj">TMT PELANTIKAN</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_hr" placeholder="HH" value="<?php echo substr($detail->tmt_pelantikan_rj,8,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_bln" placeholder="BB" value="<?php echo substr($detail->tmt_pelantikan_rj,5,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_thn" placeholder="TTTT" value="<?php echo substr($detail->tmt_pelantikan_rj,0,4)?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-info">SATUAN KERJA</label>
						<select class="form-control" name="id_satuan_kerja">
							<option value="<?php echo $detail->id_satuan_kerja ?>">--<?php echo @$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$detail->id_satuan_kerja)->nama_satuan_kerja; ?>--</option>
							<?php foreach ($satuankerja as $data): ?>
								<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
		</form>
	</div>