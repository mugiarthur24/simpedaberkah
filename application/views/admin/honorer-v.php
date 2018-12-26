<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<form action="<?php echo base_url('index.php/admin/honorer/index/') ?>" method="get">
			<div class="form-group">
				<label> Cari Honorer</label>
				<div class="row">
					<div class="col">
						<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama">
						<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian honorer</small>
					</div>
				</div>
			</div>
		</form>
		<div class="media">
			<div class="media-body">
				Data Honorer <span class="text-secondary">jumlah Honorer Ditemukan <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addpegawai"><i class="ti ti-plus"></i> Tambah data Honorer</button>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats mt-2">
		
		<table class="w-100 mt-2" border="1" style="font-size: 13px">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1 text-center">Kode</td>
					<td class="p-1 text-center">Nama Honorer</td>
					<td class="p-1 text-center">Nomor SK</td>
					<td class="p-1 text-center">Unit Organisasi</td>
					<td class="p-1 text-center">TMT</td>
					<td colspan="2" class="p-1"></td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-center text-secondary"><?php echo strtoupper($data->kode_honorer); ?></td>
						<td class="p-1 text-secondary"><a class="text-info" href="<?php echo base_url('index.php/admin/honorer/edit_honorer/'.$data->id_honorer) ?>"><?php echo strtoupper($data->nama); ?></a></td>
						<td class="p-1 text-center text-secondary"><?php echo $data->nomor_sk; ?></td>
						<td class="p-1 text-secondary"><?php echo @$this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja; ?></td>
						<td class="p-1 text-center text-secondary"><?php echo $data->tmt; ?></td>
						<td class="text-center p-1">
							<a href="<?php echo base_url('index.php/admin/honorer/edit_honorer/'.$data->id_honorer) ?>" class="text-info"><i class="ti ti-pencil"></i></a>
						</td>
						<td class="text-center p-1">
							<a href="<?php echo base_url('index.php/admin/honorer/delete_honorer/'.$data->id_honorer) ?>" class="text-danger"><i class="ti ti-trash"></i></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="mt-2">
		<?php echo $pagging; ?>
	</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpegawai" tabindex="-1" role="dialog" aria-labelledby="addpegawaii" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpegawaii">Tambah Data Honorer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/honorer/create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama">NAMA LENGKAP</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="NAMA LENGKAP TANPA GELAR" >
							</div>
							<div class="form-group">
								<label class="text-info" for="alamat">ALAMAT</label>
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="ALAMAT" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nip_lama">NOMOR  SK</label>
								<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
							</div>
							<div class="form-group">
								<label class="text-info" for="id_lokasi_kerja">UNIT ORGANISASI</label>
								<select class="form-control" name="id_lokasi_kerja">
									<?php foreach ($skpd as $dtskpd): ?>
										<option value="<?php echo $dtskpd->id_lokasi_kerja ?>"><?php echo $dtskpd->lokasi_kerja; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="tmt">TMT </label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_hr" placeholder="HH" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_thn" placeholder="TTTT" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-info" for="no_hp">NOMOR HANDPHONE</label>
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="NOMOR HANDPHONE">
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>