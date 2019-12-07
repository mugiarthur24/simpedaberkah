<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data SPPD<span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<a class="btn btn-outline-success btn-sm" href="<?php echo base_url('index.php/admin/honorer/buat_sppd_honorer/'.$hasil->id_honorer) ?>"><i class="fas fa-plus"></i> Tambah data SPPD</a>
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
					<td class="p-1 text-center" align="center">Nama</td>
					<td class="p-1 text-center" align="center">Keperluan</td>
					<td colspan="4" class="p-1 text-center" align="center">Opsi</td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-secondary"><?php echo $data->no_perjadin; ?></td>
						<td class="p-1 text-secondary"><?php echo strtoupper($data->nama); ?></td>
						<td class="p-1 text-secondary"><?php echo $data->maksud_perjadin; ?></td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/honorer/cetak_detail_honorer/'.$hasil->id_honorer.'/'.$data->id_sppd_honorer) ?>" class="text-info"><i class="fas fa-print" rel="tooltip" title="Print SPPD"></i></a>
						</td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/honorer/edit_sppd_honorer/'.$hasil->id_honorer.'/'.$data->id_sppd_honorer) ?>" class="text-success"><i class="fas fa-edit" rel="tooltip" title="Edit SPPD"></i></a>
						</td>
						<td class="p-1 text-center">
							<a href="<?php echo base_url('index.php/admin/honorer/delete_sppd_ld/'.$detail->id_honorer.'/'.$data->id_sppd_honorer) ?>" class="text-danger"><i class="fas fa-trash" rel="tooltip" title="Hapus Data SPPD"></i></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>