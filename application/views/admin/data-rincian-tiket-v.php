<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data Rincian Tiket SPPD <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-app text-light">
					<td class="jrktbl text-center" align="text-center">No</td>
					<td class="jrktbl" align="center">No. SPPD</td>
					<td class="jrktbl" align="center">Tanggal Berangkat</td>
					<td class="jrktbl" align="center">Pesawat/KA</td>
					<td class="jrktbl" align="center">Tanggal Kembali</td>
					<td class="jrktbl" align="center">Pesawat/KA</td>
					<td colspan="2" class="jrktbl" align="center">Aksi</td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<?php $dttiket = $this->Admin_m->detail_data_order('rincian_biaya','id_sppd',$data->id_sppd_ld); ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl text-secondary"><?php echo @$data->nomor; ?></td>
						<td class="jrktbl text-secondary"><?php echo @$dttiket->tgl_ta_berangkat; ?></td>
						<td class="jrktbl text-secondary"><?php echo @$dttiket->pesawat_berangkat; ?></td>
						<td class="jrktbl text-secondary"><?php echo @$dttiket->tgl_ta_kembali; ?></td>
						<td class="jrktbl text-secondary"><?php echo @$dttiket->pesawat_kembali; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/edit_rincian_biaya/'.$data->id_sppd_ld) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/delete_rincian_biaya/'.$data->id_sppd_ld) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>