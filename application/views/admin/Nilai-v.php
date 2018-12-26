<div style="margin-top: 14px;background-color: white; padding: 30px">
	<h5 class="text-info">Akumulasi Nilai Mahasiswa</h5><hr/>
	<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
		<table class="table border border-info">
			<tr class="bg-info">
				<th class="text-center text-midle text-light">NO</th>
				<th class="text-midle text-light">MATAKULIAH</th>
				<th class="text-center text-midle text-light">SMT</th>
				<th class="text-center text-midle text-light">SKS</th>
				<th class="text-center text-midle text-light">NILAI</th>
			</tr>
			
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td><?php echo $data->nm_mk; ?></td>
						<td class="text-center"><?php echo $data->id_smt; ?></td>
						<td class="text-center"><?php echo $data->sks_mk; ?></td>
						<td class="text-center"><?php echo $data->nilai_huruf; ?></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>