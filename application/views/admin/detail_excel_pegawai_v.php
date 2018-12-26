 <?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$title.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 
 ?>
  <table border="1" width="100%">
       <thead>
            <tr>
                 <th>Nip</th>
                 <th>Nama Kerja</th>
                 <th>Lokasi Kerja</th>
            </tr>
       </thead>
       <tbody>
            <?php $i=1; foreach($data_pegawai as $data) { ?>
            <tr>
                 <td><?php echo $data->nip; ?></td>
                <td><?php echo $data->nama_pegawai; ?></td>
                <td><?php echo $data->lokasi_kerja; ?></td>
            </tr>
            <?php $i++; } ?>
       </tbody>
  </table>
