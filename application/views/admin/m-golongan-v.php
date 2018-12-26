<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Master Golongan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmastergolongan"><i class="ti ti-plus"></i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<table class="w-100" border="1" style="font-size: 13px;">
				<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1 text-center">Golongan</td>
					<td class="p-1 text-center">Uraian</td>
					<td class="p-1 text-center" colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-center"><?php echo $data->golongan; ?></td>
						<td class="p-1 text-center"><?php echo $data->uraian; ?></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/edit/golongan/'.$data->id_golongan) ?>"><i class="ti ti-pencil text-info" rel="tooltip" title="Edit"></i></a></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/delete/golongan/'.$data->id_golongan) ?>"><i class="ti ti-trash text-danger" rel="tooltip" title="Hapus"></i></a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmastergolongan" tabindex="-1" role="dialog" aria-labelledby="addmastergolongan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmastergolongan">Tambah Data Master Golongan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_golongan') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="golongan">NAMA GOLONGAN</label>
									<input type="text" class="form-control" id="golongan" name="golongan" placeholder="GOLONGAN" >
								</div>
								<div class="form-group">
									<label class="text-info" for="uraian">URAIAN</label>
									<input type="text" class="form-control" id="uraian" name="uraian" placeholder="URAIAN" >
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