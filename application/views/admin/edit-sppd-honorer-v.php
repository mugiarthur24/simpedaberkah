<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/honorer/proses_edit_sppd_honorer') ?>" method="post">
	<!-- <input type="hidden" name="id_sppd_ld" value="<?php echo $detail->id_sppd_ld ?>"> -->
	<!-- <input type="hidden" name="id_honorer" value="<?php echo $reshonor->id_honorer ?>"> -->
	<!-- <input type="hidden" name="id_sppd_honorer" value="<?php echo $detsppdhon->id_sppd_honorer ?>"> -->
	<!-- <input type="hidden" name="tahun" value="<?php echo $detail->tahun ?>"> -->
	<div style="background-color: white;padding: 30px">
		<div class="text-info">Edit SPD</div><hr/>
		Detail Honorer<hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nama Honorer</label>
					<div class="form-control bg-light"><?php echo $reshonor->nama ?></div>
					<small class="form-text text-muted">tidak dapat di edit</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Nomor SK Honorer</label>
					<div class="form-control bg-light"><?php echo $reshonor->nomor_sk ?></div>
					<small class="form-text text-muted">tidak dapat di edit</small>
				</div>
			</div>
		</div><hr/>
		Detail Pegawai<hr/>
		<div class="row">
			<div class="col">
			<div class="form-group">
				<label>JENIS PERJALANAN DINAS</label>
				<input type="hidden" name="id_jenis_perjadin" value="<?php echo @$detail->id_jenis_perjadin ?>">
				<div class="form-control bg-light"><?php echo @$this->Admin_m->detail_data_order('master_jenis_perjadin','id_jenis_perjadin',$detail->id_jenis_perjadin)->jenis_perjadin; ?></div>
			</div>
		</div>
		</div>
	</div>
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Data SPPD<hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nomor SPPD</label>
					<div class="form-control bg-light"><?php echo $detail->no_perjadin ?></div>
					<input type="hidden" name="no_perjadin" value="<?php echo $detail->no_perjadin ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Nomor Surat</label>
					<div class="form-control bg-light"><?php echo $detail->nomor ?></div>
					<input type="hidden" name="nomor" value="<?php echo $detail->nomor ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Tanggal SPPD</label>
					<div class="form-control bg-light"><?php echo $detail->tgl_sppd ?></div>
					<input type="hidden" name="tgl_sppd" value="<?php echo $detail->tgl_sppd ?>">
					<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Tanggal Bukti Rincian</label>
					<div class="form-control bg-light"><?php echo $detail->tgl_bukti ?></div>
					<input type="hidden" name="tgl_bukti" value="<?php echo $detail->tgl_bukti ?>">
					<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Maksud Perjalanan Dinas</label>
					<div class="p-2 rounded border bg-light"><?php echo $detail->maksud_perjadin ?></div>
					<input type="hidden" name="maksud_perjadin" value="<?php echo $detail->maksud_perjadin ?>">
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Tujuan Perjalanan Dinas</label>
					<div class="p-2 rounded border bg-light"><?php echo $detail->tujuan_perjadin ?></div>
					<input type="hidden" name="tujuan_perjadin" value="<?php echo $detail->tujuan_perjadin ?>">
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Mata Anggaran</label>
					<div class="form-control bg-light"><?php echo $detail->kd_anggaran ?></div>
					<input type="hidden" name="kd_anggaran" value="<?php echo $detail->kd_anggaran ?>">
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		<!-- <div class="col">
			<div class="form-group">
				<label>Jumlah Bayar</label>
				<input type="text" class="form-control" placeholder="Masukan Jumlah Bayar">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div> -->
		<div class="col">
			<div class="form-group">
				<label>Tujuan</label>
				<div class="form-control bg-light"><?php echo $detail->tujuan ?></div>
				<input type="hidden" name="tujuan" value="<?php echo $detail->tujuan ?>">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<div class="form-control bg-light"><?php echo $detail->tgl_berangkat ?></div>
				<input type="hidden" name="tgl_berangkat" value="<?php echo $detail->tgl_berangkat ?>" >
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<div class="form-control bg-light"><?php echo $detail->tgl_kembali ?></div>
				<input type="hidden" name="tgl_kembali" value="<?php echo $detail->tgl_kembali ?>">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Lama Hari</label>
				<div class="form-control bg-light"><?php echo $detail->lama_hari ?></div>
				<input type="hidden" name="lama_hari" id="lama_hari" value="<?php echo $detail->lama_hari ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tempat Berangkat</label>
				<div class="form-control bg-light"><?php echo $detail->tempat_berangkat ?></div>
				<input type="hidden" name="tempat_berangkat" value="<?php echo $detail->tempat_berangkat ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Nama Hotel</label>
				<div class="form-control bg-light"><?php echo $detail->nama_hotel ?></div>
				<input type="hidden" name="nama_hotel" value="<?php echo $detail->nama_hotel ?>">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	Rincian Biaya<hr/>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Provinsi</label>
				<select class="form-control" name="provinsi" id="provinsi">
					<option value="1">Pilih Provinsi</option>
					<?php foreach ($provinsi as $datap): ?>
						<option value="<?php echo $datap->id_provinsi ?>"><?php echo $datap->nm_provinsi ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Jabatan</label>
				<select class="form-control" name="fjabatan" id="jabatan">
					<option value="<?php echo $detail->id_jabatan ?>">--<?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$detail->id_jabatan)->nama_jabatan; ?>--</option>
					<?php foreach ($tjabatan as $datajb): ?>
						<option value="<?php echo $datajb->id_jabatan ?>"><?php echo $datajb->nama_jabatan ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Uang Perhari</label>
				<!-- <div id="hsluangharian"></div> -->
				<input type="text" class="form-control" name="uang_perhari" id="hsluangharian" value="<?php echo $detail->uang_perhari ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Hotel</label>
				<input type="text" class="form-control" name="uang_hotel" id="hsluanghotel" value="<?php echo $detail->uang_hotel ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Total Uang Perhari</label>
				<input type="text" class="form-control" name="total_uang_harian" id="tuhr" placeholder="Total Uang Harian" value="<?php echo $detail->total_uang_harian ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Total Biaya Hotel</label>
				<input type="text" class="form-control" name="total_uang_hotel" id="tbhtl" placeholder="Total Biaya Hotel" value="<?php echo $detail->total_uang_hotel ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Pergi (Keberangkatan)</label>
				<input type="text" class="form-control" name="biaya_pergi" id="bypergi" placeholder="Masukan Biaya Keberangkatan" value="<?php echo $detail->biaya_pergi ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Pulang</label>
				<input type="text" class="form-control" name="biaya_pulang" id="bypulang" placeholder="Masukan Biaya Kepulangan" value="<?php echo $detail->biaya_pulang ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Lain</label>
				<input type="text" class="form-control" name="biaya_lain" id="bylain" placeholder="Masukan Biaya Lain Lain PP" value="<?php echo $detail->biaya_lain ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Representasi</label>
				<input type="text" class="form-control" name="biaya_representasi" id="byrep" placeholder="Masukan Biaya Lain Lain PP" value="<?php echo $detail->biaya_representasi ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	Rincian Tiket<hr/>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<input type="text" class="form-control" name="tgl_ta_berangkat" placeholder="Masukan Biaya Tanggal Berangkat" value="<?php echo $detail->tgl_ta_berangkat ?>">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Nama Pesawat KA</label>
				<input type="text" class="form-control" name="pesawat_berangkat" placeholder="Masukan Nama Pesawat" value="<?php echo $detail->pesawat_berangkat ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nomor Tiket</label>
				<input type="text" class="form-control" name="no_tiket_berangkat" placeholder="Nomor Tiket" value="<?php echo $detail->no_tiket_berangkat ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kode_book_berangkat" placeholder="Kode Booking" value="<?php echo $detail->kode_book_berangkat ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Harga Tiket Berangkat</label>
				<input type="text" class="form-control" name="harga_berangkat" placeholder="Harga Tiket Keberangkatan" value="<?php echo $detail->harga_berangkat ?>">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" name="tgl_ta_kembali" placeholder="Tanggal Kembali" value="<?php echo $detail->tgl_ta_kembali ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nama Pesawat / KA</label>
				<input type="text" class="form-control" name="pesawat_kembali" placeholder="Masukan Nama Pesawat" value="<?php echo $detail->pesawat_kembali ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>No Tiket</label>
				<input type="text" class="form-control" name="no_tiket_kembali" placeholder="Masukan Nomor Tiket" value="<?php echo $detail->no_tiket_kembali ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kode_book_kembali" id="bypulang" placeholder="Masukan Kode Booking" value="<?php echo $detail->kode_book_kembali ?>">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Harga Tiket</label>
				<input type="text" class="form-control" name="harga_kembali" id="bylain" value="0" placeholder="Masukan Biaya Tiket" value="<?php echo $detail->harga_kembali ?>">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	Akomodasi<hr/>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Alat Angkutan</label>
				<input type="text" class="form-control" name="alat_angkutan" placeholder="Masukan Alat Angkutan yg Digunakan" value="<?php echo $detail->alat_angkutan ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Dasar Pelaksanaan</label>
				<input type="text" class="form-control" name="dasar_pelaksanaan" placeholder="Masukan Dasar Pelaksanaan" value="<?php echo $detail->dasar_pelaksanaan ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Bendahara</label>
				<input type="text" class="form-control" name="id_bendahara" placeholder="Masukan Nama Pejabat" value="<?php echo $detail->id_bendahara ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>NIP Bendahara</label>
				<input type="text" class="form-control" name="nip_bendahara" placeholder="Masukkan Data Bendahara" value="<?php echo $detail->nip_bendahara ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Isi Laporan</label>
		<textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan"><?php echo $detail->isi_laporan ?></textarea>
		<small class="form-text text-muted">Maksimal 114 Karakter</small>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Instansi</label>
				<input type="text" class="form-control" name="instansi" placeholder="Masukan Nama Angkutan" value="<?php echo $detail->instansi ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Uraian Bukti Kas</label>
				<textarea class="form-control" name="uraian_kas" placeholder="Masukan Uraian"><?php echo $detail->uraian_kas ?></textarea>
				<small class="form-text text-muted">maksimal 3000 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>No Rekening Anggaran</label>
				<input type="text" class="form-control" name="no_rek" placeholder="Masukan Nomor Rekening" value="<?php echo $detail->no_rek ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>	
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Pejabat Yang Memerintah</label>
				<input type="text" class="form-control" name="pejabat_yang_memerintah" placeholder="Masukan Nama Pejabat" value="<?php echo $detail->pejabat_yang_memerintah ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Pejabat Mengetahui</label>
				<input type="text" class="form-control" name="pejabat_mengetahui" placeholder="Masukan Nama Pejabat" value="<?php echo $detail->pejabat_mengetahui ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>NIP Pejabat Mengetahui</label>
				<input type="text" class="form-control" name="nip_pejabat_mengetahui" placeholder="Masukan NIP Pejabat Mengetahui" value="<?php echo $detail->nip_pejabat_mengetahui ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Jumlah Biaya</label>
				<input type="text" class="form-control" name="jumlah_biaya" id="jmlbiayatot" placeholder="Masukan Jumlah Biaya" value="<?php echo $detail->jumlah_biaya ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Jumlah Di Bayarkan</label>
				<input type="text" class="form-control" name="jumlah_dibayarkan" id="jmldibayarkan" placeholder="Masukan Jumlah Bayar" value="<?php echo $detail->jumlah_dibayarkan ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Sisa Biaya</label>
				<input type="text" class="form-control" name="biaya_sisa" id="sisabiaya" placeholder="Masukan Sisa Biaya" value="<?php echo $detail->biaya_sisa ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data SPPD</button>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function() {
  $('#jabatan').change(function() { // Jika select box id kurir dipilih
       var prov = $('#provinsi').val(); // Ciptakan variabel kurir
       var jab = $('#jabatan').val(); // Ciptakan variabel kota
       $.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/biayaharian/'); ?>",
           data: 'id_provinsi=' + prov + '&id_jabatan=' + jab, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hsluangharian').val(jadi); // Berikan hasilnya ke id biaya
          }
      });
   });
});
	$(document).ready(function() {
  $('#jabatan').change(function() { // Jika select box id kurir dipilih
       var prov = $('#provinsi').val(); // Ciptakan variabel kurir
       var jab = $('#jabatan').val(); // Ciptakan variabel kota
       $.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/biayahotel/'); ?>",
           data: 'id_provinsi=' + prov + '&id_jabatan=' + jab, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hsluanghotel').val(jadi); // Berikan hasilnya ke id biaya
          }
      });
   });
});
	$(document).ready(function() {
  $('#jabatan').change(function() { // Jika select box id kurir dipilih
  		var lamahari = $('#lama_hari').val();
       var prov = $('#provinsi').val(); // Ciptakan variabel kurir
       var jab = $('#jabatan').val();; // Ciptakan variabel kota
       $.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/ttlbiayaharian/'); ?>",
           data: 'id_provinsi=' + prov + '&id_jabatan=' + jab +'&lama_hari='+ lamahari, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#tuhr').val(jadi); // Berikan hasilnya ke id biaya
          }
      });
   });
});
	$(document).ready(function() {
  $('#jabatan').change(function() { // Jika select box id kurir dipilih
  		var lamahari = $('#lama_hari').val();
       var prov = $('#provinsi').val(); // Ciptakan variabel kurir
       var jab = $('#jabatan').val();; // Ciptakan variabel kota
       $.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/ttlbiayahotel/'); ?>",
           data: 'id_provinsi=' + prov + '&id_jabatan=' + jab +'&lama_hari='+ lamahari, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#tbhtl').val(jadi); // Berikan hasilnya ke id biaya
          }
      });
   });
});
$(document).ready(function() {
  $('#bypulang').keyup(function() { // Jika select box id kurir dipilih
  		var totuanghari = $('#tuhr').val();
       var totbyhotel = $('#tbhtl').val(); // Ciptakan variabel kurir
       var biayaril = $('#byril').val();
       var biayapergi = $('#bypergi').val(); // Ciptakan variabel kota
       var biayapulang = $('#bypulang').val(); // Ciptakan variabel kota
       var biayalain = $('#bylain').val(); // Ciptakan variabel kota
       var totbiaya = parseInt(totuanghari) + parseInt(totbyhotel) + parseInt(biayaril) +parseInt(biayapergi) + parseInt(biayapulang) + parseInt(biayalain);
      if (!isNaN(totbiaya)) {
         document.getElementById('jmlbiayatot').value = totbiaya;
      }
   });
});
$(document).ready(function() {
  $('#jmldibayarkan').keyup(function() { // Jika select box id kurir dipilih
  		var totdibayar = $('#jmlbiayatot').val();
       var sisa = $('#jmldibayarkan').val(); // Ciptakan variabel kurir
       var totsisa = parseInt(totdibayar) - parseInt(sisa) ;
      if (!isNaN(totsisa)) {
         document.getElementById('sisabiaya').value = totsisa;
      }
   });
});
</script>