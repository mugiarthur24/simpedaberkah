<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
	<style type="text/css">
	.colpading{padding: 0px 4px}
	.penuh{width: 100%}
</style>
</head>
<body onload="window:print()">
	<div class="container-fluid" style="font-size: 11px">
		<div class="row" style="border-bottom:1px solid">
			<div class="col-2"><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="80px"></div>
			<div class="col-10 text-center">
				<b>PEMERINTAH KABUPATEN BUTON TENGAH</b><br/> 
				<b>BADAN KEPEGAWAIAN DAN PENGEMBANGAN SDM</b><br/> 
				<p style="font-size: 12px"><?php echo $infopt->alamat_pt.'<br/>'.$infopt->kontak_4.'<br/>'.$infopt->kontak_3; ?></p>
			</div>
		</div>
		<div class="row" style="margin-top: 14px">
			<div class="col">
				<table width="100%">
					<tr>
						<td>Nama Pegawai</td>
						<td>:</td>
						<td><?php echo @$hasil->nama; ?></td>
					</tr>
					<tr>
						<td>Nomor Induk </td>
						<td>:</td>
						<td><?php echo @$hasil->kode_honorer; ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td><?php echo @$sjabatan->id_jabatan; ?></td>
					</tr>
				</table>
			</div>
			<div class="col"></div>
		</div>
		<div class="row" style="margin-top: 14px;">
			<div class="col text-center"><u>REKAP LAPORAN PERJALANAN DINAS</u></div>
		</div>
		<div class="row" style="margin-top: 7px">
			<div class="col">
				<?php $no = 1 ?>

				<?php foreach ($hasil2 as $data): ?>
					<div style="padding: 7px;margin-bottom: 7px" class="border border-dark">
						<table width="100%" border="1">
							<thead>
								<tr>
									<th colspan="9" class="text-center">Detail SPD</th>
								</tr>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">No SPD</th>
									<th class="text-center">Jenis Perjadin</th>
									<th class="text-center">Kode Anggaran</th>
									<th class="text-center">Maksud Perjalanan Dinas</th>
									<th class="text-center">Tempat Berangkat</th>
									<th class="text-center">Tempat Tujuan</th>
									<th class="text-center">Tgl Berangkat</th>
									<th class="text-center">Tgl Kembali</th>
								</tr>
								<tbody>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?php echo $data->no_perjadin; ?></td>
										<td><?php echo $data->no_rek; ?></td>
										<td><?php echo $this->Admin_m->detail_data_order('master_jenis_perjadin','id_jenis_perjadin',$data->id_jenis_perjadin)->jenis_perjadin; ?></td>
										<td><?php echo $data->maksud_perjadin; ?></td>
										<td><?php echo $data->tempat_berangkat; ?></td>
										<td><?php echo $data->tujuan; ?></td>
										<td><?php echo $data->tgl_berangkat; ?></td>
										<td><?php echo $data->tgl_kembali; ?></td>
									</tr>
								</tbody>
							</thead>
						</table>
						<?php $no++ ?>
						<table width="100%" border="1" style="margin-top: 7px">
							<thead>
								<tr>
									<th colspan="10" class="text-center">Rincian Biaya</th>
								</tr>
								<tr>
									<th rowspan="2" class="text-center">Lama hari</th>
									<th colspan="2" class="text-center">Uang Harian</th>
									<th rowspan="2" class="text-center">Akomodasi Hotel</th>
									<th rowspan="2" class="text-center">Representasi</th>
									<th rowspan="2" class="text-center">Kontribusi/lain-lain</th>
									<th colspan="2" class="text-center">Biaya Tiket</th>
									<th colspan="2" class="text-center">Total</th>
								</tr>
								<tr>
									<th class="text-center">Per Hari</th>
									<th class="text-center">Total</th>
									<th class="text-center">Pergi</th>
									<th class="text-center">Pulang</th>
									<th class="text-center">Akumulasi</th>
									<th class="text-center">Dibayarkan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"><?php echo $data->lama_hari.' Hari'; ?></td>
									<td class="text-center"><?php echo number_format($data->uang_perhari); ?></td>
									<td class="text-center"><?php echo number_format($data->total_uang_harian); ?></td>
									<td class="text-center"><?php echo number_format($data->total_uang_hotel); ?></td>
									<td class="text-center"><?php echo number_format($data->biaya_representasi); ?></td>
									<td class="text-center"><?php echo number_format($data->biaya_lain); ?></td>
									<td class="text-center"><?php echo number_format($data->biaya_pergi); ?></td>
									<td class="text-center"><?php echo number_format($data->biaya_pulang); ?></td>
									<td class="text-center"><?php echo number_format($data->jumlah_biaya); ?></td>
									<td class="text-center"><?php echo number_format($data->jumlah_dibayarkan); ?></td>
								</tr>
							</tbody>
						</table>
						<table width="100%" width="100%" border="1" style="margin-top: 7px;">
							<thead>
								<tr>
									<th colspan="12" class="text-center">Tiket/Akomodasi</th>
								</tr>
								<tr>
									<th rowspan="2" class="text-center">Nama Hotel</th>
									<th colspan="5" class="text-center">Akomodasi Berangkat</th>
									<th colspan="5" class="text-center">Akomodasi Pulang</th>
									<th rowspan="2" class="text-center">Ket</th>
								</tr>
								<tr>
									<th class="text-center">Tgl</th>
									<th class="text-center">Pesawat/KA</th>
									<th class="text-center">Nomor Tiket</th>
									<th class="text-center">Kode Booking</th>
									<th class="text-center">Harga</th>
									<th class="text-center">Tgl</th>
									<th class="text-center">Pesawat/KA</th>
									<th class="text-center">Nomor Tiket</th>
									<th class="text-center">Kode Booking</th>
									<th class="text-center">Harga</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<td class="text-center"><?php echo $data->nama_hotel; ?></td>
									<td class="text-center"><?php echo $data->tgl_ta_berangkat; ?></td>
									<td class="text-center"><?php echo $data->pesawat_berangkat; ?></td>
									<td class="text-center"><?php echo $data->no_tiket_berangkat; ?></td>
									<td class="text-center"><?php echo $data->kode_book_berangkat; ?></td>
									<td class="text-center"><?php echo $data->harga_kembali; ?></td>
									<td class="text-center"><?php echo $data->tgl_ta_kembali; ?></td>
									<td class="text-center"><?php echo $data->pesawat_kembali; ?></td>
									<td class="text-center"><?php echo $data->no_tiket_kembali; ?></td>
									<td class="text-center"><?php echo $data->kode_book_kembali; ?></td>
									<td class="text-center"><?php echo $data->harga_kembali; ?></td>
									<td class="text-center"></td>
								</tr>
							</thead>
						</table>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
</html>