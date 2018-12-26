<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Satuan Kerja</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmastersatuankerja"><i class="ti ti-plus"></i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<table class="w-100" border="1" style="font-size: 13px;">
				<tr class="table-info" >
					<td class="p-1 text-center">No</td>
					<td class="p-1 text-center">Nama Satuan Kerja</td>
					<td class="p-1 text-center">Parent Unit</td>
					<td class="p-1 text-center" colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1"><?php echo $data->nama_satuan_kerja; ?></td>
						<td class="p-1"><?php echo $data->parent_unit; ?></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/edit/satuan_kerja/'.$data->id_satuan_kerja) ?>"><i class="ti ti-pencil text-info" rel="tooltip" title="Edit"></i></a></td>
						<td class="p-1 text-center"><a href="<?php echo base_url('index.php/admin/master/delete/satuan_kerja/'.$data->id_satuan_kerja) ?>"><i class="ti ti-trash text-danger" rel="tooltip" title="Hapus"></i></a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmastersatuankerja" tabindex="-1" role="dialog" aria-labelledby="addmastersatuankerja" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmastersatuankerja">Tambah Data Satuan Kerja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_satuan_kerja') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_satuan_kerja">NAMA SATUAN KERJA</label>
									<input type="text" class="form-control" id="nama_satuan_kerja" name="nama_satuan_kerja" placeholder="NAMA SATUAN KERJA" >
								</div>
								<div class="form-group">
									<label class="text-info" for="parent_unit">PARENT UNIT</label>
									<input type="text" class="form-control" id="parent_unit" name="parent_unit" placeholder="PARENT UNIT" >
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