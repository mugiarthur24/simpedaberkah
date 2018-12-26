<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Master Pelatihan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmasterpelatihan"><i class="material-icons">note_add</i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<table class="table">
				<tr >
					<td>No</td>
					<td>Nama Pelatihan</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->nama_pelatihan; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit/pelatihan/'.$data->id_pelatihan) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/pelatihan/'.$data->id_pelatihan) ?>">Hapus</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmasterpelatihan" tabindex="-1" role="dialog" aria-labelledby="addmasterpelatihan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterpelatihan">Tambah Data Master Pelatihan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_pelatihan') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="nama_pelatihan">NAMA PELATIHAN</label>
									<input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" placeholder="NAMA PELATIHAN" >
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