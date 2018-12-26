<form action="<?php echo base_url('index.php/admin/pegawai/create_sppd_ld') ?>" method="post">
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Tambah SPPD
	</div>
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Detail Pegawai<hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nama Pegawai</label>
					<div class="form-control bg-light"><?php echo $hasil->nama_pegawai ?></div>
					<input type="hidden" name="id_pegawai" value="<?php echo $hasil->id_pegawai ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>NIP</label>
					<div class="form-control bg-light"><?php echo $hasil->nip ?></div>
					<small class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
			<div class="col">
			<div class="form-group">
				<label>Jenis Perjalanan Dinas</label>
				<select class="form-control" name="id_jenis_perjadin">
					<option value="1">Pilih Jenis Perjalanan Dinas</option>
					<?php foreach ($jnsperjadin as $datap): ?>
						<option value="<?php echo $datap->id_jenis_perjadin ?>"><?php echo $datap->jenis_perjadin ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Golongan</label>
					<div class="form-control bg-light"><?php echo $dtgolongan->golongan ?></div>
					<input type="hidden" name="id_golongan" value="<?php echo $dtgolongan->id_golongan ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>	
			<div class="col">
				<div class="form-group">
					<label>Pangkat</label>
					<div class="form-control bg-light"><?php echo $dtpangkat->nm_pangkat ?></div>
					<input type="hidden" name="id_pangkat" value="<?php echo $dtpangkat->id_pangkat ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>	
			<div class="col">
				<div class="form-group">
					<label>Eselon</label>
					<div class="form-control bg-light"><?php echo $dteselon->nama_eselon ?></div>
					<input type="hidden" name="id_eselon" value="<?php echo $dteselon->id_eselon ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
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
					<input type="text" class="form-control" name="no_perjadin" placeholder="Masukan Nomor SPPD">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Tanggal SPPD</label>
					<input type="text" class="form-control" name="tgl_sppd" placeholder="Masukan Tanggal SPPD" value="<?php echo date('Y-m-d') ?>">
					<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Tanggal Bukti Rincian</label>
					<input type="text" class="form-control" name="tgl_bukti" placeholder="Masukan Tanggal Bukti Rincian">
					<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Maksud Perjalanan Dinas</label>
					<textarea class="form-control" name="maksud_perjadin" placeholder="Masukan Maksud Perjalanan Dinas"></textarea>
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Tujuan Perjalanan Dinas</label>
					<textarea class="form-control" name="tujuan_perjadin" placeholder="Masukan Tujuan Perjalanan Dinas"></textarea>
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Mata Anggaran</label>
					<input type="text" class="form-control" name="no_rek" placeholder="Masukan Kode Anggaran">
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
				<input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<input type="text" class="form-control" name="tgl_berangkat" placeholder="Masukan Tanggal Berangkat">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" name="tgl_kembali" placeholder="Masukan Tanggal Kembali">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Lama Hari</label>
				<input type="text" class="form-control" name="lama_hari" id="lama_hari" placeholder="Masukan Lama Hari">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tempat Berangkat</label>
				<input type="text" class="form-control" name="tempat_berangkat" placeholder="Masukan Tempat Berangkat">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Nama Hotel</label>
				<input type="text" class="form-control" name="nama_hotel" placeholder="Masukan Nama Hotel">
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
					<option value="1">Pilih Jabatan</option>
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
				<input type="text" class="form-control" name="uang_perhari" id="hsluangharian">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Hotel</label>
				<input type="text" class="form-control" name="uang_hotel" id="hsluanghotel">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Total Uang Perhari</label>
				<input type="text" class="form-control" name="total_uang_harian" id="tuhr" placeholder="Total Uang Harian">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Total Biaya Hotel</label>
				<input type="text" class="form-control" name="total_uang_hotel" id="tbhtl" placeholder="Total Biaya Hotel">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Riil</label>
				<input type="text" class="form-control" name="biaya_riil" id="byril" placeholder="Masukan Biaya Biaya Rill">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Pergi (Keberangkatan)</label>
				<input type="text" class="form-control" name="biaya_pergi" id="bypergi" placeholder="Masukan Biaya Keberangkatan">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Pulang</label>
				<input type="text" class="form-control" name="biaya_pulang" id="bypulang" placeholder="Masukan Biaya Kepulangan">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Lain</label>
				<input type="text" class="form-control" name="biaya_lain" id="bylain" value="0" placeholder="Masukan Biaya Lain Lain PP">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Representasi</label>
				<input type="text" class="form-control" name="biaya_representasi" id="byrep" value="0" placeholder="Masukan Biaya Lain Lain PP">
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
				<input type="text" class="form-control" name="tgl_ta_berangkat" placeholder="Masukan Biaya Tanggal Berangkat">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Nama Pesawat KA</label>
				<input type="text" class="form-control" name="pesawat_berangkat" placeholder="Masukan Nama Pesawat">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nomor Tiket</label>
				<input type="text" class="form-control" name="no_tiket_berangkat">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kode_book_berangkat">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Harga Tiket Berangkat</label>
				<input type="text" class="form-control" name="harga_berangkat" placeholder="Harga Tiket Keberangkatan">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" name="tgl_ta_kembali" placeholder="Tanggal Kembali">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nama Pesawat / KA</label>
				<input type="text" class="form-control" name="pesawat_kembali" placeholder="Masukan Nama Pesawat">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>No Tiket</label>
				<input type="text" class="form-control" name="no_tiket_kembali" placeholder="Masukan Nomor Tiket">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kode_book_kembali" id="bypulang" placeholder="Masukan Kode Booking">
				<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Harga Tiket</label>
				<input type="text" class="form-control" name="harga_kembali" id="bylain" value="0" placeholder="Masukan Biaya Tiket">
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
				<input type="text" class="form-control" name="alat_angkutan" placeholder="Masukan Alat Angkutan yg Digunakan">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Dasar Pelaksanaan 1</label>
				<textarea class="form-control" name="dasar_pelaksanaan" placeholder="Masukan Dasar Pelaksanaan"></textarea>
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Dasar Pelaksanaan 2</label>
				<textarea class="form-control" name="dasar_pelaksanaan_2" placeholder="Masukan Dasar Pelaksanaan"></textarea>
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Dasar Pelaksanaan 3</label>
				<textarea class="form-control" name="dasar_pelaksanaan_3" placeholder="Masukan Dasar Pelaksanaan"></textarea>
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Bendahara</label>
				<input type="text" class="form-control" name="id_bendahara" placeholder="Masukan Nama Pejabat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>NIP Bendahara</label>
				<input type="text" class="form-control" name="nip_bendahara" placeholder="Masukkan Data Bendahara">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Isi Laporan</label>
		<textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan"></textarea>
		<small class="form-text text-muted">Maksimal 114 Karakter</small>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Instansi</label>
				<input type="text" class="form-control" name="instansi" placeholder="Masukan Nama Angkutan">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Uraian Bukti Kas</label>
				<textarea class="form-control" name="uraian_kas" placeholder="Masukan Uraian"></textarea>
				<small class="form-text text-muted">maksimal 3000 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<!-- <div class="col">
			<div class="form-group">
				<label>No Rekening Anggaran</label>
				<input type="text" class="form-control" name="no_rek" placeholder="Masukan Nomor Rekening">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>	 -->
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Pejabat Yang Memerintah</label>
				<input type="text" class="form-control" name="pejabat_yang_memerintah" placeholder="Masukan Nama Pejabat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Pejabat Mengetahui</label>
				<input type="text" class="form-control" name="pejabat_mengetahui" placeholder="Masukan Nama Pejabat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>NIP Pejabat Mengetahui</label>
				<input type="text" class="form-control" name="nip_pejabat_mengetahui" placeholder="Masukan NIP Pejabat Mengetahui">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Jumlah Biaya</label>
				<input type="text" class="form-control" name="jumlah_biaya" id="jmlbiayatot" placeholder="Masukan Jumlah Biaya">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Jumlah Di Bayarkan</label>
				<input type="text" class="form-control" name="jumlah_dibayarkan" id="jmldibayarkan" placeholder="Masukan Jumlah Bayar">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Sisa Biaya</label>
				<input type="text" class="form-control" name="biaya_sisa" id="sisabiaya" placeholder="Masukan Sisa Biaya">
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
