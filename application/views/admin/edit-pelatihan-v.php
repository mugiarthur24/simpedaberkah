<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_pelatihan/'.$hasil->id_pegawai.'/'.$detail->id_pelatihan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-info" for="uraian">URAIAN</label>
						<input type="text" class="form-control" id="uraian" name="uraian" placeholder="URAIAN" value="<?php echo $detail->uraian?>">
					</div>
					<div class="form-group">
						<label class="text-info" for="lokasi">LOKASI</label>
						<input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="LOKASI" value="<?php echo $detail->lokasi?>">
					</div>
					<div class="form-group">
						<label for="nomor">Nomor</label>
						<input type="text" class="form-control" id="nomor" name="nomor" placeholder="nomor" value="<?php echo $detail->nomor?>">
					</div>
					<div class="form-group">
						<label for="nomor">Nomor</label>
						<input type="text" class="form-control" id="nomor" name="nomor" placeholder="nomor" value="<?php echo $detail->nomor?>">
					</div>
						<div class="form-group">
						<label for="tanggal">TANGGAL</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" id="tanggal" name="tanggal_hr" placeholder="HH" value="<?php echo substr($detail->tanggal,3,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tanggal" name="tanggal_bln" placeholder="BB" value="<?php echo substr($detail->tanggal,0,2)?>">
							</div>
					   </div>
					</div>
					<div class="form-group">
		     			<label for="tahun">tahun</label>
						<input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun" value="<?php echo $detail->tahun?>">
					</div>
				
					

					
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
		</form>
	</div>