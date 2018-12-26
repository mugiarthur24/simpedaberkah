<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Data Gaji Pokok</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addgajipokok"><i class="material-icons">note_add</i> Tambah Data Gaji Pokok</button>
		</div>
	</div>
	<hr/>
	<table class="table table-bordered table-hover table-sm">
		<thead>
			<tr class="bg-app text-light">
				<td class="jrktbl text-center">No</td>
				<td class="jrktbl">No SK</td>
				<td class="jrktbl">Tgl SK</td>
				<td class="jrktbl">Dasar Perubahan</td>
				<td class="jrktbl">Gaji Pokok</td>
				<td class="jrktbl">Tgl Mulai</td>
				<td class="jrktbl">Tgl Selesai</td>
				<td class="jrktbl">Masa Kerja</td>
				<td class="jrktbl">Pejabat</td>
				<td class="jrktbl" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($gaji_pokok == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($gaji_pokok as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl"><?php echo $data->nomor_sk; ?></td>
						<td class="jrktbl"><?php echo date('d F Y', strtotime($data->tanggal_sk)); ?></td>
						<td class="jrktbl"><?php echo $data->dasar_perubahan; ?></td>
						<td class="jrktbl"><?php echo $data->gaji_pokok; ?></td>
						<td class="jrktbl"><?php echo date('d F Y', strtotime($data->tanggal_mulai)); ?></td>
						<td class="jrktbl"><?php echo date('d F Y', strtotime($data->tanggal_selesai)); ?></td>
						<td class="jrktbl"><?php echo $data->masa_kerja; ?></td>
						<td class="jrktbl"><?php echo $data->pejabat_menetapkan; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_gaji_pokok/'.$hasil->id_pegawai.'/'.$data->id_gaji_pokok) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_gaji_pokok/'.$hasil->id_pegawai.'/'.$data->id_gaji_pokok) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="10">Belum ada data Gaji</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
<!-- Modal -->
<div class="modal fade" id="addgajipokok" tabindex="-1" role="dialog" aria-labelledby="addgajipokok" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addgajipokok">Tambah Data Gaji Pokok</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_gaji_pokok/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nomor_sk">NOMOR SK</label>
								<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK" >
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_hr" placeholder="HH">
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_bln" placeholder="BB">
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_thn" placeholder="TTTT">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-info" for="dasar_perubahan">DASAR PERUBAHAN</label>
								<input type="text" class="form-control" id="dasar_perubahan" name="dasar_perubahan" placeholder="DASAR PERUBAHAN">
							</div>
							<div class="form-group">
								<label class="text-info" for="gaji_pokok">GAJI POKOK</label>
								<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="GAJI POKOK">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_mulai">TANGGAL MULAI</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_hr" placeholder="HH" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai_thn" placeholder="TTTT">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_selesai">TANGGAL SELESAI</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_hr" placeholder="HH" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai_thn" placeholder="TTTT">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-info" for="masa_kerja">MASA KERJA</label>
								<input type="text" class="form-control" id="masa_kerja" name="masa_kerja" placeholder="MASA KERJA">
							</div>
							<div class="form-group">
								<label class="text-info" for="pejabat_menetapkan">PEJABAT MENETAPKAN</label>
								<input type="text" class="form-control" id="pejabat_menetapkan" name="pejabat_menetapkan" placeholder="PEJABAT MENETAPKAN">
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