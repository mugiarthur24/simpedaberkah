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
	<!-- <div class="container-fluid">
		<div class="row" style="margin-top: 9px;">
			<div class="col text-center">
				<table width="100%" style="border-bottom:3px solid;">
					<tr height=20px>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td>
						<h5><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
						<div class="text-center">Alamat : <?php echo $infopt->alamat_pt; ?> <?php echo $infopt->kontak_4; ?></div>
						<div class="text-center"><?php echo $infopt->kontak_3; ?></div>
						<h5>BAUBAU 93724</h5>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<h5 class="text-center"><u>SURAT TUGAS</u></h5>
				<p class="text-center" style="margin-top: -10px"><?php echo $hasil2->no_perjadin; ?></p>
				<table style="font-size: 12px" width="100%" class="text-left">
					<tr>
						<td>Menimbang</td>
						<td>:</td>
						<td>Bahwa dalam rangka tertib administrasi Koordinasi Ketua Pengadilan Agama Baubau Tahun 2019</td>
					</tr>
					<tr>
						<td>Dasar</td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $hasil2->dasar_pelaksanaan_2; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div style="font-size: 12px;margin-top: 14PX;" class="text-center"><b>MEMBERIKAN TUGAS :
		</b></div>
		<div style="font-size: 12px;margin-top: 14PX" class="col" >Kepada :</div>
		<table width="100%" style="font-size: 12px" align="center">
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
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil->id_jabatan)->nm_jabatan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Instansi</td>
				<td>:</td>
				<td><?php echo @$dtsatuan->nama_satuan_kerja; ?></td>
			</tr>
		</table>
		
		<table width="100%" style="font-size: 12px">
			<tr>
				<td>Untuk</td>
				<td>:</td>
				<td><?php echo $hasil2->maksud_perjadin; ?></td>
			</tr>
		</table>
	</div>
	<div style="font-size: 12px" class="col" >Demikian surat tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.</div>
	<div class="row" style="margin-top: 14px;">
		<div class="col"></div>
		<div class="col">
			<table width="100%" style="font-size: 12px;">
				<tr>
					<td>Baubau</td>
					<td>,</td>
					<td><?php echo date('d F Y'); ?></td>
				</tr>
			</table>
			<div style="width: 100%;font-size: 12px; margin-top: 14px;" class="text-center">
				<br/><br/><br/><br/><br/>
				<u><b><?php echo $hasil2->pejabat_yang_memerintah; ?></b></u><br/>
				<b>Pembina Tingkat I</b><br/>
				<b>NIP : <?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
			</div>
		</div>
	</div>
	<div style="page-break-after: always;"></div> -->

	<!-- Surat Perintah Tugas -->
	<!-- <div class="container-fluid">
		<div class="row" style="margin-top: 9px;">
			<div class="col text-center">
				
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<h5 class="text-center"><u>SURAT PERINTAH TUGAS</u></h5>
				<p class="text-center" style="margin-top: -10px"><?php echo $hasil2->nomor; ?></p>
				<table style="font-size: 12px" width="100%" class="text-left">
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
		<div style="font-size: 12px;margin-top: 14PX;" class="text-center"><b>MENUGASKAN :
		</b></div>
		<div style="font-size: 12px;margin-top: 14PX" class="col" >Kepada :</div>
		<table width="100%" style="font-size: 12px" align="center">
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
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Instansi</td>
				<td>:</td>
				<td><?php echo @$dtsatuan->nama_satuan_kerja; ?></td>
			</tr>
		</table>
		<table width="100%" style="font-size: 12px">
			<tr>
				<td>Untuk</td>
				<td>:</td>
				<td><?php echo $hasil2->maksud_perjadin; ?></td>
			</tr>
		</table>
	</div>
	<div style="font-size: 12px" class="col" >Demikian surat perintah tugas ini dikeluarkan kepada yang bersangkutan untuk dilaksanakan dan dipergunakan sebagaimana mestinya.</div>
	<div class="row" style="margin-top: 14px;">
		<div class="col"></div>
		<div class="col">
			<table width="100%" style="font-size: 12px;">
				<tr>
					<td>Dikeluarkan di</td>
					<td>:</td>
					<td><b><?php echo ucwords($infopt->kontak_3); ?></b></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo date('d F Y'); ?></td>
				</tr>
			</table>
			<div style="width: 100%;font-size: 12px; margin-top: 14px;" class="text-center">
				<b>A.n Bupati Buton Tengah,<br/><b>Sekretariat Daerah<br/></b><br/><br/><br/><br/><br/>
				<u><b><?php echo $hasil2->pejabat_mengetahui; ?></b></u><br/>
				<b>Pembina Utama Madya, IV/d</b><br/>
				<b>NIP : <?php echo $hasil2->nip_pejabat_mengetahui; ?></b>
			</div>
		</div>
	</div>
	<div style="page-break-after: always;"></div> -->


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
						<td><?php echo @$hasil2->no_perjadin; ?></td>
					</tr>
					<tr>
						<td>Berangkat dari</td>
						<td>:</td>
						<td><?php echo @$hasil2->tempat_berangkat; ?></td>
					</tr>
					<tr>
						<td>(tempat kedudukan)</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td><?php echo @$hasil2->tujuan; ?></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td><?php echo @$hasil2->tgl_berangkat; ?></td>
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
						<td><?php echo @$hasil2->tujuan; ?>  </td>
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
						<td><?php echo @$hasil2->tujuan; ?>  </td>
					</tr>
					<tr>
						<td>Ke</td>
						<td>:</td>
						<td><?php echo @$hasil2->tempat_berangkat; ?>  </td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td><?php echo @$hasil2->tgl_kembali; ?></td>
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
		<!-- <div class="container-fluid">
			
			<div class="row">
				<div class="col">
					<h5 class="text-center"><u>PERNYATAAN MUTLAK</u></h5>
				</div>
			</div>
			<div class="col" style="font-size: 12px">
				Yang bertandatangan di bawah ini :<br/>
			</div>

			<div class="col">
				<table style="font-size: 12px">
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
						<td><?php echo @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
					</tr>
				</table>
			</div>
			<div class="col" style="font-size: 12px">
				Berdasarkan Surat Perjalanan Dinas Nomor : <?php echo $hasil2->nomor; ?> tanggal : <?php echo $hasil2->tgl_sppd; ?><br/>
				<br/>
				Dengan ini kami menyatakan dengan sesungguhnya bahwa :<br/>
				1. Biaya Transpor Pegawai dan/atau biaya penginapan di bawah ini yang  meliputi :
			</div>
			<div class="col">
				<table width="100%" border="1" style="font-size: 12px">
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
			<div class="col" style="font-size: 12px">
				2. Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas SKPD/Kas Daerah.
			</div>
		</div>
		<div class="row" style="font-size: 12px;margin-top: 14px;">
			<div class="col"></div>
			<div class="col text-center"><?php echo $infopt->kontak_3.', '.date('d F Y'); ?></div>
		</div>
		<div class="row" style="font-size: 12px;">
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
		<div style="page-break-after: always;"></div> -->


		<!-- Daftar Pengluaran Riil -->
		<!-- <div class="container-fluid">
			
	 <div class="row" style="margin-top: 9px;">
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
	<div class="col" style="font-size: 12px">
		Yang bertandatangan di bawah ini :<br/>
	</div>

	<div class="col">
		<table style="font-size: 12px" width="30%">
			<tr>
				<td width="35%">Nama</td>
				<td width="5%">:</td>
				<td width="60%"><?php echo $hasil->nama; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>:</td>
				<td><?php echo $hasil->kode_honorer; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo @$this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?></td>
			</tr>
		</table>
	</div>
	<div class="col" style="font-size: 12px">
		Berdasarkan SPD Nomor <?php echo @$hasil2->kd_anggaran; ?>, tanggal 18 Januari 2019 bersama ini kami menyatakan dengan sesungguhnya bahwa :  <br/>
		<br/>
		1. Biaya Transpor Pegawai dan/atau biaya penginapan dibawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi :<br/>
	</div>
	<div class="col">
		<table width="100%" border="1" style="font-size: 12px">
			<tr>
				<td class="text-center" width="10px">No</td>
				<td class="text-center" colspan="2">Uraian</td>
				<td class="text-center" colspan="2">Biaya</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td colspan="2">Biaya Perjalanan</td>
				<td colspan="2"><!-- <?php echo 'Rp '.number_format($hasil2->biaya_riil); ?> --></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">Jumlah</td>
				<td colspan="2"><!-- <?php echo 'Rp '.number_format($hasil2->biaya_riil); ?> --></td>
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


					// $angka = $hasil2->biaya_riil;
					// echo 'Terbilang : '.ucwords(terbilang($angka)).' Rupiah';
					?>
				</td>
			</tr>
		</table>
	</div>
	<div class="col" style="font-size: 12px">
		2. Jumlah uang tersebut pada angka 1 diatas benar-benar dikeluarkan untuk melaksanakan Konsolidasi dan Akurasi Data Laporan Keuangan dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran ini kami bersedia untuk menyetor kelebihan tersebut ke Kas Negara.<br/>
		<br/>
		Demikian pernyataan ini dibuat dengan sebenarnya, untuk dipergunakan sebagai mana mestinya.
	</div>
