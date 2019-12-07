<div style="margin-top: 14px; padding: 30px">
	<div class="row">
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="media">

						<!-- <?php if (!empty($hasil->foto)): ?>
							<img id="preview" class="align-self-center mr-3 rounded-circle" style="width: 100px" src="<?php echo base_url('asset/img/pegawai/'.$hasil->foto) ?>" alt="<?php echo $hasil->foto ?>">

							<?php else: ?>
								<img id="preview" class="align-self-center mr-3 rounded-circle" style="width: 100px" src="<?php echo base_url('asset/img/pegawai/avatar.png') ?>" alt="foto kosong">

								<?php endif ?> -->
								<div class="media-body">
									<h5 class="mt-0"><?php echo $hasil->nama; ?></h5>
									<span class="text-secondary">NIP : <?php echo $hasil->kode_honorer; ?></span>
									<br/>
								<!-- <form action="<?php echo base_url('index.php/admin/pegawai/update_foto_pegawai') ?>" en method="post" enctype="multipart/form-data">
									<input type="file" name="fotop" id="uploadBtn"></br>
									<input type="hidden" name="id_pegawai" value="<?php echo $hasil->id_pegawai;?>">
									<button type="submit" name="submit" value="submit" class="btn btn-outline-success btn-sm mt-2"><i class="ti ti-save"></i> Simpan</button>
								</form> -->
								<hr/>
								Nomor SK : <span class="border border-success rounded" style="font-size: 12px;padding: 2px 5px; margin-top: 12px; "><?php echo $hasil->nomor_sk; ?></span>
							</div>
							<div class="media-right">
								<a href="<?php echo base_url('index.php/admin/honorer/cetak_sppd_honorer/'.$hasil->id_honorer) ?>" target="_blank" class="btn btn-outline-info btn-sm"><i class="ti ti-printer"></i> Cetak Rekap SPD</a>
							</div>
						</div>
					</div>
				</div>
				<div class="mt-4">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<?php if ($titelbag == 'datadiri'): ?>
								<a class="nav-link active" href="<?php echo base_url('index.php/admin/honorer/detail/'.$hasil->id_honorer); ?>">Data Diri</a>
								<?php else: ?>
									<a class="nav-link" href="<?php echo base_url('index.php/admin/honorer/detail/'.$hasil->id_honorer); ?>">Data Diri</a>
								<?php endif ?>
							</li>
							<li class="nav-item">
								<?php if ($titelbag == 'sppd'): ?>
									<a class="nav-link active" href="<?php echo base_url('index.php/admin/honorer/daftar_sppd_ld/'.$hasil->id_honorer); ?>">SPPD</a>
									<?php else: ?>
										<a class="nav-link" href="<?php echo base_url('index.php/admin/honorer/daftar_sppd_ld/'.$hasil->id_honorer); ?>">SPPD</a>
									<?php endif ?>
								</li>
								</ul>
							</div>
							<div class="card mt-4">
								<div class="card-body">
									<?php $this->view($bagian); ?>
								</div>
							</div>
						</div>
					</div>
				</div >
				<script type="text/javascript">
					document.getElementById("uploadBtn").onchange = function () {
						document.getElementById("uploadFile").value = this.value;
					};
					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$('#preview').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					$("#uploadBtn").change(function(){
						readURL(this);
					});
				</script>