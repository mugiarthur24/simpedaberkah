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

	<div class="container-fluid">
		<div class="row">
			<div class="col"></div>
			<div class="col" style="font-size: 9px">
				Peraturan Bupati Buton Tengah Tentang<br/>
				Perjalanan Dinas Bagi bagi Pejabat Negara, Pimpinan dan<br/>
				Anggota DPRD, PNS dan Non PNS dilingkungan <br/>
				Pemerintah Kabupaten Buton Tengah T.A 2018<br/><br/>
				Nomor   : 20 Tahun 2017<br/>
				Tanggal : 17 November 2017.
			</div>
		</div>
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
			<div class="col"></div>
			<div class="col">
				<table style="font-size: 11px" width="100%">
					<tr>
						<td width="35%">Lembar</td>
						<td width="5%">:</td>
						<td width="60%"></td>
					</tr>
					<tr>
						<td>Kode No</td>
						<td>:</td>
						<td><?php echo $hasil2->no_perjadin; ?></td>
					</tr>
					<tr>
						<td>Nomor</td>
						<td>:</td>
						<td><?php echo $hasil2->nomor; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h5 class="text-center"><u>SURAT PERINTAH PERJALANAN DINAS</u></h5>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<!-- real -->
				<table width="100%" border="1" style="font-size: 11px">
					<tr>
						<td class="text-center" width="2%">1.</td>
						<td colspan="3">Pejabat Berwenang yang memberi perintah</td>
						<td colspan="3"><?php echo $hasil2->pejabat_yang_memerintah; ?></td>
					</tr>
					<tr>
						<td class="text-center">2.</td>
						<td colspan="3">Nama / NIP Pegawai yang diperintahkan</td>
						<td colspan="3"><?php echo $hasil->nama_pegawai.' / ' .$hasil->nip; ?></td>
					</tr>
					<tr>
						<td class="text-center">3.</td>
						<td class="text-center" width="1%">a</td>
						<td colspan="2">Pangkat dan Golongan ruang gaji menurut PP No. 6 Tahun 1997</td>
						<td class="text-center" width="1%">a</td>
						<td colspan="2"><?php echo $this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->uraian.' / ' .$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->golongan; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">b</td>
						<td colspan="2">Jabatan Instansi</td>
						<td class="text-center">b</td>
						<td colspan="2"><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">c</td>
						<td colspan="2">Tingkat Menurut Perjalanan Dinas</td>
						<td class="text-center">c</td>
						<td colspan="2"><?php echo$this->Admin_m->detail_data_order('master_jenis_perjadin','id_jenis_perjadin',$hasil2->id_jenis_perjadin)->jenis_perjadin; ?></td>
					</tr>
					<tr>
						<td class="text-center">4.</td>
						<td colspan="3">Maksud perjalanan dinas</td>
						<td colspan="3"><?php echo $hasil2->maksud_perjadin; ?></td>
					</tr>
					<tr>
						<td class="text-center">4.</td>
						<td colspan="3">Tujuan perjalanan dinas</td>
						<td colspan="3"><?php echo $hasil2->tujuan_perjadin; ?></td>
					</tr>
					<tr>
						<td class="text-center">5.</td>
						<td colspan="3">Alat angkutan yang dipergunakan</td>
						<td colspan="3"><?php echo $hasil2->alat_angkutan; ?></td>
					</tr>
					<tr>
						<td class="text-center">6.</td>
						<td class="text-center">a</td>
						<td colspan="2">Tempat Berangkat</td>
						<td class="text-center">a</td>
						<td colspan="2"><?php echo $hasil2->tempat_berangkat; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">b</td>
						<td colspan="2">Tempat Tujuan</td>
						<td class="text-center">b</td>
						<td colspan="2"><?php echo $hasil2->tujuan; ?></td>
					</tr>
					<tr>
						<td class="text-center">5.</td>
						<td colspan="3">Alat angkutan yang dipergunakan</td>
						<td colspan="3"><?php echo $hasil2->alat_angkutan; ?></td>
					</tr>
					<tr>
						<td class="text-center">7.</td>
						<td class="text-center">a</td>
						<td colspan="2">Lamanya perjalanan Dinas</td>
						<td class="text-center">a</td>
						<td colspan="2"><?php echo $hasil2->lama_hari; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">b</td>
						<td colspan="2">Tanggal Berangkat</td>
						<td class="text-center">b</td>
						<td colspan="2"><?php echo $hasil2->tgl_berangkat; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">c</td>
						<td colspan="2">Tanggal Kembali</td>
						<td class="text-center">b</td>
						<td colspan="2"><?php echo $hasil2->tgl_kembali; ?></td>
					</tr>
					<tr>
						<td class="text-center">8.</td>
						<td colspan="2"width="20%" class="text-center">Pengikut</td>
						<td class="text-center">Nama</td>
						<td colspan="2" width="20%" class="text-center">Tanggal Lahir</td>
						<td class="text-center">Keterangan</td>
					</tr>
					<?php if ($pengikut == TRUE): ?>
						<?php $no =2 ?>
						<?php foreach ($pengikut as $peng): ?>
							<?php if ($peng->lvl == 'pegawai'): ?>
							<?php $dtpeng = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$peng->id_pegawai); ?>
							<tr>
								<td></td>
								<td colspan="2"></td>
								<td class="text-center"><?php echo $dtpeng->nama_pegawai; ?></td>
								<td class="text-center" colspan="2"><?php echo $dtpeng->tanggal_lahir; ?></td>
								<td></td>
							</tr>
							<?php else: ?>
									<?php 
										$pegawai = $this->Admin_m->detail_data_order('honorer','id_honorer',$peng->id_pegawai);
									 ?>
									<tr>
										<td></td>
										<td colspan="2"></td>
										<td class="text-center"><?php echo $pegawai->nama; ?></td>
										<td class="text-center" colspan="2"></td>
										<td></td>
									</tr>
							<?php endif ?>
							
						<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td></td>
								<td colspan="2">&nbsp;</td>
								<td></td>
								<td colspan="2">&nbsp;</td>
								<td></td>
							</tr>
					<?php endif ?>	
					<tr>
						<td class="text-center">9.</td>
						<td class="text-center">a</td>
						<td colspan="2">Pembebanan Anggaran</td>
						<td class="text-center">a</td>
						<td colspan="2"><?php echo $hasil2->instansi; ?></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">b</td>
						<td colspan="2">Mata Anggaran</td>
						<td class="text-center">b</td>
						<td colspan="3"><?php echo $hasil2->no_rek; ?></td>
					</tr>
				</table>
				<div class="row" style="margin-top: 14px;">
					<div class="col"></div>
					<div class="col">
						<table width="100%" style="border-bottom: 1px solid;font-size: 11px;">
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
							<b>Kepala Kepegawaian dan Pengembangan SDM<br/>Kabupaten Buton Tengah</b><br/><br/><br/><br/><br/>
							<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
							<b>NIP : <?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="page-break-after: always;"></div>

	<!-- Daftar Anggaran -->
	<div class="container">
		<div class="row">
			<div class="col" style="font-size: 9px">
				Peraturan Bupati Buton Tengah Tentang<br/>
				Pedoman Pelaksanaan Anggaran Pendapatan<br/>
				dan Belanja Daerah Kabupaten Buton Tengah<br/>
				Nomor   :  <br/>
				Tanggal :  <br/>
			</div>
			<div class="col" style="font-size: 9px">
				<table>
					<tr>
						<td>SPPD No</td>
						<td>:</td>
						<td><?php echo $hasil2->no_perjadin; ?></td>
					</tr>
					<tr>
						<td>Berangkat dari</td>
						<td>:</td>
						<td><?php echo $hasil2->tempat_berangkat; ?></td>
					</tr>
					<tr>
						<td>(tempat kedudukan)</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td><?php echo $hasil2->tujuan; ?></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td><?php echo $hasil2->tgl_berangkat; ?></td>
					</tr>
				</table>
				<div style="width: 100%;font-size: 11px; margin-top: 14px;" class="text-center">
					<b>A.n. BUPATI BUTON TENGAH<br/></b>
					Kepala Badan Kepegawaian dan Pengembangan SDM<br/>
					Kabupaten Buton Tengah<br/><br/><br/><br/>


					<u><b>SAMRIN, S.PD., M.PD</b></u><br/>
					<b>NIP : 19690924 199401 1 003</b>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="row border">
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Tiba Di</td>
						<td>:</td>
						<td><?php echo $hasil2->tujuan; ?>  </td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Berangkat Dari</td>
						<td>:</td>
						<td><?php echo $hasil2->tujuan; ?>  </td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td><?php echo $hasil2->tempat_berangkat; ?>  </td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td><?php echo $hasil2->tgl_kembali; ?></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row border">
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Tiba Di</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Berangkat Dari</td>
						<td>:</td>
						<td> </td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row border">
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Tiba Di</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Berangkat Dari</td>
						<td>:</td>
						<td> </td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row border">
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Tiba Di</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
			<div class="col border border-dark">
				<table style="font-size: 9px" align="center" width="100%">
					<tr>
						<td>Berangkat Dari</td>
						<td>:</td>
						<td> </td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Kepala</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td height="50px"></td>
						<td></td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td valign="top">........................<br/>NIP</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col border border-dark"></div>
			<div class="col border border-dark">
				<table style="font-size: 9px" width="100%">
					<tr>
						<td></td>
						<td>Tiba Kembali di :</td>
					</tr>
					<tr>
						<td></td>
						<td>Pada Tanggal :</td>
					</tr>
					<tr>
						<td></td>
						<td>telah diperiksa dengan keterangan bahwa perjalana tersebut atas<br/>perintahnya dan semata-mata untuk kepentingan jabatan dalam<br/>waktu yang sesingkat-singkatnya</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">A.n. Bupati Buton Tengah<br/>Kepala Badan Kepegawaian Daerah dan Diklat</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center"><b><u>MUH. RIJAL, SE., MH</u></b></td>
					</tr>
					<tr>
						<td></td>
						<td class="text-center">NIP 19690924 199401 1 003</td>
					</tr>	
				</table>
			</div>
		</div>
		<div style="page-break-after: always;"></div>
		
		<!-- Pernyataan Mutlak -->
		<div class="container-fluid">
			<div class="row">
				<div class="col"></div>
				<div class="col" style="font-size: 9px">
					Lampiran XIV Peraturan Bupati Buton Tengah<br/>
					Nomor   :  20 Tahun 2017<br/>
					Tanggal :  17 November 2017.
				</div>
			</div>
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
				<div class="col">
					<h5 class="text-center"><u>PERNYATAAN MUTLAK</u></h5>
				</div>
			</div>
			<div class="col" style="font-size: 11px">
				Yang bertandatangan di bawah ini :<br/>
			</div>

			<div class="col">
				<table style="font-size: 11px">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $hasil->nama_pegawai; ?></td>
					</tr>
					<tr>
						<td>NIP</td>
						<td>:</td>
						<td><?php echo $hasil->nip; ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
					</tr>
				</table>
			</div>
			<div class="col" style="font-size: 11px">
				Berdasarkan Surat Perjalanan Dinas Nomor : <?php echo $hasil2->nomor; ?> tanggal : <?php echo $hasil2->tgl_sppd; ?><br/>
				<br/>
				Dengan ini kami menyatakan dengan sesungguhnya bahwa :<br/>
				1. Biaya Transpor Pegawai dan/atau biaya penginapan di bawah ini yang  meliputi :
			</div>
			<div class="col">
				<table width="100%" border="1" style="font-size: 11px">
					<tr>
						<td class="text-center" width="10px">No</td>
						<td class="text-center" colspan="2">Uraian</td>
						<td class="text-center" colspan="2">Jumlah</td>
					</tr>
					<tr>
						<td class="text-center">1</td>
						<td colspan="2">Biaya Keberangkatan</td>
						<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pergi); ?></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">Biaya Kepulangan</td>
						<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
					</tr>
					<tr>
						<td class="text-center">2</td>
						<td colspan="2">Biaya uang Harian <?php echo $hasil2->lama_hari; ?> hari x <?php echo 'Rp '.number_format($hasil2->uang_perhari); ?></td>
						<td colspan="2"><?php echo 'Rp '.number_format($hasil2->total_uang_harian); ?></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td colspan="2">Jumlah</td>
						<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pergi+$hasil2->biaya_pulang+$hasil2->total_uang_harian); ?></td>
					</tr>
				</table>
			</div>
			<div class="col" style="font-size: 11px">
				2. Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas SKPD/Kas Daerah.
			</div>
		</div>
		<div class="row" style="font-size: 11px;margin-top: 14px;">
			<div class="col"></div>
			<div class="col text-center"><?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?> <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></div>
		</div>
		<div class="row" style="font-size: 11px;">
			<div class="col">
				<div class="text-center">Mengetahui,<br/>
					Plt. Kepala Badan Kepegawaian dan Pengemnbangan SDM<br/>Kabupaten Buton Tengah
					<br/><br/><br/>
					<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
					<b><?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
				</div>
			</div>
			<div class="col text-center">
				<br/>
				Yang Melaksanakan Perjalalanan Dinas<br/><br/>
				<br/>
				<br/>
				<b><u><?php echo $hasil->nama_pegawai; ?></u></b><br/>
				<b><?php echo $hasil->nip; ?></b>
			</div>
		</div>
		<div style="page-break-after: always;"></div>


		<!-- Daftar Pengluaran Riil -->
		<div class="container-fluid">
			<div class="row">
				<div class="col"></div>
				<div class="col" style="font-size: 9px">
					Lampiran XIV Peraturan Bupati Buton Tengah<br/>
					Nomor   :  20 Tahun 2017<br/>
					Tanggal :  17 November 2017.
				</div>
			</div>
	<!-- <div class="row" style="margin-top: 9px;">
		<div class="col text-center">
			<table width="100%" style="border-bottom:3px solid;">
				<tr>
					<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
					<td>
						<h5>PEMERINTAH KABUPATEN BUTON TENGAH<br/><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
						<p class="text-center"><?php echo $infopt->alamat_pt; ?><br/><?php echo $infopt->kontak_4.'<br/>'.strtoupper($infopt->kontak_3); ?></p>
					</td>
				</tr>
			</table>
		</div>
	</div> -->
	<div class="row">
		<div class="col">
			<h5 class="text-center"><u>DAFTAR PENGELUARAN RIIL</u></h5>
		</div>
	</div>
	<div class="col" style="font-size: 11px">
		Yang bertandatangan di bawah ini :<br/>
	</div>

	<div class="col">
		<table style="font-size: 11px">
			<tr>
				<td width="35%">Nama</td>
				<td width="5%">:</td>
				<td width="60%"><?php echo $hasil->nama_pegawai; ?></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><?php echo $hasil->nip; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
			</tr>
		</table>
	</div>
	<div class="col" style="font-size: 11px">
		Berdasarkan Surat Perintah Perjalanan Dinas (SPPD) Tanggal 22 Desember 2017, Nomor 090/ 60 /BKPSDM.XII/2017 Dengan ini kami menyatakan dengan sesungguhnya bahwa :  <br/>
		<br/>
		1. Biaya Transportasi Pegawai dibawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi :<br/>
	</div>
	<div class="col">
		<table width="100%" border="1" style="font-size: 11px">
			<tr>
				<td class="text-center" width="10px">No</td>
				<td class="text-center" colspan="2">Uraian</td>
				<td class="text-center" colspan="2">Jumlah</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td colspan="2">Biaya Perjalanan</td>
				<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_riil); ?></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">Jumlah</td>
				<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_riil); ?></td>
			</tr>
			<tr>
				<td class="text-center" colspan="4">
					<?php 
					function penyebut($nilai) {
						$nilai = abs($nilai);
						$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
						$temp = "";
						if ($nilai < 12) {
							$temp = " ". $huruf[$nilai];
						} else if ($nilai <20) {
							$temp = penyebut($nilai - 10). " belas";
						} else if ($nilai < 100) {
							$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
						} else if ($nilai < 200) {
							$temp = " seratus" . penyebut($nilai - 100);
						} else if ($nilai < 1000) {
							$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
						} else if ($nilai < 2000) {
							$temp = " seribu" . penyebut($nilai - 1000);
						} else if ($nilai < 1000000) {
							$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
						} else if ($nilai < 1000000000) {
							$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
						} else if ($nilai < 1000000000000) {
							$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
						} else if ($nilai < 1000000000000000) {
							$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
						}     
						return $temp;
					}

					function terbilang($nilai) {
						if($nilai<0) {
							$hasil = "minus ". trim(penyebut($nilai));
						} else {
							$hasil = trim(penyebut($nilai));
						}     		
						return $hasil;
					}


					$angka = $hasil2->biaya_riil;
					echo 'Terbilang : '.ucwords(terbilang($angka)).' Rupiah';
					?>
				</td>
			</tr>
		</table>
	</div>
	<div class="col" style="font-size: 11px">
		2. Jumlah uang tersebut pada angka 1 diatas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke kas Daerah.<br/>
		<br/>
		Demikian pernyataan ini dibuat dengan sebenarnya, untuk dipergunakan sebagai mana mestinya.
	</div>
