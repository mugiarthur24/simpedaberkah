<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data Pengikut SPPD <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right"></div>
		</div>
	</div>
	<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center" align="text-center">No</td>
					<td class="p-1" align="center">No SPPD</td>
					<td class="p-1" align="center">Pegawai</td>
					<td class="p-1" align="center">NIP</td>
					<td class="p-1" align="center">Aksi</td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1"><?php echo $data->no_perjadin; ?></td>
						<td class="p-1"><?php echo strtoupper($data->nama_pegawai); ?></td>
						<td class="p-1"><?php echo $data->nip; ?></td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/pegawai/tambah_pengikut_sppd_ld/'.$hasil->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-success"><i class="fas fa-plus" rel="tooltip" title="Tambah Pengikut"></i> Pengikut</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
		<?php echo $pagging; ?>
	</div>