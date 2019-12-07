<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Eselon</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmastereselon"><i class="ti ti-plus"></i> Tambah Data </button>
		</div>
	</div>
	<hr/>
		<div class="card-body">
		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1 text-center">Nama Eselon</td>
					<td class="p-1 text-center" colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-center"><?php echo $data->nama_eselon; ?></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/edit/eselon/'.$data->id_eselon) ?>"><i class="fas fa-edit"></i> Edit</a></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/delete/eselon/'.$data->id_eselon) ?>" class="text-danger"><i class="fas fa-trash-alt"></i> Hapus</a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmastereselon" tabindex="-1" role="dialog" aria-labelledby="addmastereselon" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmastereselon">Tambah Data Eselon</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_eselon') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_eselon">NAMA ESELON</label>
									<input type="text" class="form-control" id="nama_eselon" name="nama_eselon" placeholder="NAMA ESELON" >
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