</div>
<div class="row" style="font-size: 12px;margin-top: 14px;">
	<div class="col"></div>
	<div class="col text-center"><?php echo ucwords(@$hasil2->tempat_berangkat); ?>, <?php echo date('d F Y', strtotime(@$hasil2->tgl_sppd)) ; ?></div>
</div>
<div class="row" style="font-size: 12px;">
	<div class="col">
		<div class="text-center">Mengetahui,<br/>
			An. Kuasa Pengguna Anggaran<br/>
			Pejabat Pembuat Komitmen
			<br/><br/>
			<br/>
			<br/>
			<u><b><?php echo @$hasil2->pejabat_mengetahui; ?></b></u><br/>
			<b><?php echo @$hasil2->nip_pejabat_mengetahui; ?></b>
		</div>
	</div>
	<div class="col text-center">
		<br/>
		Pegawai Yang Melaksanakan<br/> Perjalalanan Dinas<br/>
		<br/><br/>
		<br/>
		<b><u><?php echo @$hasil->nama; ?></u></b><br/>
		<b><?php echo @$hasil->kode_honorer; ?></b>
	</div>
</div> -->
<div style="page-break-after: always;"></div>


<!-- Laporan Pelaksanaan Kegiatan -->
<!-- <div class="container-fluid">
	<div class="row" style="margin-top: 9px;">
		<div class="col text-center">
			<table width="100%" style="border-bottom:3px solid;">
				<tr>
					<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
					<td>
						<h5><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
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
		<table style="font-size: 12px">
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
	<div class="row" style="font-size: 12px;margin-top: 14px;">
		<div class="col"></div>
		<div class="col text-center"><?php echo $infopt->kontak_3.', '.date('d F Y'); ?></div>
	</div>
	<div class="row" style="font-size: 12px;">
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
</div>
<div style="page-break-after: always;"></div> -->

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
				<b style="font-size: 11px">KODE REKENING ANGGARAN<br/><?php echo @$hasil2->no_rek; ?></b>
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
				<span class="border border-dark"><?php echo 'Rp '.@$hasil2->jumlah_biaya; ?></span> Dengah Huruf <span class="border border-dark"><?php $angka2 = @$hasil2->jumlah_biaya;echo ucwords(terbilang($angka2)).' Rupiah';?></span>
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
				<?php echo @$hasil2->keterangan_anggaran; ?>
			</div>
		</div>
		<div class="row bts-ats">
			<div class="col text-center" style="border-top:1px solid; border-right: 1px solid;border-left: 1px solid">
				Telah diperksa<br/>Setuju dibayar
			</div>
			<div class="col text-center" style="border-top:1px solid">Telah Lunas dibayar<br/>Tgl................................</div>
			<div class="col text-center" style="border-top:1px solid">
				<?php echo ucwords(@$hasil2->tempat_berangkat); ?> <?php echo date('d F Y', strtotime(@$hasil2->tgl_sppd)) ; ?>
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
					<u><b><?php echo @$hasil2->pejabat_mengetahui; ?></b></u><br/>
					<b><?php echo @$hasil2->nip_pejabat_mengetahui; ?></b>
				</div>
			</div>
			<div class="col text-center">
				<b><u><?php echo @$hasil2->id_bendahara; ?></u></b><br/>
				<b><?php echo @$hasil2->nip_bendahara; ?></b>
			</div>
			<div class="col text-center">
				<b><u><?php echo @$hasil->nama_pegawai; ?></u></b><br/>
				<b><?php echo @$hasil->nip; ?></b>
			</div>
		</div>
	<div style="page-break-after: always;"></div>

	<!-- Rincian Belanja Perjalanan Dinas -->
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h5 class="text-center"><u>RINCIAN BIAYA PERJALANAN DINAS</u></h5>
			</div>
		</div>
		<div class="col">
			<table style="font-size: 12px">
				<tr>
					<td>Lampiran SPD Nomor</td>
					<td>:</td>
					<td><?php echo @$hasil2->no_perjadin; ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo @$hasil2->tgl_sppd; ?></td>
				</tr>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<!-- real -->
				<table width="100%" border="1" style="font-size: 12px">
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
						<td colspan="2"><!-- <?php echo 'Rp '.number_format($hasil2->biaya_riil); ?> --></td>
						<td></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td>Biaya Keberangkatan</td>
						<td colspan="2"><?php echo 'Rp '.number_format(@$hasil2->biaya_pergi); ?></td>
						<td></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td>Biaya Kepulangan</td>
						<td colspan="2"><?php echo 'Rp '.number_format(@$hasil2->biaya_pulang); ?></td>
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
						<td><?php echo @$hasil2->lama_hari; ?> (Hari) x <?php echo 'Rp '.number_format(@$hasil2->biaya_pulang); ?></td>
						<td colspan="2"><?php echo 'Rp '.number_format(@$hasil2->biaya_pulang); ?></td>
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
						<td><?php echo @$hasil2->lama_hari; ?> (Hari) x <?php echo 'Rp '.number_format(@$hasil2->biaya_pulang); ?></td>
						<td colspan="2"><?php echo 'Rp '.number_format(@$hasil2->biaya_pulang); ?></td>
						<td></td>
					</tr>
					<tr>
						<td class="text-center"></td>

						<td colspan="5" class="text-center">
							<?php 
							$angka3 = @$hasil2->jumlah_dibayarkan;
							echo 'Terbilang : '.ucwords(terbilang($angka3)).' Rupiah';
							?>
						</td>
					</tr>
				</table>
				<div class="row" style="font-size: 12px;margin-top: 14px;">
					<div class="col"></div>
					<div class="col text-center"><?php echo ucwords(@$hasil2->tempat_berangkat); ?>, <?php echo date('d F Y', strtotime(@$hasil2->tgl_sppd)) ; ?></div>
				</div>
				<div class="text-center">
					<table width="100%" style="font-size: 12px;" align="center">
						<tr>
							<td>dibayar sejumlah</td>
							<td>telah menerima jumlah uang sebesar</td>
							<td></td>
						</tr>
						<tr>
							<td><?php echo 'Rp '.number_format(@$hasil2->jumlah_biaya); ?></td>
							<td><?php echo 'Rp '.number_format(@$hasil2->jumlah_dibayarkan); ?></td>
						</tr>
					</table>
				</div>
				<div class="row" style="font-size: 12px;">
					<div class="col">
						<div class="text-center">Bendahara,<br/>
							<br/>
							<br/>
							<u><b><?php echo @$hasil2->id_bendahara; ?></b></u><br/>
							<b>NIP. <?php echo @$hasil2->nip_bendahara; ?></b>
						</div>
					</div>
					<div class="col text-center">Yang Menerima,<br/>
						<br/>
						<br/>
						<b><u><?php echo @$hasil->nama; ?></u></b><br/>
						<b><?php echo @$hasil->kode_honorer; ?></b>
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
							<td><?php echo number_format(@$hasil2->jumlah_biaya); ?></td>
						</tr>
						<tr>
							<td>yang telah di bayarkan</td>
							<td>:</td>
							<td>Rp</td>
							<td><?php echo number_format(@$hasil2->jumlah_dibayarkan); ?></td>
						</tr>
						<tr>
							<td>Sisa Kurang / Lebih</td>
							<td>:</td>
							<td>Rp</td>
							<td><?php echo number_format(@$hasil2->biaya_sisa); ?></td>
						</tr>
					</table>
				</div>
				<div class="row" style="font-size: 12px;">
					<div class="col">
						<div class="text-center"><b>An. Kuasa Pengguna Anggaran<br/>
						Pejabat Pembuat Komitmen,</b><br/>
							<br/>
							<br/>
							<br/>
							<u><b><?php echo @$hasil2->pejabat_mengetahui; ?></b></u><br/>
							<b>NIP. <?php echo @$hasil2->nip_pejabat_mengetahui; ?></b>
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