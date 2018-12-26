<div style="margin-top: 14px;background-color: white; padding: 30px">
	<h5 class="text-info">Aktivitas Mahasiswa</h5><hr/>
	<?php foreach ($hasil as $data): ?>
		<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
			<div class="text-secondary">Semester <?php echo $data->id_smt ?></div><hr/>
			<?php foreach ($this->Jadwal_m->jadwal_kuliah($users->id_mhs_pt,$data->id_smt) as $jadwal): ?>
				<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
					<span class="float-left"><?php echo $jadwal->nm_mk; ?></span>
					<span class="float-right"><?php echo 'Kelas '.$jadwal->nm_kls; ?> | <i class="fa fa-clock-o"></i> 07.00 - 08.300</span>
				</div>
			<?php endforeach ?>
		</div>
	<?php endforeach ?>
</div>