<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
	<!-- css bootsrap 4.0 beta -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
	<!-- google material icon -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<style type="text/css">
	td, th {
		display: table-cell;
		vertical-align: top;
	}
</style>
</head>
<body style="font-family: Times New Roman">

	<!-- Surat Pernyataan -->
	<div class="container-fluid">
		<div class="row" style="margin-top: 9px;">
			<div class="col text-center">
				<table width="100%" style="border-bottom:3px solid;">
					<tr>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td>
							<h5>PEMERINTAH KABUPATEN BUTON TENGAH<br/><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
							<p class="text-center"><?php echo $infopt->alamat_pt; ?><br/><?php echo $infopt->kontak_4; ?></p>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<h5 class="text-center"><u>SURAT TUGAS</u></h5>
				<p class="text-center" style="margin-top: -10px"><?php echo $hasil2->nomor; ?></p>
				<table style="font-size: 11px" width="100%" class="text-left">
					<tr>
						<td>Dasar</td>
						<td>:</td>
						<td><?php echo $hasil2->dasar_pelaksanaan; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan_2; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan_3; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div style="font-size: 11px;margin-top: 14PX;" class="text-center"><b>Menugasi :
		</b></div>
		<div style="font-size: 11px;margin-top: 14PX" class="col" >Kepada :</div>
		<table width="100%" style="font-size: 11px" align="center">
			<tr>
				<td>1</td>
				<td>Nama</td>
				<td>:</td>
				<td><b><?php echo $hasil->nama_pegawai; ?></b></td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>:</td>
				<td><?php echo $hasil->nip; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Pangkat/Gol</td>
				<td>:</td>
				<td><?php echo $this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->uraian.' / ' .$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->golongan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Instansi</td>
				<td>:</td>
				<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
			</tr>
		</table>
		<?php if ($pengikut == TRUE): ?>
			<?php $no =2 ?>
			<?php foreach ($pengikut as $peng): ?>
				<?php if ($peng->lvl == 'pegawai'): ?>
						<?php 
							$pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$peng->id_pegawai);
						 ?>
						<table width="100%" style="font-size: 11px" align="center">
						<tr>
							<td><?php echo $no; ?></td>
							<td>Nama</td>
							<td>:</td>
							<td><b><?php echo $pegawai->nama_pegawai; ?></b></td>
						</tr>
						<tr>
							<td></td>
							<td>NIP</td>
							<td>:</td>
							<td><?php echo $pegawai->nip; ?></td>
						</tr>
						<tr>
							<td></td>
							<td>Pangkat/Gol</td>
							<td>:</td>
							<td>
								<?php 
								@$pangk = $this->Admin_m->getpangkatpeg($peng->id_pegawai);
								@$gol = $this->Admin_m->getgolpeg($peng->id_pegawai);
								@$jab = $this->Admin_m->getjabpeg($peng->id_pegawai);
								echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',@$pangk->id_pangkat)->uraian.' / ' .@$this->Admin_m->detail_data_order('master_golongan','id_golongan',@$gol->id_golongan)->golongan; 
								?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Jabatan</td>
							<td>:</td>
							<td><?php echo @$jab->nm_jabatan; ?></td>
						</tr>
						<tr>
							<td></td>
							<td>Instansi</td>
							<td>:</td>
							<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
						</tr>
					</table>
				<?php else: ?>
						<?php 
							$pegawai = $this->Admin_m->detail_data_order('honorer','id_honorer',$peng->id_pegawai);
						 ?>
						<table width="100%" style="font-size: 11px" align="center">
						<tr>
							<td><?php echo $no; ?></td>
							<td>Nama</td>
							<td>:</td>
							<td><b><?php echo $pegawai->nama; ?></b></td>
						</tr>
						<tr>
							<td></td>
							<td>NIP</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Pangkat/Gol</td>
							<td>:</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Jabatan</td>
							<td>:</td>
							<td>Staff Magang</td>
						</tr>
						<tr>
							<td></td>
							<td>Instansi</td>
							<td>:</td>
							<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
						</tr>
					</table>
				<?php endif ?>
				
			<?php $no++ ?>
			<?php endforeach ?>
		<?php endif ?>
		<table width="100%" style="font-size: 11px">
			<tr>
				<td>Untuk</td>
				<td>:</td>
				<td><?php echo $hasil2->maksud_perjadin; ?></td>
			</tr>
		</table>
	</div>
	<div style="font-size: 11px" class="col" >Demikian surat tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.</div>
	<div class="row" style="margin-top: 14px;">
		<div class="col"></div>
		<div class="col">
			<table width="100%" style="font-size: 11px;">
				<tr>
					<td>Dikeluarkan di</td>
					<td>:</td>
					<td><b><?php echo ucwords($hasil2->tempat_berangkat); ?></b></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></td>
				</tr>
			</table>
			<div style="width: 100%;font-size: 11px; margin-top: 14px;" class="text-center">
				<b>A.n BUPATI BUTON TENGAH<br/><b>KEPALA BADAN KEPEGAWAIAN<br/>DAN PENGEMBANGAN SUMBER DAYA MANUSIA,</b><br/><br/><br/><br/><br/>
				<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
				<b>Pembina Tingkat I</b><br/>
				<b>NIP : <?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
			</div>
		</div>
	</div>
	<div style="page-break-after: always;"></div>

	<!-- Surat Perintah Tugas -->
	<div class="container-fluid">
		<div class="row" style="margin-top: 9px;">
			<div class="col text-center">
				<table width="100%" style="border-bottom:3px solid;">
					<tr>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td>
							<h5>PEMERINTAH KABUPATEN BUTON TENGAH<br/>SEKRETARIAT DAERAH</h5>
							<p class="text-center">Alamat : Jl. Gersamata No.5 Labungkari Telp/Fax ........<br/>Email : pemda_butontengah@yahoo.com</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<h5 class="text-center"><u>SURAT PERINTAH TUGAS</u></h5>
				<p class="text-center" style="margin-top: -10px"><?php echo $hasil2->nomor; ?></p>
				<table style="font-size: 11px" width="100%" class="text-left">
					<tr>
						<td>Dasar</td>
						<td>:</td>
						<td><?php echo $hasil2->dasar_pelaksanaan; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan_2; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan_3; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div style="font-size: 11px;margin-top: 14PX;" class="text-center"><b>MENUGASKAN :
		</b></div>
		<div style="font-size: 11px;margin-top: 14PX" class="col" >Kepada :</div>
		<table width="100%" style="font-size: 11px" align="center">
			<tr>
				<td>1</td>
				<td>Nama</td>
				<td>:</td>
				<td><b><?php echo $hasil->nama_pegawai; ?></b></td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>:</td>
				<td><?php echo $hasil->nip; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Pangkat/Gol</td>
				<td>:</td>
				<td><?php echo $this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->uraian.' / ' .$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->golongan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Instansi</td>
				<td>:</td>
				<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
			</tr>
		</table>
		<?php if ($pengikut == TRUE): ?>
			<?php $no =2 ?>
			<?php foreach ($pengikut as $peng): ?>
				<?php if ($peng->lvl == 'pegawai'): ?>
						<?php 
							$pegawai = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$peng->id_pegawai);
						 ?>
						<table width="100%" style="font-size: 11px" align="center">
						<tr>
							<td><?php echo $no; ?></td>
							<td>Nama</td>
							<td>:</td>
							<td><b><?php echo $pegawai->nama_pegawai; ?></b></td>
						</tr>
						<tr>
							<td></td>
							<td>NIP</td>
							<td>:</td>
							<td><?php echo $pegawai->nip; ?></td>
						</tr>
						<tr>
							<td></td>
							<td>Pangkat/Gol</td>
							<td>:</td>
							<td>
								<?php 
								@$pangk = $this->Admin_m->getpangkatpeg($peng->id_pegawai);
								@$gol = $this->Admin_m->getgolpeg($peng->id_pegawai);
								@$jab = $this->Admin_m->getjabpeg($peng->id_pegawai);
								echo @$this->Admin_m->detail_data_order('master_golongan','id_golongan',@$pangk->id_pangkat)->uraian.' / ' .@$this->Admin_m->detail_data_order('master_golongan','id_golongan',@$gol->id_golongan)->golongan; 
								?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Jabatan</td>
							<td>:</td>
							<td><?php echo @$jab->nm_jabatan; ?></td>
						</tr>
						<tr>
							<td></td>
							<td>Instansi</td>
							<td>:</td>
							<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
						</tr>
					</table>
				<?php else: ?>
						<?php 
							$pegawai = $this->Admin_m->detail_data_order('honorer','id_honorer',$peng->id_pegawai);
						 ?>
						<table width="100%" style="font-size: 11px" align="center">
						<tr>
							<td><?php echo $no; ?></td>
							<td>Nama</td>
							<td>:</td>
							<td><b><?php echo $pegawai->nama; ?></b></td>
						</tr>
						<tr>
							<td></td>
							<td>NIP</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Pangkat/Gol</td>
							<td>:</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Jabatan</td>
							<td>:</td>
							<td>Staff Magang</td>
						</tr>
						<tr>
							<td></td>
							<td>Instansi</td>
							<td>:</td>
							<td><?php echo $dtsatuan->nama_satuan_kerja; ?></td>
						</tr>
					</table>
				<?php endif ?>
				
			<?php $no++ ?>
			<?php endforeach ?>
		<?php endif ?>
		<table width="100%" style="font-size: 11px">
			<tr>
				<td>Untuk</td>
				<td>:</td>
				<td><?php echo $hasil2->maksud_perjadin; ?></td>
			</tr>
		</table>
	</div>
	<div style="font-size: 11px" class="col" >Demikian surat perintah tugas ini dikeluarkan kepada yang bersangkutan untuk dilaksanakan dan dipergunakan sebagaimana mestinya.</div>
	<div class="row" style="margin-top: 14px;">
		<div class="col"></div>
		<div class="col">
			<table width="100%" style="font-size: 11px;">
				<tr>
					<td>Dikeluarkan di</td>
					<td>:</td>
					<td><b><?php echo ucwords($hasil2->tempat_berangkat); ?></b></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?> <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></td>
				</tr>
			</table>
			<div style="width: 100%;font-size: 11px; margin-top: 14px;" class="text-center">
				<b>A.n Bupati Buton Tengah,<br/><b>Sekretariat Daerah<br/></b><br/><br/><br/><br/><br/>
				<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
				<b>Pembina Utama Madya, IV/d</b><br/>
				<b>NIP : <?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
			</div>
		</div>
	</div>
</body>
</html>