</div>
<div class="row" style="font-size: 11px;margin-top: 14px;">
	<div class="col"></div>
	<div class="col text-center"><?php echo ucwords($hasil2->tempat_berangkat); ?> <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></div>
</div>
<div class="row" style="font-size: 11px;">
	<div class="col">
		<div class="text-center">Mengetahui/Menyetujui,<br/>
			PA /KPA
			<br/><br/>
			<br/>
			<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
			<b><?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
		</div>
	</div>
	<div class="col text-center">
		<br/>
		Yang Melaksanakan Perjalalanan Dinas<br/><br/>
		<br/>
		<b><u><?php echo $hasil->nama_pegawai; ?></u></b><br/>
		<b><?php echo $hasil->nip; ?></b>
	</div>
</div>
<div style="page-break-after: always;"></div>


<!-- Laporan Pelaksanaan Kegiatan -->
<div class="container-fluid">
	<div class="row">
		<div class="col"></div>
		<div class="col" style="font-size: 9px">
			Lampiran XIV Peraturan Bupati Buton Tengah<br/>
			Nomor   :  20 Tahun 2017<br/>
			Tanggal :  17 November 2017.
		</div>
	</div>
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
		<div class="col">
			<h5 class="text-center"><u>LAPORAN PELAKSANAAN PERJALANAN DINAS</u></h5>
		</div>
	</div>
	<div class="col">
		<table style="font-size: 11px">
			<tr>
				<td>I</td>
				<td width="20%">Dasar Pelaksanaan</td>
				<td>:</td>
				<td width="5%" align="top">1</td>
				<td><?php echo $hasil2->dasar_pelaksanaan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td width="20%"></td>
				<td></td>
				<td width="5%" align="top">2</td>
				<td><?php echo $hasil2->dasar_pelaksanaan_2; ?></td>
			</tr>
			<tr>
				<td></td>
				<td width="20%"></td>
				<td>:</td>
				<td width="5%" align="top">3</td>
				<td><?php echo $hasil2->dasar_pelaksanaan_3; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>:</td>
				<td>1</td>
				<td>Nomor SPPD : <?php echo $hasil2->no_perjadin; ?></td>
			</tr>
			<tr>
				<td>II</td>
				<td>Maksud dan Tujuan</td>
				<td>:</td>
				<td>2</td>
				<td><?php echo $hasil2->maksud_perjadin; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>1</td>
				<td><?php echo $hasil2->tujuan_perjadin; ?></td>
			</tr>
			<tr>
				<td>III</td>
				<td>Isi Laporan Perjalanan Dinas</td>
				<td></td>
				<td>2</td>
				<td><?php echo $hasil2->isi_laporan; ?></td>
			</tr>
		</table>
	</div>
	<div class="row" style="font-size: 11px;margin-top: 14px;">
		<div class="col"></div>
		<div class="col text-center"><?php echo ucwords($hasil2->tempat_berangkat); ?> <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></div>
	</div>
	<div class="row" style="font-size: 11px;">
		<div class="col">
			<div class="text-center">Mengetahui,<br/>
				An. BUPATI BUTON TENGAH<br/>SEKRETARIAT DAERAH<br/>
				<br/><br/>
				<u><b>Drs. H. LA ODE HASIMIN, MM.</b></u><br/>
				<b>NIP. 19591231 199103 1 059</b>
			</div>
		</div>
		<div class="col text-center">
			<br/>
			Pelapor<br/><br/>
			<br/><br/>
			<b><u><?php echo $hasil->nama_pegawai; ?></u></b><br/>
			<b><?php echo $hasil->nip; ?></b>
		</div>
	</div>
	<div style="page-break-after: always;"></div>
	
	<!-- Laporan Bukti Kas -->
	<div class="container-fluid" style="font-size: 11px;">
		<div class="row">
			<div class="col border border-dark text-center">
				<b style="font-size: 11px">TAHUN ANGGARAN <?php echo date('Y'); ?></b>
			</div>
			<div class="col border border-dark text-center">
				<table width="100%">
					<tr>
						<td></td>
						<td></td>
						<td valign="bottom"><b>Tanda Bukti Kas</b></td>
					</tr>
					<tr>
						<td>No</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>UP/GU/TU/LS</td>
					</tr>
				</table>
			</div>
			<div class="col border border-dark text-center">
				<b style="font-size: 11px">KODE REKENING ANGGARAN<br/><?php echo $hasil2->no_rek; ?></b>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<table width="100%">
					<tr>
						<td>Terima Dari</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="col-8" align="justify">
				<b>Bendahara Pengeluaran Badan Kepegawaian dan Pengembangan SDM Kabupaten Buton Tengah</b>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<table width="100%">
					<tr>
						<td>Uang Sebesar</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
			</div>
			<div class="col-8" align="justify">
				<span class="border border-dark"><?php echo 'Rp '.$hasil2->jumlah_biaya; ?></span> Dengah Huruf <span class="border border-dark"><?php $angka2 = $hasil2->jumlah_biaya;echo ucwords(terbilang($angka2)).' Rupiah';?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<table width="100%">
					<tr>
						<td>Untuk Pembayaran<br/><div class="border border-dark">Surat-Surat bukti yang syah berupa surat pesanan / surat perintah kerja / berita acara dilampirkan</div></td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
			</div>
			<div class="col-8" align="justify">
				<?php echo $hasil2->keterangan_anggaran; ?>
			</div>
		</div>
		<div class="row bts-ats">
			<div class="col text-center" style="border-top:1px solid; border-right: 1px solid;border-left: 1px solid">
				Telah diperksa<br/>Setuju dibayar
			</div>
			<div class="col text-center" style="border-top:1px solid">Telah Lunas dibayar<br/>Tgl................................</div>
			<div class="col text-center" style="border-top:1px solid">
				<?php echo ucwords($hasil2->tempat_berangkat); ?> <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?>
			</div>
		</div>
		<div class="row">
			<div class="col text-center" style=" border-top:1px solid;border-bottom: 1px solid; border-right: 1px solid;border-left: 1px solid">Atasan Langsung</div>
			<div class="col text-center" style="border-top:1px solid;border-bottom: 1px solid;">7</div>
			<div class="col text-center">Yang Menerima</div>
		</div>
		<div class="row">
			<div class="col" style="height: 50px;border-right: 1px solid;border-left: 1px solid"></div>
			<div class="col" style="height: 50px"></div>
			<div class="col" style="height: 50px"></div>
		</div>
		<div class="row" style="font-size: 11px;">
			<div class="col" style="border-right: 1px solid;border-left: 1px solid">
				<div class="text-center">
					<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
					<b><?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
				</div>
			</div>
			<div class="col text-center">
				<b><u><?php echo $hasil2->id_bendahara; ?></u></b><br/>
				<b><?php echo $hasil2->nip_bendahara; ?></b>
			</div>
			<div class="col text-center">
				<b><u><?php echo $hasil->nama_pegawai; ?></u></b><br/>
				<b><?php echo $hasil->nip; ?></b>
			</div>
		</div>
		<div style="page-break-after: always;"></div>

		<!-- Rincian Belanja Perjalanan Dinas -->
		<div class="container-fluid">
			<div class="row">
				<div class="col"></div>
				<div class="col" style="font-size: 9px">
					Lampiran XIV Peraturan Bupati Buton Tengah<br/>
					Nomor   :  20 Tahun 2017<br/>
					Tanggal :  17 November 2017.
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5 class="text-center"><u>RINCIAN BELANJA PERJALANAN DINAS</u></h5>
				</div>
			</div>
			<div class="col">
				<table style="font-size: 11px">
					<tr>
						<td>Lampiran SPPD Nomor</td>
						<td>:</td>
						<td><?php echo $hasil2->no_perjadin; ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo $hasil2->tgl_sppd; ?></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<div class="col">
					<!-- real -->
					<table width="100%" border="1" style="font-size: 11px">
						<tr>
							<td class="text-center" width="2%">No</td>
							<td width="60%">Perincian Biaya</td>
							<td colspan="2" width=20%>Jumlah</td>
							<td>Keterangan</td>
						</tr>
						<tr>
							<td class="text-center">1</td>
							<td>Biaya Perjalanan</td>
							<td colspan="2"></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>
							<td>Biaya Rill</td>
							<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_riil); ?></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>
							<td>Biaya Keberangkatan</td>
							<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pergi); ?></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>
							<td>Biaya Kepulangan</td>
							<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td>Biaya Penginapan</td>
							<td colspan="2"></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>
							<td><?php echo $hasil2->lama_hari; ?> (Hari) x Rp <?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
							<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center">3</td>
							<td>Biaya Harian</td>
							<td colspan="2"></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>
							<td><?php echo $hasil2->lama_hari; ?> (Hari) x Rp <?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
							<td colspan="2"><?php echo 'Rp '.number_format($hasil2->biaya_pulang); ?></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"></td>

							<td colspan="5" class="text-center">
								<?php 
								$angka3 = $hasil2->jumlah_dibayarkan;
								echo 'Terbilang : '.ucwords(terbilang($angka3)).' Rupiah';
								?>
							</td>
						</tr>
					</table>
					<div class="row" style="font-size: 11px;margin-top: 14px;">
						<div class="col"></div>
						<div class="col text-center"><?php echo ucwords($hasil2->tempat_berangkat); ?>, <?php echo date('d F Y', strtotime($hasil2->tgl_sppd)) ; ?></div>
					</div>
					<div class="text-center">
						<table width="100%" style="font-size: 11px;" align="center">
							<tr>
								<td>dibayar sejumlah</td>
								<td>telah menerima jumlah uang sebesar</td>
								<td></td>
							</tr>
							<tr>
								<td><?php echo $hasil2->jumlah_biaya; ?></td>
								<td><?php echo $hasil2->jumlah_dibayarkan; ?></td>
							</tr>
						</table>
					</div>
					<div class="row" style="font-size: 11px;">
						<div class="col">
							<div class="text-center">Bendahara Pengeluaran,<br/>
								<br/>
								<br/>
								<u><b><?php echo $hasil2->id_bendahara; ?></b></u><br/>
								<b><?php echo $hasil2->nip_bendahara; ?></b>
							</div>
						</div>
						<div class="col text-center">Yang Menerima,<br/>
							<br/>
							<br/>
							<b><u><?php echo $hasil->nama_pegawai; ?></u></b><br/>
							<b><?php echo $hasil->nip; ?></b>
						</div>
					</div>
					<div class="row" style="border-bottom:3px solid;"></div>
					<div class="col">
						<h5 class="text-center"><u>PERHITUNGAN SPPD RAMPUNG</u></h5>
					</div>
					<div class="text-center">
						<table width="100%" style="font-size: 12px;" align="center">
							<tr>
								<td>Ditetapkan sejumlah</td>
								<td>:</td>
								<td>Rp</td>
								<td><?php echo number_format($hasil2->jumlah_biaya); ?></td>
							</tr>
							<tr>
								<td>yang telah di bayarkan</td>
								<td>:</td>
								<td>Rp</td>
								<td><?php echo number_format($hasil2->jumlah_dibayarkan); ?></td>
							</tr>
							<tr>
								<td>Sisa Kurang / Lebih</td>
								<td>:</td>
								<td>Rp</td>
								<td><?php echo number_format($hasil2->biaya_sisa); ?></td>
							</tr>
						</table>
					</div>

					
					<div class="row" style="font-size: 11px;">
						<div class="col">
							<div class="text-center"><b>BUPATI BUTON TENGAH,</b><br/>
								<b>Kepala Badan Kepegawaian dan Pengembangan SDM</b><br/>
								<b>Kabupaten Buton Tengah</b>
								<br/>
								<br/>
								<br/>
								<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
								<b><?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div style="page-break-after: always;"></div>
	</div>
</body>
</html>