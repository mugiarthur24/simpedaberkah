<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
		<div class="media-body">
			<h4>Data SKP</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#adddp3"><i class="material-icons">note_add</i> Tambah Data SKP</button>
		</div>
	</div>
	<hr/>
	<table class="table table-bordered table-hover table-sm">
		<thead>
			<tr class="bg-app text-light">
				<td class="jrktbl text-center">No</td>
				<td class="jrktbl">Tahun</td>
				<td class="jrktbl">Rata-Rata</td>
				<td class="jrktbl">Pejabat Penilai</td>
				<td class="jrktbl">Atasan Pejabat Penilai</td>
				<td class="jrktbl" colspan="2">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php if ($dp3 == TRUE): ?>
				<?php $no = 1 ?>
				<?php foreach ($dp3 as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl"><?php echo $data->tahun; ?></td>
						<td class="jrktbl"><?php echo $data->rata_rata; ?></td>
						<td class="jrktbl"><?php echo $data->pejabat_penilai; ?></td>
						<td class="jrktbl"><?php echo $data->atasan_pejabat_penilai; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_dp3/'.$hasil->id_pegawai.'/'.$data->id_dp3) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_dp3/'.$hasil->id_pegawai.'/'.$data->id_dp3) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td class="jrktbl text-center" colspan="8">Belum ada data SKP</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div >
<!-- Modal -->
<div class="modal fade" id="adddp3" tabindex="-1" role="dialog" aria-labelledby="adddp3" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adddp3">Tambah Data SKP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create_dp3/'.$hasil->id_pegawai) ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="tahun">TAHUN</label>
								<input type="text" class="form-control" id="tahun" name="tahun" placeholder="TAHUN" >
							</div>
							<div class="form-group">
								<label class="text-info" for="kesetiaan">KESETIAAN</label>
								<input type="text" class="form-control" id="kesetiaan" name="kesetiaan" placeholder="KESETIAAN" >
							</div>
							<div class="form-group">
								<label class="text-info" for="prestasi">PRESTASI</label>
								<input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="PRESTASI" >
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggung_jawab">TANGGUNG JAWAB</label>
								<input type="text" class="form-control" id="tanggung_jawab" name="tanggung_jawab" placeholder="TANGGUNG JAWAB">
							</div>
							<div class="form-group">
								<label class="text-info" for="ketaatan">KETAATAN</label>
								<input type="text" class="form-control" id="ketaatan" name="ketaatan" placeholder="KETAATAN">
							</div>
							<div class="form-group">
								<label class="text-info" for="kejujuran">KEJUJURAN</label>
								<input type="text" class="form-control" id="kejujuran" name="kejujuran" placeholder="KEJUJURAN">
							</div>
							<div class="form-group">
								<label class="text-info" for="kerjasama">KERJA SAMA</label>
								<input type="text" class="form-control" id="kerjasama" name="kerjasama" placeholder="KERJA SAMA">
							</div>
							<div class="form-group">
								<label class="text-info" for="prakarsa">PRAKARSA</label>
								<input type="text" class="form-control" id="prakarsa" name="prakarsa" placeholder="PRAKARSA">
							</div>
							<div class="form-group">
								<label class="text-info" for="kepemimpinan">KEPEMIMPINAN</label>
								<input type="text" class="form-control" id="kepemimpinan" name="kepemimpinan" placeholder="KEPEMIMPINAN">
							</div>
							<div class="form-group">
								<label class="text-info" for="rata_rata">RATA-RATA</label>
								<input type="text" class="form-control" id="rata_rata" name="rata_rata" placeholder="RATA-RATA">
							</div>
							<div class="form-group">
								<label class="text-info" for="pejabat_penilai">PEJABAT PENILAI</label>
								<input type="text" class="form-control" id="pejabat_penilai" name="pejabat_penilai" placeholder="PEJABAT PENILAI">
							</div>
							<div class="form-group">
								<label class="text-info" for="atasan_pejabat_penilai">ATASAN PEJABAT PENILAI</label>
								<input type="text" class="form-control" id="atasan_pejabat_penilai" name="atasan_pejabat_penilai" placeholder="ATASAN PEJABAT PENILAI">
							</div>
							<div class="form-group">
								<label class="text-info" for="mengetahui">MENGETAHUI</label>
								<input type="text" class="form-control" id="mengetahui" name="mengetahui" placeholder="MENGETAHUI">
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