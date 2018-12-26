<a href="<?php echo base_url('index.php/admin/export/ex_bpk/'); ?>" class="btn btn-success btn-sm">Export Excel</a>
<div class="table-responsive" >
	<table class="table table-bordered table-hover ">
		<tr>
			<th>No</th>
			<th>No. Bukti</th>
			<th>Tgl. Bukti</th>
			<th>Nama Pegawai</th>
			<th>NIP</th>
			<th>Keperluar Perjalanan Dinas</th>
			<th>Kode Anggaran</th>
			<th>Jml. Dibayarkan</th>
			<th>Gol. Pegawai</th>
			<th>Tujuan</th>
			
		</tr>
		<?php $no = 1 ?>
		<?php foreach ($hasil as $data): ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->nip; ?></td>
				<td><?php echo $data->nama_pegawai; ?></td>
				<td><?php echo $data->nama_jenis_jabatan; ?></td>
				<td><?php echo $data->nm_jabatan; ?></td>
				<td><?php echo $data->nama_eselon; ?></td>
				<td><?php echo $data->nomor_sk; ?></td>
				<td><?php echo $data->tanggal_sk_rj; ?></td>
				<td><?php echo $data->tmt_jabatan_rj; ?></td>
				
			</tr>
			<?php $no++ ?>
		<?php endforeach ?>
	</table>
</div>
	