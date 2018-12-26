<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Diklat</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addpelatihan"><i class="material-icons">note_add</i> Tambah Data Pelatihan</button>
		</div>
	</div>
	<hr/>
	<table class="table table-bordered table-hover table-sm">
		<thead>
			<tr class="bg-app text-light">
				<td class="jrktbl text-center">No</td>
				<td class="jrktbl">Nama Kursus</td>
				<td class="jrktbl">Lama Kursus (Jam)</td>
				<td class="jrktbl">Tanggal</td>
				<td class="jrktbl">No. Sertifikat</td>
				<td class="jrktbl">Instansi</td>
				<td class="jrktbl">Inst. Penyelenggara</td>
				<td class="jrktbl" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($pelatihan == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($pelatihan as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl"><?php echo $data->nama_kursus; ?></td>
						<td class="jrktbl"><?php echo $data->lama_kursus; ?></td>
						<td class="jrktbl"><?php echo $data->tanggal; ?></td>
						<td class="jrktbl"><?php echo $data->no_sertifikat; ?></td>
						<td class="jrktbl"><?php echo $data->instansi; ?></td>
						<td class="jrktbl"><?php echo $data->instansi_penyelenggara; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_pelatihan/'.$hasil->id_pegawai.'/'.$data->id_pelatihan) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_pelatihan/'.$hasil->id_pegawai.'/'.$data->id_pelatihan) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="6">Belum ada data kursus</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
<!-- Modal -->
<div class="modal fade" id="addpelatihan" tabindex="-1" role="dialog" aria-labelledby="addpelatihan" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpelatihan">Tambah Data Kursus/Diklat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_pelatihan/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama_kursus">NAMA KURSUS/DIKLAT</label>
								<input type="text" class="form-control" id="nama_kursus" name="nama_kursus" placeholder="NAMA KURSUS/DIKLAT" >
							</div>
							<div class="form-group">
								<label class="text-info" for="lama_kursus">LAMA KURSUS (JAM)</label>
								<input type="text" class="form-control" id="lama_kursus" name="lama_kursus" placeholder="LAMA KURSUS" >
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
								<label class="text-info" for="nomor_sertifikat">NOMOR SERTIFIKAT</label>
								<input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" placeholder="NOMOR SERTIFIKAT" >
							</div>
							<div class="form-group">
								<label class="text-info" for="instansi">INSTANSI</label>
								<input type="text" class="form-control" id="instansi" name="instansi" placeholder="INSTANSI">
							</div>
							<div class="form-group">
								<label class="text-info" for="instansi_penyelenggara">INSTANSI PENYELENGGARA</label>
								<input type="text" class="form-control" id="instansi_penyelenggara" name="instansi_penyelenggara" placeholder="INSTANSI PENYELENGGARA">
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