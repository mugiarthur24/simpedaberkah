<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
			<title>Data Golongan</title>	
			<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
			<table class="table table-bordered table-hover table-sm">
				<?php
				$table = '				
				
				<tr class="table-success">
				<th>No.</th>
				<th>Golongan</th>
				<th>Uraian</th>
				<th>Export</th>

				</tr>';


				$no = 1;
				foreach ($data as $d) {
					$table .= '
					<tr>
					<td class="jrktbl">'.$no++.'</td>
					<td class="jrktbl">'.$d->golongan.'</td>
					<td class="jrktbl">'.$d->uraian.'</td>
					<td class="jrktbl">'..'</td>
							
						
					</tr>';
				}
				$table .='
				</table>';

				echo $table;
				?>
				<a href="<?php echo base_url('index.php/admin/export/dataexcel_golongan') ?>" class="btn btn-success">Export menjadi file excel</a>
			</div>
		</div>
	</div>
</table>
</div>
