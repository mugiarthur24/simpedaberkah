<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data PPK</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmasterppk"><i class="material-icons">note_add</i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<table class="table">
				<tr >
					<td>No</td>
					<td>Nama PPK</td>
					<td>Parent Satuan Kerja</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->nama_ppk; ?></td>
						<td><?php echo $data->parent_satuan_kerja; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit/ppk/'.$data->id_ppk) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/ppk/'.$data->id_ppk) ?>">Hapus</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmasterppk" tabindex="-1" role="dialog" aria-labelledby="addmasterppk" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterppk">Tambah Data PPK</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_ppk') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_ppk">NAMA PPK</label>
									<input type="text" class="form-control" id="nama_ppk" name="nama_ppk" placeholder="NAMA PPK" >
								</div>
								<div class="form-group">
									<label class="text-info" for="parent_satuan_kerja">PARENT SATUAN KERJA</label>
									<input type="text" class="form-control" id="parent_satuan_kerja" name="parent_satuan_kerja" placeholder="PARENT SATUAN KERJA" >
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