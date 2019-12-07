<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/datepicker/css/bootstrap.css') ?>"> -->
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<h4 class="text-secondary">Data Utama</h4><hr/>
	<form action="<?php echo base_url('index.php/admin/pegawai/update_pegawai/'.$hasil->id_pegawai) ?>" method="post">
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="text-info" for="nama_pegawai">GELAR DEPAN</label>
					<input type="text" class="form-control" id="gelar_dpn" name="gelar_dpn" placeholder="GELAR DEPAN" value="<?php echo $hasil->gelar_dpn ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="nama_pegawai">NAMA LENGKAP</label>
					<input type="text" class="form-control" id="nip" name="nama_pegawai" placeholder="NAMA LENGKAP TANPA GELAR" value="<?php echo $hasil->nama_pegawai ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="nama_pegawai">GELAR BELAKANG</label>
					<input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" placeholder="GELAR BELAKANG" value="<?php echo $hasil->gelar_belakang ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="nip">NIP</label>
					<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?php echo $hasil->nip ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="nip_lama">NIP LAMA</label>
					<input type="text" class="form-control" id="nip_lama" name="nip_lama" placeholder="NIP LAMA" value="<?php echo $hasil->nip_lama ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="no_kartu_pegawai">NOMOR KARTU PEGAWAI</label>
					<input type="text" class="form-control" id="no_kartu_pegawai" name="no_kartu_pegawai" placeholder="NOMOR KARTU PEGAWAI" value="<?php echo $hasil->no_kartu_pegawai ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="no_npwp">NPWP</label>
					<input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="NPWP" value="<?php echo $hasil->no_npwp ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="kartu_askes_pegawai">NOMOR KARTU ASKES PEGAWAI</label>
					<input type="text" class="form-control" id="kartu_askes_pegawai" name="kartu_askes_pegawai" placeholder="NOMOR KARTU ASKES PEGAWAI" value="<?php echo $hasil->kartu_askes_pegawai ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tmt_cpns">TMT CPNS</label>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" id="tmt_cpns" name="tmt_cpns_hr" placeholder="DD"  value="<?php echo substr($hasil->tmt_cpns,8,2)?>">
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tmt_cpns" name="tmt_cpns_bln" placeholder="BB"  value="<?php echo substr($hasil->tmt_cpns,5,2)?>"> 
						</div>
						<div class="col">
							<input type="text" class="form-control" id="tmt_cpns" name="tmt_cpns_thn" placeholder="TTTT"  value="<?php echo substr($hasil->tmt_cpns,0,4)?>">
						</div>
					</div>		
				</div>

				<div class="form-group">
					<label class="text-info" for="gaji_pokok">GAJI POKOK</label>
					<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="GAJI POKOK" value="<?php echo $hasil->gaji_pokok ?>">
				</div>
			</div>
			
			<div class="col">
				<div class="form-group">
					<label class="text-info" for="tmpt_lahir">TEMPAT LAHIR</label>
					<input type="text" class="form-control" id="tmpt_lahir" name="tempat_lahir" placeholder="KOTA KELAHIRAN/TEMPAT LAHIR" value="<?php echo $hasil->tempat_lahir ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_lahir">TANGGAL LAHIR</label>
					<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="12-01-1993" value="<?php echo $hasil->tanggal_lahir ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="no_hp">NOMOR HANDPHONE</label>
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="<?php echo $hasil->no_hp?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="email">EMAIL</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="EMAIL" value="<?php echo $hasil->email?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_lahir">NOMOR KK</label>
					<input type="text" class="form-control" id="nomor_kk" name="nomor_kk" placeholder="Nomor Kartu Keluarga" value="<?php echo $hasil->nomor_kk ?>">
				</div>
				<div class="form-group">
					<label class="text-info" for="tanggal_lahir">NOMOR KTP</label>
					<input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" placeholder="Nomor KTP" value="<?php echo $hasil->nomor_ktp ?>">
				</div>
				<div class="form-group">
								<label class="text-info" for="jenis_kelamin">JENIS KELAMIN</label>
								<select class="form-control" name="jenis_kelamin">
							<option value="<?php echo $hasil->jenis_kelamin ?>"> --<?php echo $hasil->jenis_kelamin ?>--</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
						
								</select>
				</div>

				
				<div class="form-group">
					<label class="text-info" for="agama">AGAMA</label>
					<select class="form-control" name="agama">
						<option value="<?php echo $hasil->agama ?>">-- <?php echo $hasil->nm_agama; ?> --</option>
						<?php foreach ($agama as $data): ?>
							<option value="<?php echo $data->id_agama ?>"><?php echo $data->nm_agama; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="status_pegawai">STATUS PEGAWAI</label>
					<select class="form-control" name="status_pegawai">
						<option value="<?php echo $hasil->id_status_pegawai ?>"><?php echo $hasil->nama_status; ?></option>
						<?php foreach ($status as $data): ?>
							<option value="<?php echo $data->id_status_pegawai ?>"><?php echo $data->nama_status; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-info" for="skpd">SKPD</label>	
						<select class="form-control" name="skpd">
							<option value="<?php echo $hasil->id_satuan_kerja ?>"><?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$hasil->id_satuan_kerja)->nama_satuan_kerja; ?></option>
							<?php foreach ($skpd as $data): ?>
								<option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
								<?php endforeach ?>
						</select>
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
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="text-info" for="alamat">ALAMAT PEGAWAI</label>
					<textarea id="alamat" name="alamat" class="form-control"><?php echo $hasil->alamat; ?></textarea>
				</div>
			</div>
		</div>
		<div class="modal-footer">
						<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan</button>
		</div>
	</form>
</div >