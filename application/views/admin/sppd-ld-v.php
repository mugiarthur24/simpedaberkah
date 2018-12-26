<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data SPPD Luar Daerah <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
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
		
		<table class="w-100 mt-2" border="1" style="font-size: 13px">
			<thead>
				<tr class="table-info">
					<td class="p-1 text-center">No</td>
					<td class="p-1" align="center">No. Bukti</td>
					<td class="p-1" align="center">Pegawai</td>
					<td class="p-1" align="center">NIP</td>
					<td class="p-1" align="center">Keperluan</td>
					<td class="p-1" align="center">Tujuan</td>
					<td class="p-1" align="center">Jumlah Anggaran</td>
					<td class="p-1" colspan="2" align="center"></td>
					
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
						<td class="p-1 text-secondary"><?php echo $data->tujuan; ?></td>
						<td class="p-1 text-secondary"><?php echo $data->jumlah_biaya; ?></td>
						<td class="p-1">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/edit/'.$data->id_sppd_ld) ?>" class="text-success" ><i class="ti ti-plus" rel="tooltip" title="Edit"></i></a>
						</td>
						<td class="p-1">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/delete_sppd_ld/'.$data->id_sppd_ld) ?>" class="text-danger"><i class="ti ti-trash" rel="tooltip" title="Hapus"></i></a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>