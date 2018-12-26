<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_rgolongan/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_golongan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info">GOLONGAN</label>
				<select class="form-control" name="id_golongan">
					<option value="<?php echo @$detail->id_golongan ?>">--<?php echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$detail->id_golongan)->golongan; ?>--</option>
					<?php foreach ($golongan as $data): ?>
						<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label class="text-info" for="nomor_sk">NOMOR SK</label>
				<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK"  value="<?php echo $detail->nomor_sk?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_sk,8,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_sk,5,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_sk,0,4)?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_mulai">TMT GOLONGAN</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tmt_golongan_hr" placeholder="HH" value="<?php echo substr($detail->tmt_golongan,8,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tmt_golongan_bln" placeholder="BB" value="<?php echo substr($detail->tmt_golongan,5,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tmt_golongan_thn" placeholder="TTTT" value="<?php echo substr($detail->tmt_golongan,0,4)?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="text-info">NOMOR BKN</label>
				<input type="text" class="form-control" name="nomor_bkn" placeholder="Masukan Nomor BKN" value="<?php echo $detail->nomor_bkn ?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_selesai">TANGGAL BKN</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" id="tanggal_bkn" name="tanggal_bkn_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_bkn,8,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_bkn" name="tanggal_bkn_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_bkn,5,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_bkn" name="tanggal_bkn_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_bkn,0,4)?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA</label>
				<input type="text" class="form-control" name="masa_kerja" placeholder="Masukan Masa Kerja" value="<?php echo $detail->masa_kerja ?>">
			</div>
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
</form>
</div>