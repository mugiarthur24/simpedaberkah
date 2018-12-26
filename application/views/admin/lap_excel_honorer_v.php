 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <html lang="en">
 <head>
      <meta charset="utf-8">
      <title><?php echo $title ?></title>
      <style>
           ::selection { background-color: #E13300; color: white; }
           ::-moz-selection { background-color: #E13300; color: white; }
 
           body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
           }
 
           main {
                width: 80%;
                padding: 20px;
                background-color: white;
                min-height: 300px;
                border-radius: 5px;
                margin: 30px auto;
                box-shadow: 0 0 8px #D0D0D0;
           }
           table {
                border-top: solid thin #000;
                border-collapse: collapse;
           }
           th, td {
                border-top: border-top: solid thin #000;
                padding: 6px 12px;
           }
 
           a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
           }
      </style>
 </head>
 
 <body>
      <main>
           <h1>Laporan Honorer</h1>
           <p><a href="<?php echo base_url('c_excel/export_data') ?>">Export ke Excel</a></p>
           <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Nomor SK</th>
                          <th>Lokasi Kerja</th>
                          <th>TMT</th>
                          <th>Nomor Handphone</th>
                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($Honorer as $data) { ?>
                     <tr>
                          <td><?php echo $data->nama; ?></td>
                          <td><?php echo $data->alamat; ?></td>
                          <td><?php echo $data->nomor_sk; ?></td>
                          <td><?php echo @$this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja; ?></td>
                          <td><?php echo $data->tmt; ?></td>
                          <td><?php echo $data->no_hp; ?></td>

                     </tr>
                     <?php $i++; } ?>
                </tbody>
           </table>
      </main>
 </body>
 </html>
