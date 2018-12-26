<div style="margin-top: 14px; background-color: white;padding: 30px">
	<form action="<?php echo base_url('index.php/admin/pegawai/index/') ?>" method="get">
		<div class="form-group">
			<label> Cari Pegawai</label>
			<div class="row">
				<div class="col">
					<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama">
					<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian pegawai</small>
				</div>
			</div>
		</div>
	</form>
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data Pegawai <span class="text-secondary">jumlah Pegawai Ditemukan <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addpegawai"><i class="ti ti-plus"></i> Tambah data Pegawai</button>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<table class="w-100 mt-2" border="1" style="font-size: 13px">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1" align="center">Nama Pegawai</td>
					<td class="p-1" align="center">NIP</td>
					<td class="p-1" align="center">NIP Lama</td>
					<td class="p-1" align="center">Alamat Pegawai</td>
					<td class="p-1" align="center">Status</td>
					<td class="p-1" align="center"></td>
				</tr>
			</thead>
			<tbody>
				<?php if ($hasil == TRUE): ?>
					<?php $no = 1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td class="p-1 text-center"><?php echo $no; ?></td>
							<td class="p-1"><a class="text-info" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$data->id_pegawai) ?>"><?php echo strtoupper($data->nama_pegawai); ?></a></td>
							<td class="p-1 text-secondary"><?php echo $data->nip; ?></td>
							<td class="p-1 text-secondary"><?php echo $data->nip_lama; ?></td>
							<td class="p-1 text-secondary"><?php echo strtoupper($data->alamat); ?></td>
							<td class="p-1 text-center text-secondary"><?php echo $data->nama_status; ?></td>
							<td class="p-1 text-center">
								<a href="<?php echo base_url('index.php/admin/pegawai/delete_pegawai/'.$data->id_pegawai) ?>" class="text-danger"><i class="ti ti-trash"></i></a>
							</td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="7" class="text-center p-2">Tidak ada data ditemukan</td>
						</tr>
				<?php endif ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addpegawai" tabindex="-1" role="dialog" aria-labelledby="addpegawaii" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addpegawaii">Tambah Data Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url('index.php/admin/pegawai/create') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">GELAR DEPAN</label>
								<input type="text" class="form-control" id="gelar_dpn" name="gelar_dpn" placeholder="GELAR DEPAN" >
							</div>
							
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">NAMA LENGKAP</label>
								<input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="NAMA LENGKAP TANPA GELAR" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nama_pegawai">GELAR BELAKANG</label>
								<input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" placeholder="GELAR BELAKANG" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nip">NIP</label>
								<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" >
							</div>
							<div class="form-group">
								<label class="text-info" for="nip_lama">NIP LAMA</label>
								<input type="text" class="form-control" id="nip_lama" name="nip_lama" placeholder="NIP LAMA">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_kartu_pegawai">NOMOR KARTU PEGAWAI</label>
								<input type="text" class="form-control" id="no_kartu_pegawai" name="no_kartu_pegawai" placeholder="NOMOR KARTU PEGAWAI">
							</div>

							<div class="form-group">
								<label class="text-info" for="nomor_kk">NOMOR KARTU KELUARGA</label>
								<input type="text" class="form-control" id="NO_KK" name="nomor_kk" placeholder="NOMOR KARTU KELUARGA"">
							</div>

							<div class="form-group">
								<label class="text-info" for="no_ktp">NOMOR KTP</label>
								<input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" placeholder="NOMOR KTP"">
							</div>
							<div class="form-group">
								<label class="text-info" for="no_npwp">NPWP</label>
								<input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="NPWP">
							</div>
							<div class="form-group">
								<label class="text-info" for="kartu_askes_pegawai">NOMOR KARTU ASKES PEGAWAI</label>
								<input type="text" class="form-control" id="kartu_askes_pegawai" name="kartu_askes_pegawai" placeholder="NOMOR KARTU ASKES PEGAWAI">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info" for="tempat_lahir">TEMPAT LAHIR</label>
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="KOTA KELAHIRAN/TEMPAT LAHIR">
							</div>
							<div class="form-group">
								<label class="text-info" for="tanggal_lahir">TANGGAL LAHIR</label>
								<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="12-01-1993">
							</div>
							<div class="form-group">
								<label class="text-info" for="jenis_kelamin">JENIS KELAMIN</label>
								<select class="form-control" name="jenis_kelamin">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="agama">AGAMA</label>
								<select class="form-control" name="agama">
									<?php foreach ($agama as $data): ?>
										<option value="<?php echo $data->id_agama ?>"><?php echo $data->nm_agama; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="no_hp">NOMOR HANDPHONE</label>

								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
							</div>
							<div class="form-group">
								<label class="text-info" for="email">EMAIL</label>

								<input type="text" class="form-control" id="email" name="email" placeholder="EMAIL">
							</div>
							<div class="form-group">
								<label class="text-info" for="status_pegawai">STATUS PEGAWAI</label>
								<select class="form-control" name="status_pegawai">
									<?php foreach ($status as $data): ?>
										<option value="<?php echo $data->id_status_pegawai ?>"><?php echo $data->nama_status; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label class="text-info" for="gaji_pokok">Gaji Pokok</label>
								<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Gaji Pokok">
							</div>
							<div class="form-group">
								<label class="text-info" for="skpd">SKPD</label>
								<select class="form-control" name="skpd">
									<?php foreach ($skpd as $data): ?>
										<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label class="text-info" for="tmt_cpns">TANGGAL PENGANGKATAN CPNS</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" name="tanggal_pengangkatan_cpns_hr" placeholder="DD" >
									</div>
									<div class="col">
										<input type="text" class="form-control" name="tanggal_pengangkatan_cpns_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" name="tanggal_pengangkatan_cpns_thn" placeholder="TTTT" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-info" for="id_golongan">GOLONGAN</label>
								<select class="form-control" name="id_golongan">
									<?php foreach ($golongan as $data): ?>
										<option value="<?php echo $data->id_golongan ?>"><?php echo $data->golongan; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							
							<div class="form-group">
								<label class="text-info" for="tmt_cpns">TMT CPNS</label>
								<div class="row">
									<div class="col">
										<input type="text" class="form-control" name="tmt_cpns_hr" placeholder="DD" >
									</div>
									<div class="col">
										<input type="text" class="form-control" name="tmt_cpns_bln" placeholder="BB" >
									</div>
									<div class="col">
										<input type="text" class="form-control" name="tmt_cpns_thn" placeholder="TTTT" >
									</div>
								</div>
								
								<div class="form-group">
									<label class="text-info" for="tmt_pns">TMT PNS</label>
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" name="tmt_pns_hr" placeholder="DD" >
										</div>
										<div class="col">
											<input type="text" class="form-control" name="tmt_pns_bln" placeholder="BB" >
										</div>
										<div class="col">
											<input type="text" class="form-control" name="tmt_pns_thn" placeholder="TTTT" >
										</div>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-info" for="alamat">ALAMAT PEGAWAI</label>
										<textarea id="alamat" name="alamat" class="form-control"></textarea>
									</div>
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="submit" name="submit" value="submit" class="btn btn-secondary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>