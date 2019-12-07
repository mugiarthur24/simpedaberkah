<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data SPPD<span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<div class="media-right">
				<a class="btn btn-success btn-sm" href="<?php echo base_url('index.php/admin/pegawai/tambah_sppd_ld/'.$hasil->id_pegawai) ?>"><i class="fas fa-plus"></i> Tambah SPD</a>
			</div>
			</div>
		</div>
	</div>
	<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center" align="text-center">No</td>
					<td class="p-1 text-center" align="center">No. SPPD</td>
					<td class="p-1 text-center" align="center">Pegawai</td>
					<td class="p-1 text-center" align="center">NIP</td>
					<td class="p-1 text-center" align="center">Keperluan</td>
					<td colspan="4" class="p-1 text-center" align="center"></td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-secondary"><?php echo $data->no_perjadin; ?></td>
						<td class="p-1 text-secondary"><?php echo strtoupper($data->nama_pegawai); ?></td>
						<td class="p-1 text-secondary"><?php echo $data->nip; ?></td>
						<td class="p-1 text-secondary"><?php echo $data->maksud_perjadin; ?></td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/pegawai/cetak_sppd_ld/'.$hasil->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-info"><i class="fas fa-print" rel="tooltip" title="Cetak Laporan SPPD"></i></a>
						</td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/pegawai/srt_tugas/'.$hasil->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-warning"><i class="fas fa-newspaper" rel="tooltip" title="Cetak Surat Tugas"></i></a>
						</td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/pegawai/edit_sppd_ld/'.$hasil->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-success"><i class="fas fa-edit" rel="tooltip" title="Edit SPPD"></i></a>
						</td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/pegawai/delete_sppd_ld/'.$detail->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-danger"><i class="fas fa-trash" rel="tooltip" title="Hapus Data SPPD"></i></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>