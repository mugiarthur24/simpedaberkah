<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="<?php echo base_url('asset/css/custom.css'); ?>"> -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
</head>
<body>
	<div style="background-color: #8B0000">
		<div class="px-1 py-4 text-light">
			<div class="container-fluid">
				<table width="100%">
					<tr style="vertical-align: middle;">
						<td class="p-1 text-left"><img src="<?php echo base_url($brand); ?>" width="80px"></td>
						<td class="p-1 border-right"><h3><i>Kabupaten Buton Tengah</i></h3></td>
						<td class="px-4"><h4><?php echo $infopt->nama_info_pt; ?></h4></td>
						<td style="font-size: 13px;">
							<i class="fa fa-map-marker"></i> Alamat : <?php echo $infopt->alamat_pt; ?><br/>
							<i class="fa fa-phone"></i> Telepon : <?php echo $infopt->kontak_1; ?><br/>
							<i class="fa fa-envelope"></i> Email : <?php echo $infopt->kontak_3; ?><br/>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #E0BE65">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url() ?>">
				<span class="text-light">SIMPEDA BERKAH</span></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto"></ul>
					<form class="form-inline my-2 my-lg-0">
						<a class="btn btn-light btn-sm text-info float-right" href="<?php echo base_url('index.php/login') ?>"><i class="fa fa-lock "></i> Login</a>
					</form>
				</div>
			</div>
		</nav>
		<div class="py-4" style="background-color: #eeeeee;">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="card mb-4">
							<div class="card-body text-success">Jumlah Pegawai Kabupaten Buton Tengah : <?php echo $this->Pegawai_m->jml() ?> Orang</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card text-center border-success">
							<div class="card-header">Golongan</div>
							<div class="card-body">
								<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
								<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
								<div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								<script type="text/javascript">

									Highcharts.chart('container3', {
										chart: {
											plotBackgroundColor: null,
											plotBorderWidth: null,
											plotShadow: false,
											type: 'pie'
										},
										title: {
											text: 'Grafik Pegawai Per-Golongan'
										},
										credits: {
											enabled: false
										},
										tooltip: {
											pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
										},
										plotOptions: {
											pie: {
												allowPointSelect: true,
												cursor: 'pointer',
												dataLabels: {
													enabled: true,
													format: '<b>{point.name}</b>: {point.percentage:.1f} %',
													style: {
														color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
													}
												}
											}
										},
										series: [{
											name: 'Jumlah',
											colorByPoint: true,
											data: [<?php foreach ($mgol as $datas): ?><?php echo '{name:'."'".$datas->golongan."'".',y:'.$this->Admin_m->jml_data('data_riwayat_golongan','id_golongan',$datas->id_golongan).'},'; ?><?php endforeach ?>],
										}]
									});
								</script>	
							</div>

						</div>
					</div>
					<div class="col">
						<div class="card text-center border-success">
							<div class="card-header">Eselon</div>
							<div class="card-body">
								<div id="container4"></div>
								<script type="text/javascript">
									Highcharts.chart('container4', {
										chart: {
											type: 'column'
										},
										title: {
											text: 'Grafik Pegawai Per-Eselon'
										},
										credits: {
											enabled: false
										},
										subtitle: {
											text: 'Source: Database Kabupaten Buton Tengah'
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Roboto, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'Jumlah (Per-Eselon)'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: 'Jumlah : <b>{point.y:.1f} Orang</b>'
										},

										series: [{
											name: 'Population',
											data: [<?php foreach ($mjab as $datajab): ?><?php echo '['."'".$datajab->nama_eselon."'".','.$this->Admin_m->jml_data('data_riwayat_jabatan','id_eselon',$datajab->id_eselon).'],'; ?><?php endforeach ?>],
											dataLabels: {
												enabled: true,
												rotation: -90,
												color: '#FFFFFF',
												align: 'right',
							            format: '{point.y:.1f}', // one decimal
							            y: 1, // 10 pixels down from the top
							            style: {
							            	fontSize: '13px',
							            	fontFamily: 'Verdana, sans-serif'
							            }
							        }
							    }]
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>