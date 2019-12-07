<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Riwayat eselon</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addreselon"><i class="fas fa-plus"></i> Tambah Data Riwayat Eselon</button>
		</div>
	</div>
	<hr/>
	<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr class="table-info">
				<td class="p-1 text-center">No</td>
				<td class="p-1 text-center">Eselon</td>
				<td class="p-1 text-center">No SK</td>
				<!-- <td class="p-1">Tgl SK</td> -->
				<!-- <td class="p-1">Masa Kerja</td> -->
				<td class="p-1 text-center" colspan="2"></td>
			</tr>
		</thead>
		<tbody>
			<?php if ($reselon == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($reselon as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1"><?php echo @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon; ?></td>
						<td class="p-1"><?php echo $data->nomor_sk; ?></td>
						<td class="text-center p-1">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_reselon/'.$hasil->id_pegawai.'/'.$data->id_riwayat_eselon) ?>" class="text-success">Edit</a>
						</td>
						<td class="text-center p-1">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_reselon/'.$hasil->id_pegawai.'/'.$data->id_riwayat_eselon) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td class="p-1 text-center" colspan="4">Belum ada data Riwayat eselon</td>
					</tr>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>
		<!-- Modal -->
		<div class="modal fade" id="addreselon" tabindex="-1" role="dialog" aria-labelledby="addreselon" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addreselon">Tambah Data Riwayat eselon</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/pegawai/create_reselon/'.$hasil->id_pegawai) ?>" method="post">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-info" for="id_eselon">eselon</label>
										<select class="form-control" name="id_eselon">
											<?php foreach ($eselon as $data): ?>
												<option value="<?php echo $data->id_eselon ?>"><?php echo $data->nama_eselon; ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label class="text-info" for="id_jenis_jabatan">JENIS JABATAN</label>
										<select class="form-control" name="id_jenis_jabatan">
											<?php foreach ($jnsjabatan as $data): ?>
												<option value="<?php echo $data->id_jenis_jabatan ?>"><?php echo $data->nama_jenis_jabatan; ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label class="text-info" for="nm_jabatan">NAMA JABATAN</label>
										<input type="text" class="form-control" id="nm_jabatan" name="nm_jabatan" placeholder="NAMA JABATAN">
									</div>
									<div class="form-group">
										<label class="text-info" for="nomor_sk">NOMOR SK</label>
										<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK">
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
	</div >