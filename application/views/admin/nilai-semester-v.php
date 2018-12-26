<div style="margin-top: 14px;background-color: white; padding: 30px">
	<h5 class="text-info">Nilai Semester</h5><hr/>
	<?php foreach ($hasil as $data): ?>
		<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
			<div class="text-secondary">Semester <?php echo $data->id_smt ?> <span class="float-right text-info"> <i class="fa fa-print"></i> cetak</span></div><hr/>
			<table class="table border border-info">
				<tr class="bg-info">
					<th class="text-midle text-light">KODE</th>
					<th class="text-midle text-light">MATAKULIAH</th>
					<th class="text-center text-midle text-light">SMT</th>
					<th class="text-center text-midle text-light">SKS</th>
					<th class="text-center text-midle text-light">NILAI</th>
				</tr>
				<tbody>
					<?php foreach ($this->Nilai_m->nilai_semester($users->id_mhs_pt,$data->id_smt) as $data2): ?>
						<tr>
							<td><?php echo $data2->kode_mk; ?></td>
							<td><?php echo $data2->nm_mk; ?></td>
							<td class="text-center"><?php echo $data2->id_smt; ?></td>
							<td class="text-center"><?php echo $data2->sks_mk; ?></td>
							<td class="text-center"><?php echo $data2->nilai_huruf; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	<?php endforeach ?>
</div>