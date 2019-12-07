<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Daftar SPPD <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			
		</div>
	</div>
	<div class="ktk-badan bts-ats mt-2">
		<form action="<?php echo base_url('index.php/admin/sppd_ld/index/') ?>" method="get">
			<div class="form-group">
				<div class="row">
					<div class="col">
						<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama">
						<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian pegawai</small>
					</div>
				</div>
			</div>
		</form>
	</div>
<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center" style="vertical-align: middle;">No</td>
					<td class="p-1" align="center" style="vertical-align: middle;">No. Bukti</td>
					<td class="p-1" align="center" style="vertical-align: middle;">Pegawai</td>
					<td class="p-1" align="center" style="vertical-align: middle;">NIP</td>
					<td class="p-1" align="center" style="vertical-align: middle;">Keperluan</td>
					<td class="p-1" align="center" style="vertical-align: middle;">Tujuan</td>
					<td class="p-1" align="center" style="vertical-align: middle;">Jumlah Anggaran</td>
					
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<tr>
						<td class="p-1 text-center" style="font-size: 13px"><?php echo $no; ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo $data->no_perjadin; ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo strtoupper($data->nama_pegawai); ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo $data->nip; ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo $data->maksud_perjadin; ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo $data->tujuan; ?></td>
						<td class="p-1 text-secondary" style="font-size: 13px"><?php echo $data->jumlah_biaya; ?></td>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>
</div>