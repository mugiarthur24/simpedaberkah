<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Riwayat Jabatan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addrjabatan"><i class="fas fa-plus"></i> Tambah Data Riwayat Jabatan</button>
		</div>
	</div>
	<hr/>
	<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr class="table-info">
				<td class="p-1 text-center">No</td>
				<td class="p-1 text-center">Jns Jabatan</td>
				<td class="p-1 text-center">Nama Jabatan</td>
				<td class="p-1 text-center">Eselon</td>
				<td class="p-1 text-center">No SK</td>
				<!-- <td class="jrktbl">Tanggal SK</td> -->
				<!-- <td class="jrktbl">TMT Jabatan</td> -->
				<!-- <td class="jrktbl">TMT Pelantikan</td> -->
				<td class="p-1 text-center">SKPD</td>
				<td class="p-1 text-center" colspan="2"></td>
			</tr>
		</thead>
		<tbody>
			<?php if ($rjabatan == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($rjabatan as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1"><?php echo $this->Admin_m->detail_data_order('master_jenis_jabatan','id_jenis_jabatan',$data->id_jenis_jabatan)->nama_jenis_jabatan; ?></td>
						<td class="p-1"><?php echo $data->nm_jabatan; ?></td>
						<td class="p-1"><?php echo $this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon;?></td>
						<td class="p-1"><?php echo $data->nomor_sk; ?></td>
						<!-- <td class="jrktbl"><?php echo $data->tanggal_sk_rj; ?></td> -->
						<!-- <td class="jrktbl"><?php echo $data->tmt_jabatan_rj; ?></td> -->
						<!-- <td class="jrktbl"><?php echo $data->tmt_pelantikan_rj; ?></td> -->
						<td class="p-1"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja; ?></td>				
						<td class="p-1">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_rjabatan/'.$hasil->id_pegawai.'/'.$data->id_riwayat_jabatan) ?>">Edit</a>
						</td>
						<td class="p-1">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_rjabatan/'.$hasil->id_pegawai.'/'.$data->id_riwayat_jabatan) ?>" class="text-danger">Hapus</i></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="7">Belum ada data Riwayat Jabatan</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
	</div>
</div>
	<!-- Modal -->
	<div class="modal fade" id="addrjabatan" tabindex="-1" role="dialog" aria-labelledby="addrjabatann" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addrjabatann">Tambah Data Riwayat Jabatan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/pegawai/create_rjabatan/'.$hasil->id_pegawai) ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="id_jenis_jabatan">JENIS JABATAN</label>
									<select class="form-control" name="id_jenis_jabatan">
										<?php foreach ($jnsjabatan as $data): ?>
											<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label class="text-info" for="id_jabatan">NAMA JABATAN</label>

									<input type="text" class="form-control" id="id_jabatan" name="nm_jabatan" placeholder="Nama Jabatan">
								</div>
								<div class="form-group">
									<label class="text-info" for="id_eselon">ESELON</label>
									<select class="form-control" name="id_eselon">
										<?php foreach ($eselon as $data): ?>
											<option value="<?php echo $data->id_eselon ?>"><?php echo $data->nama_eselon; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label class="text-info" for="nomor_sk">NOMOR SK</label>
									<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
								</div>
								<div class="form-group">
									<label class="text-info" for="tanggal_sk_rj">TANGGAL SK</label>
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_hr" placeholder="HH">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_bln" placeholder="BB">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tanggal_sk_rj" name="tanggal_sk_rj_thn" placeholder="TTTT">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="text-info" for="tmt_jabatan_rj">TMT JABATAN</label>
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_hr" placeholder="HH">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_bln" placeholder="BB">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tmt_jabatan_rj" name="tmt_jabatan_rj_thn" placeholder="TTTT">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="text-info" for="tmt_pelantikan_rj">TMT PELANTIKAN</label>
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_hr" placeholder="HH" >
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_bln" placeholder="BB" >
										</div>
										<div class="col">
											<input type="text" class="form-control" id="tmt_pelantikan_rj" name="tmt_pelantikan_rj_thn" placeholder="TTTT">
										</div>
									</div>
									<div class="form-group">
										<label class="text-info" for="id_satuan_kerja">SATUAN KERJA</label>
										<select class="form-control" name="id_satuan_kerja">
											<?php foreach ($satuankerja as $data): ?>
												<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
											<?php endforeach ?>
										</select>
									</div>								
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
	</div >
</div>