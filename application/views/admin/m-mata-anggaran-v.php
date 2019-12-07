<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Data Master Mata Anggaran</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmastermataanggaran"><i class="ti ti-plus"></i> Tambah Data </button>
		</div>
	</div>
	<hr/>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr class="table-info">
						<td class="p-1 text-center">No</td>
						<td class="p-1 text-center">Kode Rekening Anggaran</td>
						<td class="p-1 text-center">Jumlah Anggaran (Rp)</td>
						<td class="p-1 text-center">Tahun</td>
						<td class="p-1 text-center">Keterangan</td>
						<td class="p-1 text-center" colspan="2">Action</td>
					</tr>
					<?php $no=1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td class="p-1 text-center"><?php echo $no; ?></td>
							<td><?php echo $data->kode_anggaran; ?></td>
							<td><?php echo $data->mata_anggaran; ?></td>
							<td class="p-1 text-center"><?php echo $data->tahun; ?></td>
							<td><?php echo $data->keterangan; ?></td>
							<td class="p-1 text-center" style="vertical-align: middle;"><a href="<?php echo base_url('index.php/admin/master/edit/mata_anggaran/'.$data->id_mata_anggaran) ?>"><i class="fas fa-edit"></i> Edit</a></td>
						<td class="p-1 text-center" style="vertical-align: middle;"><a href="<?php echo base_url('index.php/admin/master/delete/mata_anggaran/'.$data->id_mata_anggaran) ?>" class="text-danger"><i class="fas fa-trash-alt"></i> Hapus</a></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addmastermataanggaran" tabindex="-1" role="dialog" aria-labelledby="addmastermataanggaran" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterlokasikerja">Tambah Data Master Mata Anggaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_mata_anggaran') ?>" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="kode_anggaran">KODE REKENING ANGGARAN</label>
									<input type="text" class="form-control" id="kode_anggaran" name="kode_anggaran" placeholder="KODE ANGGARAN" >
								</div>
								<div class="form-group">
									<label class="text-info" for="mata_anggaran">JUMLAH ANGGARAN (RP)<label>
										<input type="text" class="form-control" id="mata_anggaran" name="mata_anggaran" placeholder="JUMLAH MATA ANGGARAN" >
									</div>
									<div class="form-group">
										<label class="text-info" for="tahun">TAHUN</label>
										<input type="text" class="form-control" id="tahun" name="tahun" placeholder="TAHUN ANGGARAN" >
									</div>
									<div class="form-group">
										<label class="text-info" for="keterangan">KETERANGAN</label>
										<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="KETERANGAN ANGGARAN" >
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
		</div>