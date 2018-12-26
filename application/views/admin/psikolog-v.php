<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="clearfix">
		<div class="float-left"><h5 class="text-info">Daftar Psikolog</h5></div>
		<div class="float-right text-info"><i class="fa fa-search"></i> Cari Psikolog anda ...</div>
	</div><hr/>
	<?php if ($hasil == FAlSE): ?>
		<div class="main-box border border-danger rounded clearfix bts-bwh2">
			<div class="text-danger">Belum ada Psikolog</div>
		</div>
	<?php else: ?>
		<div class="main-box mybgcolor rounded clearfix bts-bwh2">
			<?php foreach ($hasil as $data): ?>
				<div class="media">
					<img class="align-self-center mr-3 rounded-circle" src="<?php echo base_url('asset/img/psikolog/'.$data->profil) ?>" alt="<?php echo $data->nama ?>">
					<div class="media-body">
						<span class="text-success"><?php echo $data->nama; ?></span><br/>
						<p class="text-secondary"><?php echo $data->biografi; ?></p>
					</div>
				</div>
				<div class="clearfix">
					<div class="float-right">
						<button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-handshake-o"></i> Lakukan Konsultasi ..</button>
						<?php if ($data->online !== '1'): ?>
							<button type="button" class="btn btn-outline-secondary btn-sm">Offline</button>
						<?php else: ?>
							<button type="button" class="btn btn-outline-success btn-sm">Online</button>
						<?php endif ?>
					</div>
				</div>
				<hr/>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>