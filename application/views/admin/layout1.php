<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
			<title>Data Satuan Kerja</title>	
			<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
			<table class="table table-bordered table-hover table-sm">
				<?php
				$table = '				
				
				<tr class="table-success">
				<th>No.</th>
				<th>Nama Satuan Kerja</th>
				<th>Parent Unit</th>
				</tr>';


				$no = 1;
				foreach ($data as $d) {
					$table .= '
					<tr>
					<td class="jrktbl">'.$no++.'</td>
					<td class="jrktbl">'.$d->nama_satuan_kerja.'</td>
					<td class="jrktbl">'.$d->parent_unit.'</td>
					</tr>';
				}
				$table .='
				</table>';

				echo $table;
				?>
				<a href="<?php echo base_url('index.php/admin/export/dataexcel') ?>" class="btn btn-success">Export menjadi file excel</a>
			</div>
		</div>
	</div>
</table>
</div>
