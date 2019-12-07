<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Master Jabatan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmasterjabatan"><i class="ti ti-plus"></i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<div class="card-body">
		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            	<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1 text-center">Nama Jabatan</td>
					<td class="p-1 text-center" colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1"><?php echo $data->nama_jabatan; ?></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/edit/jabatan/'.$data->id_jabatan) ?>"><i class="fas fa-edit"></i> Edit</a></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/delete/jabatan/'.$data->id_jabatan) ?>" class="text-danger"><i class="fas fa-trash-alt"></i> Hapus</a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmasterjabatan" tabindex="-1" role="dialog" aria-labelledby="addmasterjabatan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterjabatan">Tambah Data Master Pelatihan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_jabatan') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_jabatan">NAMA JABATAN</label>
									<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="NAMA JABATAN" >
								</div>
								<div class="form-group">
									<label class="text-info" for="level">LEVEL</label>
									<input type="text" class="form-control" id="level" name="level" placeholder="LEVEL" >
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