<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data Status Pegawai <span class="text-secondary">jumlah Data <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addstatuspegawai"><i class="material-icons">note_add</i> Tambah data </button>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<table class="table table-hover">
			<thead>
				<tr class="bg-app text-light">
					<td class="jrktbl text-center">No</td>
					<td class="jrktbl"><i class="material-icons">assignment_ind</i>Status Pegawai</td>
					<td class="jrktbl"><i class="material-icons">power_settings_new</i>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->status_pegawai; ?></a></td>
						<td class="jrktbl">
							<a href="#" class="text-danger">hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addstatuspegawai" tabindex="-1" role="dialog" aria-labelledby="addstatuspegawai" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addstatuspegawai">Tambah Data </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/master_status_pegawai/create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="status_pegawai">STATUS PEGAWAI</label>
								<input type="text" class="form-control" id="status_pegawai" name="status_pegawai" placeholder="STATUS" >
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