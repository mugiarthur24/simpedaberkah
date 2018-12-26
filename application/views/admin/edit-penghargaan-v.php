<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_penghargaan/'.$hasil->id_pegawai.'/'.$detail->id_penghargaan) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-info" for="">URAIAN</label>
						<input type="text" class="form-control" id="uraian" name="uraian" placeholder="URAIAN" value="<?php echo $detail->uraian?>">
					</div>
					<div class="form-group">
						<label class="text-info" for="tanggal_sk">TANGGAL SK</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_hr" placeholder="HH" value="<?php echo substr($detail->tanggal_sk,8,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_bln" placeholder="BB" value="<?php echo substr($detail->tanggal_sk,5,2)?>">
							</div>
							<div class="col">
								<input type="text" class="form-control" id="tanggal_sk" name="tanggal_sk_thn" placeholder="TTTT" value="<?php echo substr($detail->tanggal_sk,0,4)?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
		</form>
	</div>