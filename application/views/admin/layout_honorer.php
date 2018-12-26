<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
			<title>Data Honorer</title>	
			<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
			<table class="table table-bordered table-hover table-sm">
				<?php
				$table = '				
				
				<tr class="table-success">
				<th>No.</th>
				<th>Nama Honorer</th>
				<th>Alamat</th>
				<th>Nomor SK</th>
				<th>Lokasi Kerja</th>
				<th>TMT</th>
				<th>Nomor HP</th>
				</tr>';


				$no = 1;
				foreach ($datas as $d) {
					$table .= '
					<tr>
					<td class="jrktbl">'.$no++.'</td>
					<td class="jrktbl">'.$d->nama.'</td>
					<td class="jrktbl">'.$d->alamat.'</td>
					<td class="jrktbl">'.$d->nomor_sk.'</td>
					<td class="jrktbl">'.$this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$d->id_lokasi_kerja)->lokasi_kerja.'</td>
					<td class="jrktbl">'.$d->tmt.'</td>
					<td class="jrktbl">'.$d->no_hp.'</td>
					</tr>';
				}
				$table .='
				</table>';

				echo $table;
				?>
				<a href="<?php echo base_url('index.php/admin/export/dataexcel_honorer') ?>" class="btn btn-success">Export menjadi file excel</a>
			</div>
		</div>
	</div>
</table>
</div>
