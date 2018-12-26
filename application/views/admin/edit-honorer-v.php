<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Diri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="sppd-tab" data-toggle="tab" href="#sppd" role="tab" aria-controls="sppd" aria-selected="false">SPPD</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="akun-tab" data-toggle="tab" href="#akun" role="tab" aria-controls="akun" aria-selected="false">Detail Akun</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	<div class="card mt-4">
  		<div class="card-body">
  			<form action="<?php echo base_url('index.php/admin/honorer/update_honorer/'.$detail->id_honorer) ?>" method="post">
  				<input type="hidden" name="id_honorer" value="<?php echo $detail->id_honorer ?>">
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-12">
  							<div class="form-group">
  								<label class="text-info">NAMA</label>
  								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail->nama?>" placeholder="Nama">
  							</div>
  							<div class="form-group">
  								<label class="text-info">ALAMAT</label>
  								<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $detail->alamat ?>" placeholder="Alamat">
  							</div>

  							<div class="form-group">
  								<label class="text-info">NOMOR HP</label>
  								<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $detail->no_hp ?>" placeholder="Nomor HP">
  							</div>
  							<div class="form-group">
  								<label class="text-info" for="id_lokasi_kerja">Unit Organisasi</label>
  								<select class="form-control" name="id_lokasi_kerja">
  									<option value="<?php echo $detail->id_lokasi_kerja ?>">--<?php echo $this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$detail->id_lokasi_kerja)->lokasi_kerja; ?></option>
  									<?php foreach ($skpd as $data): ?>
  										<option value="<?php echo $data->id_lokasi_kerja ?>"><?php echo $data->lokasi_kerja; ?></option>
  									<?php endforeach ?>
  								</select>
  							</div>
  							<div class="form-group">
  								<label class="text-info" for="tmt_jabatan_rj">TMT JABATAN</label>
  								<div class="row">
  									<div class="col">
  										<input type="text" class="form-control" name="tmt_hr" placeholder="HH" value="<?php echo substr($detail->tmt,8,2)?>">
  									</div>
  									<div class="col">
  										<input type="text" class="form-control" name="tmt_bln" placeholder="BB" value="<?php echo substr($detail->tmt,5,2)?>">
  									</div>
  									<div class="col">
  										<input type="text" class="form-control" name="tmt_thn" placeholder="TTTT" value="<?php echo substr($detail->tmt,0,4)?>">
  									</div>
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="text-info" for="nomor_sk">NOMOR SK</label>
  								<input type="text" class="form-control" id="nomor_sk" name="nomor_sk" placeholder="NOMOR SK" value="<?php echo $detail->nomor_sk?>">
  							</div>
  							<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan data</button>
  						</div>
  						
  					</div>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <div class="tab-pane fade" id="sppd" role="tabpanel" aria-labelledby="sppd-tab">
      <div class="card mt-4">
        <div class="card-body">
          <span class="text-info mt-4">Daftar SPPD Hononer Terkait</span><hr/>
        <table border="1" class="w-100" style="font-size: 13px;">
          <tr class="table-info">
            <td class="text-center p-1">No</td>
            <td class="text-center p-1">No SPPD</td>
            <td class="text-center p-1">Nama Peg Terkait</td>
            <td class="text-center p-1">Tujuan</td>
            <td colspan="2" class="text-center p-1"></td>
          </tr>
          <?php $no = 1 ?>
          <?php foreach ($sppdhonor as $data): ?>
            <?php $gethon = $this->honorer_m->get_sppd_honorer($data->id_sppd_ld,$detail->id_honorer) ?>
            <tr>
              <td class="text-center p-1"><?php echo $no; ?></td>
              <td class="text-center p-1"><?php echo $data->no_perjadin; ?></td>
              <td class="p-1"><?php echo $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$data->id_pegawai)->nama_pegawai; ?></td>
              <td class="text-center p-1"><?php echo $data->tujuan_perjadin; ?></td>
              <td class="text-center p-1"><i class="ti ti-printer"></i></td>
              <td class="text-center p-1">
                <?php if ($gethon == TRUE): ?>
                  <a href="<?php echo base_url('index.php/admin/honorer/edit_sppd_honorer/'.$gethon->id_sppd_honorer.'/'.$detail->id_honorer) ?>"><i class="ti ti-pencil text-success"></i></a>
                  <?php else: ?>
                  <a href="<?php echo base_url('index.php/admin/honorer/buat_sppd_honorer/'.$data->id_pegawai.'/'.$data->id_sppd_ld.'/'.$detail->id_honorer) ?>"><i class="ti ti-plus"></i></a>
                <?php endif ?>
              </td>
            </tr>
            <?php $no++ ?>
          <?php endforeach ?>
        </table>
        </div>
      </div>
  </div>
  <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="akun-tab">
    <div class="card mt-4">
      <div class="card-body">
        <span class="text-info">Detail Akun</span><hr/>
        <form action="<?php echo base_url('index.php/admin/users/proses_edit') ?>" method="post">
          <?php if ($this->ion_auth->is_admin()): ?>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="first_name">Nama Depan</label>
                  <input type="hidden" name="id" value="<?php echo $akun->id ?>">
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan" value="<?php echo $akun->first_name ?>" required>
                  <small id="first_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="last_name">Nama Belakang</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang" value="<?php echo $akun->last_name ?>">
                  <small id="last_name" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username, John, eka234 dll" value="<?php echo $akun->username ?>" required>
              <small id="username" class="form-text text-muted">hanya dapat menggunakan gabungan angka dan huruf dan tanpa spasi</small>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="jhon@gmail.com" value="<?php echo $akun->email ?>" required>
              <small id="email" class="form-text text-muted">Gunakan penulisan email yang benar</small>
            </div>
          <?php endif ?>
          
          <div class="form-group">
            <label for="password">Password Saat Ini</label>
            <div class="form-control border border-success text-success"><?php echo $akun->repassword; ?></div>
            <small id="password" class="form-text text-muted">Password saat ini yang sedang digunakan</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="*******">
            <small id="password" class="form-text text-muted">Minimal 8 karakter atau lebih menggunakan kombinasi huruf dan angka</small>
          </div>
          <div class="form-group">
            <label for="repassword">Ulangi Password</label>
            <input type="password" class="form-control" name="repassword" id="repassword" placeholder="*******">
            <small id="repassword" class="form-text text-muted">Masukan ulang password anda diatas</small>
          </div>
          <?php if ($this->ion_auth->is_admin()): ?>
            <div class="form-group" style="margin-top: 30px;">
              <label class="control-label">Groups</label><br/>
              <?php foreach ($groups as $gg): ?>
                <input type="checkbox" name="groups[]" value="<?php echo $gg->id; ?>" 
                <?php foreach ($usergroups as $us): ?>
                  <?php if ($gg->id==$us){echo('checked');} ?>
                <?php endforeach ?>
                > <?php echo $gg->name; ?>
              <?php endforeach ?>
            </div>
            <?php foreach ($usergroups as $us): ?>
              <?php if ($us=='34'): ?>
                <select name="id_skpd" class="form-control">
                  <?php if ($detail->id_mhs_pt == TRUE): ?>
                    <option value="<?php echo $detail->id_mhs_pt ?>">-- <?php echo $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$detail->id_mhs_pt)->nama_satuan_kerja; ?> --</option>
                  <?php endif ?>
                  <?php foreach ($skpd as $data): ?>
                    <option value="<?php echo $data->id_satuan_kerja ?>"><?php echo $data->nama_satuan_kerja; ?></option>
                  <?php endforeach ?>
                </select>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
          <button type="submit" class="btn btn-outline-success mt-2 btn-sm">Simpan data Akun</button>
        </form>
      </div>
    </div>
  </div>
</div>
