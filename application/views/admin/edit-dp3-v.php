<div style="margin-top: 14px; background-color: white;padding: 30px">
<form action="<?php echo base_url('index.php/admin/pegawai/update_dp3/'.$hasil->id_pegawai.'/'.$detail->id_dp3) ?>" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="text-info" for="tahun">TAHUN</label>
				<input type="text" class="form-control" id="tahun" name="tahun" placeholder="TAHUN" value="<?php echo $detail->tahun?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kesetiaan">KESETIAAN</label>
				<input type="text" class="form-control" id="kesetiaan" name="kesetiaan" placeholder="KESETIAAN" value="<?php echo $detail->kesetiaan?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="prestasi">PRESTASI</label>
				<input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="PRESTASI" value="<?php echo $detail->prestasi?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="tanggung_jawab">TANGGUNG JAWAB</label>
				<input type="text" class="form-control" id="tanggung_jawab" name="tanggung_jawab" placeholder="TANGGUNG JAWAB" value="<?php echo $detail->tanggung_jawab?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="ketaatan">KETAATAN</label>
				<input type="text" class="form-control" id="ketaatan" name="ketaatan" placeholder="KETAATAN" value="<?php echo $detail->ketaatan?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kejujuran">KEJUJURAN</label>
				<input type="text" class="form-control" id="kejujuran" name="kejujuran" placeholder="KEJUJURAN" value="<?php echo $detail->kejujuran?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kerjasama">KERJA SAMA</label>
				<input type="text" class="form-control" id="kerjasama" name="kerjasama" placeholder="KERJA SAMA" value="<?php echo $detail->kerjasama?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="prakarsa">PRAKARSA</label>
				<input type="text" class="form-control" id="prakarsa" name="prakarsa" placeholder="PRAKARSA" value="<?php echo $detail->prakarsa?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="kepemimpinan">KEPEMIMPINAN</label>
				<input type="text" class="form-control" id="kepemimpinan" name="kepemimpinan" placeholder="KEPEMIMPINAN" value="<?php echo $detail->kepemimpinan?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="rata_rata">RATA-RATA</label>
				<input type="text" class="form-control" id="rata_rata" name="rata_rata" placeholder="RATA-RATA" value="<?php echo $detail->rata_rata?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="pejabat_penilai">PEJABAT PENILAI</label>
				<input type="text" class="form-control" id="pejabat_penilai" name="pejabat_penilai" placeholder="PEJABAT PENILAI" value="<?php echo $detail->pejabat_penilai?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="atasan_pejabat_penilai">ATASAN PEJABAT PENILAI</label>
				<input type="text" class="form-control" id="atasan_pejabat_penilai" name="atasan_pejabat_penilai" placeholder="ATASAN PEJABAT PENILAI" value="<?php echo $detail->atasan_pejabat_penilai?>">
			</div>
			<div class="form-group">
				<label class="text-info" for="mengetahui">MENGETAHUI</label>
				<input type="text" class="form-control" id="mengetahui" name="mengetahui" placeholder="MENGETAHUI" value="<?php echo $detail->mengetahui?>">
			</div>
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data</button>
</form>
</div>