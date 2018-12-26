<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Daftar Pengikut SPPD<span class="text-secondary"></span>
			</div>
			<div class="media-right">
				<button class="btn btn-outline-success btn-sm mr-2" data-toggle="modal" data-target="#adddtpengikut"><i class="ti ti-plus"></i> Tambah pegawai (PNS)</button>
			</div>
			<div class="media-right">
				<button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#adddtpengikuthm"><i class="ti ti-plus"></i> Tambah pegawai (Honorer / Magang)</button>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<?php if ($hasil3 == TRUE): ?>
			<table class="w-100 mt-4" border="1" style="font-size: 13px;">
				<thead>
					<tr class="table-info">
						<td class="p-1 text-center" align="text-center">No</td>
						<td class="p-1" align="center">NIP</td>
						<td class="p-1" align="center">Nama Pegawai</td>
						<td class="p-1" align="center">Tanggal Lahir</td>
						<td class="p-1" align="center"></td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
					<?php foreach ($hasil3 as $data): ?>
						<?php if ($data->lvl !== 'pegawai'): ?>
							<?php $dethon = $this->Admin_m->detail_data_order('honorer','id_honorer',$data->id_pegawai) ?>
							<tr>
								<td class="p-1 text-center"><?php echo $no; ?></td>
								<td class="p-1 text-secondary"><?php echo $dethon->nomor_sk; ?></td>
								<td class="p-1 text-secondary"><?php echo strtoupper($dethon->nama); ?></td>
								<td class="p-1 text-center"><?php echo $dethon->tmt; ?></td>
								<td class="p-1 text-center">
									<a href="<?php echo base_url('index.php/admin/pegawai/delete_pengikut_sppd_ld/'.$data->id_pengikut) ?>" class="text-danger"><i class="ti ti-trash text-danger" rel="tooltip" title="Hapus"></i></a>
								</td>
							</tr>
							<?php else: ?>
								<?php $deteg = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$data->id_pegawai) ?>
								<tr>
									<td class="p-1 text-center"><?php echo $no; ?></td>
									<td class="p-1 text-secondary"><?php echo $deteg->nip; ?></td>
									<td class="p-1 text-secondary"><?php echo strtoupper($deteg->nama_pegawai); ?></td>
									<td class="p-1 text-center"><?php echo $deteg->tanggal_lahir; ?></td>
									<td class="p-1 text-center">
										<a href="<?php echo base_url('index.php/admin/pegawai/delete_pengikut_sppd_ld/'.$data->id_pengikut) ?>" class="text-danger"><i class="ti ti-trash text-danger" rel="tooltip" title="Hapus"></i></a>
									</td>
								</tr>
						<?php endif ?>
						<?php $no++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php else: ?>
				<div class="alert alert-info text-center">Tidak ada pengikut pada SPPD ini.</div>
			<?php endif ?>
		</div>
	</div>
	<!--  -->
	<!-- Modal -->
	<form>
		<input type="hidden" id="id_sppd" name="id_sppd" value="<?php echo $hasil2->id_sppd_ld ?>">
	</form>
	<div class="modal fade" id="adddtpengikut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Cari Pengikut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Masukan Nama Pegawai</label>
							<input type="text" class="form-control" id="caripegawai" placeholder="Masukkan nama atau NIP Pegawai">
							<small class="form-text text-muted">Gunakan NIP atau nama pegawai</small>
						</div>
					</form>
					<table id="hasilcari" width="100%"></table>
				</div>
			</div>
		</div>
	</div>
	<!-- model -->
	<div class="modal fade" id="adddtpengikuthm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Cari Pengikut Honorer / Magang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Masukan Nama Pegawai Magang / Honorer</label>
							<input type="text" class="form-control" id="caripegawaih" placeholder="Masukan nama atau NIP Pegawai">
							<small class="form-text text-muted">Gunakan NIP atau nama pegawai</small>
						</div>
					</form>
					<table id="hasilcarih" width="100%"></table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		// 
$(document).ready(function() {
  $('#caripegawaih').keyup(function() { // Jika select box id kurir dipilih
  	var katakunci = $('#caripegawaih').val();
  	var idsppd = $('#id_sppd').val();
  	$.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/caripengikuth/'); ?>",
           data: 'string=' + katakunci + '&idsppd='+ idsppd, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hasilcarih').html(jadi); // Berikan hasilnya ke id biaya
          }
      });
  });
  $('#caripegawai').keyup(function() { // Jika select box id kurir dipilih
  	var katakuncip = $('#caripegawai').val();
  	var idsppd = $('#id_sppd').val();
  	$.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/caripengikut/'); ?>",
           data: 'string=' + katakuncip + '&idsppd='+ idsppd, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hasilcari').html(jadi); // Berikan hasilnya ke id biaya
          }
      });
  });
});
// 
  
</script>