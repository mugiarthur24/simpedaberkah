<div style="margin-top: 14px; background-color: white;padding: 30px">
	<h5 class="text-info">Setting</h5><hr/>
	<form action="<?php echo base_url('index.php/admin/setting/update') ?>" method="post" enctype="multipart/form-data">
		<div class="media">
			<img id="preview" class="align-self-center mr-3 rounded-circle border border-info" src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="50px" alt="Generic placeholder image">
			<div class="media-body">
				<h5 class="mt-0">Logo Perusahaan</h5>
				<div class="custom-file">
					<input type="file" name="logopt" id="uploadBtn" lang="es">
				</div>
			</div>
		</div><hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="nama_info_pt">Nama Perusahaan</label>
					<input type="text" class="form-control" name="nama_info_pt" id="nama_info_pt" aria-describedby="nama_info_pt" placeholder="Nama Perusahaan" value="<?php echo $infopt->nama_info_pt ?>">
					<small id="nama_menu" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="kode_pt">Kode Perusahaan</label>
					<input type="text" class="form-control" name="kode_pt" id="kode_pt" aria-describedby="kode_pt" placeholder="Kode Perusahaan" value="<?php echo $infopt->kode_pt ?>">
					<small id="kode_pt" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="slogan">Slogan Perusahaan</label>
			<input type="text" class="form-control" name="slogan" id="slogan" aria-describedby="slogan" placeholder="Kode Perusahaan" value="<?php echo $infopt->slogan ?>">
			<small id="slogan" class="form-text text-muted">Penulisan slogan maksimal 144 karakter</small>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="kontak_1">Kontak 1</label>
					<input type="text" class="form-control" name="kontak_1" id="kontak_1" aria-describedby="kontak_1" placeholder="Nomor yang dapat dihubungi" value="<?php echo $infopt->kontak_1 ?>">
					<small id="kontak_1" class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="kontak_2">Kontak 2</label>
					<input type="text" class="form-control" name="kontak_2" id="kontak_2" aria-describedby="kontak_2" placeholder="Nomor yang dapat dihubungi" value="<?php echo $infopt->kontak_2 ?>">
					<small id="kontak_2" class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="kontak_3">Kontak 3</label>
					<input type="text" class="form-control" name="kontak_3" id="kontak_3" aria-describedby="kontak_3" placeholder="Nomor yang dapat dihubungi" value="<?php echo $infopt->kontak_3 ?>">
					<small id="kontak_3" class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="kontak_4">Kontak 4</label>
					<input type="text" class="form-control" name="kontak_4" id="kontak_4" aria-describedby="kontak_4" placeholder="Nomor yang dapat dihubungi" value="<?php echo $infopt->kontak_4 ?>">
					<small id="kontak_4" class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="alamat_pt">Alamat Perusahaan</label>
			<textarea name="alamat_pt" class="form-control"><?php echo $infopt->alamat_pt; ?></textarea>
			<small id="alamat_pt" class="form-text text-muted">Semua jenis karakter (Huruf, Angka dan simbol) Dapat digunakan</small>
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan</button>
	</form>
</div>
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