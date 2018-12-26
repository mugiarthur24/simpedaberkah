<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Unit Organisasi</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addorganisasi"><i class="material-icons">note_add</i> Tambah Data Organisasi</button>
		</div>
	</div>
	<hr/>
	<table class="table table-bordered table-hover table-sm">
		<thead>
			<tr class="bg-app text-light">
				<td class="jrktbl text-center">No</td>
				<td class="jrktbl">Unit Organisasi</td>
				<td class="jrktbl">Nomor</td>
				<td class="jrktbl">Tanggal</td>
				<td class="jrktbl" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($organisasi == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($organisasi as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_satuan_kerja)->nama_satuan_kerja; ?></td>
						<td class="jrktbl"><?php echo $data->nomor; ?></td>
						<td class="jrktbl"><?php echo date('d F Y', strtotime($data->tanggal)); ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_organisasi/'.$hasil->id_pegawai.'/'.$data->id_organisasi) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_organisasi/'.$hasil->id_pegawai.'/'.$data->id_organisasi) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="4">Belum ada data organisasi</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
<!-- Modal -->
<div class="modal fade" id="addorganisasi" tabindex="-1" role="dialog" aria-labelledby="addorganisasi" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addorganisasi">Tambah Data Organisasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_organisasi/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="id_satuan_kerja">SATUAN KERJA</label>
								<select class="form-control" name="id_satuan_kerja">
									<?php foreach ($satuankerja as $data): ?>
										<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
									<?php endforeach ?>
								</select>
							</div>					
							<div class="form-group">
								<label class="text-info" for="nomor">NOMOR</label>
								<input type="text" class="form-control" id="nomor" name="nomor" placeholder="NOMOR" >
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal">TANGGAL</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_hr" placeholder="HH" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_thn" placeholder="TTTT">
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
	</div>