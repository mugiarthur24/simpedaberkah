<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_rpangkat/'.$hasil->id_pegawai.'/'.$detail->id_riwayat_pangkat) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info">GOLONGAN</label>
				<select class="form-control" name="id_pangkat">
					<option value="<?php echo @$detail->id_pangkat ?>">--<?php echo @$this->Admin_m->detail_data_order('master_pangkat','id_pangkat',$detail->id_pangkat)->nm_pangkat; ?>--</option>
					<?php foreach ($pangkat as $data): ?>
						<option value="<?php echo $data->id_pangkat ?>"><?php echo $data->nm_pangkat; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label class="text-info" for="status">STATUS</label>
				<input type="text" class="form-control" id="status" name="status" placeholder="STATUS"  value="<?php echo $detail->status?>">
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
				<label class="text-info" for="tanggal_mulai">TANGGAL MULAI</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_mulai,8,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_mulai,5,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_mulai,0,4)?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggal_mulai">TANGGAL SELESAI</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_selesai,8,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_selesai,5,2)?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_selesai,0,4)?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA</label>
				<input type="text" class="form-control" name="masa_kerja" placeholder="Masukan Masa Kerja" value="<?php echo $detail->masa_kerja ?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA BULAN</label>
				<input type="text" class="form-control" name="masa_kerja_bulan" placeholder="Masukan Masa Kerja Bulan" value="<?php echo $detail->masa_kerja_bulan ?>">
			</div>
			<div class="form-group">
				<label class="text-info">MASA KERJA TAHUN</label>
				<input type="text" class="form-control" name="masa_kerja_tahun" placeholder="Masukan Masa Kerja Tahun" value="<?php echo $detail->masa_kerja_tahun ?>">
			</div>
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
</form>
</div>