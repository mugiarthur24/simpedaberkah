<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Penghargaan</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addpenghargaan"><i class="material-icons">note_add</i> Tambah Data Penghargaan</button>
		</div>
	</div>
	<hr/>
	<table class="table table-bordered table-hover table-sm">
		<thead>
			<tr class="bg-app text-light">
				<td class="jrktbl text-center">No</td>
				<td class="jrktbl">Jenis Penghargaan</td>
				<td class="jrktbl">No. Keputusan</td>
				<td class="jrktbl">Tanggal</td>
				<td class="jrktbl">Tahun</td>
				<td class="jrktbl" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($penghargaan == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($penghargaan as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl"><?php echo $data->jenis_penghargaan; ?></td>
						<td class="jrktbl"><?php echo $data->no_keputusan; ?></td>
						<td class="jrktbl"><?php echo date('d F Y', strtotime($data->tanggal)); ?></td>
						<td class="jrktbl"><?php echo $data->tahun; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_penghargaan/'.$hasil->id_pegawai.'/'.$data->id_penghargaan) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_penghargaan/'.$hasil->id_pegawai.'/'.$data->id_penghargaan) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="4">Belum ada data penghargaan</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
<!-- Modal -->
<div class="modal fade" id="addpenghargaan" tabindex="-1" role="dialog" aria-labelledby="addpenghargaan" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpenghargaan">Tambah Data Penghargaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_penghargaan/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="jenis_penghargaan">JENIS PENGHARGAAN</label>
								<input type="text" class="form-control" id="jenis_penghargaan" name="jenis_penghargaan" placeholder="JENIS PENGHARGAAN" >
							</div>
							<div class="form-group">
								<label class="text-info" for="no_keputusan">NO. KEPUTUSAN</label>
								<input type="text" class="form-control" id="no_keputusan" name="no_keputusan" placeholder="NO KEPUTUSAN" >
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal">TANGGAL</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_hr" placeholder="HH">
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_bln" placeholder="BB">
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal" name="tanggal_thn" placeholder="TTTT">
									</div>
								</div>
								<div class="form-group">
								<label class="text-info" for="tahun">TAHUN</label>
								<input type="text" class="form-control" id="tahun" name="tahun" placeholder="TAHUN" >
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